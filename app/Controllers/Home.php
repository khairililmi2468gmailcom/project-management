<?php
namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\ModulModel;
use App\Models\RequestModel;
use App\Models\AuthGroupUserModel;
use App\Models\CustomUserModel; // Model baru yang dibuat
use Myth\Auth\Models\UserModel;

class Home extends BaseController
{
    protected $ProjectModel;
    protected $ModulModel;
    protected $RequestModel;
    protected $CustomUserModel; // Ganti dengan model baru
    protected $AuthGroupUserModel;

    public function __construct()
    {
        $this->ProjectModel = new ProjectModel();
        $this->ModulModel = new ModulModel();
        $this->RequestModel = new RequestModel();
        $this->CustomUserModel = new CustomUserModel(); // Ganti dengan model baru
        $this->AuthGroupUserModel = new AuthGroupUserModel();
    }

    public function index()
{
    $userId = user()->id;
    $projects = $this->ProjectModel->where('id', $userId)->findAll();
    $modul = $this->ModulModel->where('id', $userId)->findAll();
    $projectselesai = $this->ProjectModel->where('status_project', 'done')->findAll();
    $projectbselesai = $this->ProjectModel->where('id', $userId)->where('status_project !=', 'done')->findAll();

    $datamodulid = $this->ModulModel->select('modul.*, project.nama_project')
        ->join('project', 'project.id_project = modul.id_project')
        ->where('modul.id', $userId)
        ->orderBy('modul.deadline', 'ASC') // Urutkan berdasarkan deadline
        ->findAll();

    $datamodulgraf = $this->ModulModel->select('modul.*, project.nama_project')
        ->join('project', 'project.id_project = modul.id_project')
        ->where('modul.id', $userId)
        ->findAll();

    $users = $this->CustomUserModel->getUsersWithLevels(); // Ganti dengan model baru

    $members = array_filter($users, function($user) {
        return $user['group_id'] == 3; // Asumsikan level 3 adalah Member
    });

    $projectManagers = array_filter($users, function($user) {
        return $user['group_id'] == 2; // Asumsikan level 2 adalah Project Manager
    });

    $projectcount = $this->ProjectModel->findAll();
    $almodul = $this->ModulModel->findAll();
    $modulselesai = $this->ModulModel->where('id_status', '4')->findAll();
    $reqcount = $this->RequestModel->findAll();
    $approvereq = $this->RequestModel->where('status', 'approved')->findAll();
    // $data['project_count'] = count($projectcount);

    // Tambahkan perhitungan jumlah modul untuk setiap project
    foreach ($projects as &$project) {
        // Mengambil semua modul yang terkait dengan proyek ini
        $allModules = $this->ModulModel->where('id_project', $project['id_project'])->findAll();

        // Menghitung total bobot berdasarkan tanggal selesai
        $selesai = 0;
        $belumSelesai = 0;

        foreach ($allModules as $module) {
            if ($module['tanggal_selesai'] !== null) {
                $selesai += $module['bobot'];
            } else {
                $belumSelesai += $module['bobot'];
            }
        }

        // Menyimpan jumlah modul dan data untuk doughnut chart
        $project['total_modul'] = count($allModules);
        $project['doughnutChartData'] = [
            'labels' => ['Selesai', 'Belum Selesai'],
            'datasets' => [
                [
                    'data' => [$selesai, $belumSelesai],
                    'backgroundColor' => ['#28a745', '#dc3545'],
                    'hoverOffset' => 4,
                ],
            ],
        ];
    }

    $data = [
        'nilai' => 'Dashboard',
        'tampildata' => $projects,
        'jprojperuser' => count ($projects),
        'jmodperuser' => count ($modul),
        'project_count' => count($projectcount),
        'project' => $projectcount,
        'project_selesai' => count($projectselesai),
        'project_bselesai' => count($projectbselesai),
        'reqcount' => count($reqcount),
        'approvereq' => count($approvereq),
        'members' => count($members),
        'datamembers' => $members,
        'almodul' => $almodul,
        'modulcount' => count($almodul),
        'modul_selesai' => count($modulselesai),
        'projectManagers' => count($projectManagers),
        'datapm' => $projectManagers,
        'tampildataa' => $datamodulgraf
    ];

    echo view('template/v_header', $data);
    echo view('template/v_sidebar');
    echo view('home/index', $data);
    echo view('template/v_footer');
}
}
?>