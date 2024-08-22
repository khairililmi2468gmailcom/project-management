<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ModulModel;
use App\Models\ProjectModel;
use App\Models\AuthGroupUserModel;
use CodeIgniter\HTTP\Message;

class User extends BaseController
{
    protected $UserModel;
    protected $AuthGroupUserModel;
    protected $ModulModel;
    protected $ProjectModel;
    public function __construct()
    {
        $this->UserModel = new UserModel(); // Set ke properti kelas
        $this->AuthGroupUserModel = new AuthGroupUserModel(); // Set ke properti kelas
        $this->ModulModel = new ModulModel(); // Set ke properti kelas
        $this->ProjectModel = new ProjectModel(); // Set ke properti kelas
    }

    public function user()
    {
        $users = $this->UserModel->getUsersWithLevels();

        $admin = array_filter($users, function($user) {
            return $user['group_id'] == 1; // Asumsikan level 3 adalah Member
        });

        $members = array_filter($users, function($user) {
            return $user['group_id'] == 3; // Asumsikan level 3 adalah Member
        });

        $projectManagers = array_filter($users, function($user) {
            return $user['group_id'] == 2; // Asumsikan level 2 adalah Project Manager
        });



        $data = [
            'nilai' => 'User',
            'members' => $members,
            'admin' => $admin,
            'projectManagers' => $projectManagers,
        ];

        echo view('template/v_header', $data);
        echo view('template/v_sidebar');
        echo view('home/user', $data);
        echo view('template/v_footer');
    }

    public function adduser()
    {
        $data = [
            'nilai' => 'AddUser'
        ];
        echo view('template/v_header', $data);
        echo view('template/v_sidebar');
        echo view('home/adduser');
        echo view('template/v_footer');
    }

    public function edit_user($id)
    {
        $this->UserModel = new UserModel();
        $data = [
            'title' => 'Form Ubah Data User',
            'users' => $this->UserModel->editdatauser($id)
        ];
        return view('user/edit_user', $data);
    }

    public function update($id)
    {
        $this->UserModel = new UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'email' => $this->request->getVar('email'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telp' => $this->request->getVar('telp'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $this->request->getVar('foto'),
        ];

        $this->UserModel->updateUser($id, $data);
        return redirect()->to(base_url('user'));
    }

    public function update_profil($id)
    {
        $this->UserModel = new \App\Models\UserModel();
        $foto = $this->request->getFile('foto');
        if ($foto->getError() == UPLOAD_ERR_OK) {
            $foto->move(ROOTPATH . 'public/assets/foto');
            $namaFoto = $foto->getName();
        } else {
            $namaFoto = $this->request->getVar('foto_lama');
        }
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'email' => $this->request->getVar('email'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telp' => $this->request->getVar('telp'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFoto,
        ];
        $this->UserModel->updateUser($id, $data);
        return redirect()->to(base_url('profile'));
    }


    public function view_user($id)
    {
        $this->UserModel = new UserModel();

        $data['users'] = $this->UserModel->viewdatauser($id);

        return view('user/view_user', $data);
    }

    // public function save()
    // {

    //     $username       = $this->request->getVar('username');
    //     $password       = $this->request->getVar('password');
    //     $nama_user      = $this->request->getVar('nama');
    //     $level          = $this->request->getVar('level');
    //     $jenis_kelamin  = $this->request->getVar('jenis_kelamin');
    //     $telp           = $this->request->getVar('telepon');
    //     $alamat         = $this->request->getVar('password');
    //     $data_user = [
    //         'username'      => $username,
    //         'password'      => $password,
    //         'nama_user'     => $nama_user,
    //         'level'         => $level,
    //         'jenis_kelamin' => $jenis_kelamin,
    //         'telp'          => $telp,
    //         'alamat'        => $alamat
    //     ];

    //     $this->UserModel->insert($data_user);
    //     return redirect('user');
    // }

    public function proses_adduser()
    {
        $UserModel = new UserModel();
        $UserModel->insert($this->request->getPost());
        return redirect()->to(base_url('user'));
    }

    public function delete($id)
    {
        $userModel = new UserModel(); // Inisialisasi model
        $userModel->updateStatusDelete($id);
        return redirect()->to(base_url('user'));
    }

    public function view_projects($id)
{
    $projects = $this->ProjectModel->getProjectsByManager($id);

    $data = [
        'projects' => $projects,
        'manager_id' => $id,
        'nilai' => 'View Project'

    ];


    echo view('home/view_projects', $data); // Ganti dengan view yang sesuai

}

public function view_modul($id)
{
    // $modul = $this->ModulModel->getmodulbyuser($id);
    $modul = $this->ModulModel->select('modul.*, project.nama_project, users.username')
            ->join('project', 'modul.id_project = project.id_project')
            ->join('users', 'modul.id = users.id')
            ->where('modul.id', $id)
            ->findAll();

    $data = [
        'modul' => $modul,
        'id' => $id,
        'nilai' => 'View Project'

    ];


    echo view('home/view_modul', $data); // Ganti dengan view yang sesuai

}
}
