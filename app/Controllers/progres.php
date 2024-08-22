<?php

namespace App\Controllers;

use App\Models\ModulModel;
use App\Models\ProjectModel;
use App\Models\ProgresModel;
use Myth\Auth\Models\UserModel;

class Progres extends BaseController
{
    protected $ProjectModel;
    protected $ProgresModel;
    protected $ModulModel;
    protected $UserModel;

    public function __construct()
    {
        $this->ProjectModel = new ProjectModel;
        $this->UserModel = new UserModel();
        $this->ModulModel = new ModulModel;
        $this->ProgresModel = new ProgresModel;
    }

    public function progres()
    {
        $userId = user()->id;
        $progres = $this->ProgresModel->getProgres($userId);
        $data = [
            'nilai' => 'progres',
            'tampildata' => $progres
        ];
        echo view('template/v_header', $data);
        echo view('template/v_sidebar');
        echo view('home/progres', ['progres' => $progres]);
        echo view('template/v_footer');
    }

    public function approveRequest($id_modul)
    {
        $tanggal_selesai = date('Y-m-d H:i:s');
        // Memperbarui status dan tanggal selesai di tabel progres
        $this->ProgresModel->where('id_modul', $id_modul)->set([
            'id_status' => 4
        ])->update();
        $this->ModulModel->where('id_modul', $id_modul)->set([
            'id_status' => 4,
            'tanggal_selesai' => $tanggal_selesai
        ])->update();
    
        return redirect()->to(base_url('progres'));
    }

    public function rejectRequest($id_modul)
    {
        $this->ProgresModel->where('id_modul', $id_modul)->set(['id_status' => 3])->update();
        $this->ModulModel->where('id_modul', $id_modul)->set(['id_status' => 3])->update();
        return redirect()->to(base_url('progres'));
    }

    public function view_pdf($filename)
    {
        $file = ROOTPATH . 'public/assets/bukti/' . $filename;
        if (file_exists($file)) {
            return redirect()->to(base_url('assets/bukti/' . $filename));
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }
}

