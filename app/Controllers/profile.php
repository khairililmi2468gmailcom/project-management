<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RequestModel;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = user()->id; // Mengambil user_id dari session Myth/Auth
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if ($this->request->getMethod(true) === 'POST') {
            $userId = $this->request->getPost('user_id');

            // Pastikan user_id tidak null
            if (!$userId) {
                return redirect()->back()->with('message', 'User ID tidak ditemukan.');
            }

            $requestModel = new RequestModel();
            // Cek apakah pengguna sudah pernah menekan tombol
            $existingRequest = $requestModel->where('user_id', $userId)->first();
            if ($existingRequest) {
                return redirect()->back()->with('message', 'Anda telah mengajukan permintaan, mohon tunggu.');
            }

            $username = user()->username;
            $db = \Config\Database::connect();
            $builderAuthGroupsUsers = $db->table('auth_groups_users');
            $builderUsers = $db->table('users');

            // Pastikan username ada di tabel auth_groups_users, jika tidak, tambahkan dari tabel users
            $userExists = $builderAuthGroupsUsers->where('username', $username)->countAllResults();

            if ($userExists == 0) {
                // Ambil data dari tabel users
                $userFromUsersTable = $builderUsers->where('id', $userId)->get()->getRowArray();
                if ($userFromUsersTable) {
                    $builderAuthGroupsUsers->insert([
                        'user_id' => $userFromUsersTable['id'],
                        'group_id' => 3, // Asumsi bahwa 3 adalah ID untuk group member
                        'username' => $userFromUsersTable['username']
                    ]);
                } else {
                    return redirect()->back()->with('message', 'User tidak ditemukan di tabel users.');
                }
            }

            $data = [
                'user_id' => $userId,
                'id_status' => 1, // Pending
                'username' => $username // Menyimpan username juga
            ];
            $requestModel->save($data);
            return redirect()->back()->with('message', 'Anda telah mengirim permintaan.');
        }

        $data = [
            'nilai' => 'Project',
        ];

        echo view('template/v_header', $data);
        echo view('template/v_sidebar');
        echo view('home/profile', ['user' => $user]);
        echo view('template/v_footer');
    }
}