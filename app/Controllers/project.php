<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\ModulModel;
use Myth\Auth\Models\UserModel;

class Project extends BaseController
{
    protected $ProjectModel;
    protected $UserModel;
    protected $ModulModel;



    public function __construct()
    {
        $this->ProjectModel = new ProjectModel();
        $this->UserModel = new UserModel();
        $this->ModulModel = new ModulModel();
    }
    public function project()
    {
        $userId = user()->id;
        $projects = $this->ProjectModel->where('id', $userId)->findAll();
        
        $data = [
            'nilai' => 'Project',
            'tampildata' => $projects
        ];
        echo view('template/v_header', $data);
        echo view('template/v_sidebar');
        echo view('home/project', $data);
        echo view('template/v_footer');
    }

    public function add_project()
    {
        $data = [
            'nilai' => 'Add Project'
        ];
        echo view('template/v_header', $data);
        echo view('template/v_sidebar');
        echo view('home/add_project');
        echo view('template/v_footer');
    }

    public function proses_add_project()
    {
        $data = $this->request->getPost();

        $file = $this->request->getFile('upload');
        $namaFile = '';

        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(ROOTPATH . 'public/assets/files');
            $namaFile = $file->getName();
        }

        $data['upload_file'] = $namaFile;

        $this->ProjectModel->insert($data);
        return redirect()->to(base_url('project'));
    }

    // public function detail_project()
    // {
    //     $data = [
    //         'nilai' => 'Detail Project'
    //     ];
    //     echo view('template/v_header', $data);
    //     echo view('template/v_sidebar');
    //     echo view('home/detail_project');
    //     echo view('template/v_footer');
    // }

    public function detail_project($id_project)
    {
        // Mengambil detail project
        $data['project'] = $this->ProjectModel->getProjectDetail($id_project);
    
        // Ambil semua modul untuk project tertentu
        $modulModel = new ModulModel();
        $modulData = $modulModel->select('SUM(bobot) as total_bobot, deadline')
            ->where('id_project', $id_project)
            ->groupBy('deadline')
            ->orderBy('deadline', 'ASC')
            ->findAll();
    
        $labels = [];
        $dataPoints = [];
        $cumulativeWeight = 0;
    
        foreach ($modulData as $modul) {
            $labels[] = $modul['deadline'];
            $cumulativeWeight += $modul['total_bobot'];
            $dataPoints[] = $cumulativeWeight;
        }
    
        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => "Total Bobot per Deadline",
                    'backgroundColor' => "rgb(50, 168, 82)",
                    'borderColor' => "rgba(50, 168, 82, 1)",
                    'data' => $dataPoints,
                    'fill' => false,
                ]
            ]
        ];
    
        // Get all modules with necessary data
        $modul = $modulModel->select('modul.*, users.username')
            ->join('users', 'users.id = modul.id')
            ->where('modul.id_project', $id_project)
            ->findAll();
        $modulCount = count($modul);
    
        // Pass data to the view
        $data['chartData'] = $chartData;
        $data['modul'] = $modul;
        $data['modul_count'] = $modulCount;
    
        return view('home/detail_project', $data);
    }
     

    

    public function delete($id_project)
    {
        $ProjectModel = new ProjectModel(); // Inisialisasi model
        $ProjectModel->delete_project($id_project);
        return redirect()->to(base_url('project'));
    }
}
