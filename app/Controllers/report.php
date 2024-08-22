<?php
namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\ModulModel;
use App\Models\RequestModel;
use App\Models\AuthGroupUserModel;
use App\Models\CustomUserModel; 
use Myth\Auth\Models\UserModel;

class Report extends BaseController
{
    protected $ProjectModel;
    protected $ModulModel;
    protected $RequestModel;
    protected $CustomUserModel;
    protected $AuthGroupUserModel;

    public function __construct()
    {
        $this->ProjectModel = new ProjectModel();
        $this->ModulModel = new ModulModel();
        $this->RequestModel = new RequestModel();
        $this->CustomUserModel = new CustomUserModel();
        $this->AuthGroupUserModel = new AuthGroupUserModel();
    }

    public function report()
    {
        $userId = user()->id;
        $projects = $this->ProjectModel->where('id', $userId)->findAll();
        $projectselesai = $this->ProjectModel->where('status_project', 'done')->findAll();

        $datamodulid = $this->ModulModel->select('modul.*, project.nama_project')
            ->join('project', 'project.id_project = modul.id_project')
            ->where('modul.id', $userId)
            ->orderBy('modul.deadline', 'ASC')
            ->findAll();

        $users = $this->CustomUserModel->getUsersWithLevels();

        $members = is_array($users) ? array_filter($users, function($user) {
            return $user['group_id'] == 3;
        }) : [];

        $projectManagers = is_array($users) ? array_filter($users, function($user) {
            return $user['group_id'] == 2;
        }) : [];

        $admins = is_array($users) ? array_filter($users, function($user) {
            return $user['group_id'] == 1;
        }) : [];

        $projectcount = $this->ProjectModel->findAll();
        $reqcount = $this->RequestModel->findAll();
        $approvereq = $this->RequestModel->where('status', 'approved')->findAll();

        $currentMonth = date('m');
        $currentYear = date('Y');

        $memberCounts = [];
        $projectManagerCounts = [];

        for ($i = 1; $i <= 12; $i++) {
            $memberCounts[] = $this->CustomUserModel->getUsersByRoleAndMonth(3, $i, $currentYear);
            $projectManagerCounts[] = $this->CustomUserModel->getUsersByRoleAndMonth(2, $i, $currentYear);
        }

        foreach ($projects as &$project) {
            $project['modul_count'] = $this->ModulModel->getModulCountByProject($project['id']);
        }

        // Ambil data project manager dan jumlah project yang dipegang
        $projectManagerData = $this->ProjectModel->select('users.username, COUNT(project.id_project) as project_count')
        ->join('users', 'users.id = project.id')
        ->groupBy('users.id')
        ->orderBy('project_count', 'DESC')
        ->findAll();

        // Log data untuk debugging
        log_message('debug', 'Admins: ' . json_encode($admins));
        log_message('debug', 'Project Managers: ' . json_encode($projectManagers));
        log_message('debug', 'Members: ' . json_encode($members));

        // Ambil data member dan jumlah modul yang dipegang
        $memberData = $this->ModulModel->select('users.username, COUNT(modul.id) as modul_count')
            ->join('users', 'users.id = modul.id')
            ->groupBy('users.id')
            ->having('COUNT(modul.id) > 0') // Pastikan hanya menampilkan member yang memiliki modul
            ->orderBy('modul_count', 'DESC')
            ->limit(5) // Ambil top 5 member
            ->findAll();

        $projects = $this->ProjectModel->findAll();

        $data = [
            'nilai' => 'Report',
            'tampildata' => $projects,
            'jprojperuser' => count ($projects),
            'project_count' => count($projectcount),
            'project_selesai' => count($projectselesai),
            'reqcount' => count($reqcount),
            'approvereq' => count($approvereq),
            'members' => $members,
            'projectManagers' => $projectManagers,
            'admins' => $admins,
            'tampildataa' => $datamodulid,
            'memberCounts' => $memberCounts,
            'projectManagerCounts' => $projectManagerCounts,
            'projectManagerData' => $projectManagerData,
            'memberData' => $memberData,
            'projects' => $projects
        ];

        echo view('template/v_header', $data);
        echo view('template/v_sidebar');
        echo view('home/report', $data);
        echo view('template/v_footer');
    }

    public function chart($id_project)
    {
        $modulModel = new ModulModel();
    
        $modulData = $modulModel->select('SUM(bobot) as total_bobot, tanggal_selesai')
            ->where('id_project', $id_project)
            ->groupBy('tanggal_selesai')
            ->orderBy('tanggal_selesai', 'ASC')
            ->findAll();
    
        $labels = [];
        $data = [];
        $moduleNames = [];
        $cumulativeWeight = 0;
    
        foreach ($modulData as $modul) {
            $labels[] = $modul['tanggal_selesai'];
            $cumulativeWeight += $modul['total_bobot'];
            $data[] = $cumulativeWeight;
    
            $modules = $modulModel->select('nama_modul')
                ->where('tanggal_selesai', $modul['tanggal_selesai'])
                ->findAll();
    
            $moduleNamesPerDate = array_column($modules, 'nama_modul');
            $moduleNames[] = implode(", ", $moduleNamesPerDate);
        }
    
        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => "Total Bobot per Tanggal Selesai",
                    'backgroundColor' => "rgb(50, 168, 82)",
                    'borderColor' => "rgba(50, 168, 82, 1)",
                    'data' => $data,
                    'fill' => false,
                ]
            ],
            'moduleNames' => $moduleNames
        ];
    
        $allModules = $modulModel->where('id_project', $id_project)->findAll();
    
        $doughnutLabels = [];
        $doughnutData = [];
        $doughnutColors = [];
        $totalBobotDone = 0;
    
        foreach ($allModules as $module) {
            $doughnutLabels[] = $module['id_modul'];
            $doughnutData[] = $module['bobot'];
            if ($module['id_status'] == 4) {
                $doughnutColors[] = 'rgb(54, 162, 235)';
                $totalBobotDone += $module['bobot'];
            } else {
                $doughnutColors[] = 'rgb(255, 205, 86)';
            }
        }
    
        $doughnutChartData = [
            'labels' => $doughnutLabels,
            'datasets' => [
                [
                    'data' => $doughnutData,
                    'backgroundColor' => $doughnutColors,
                    'hoverOffset' => 4
                ]
            ]
        ];
    
        return view('home/chart', [
            'chartData' => $chartData,
            'doughnutChartData' => $doughnutChartData,
            'totalBobotDone' => $totalBobotDone
        ]);
    }
    

}
?>