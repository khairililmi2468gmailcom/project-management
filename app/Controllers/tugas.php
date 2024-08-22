<?php

namespace App\Controllers;

use App\Models\ModulModel;
use App\Models\ProjectModel;
use App\Models\ProgresModel;
use Myth\Auth\Models\UserModel;

class Tugas extends BaseController
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

    public function tugas()
    {
        $userId = user()->id;
        $datamodulid = $this->ModulModel->select('modul.*, project.nama_project')
            ->join('project', 'project.id_project = modul.id_project')
            ->where('modul.id', $userId)
            ->findAll();
        $datamodulprogres = $this->ProgresModel->findAll();
        $data = [
            'nilai' => 'Tugas',
            'datamodul' => $datamodulid,
            'dataprogres' => $datamodulprogres
        ];
        echo view('template/v_header', $data);
        echo view('template/v_sidebar');
        echo view('home/tugas', $data);
        echo view('template/v_footer');
    }

    public function kerjakan($id_modul) // Ubah nama method agar sesuai dengan konvensi CI4
    {
        $this->ProjectModel = new \App\Models\ProjectModel();
        $this->ModulModel = new \App\Models\ModulModel();
        $this->UserModel = new \Myth\Auth\Models\UserModel();

        $data['modul'] = $this->ModulModel->getModulDetail($id_modul);

        

        return view('home/kerjakan',$data);
    }

    public function proses_addprogres()
{
    $ProgresModel = new ProgresModel();
    $ModulModel = new ModulModel();

    $data = $this->request->getPost();
    $file = $this->request->getFile('bukti');
    $namaFile = '';

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $file->move(ROOTPATH . 'public/assets/bukti');
        $namaFile = $file->getName();
    }
    $data['bukti'] = $namaFile;

    // Insert data ke tabel progres
    $ProgresModel->insert($data);

    // Update id_status di tabel modul
    $id_modul = $data['id_modul'];
    $id_status = $data['id_status'];
    $ModulModel->update($id_modul, ['id_status' => $id_status]);

    return redirect()->to(base_url('tugas'));
}

public function detail_tugas($id_modul)
{
    $modul = $this->ModulModel->getDetailTugas($id_modul);

    if ($modul) {
        $data = [
            'modul' => $modul
        ];
        return view('/home/detail_tugas', $data);
    } else {
        return redirect()->back()->with('error', 'Data modul tidak ditemukan.');
    }
}


}
