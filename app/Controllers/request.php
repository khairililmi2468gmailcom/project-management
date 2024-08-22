<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RequestModel;
use App\Models\UserModel;
use Myth\Auth\Authorization\GroupModel;

class Request extends BaseController
{
    public function index()
    {
        $session = session();

        // Ambil data user dari Myth/Auth
        $userId = user_id();
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        // Pastikan $userId tidak null
        if (!$userId) {
            return redirect()->to('/')->with('message', 'Anda harus login terlebih dahulu.');
        }

        // Hanya admin yang dapat mengakses halaman ini
        $groupModel = new GroupModel();
        $group = $groupModel->getGroupsForUser($userId);

        if (!in_array('admin', array_column($group, 'name'))) {
            return redirect()->to('/')->with('message', 'Akses ditolak.');
        }

        // Ambil semua permintaan dari tabel requests
        $requestModel = new RequestModel();
        $requests = $requestModel->getRequests();

        $data = [
            'nilai' => 'Project',
        ];

        echo view('template/v_header', $data);
        echo view('template/v_sidebar');
        echo view('home/request', ['requests' => $requests]);
        echo view('template/v_footer');

        
    }

    public function approveRequest($id)
    {
        $requestModel = new RequestModel();
        $request = $requestModel->find($id);
        if ($request && $request['status'] == 'pending') {
            $data = [
                'status' => 'approved', // Ganti status menjadi 'approved'
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $requestModel->update($id, $data); // Approved

            // Ubah role user dari '3' menjadi '2'
            $userId = $request['user_id'];
            $db = \Config\Database::connect();
            $builder = $db->table('auth_groups_users');

            $builder->where('user_id', $userId)
                ->where('group_id', 3)
                ->update(['group_id' => 2]);

            // Ubah role user dari '3' menjadi '2' di tabel users
            $userModel = new UserModel();
            $userModel->update($userId, ['role_id' => 2]);
        }

        return redirect()->back()->with('message', 'Permintaan telah disetujui.');
    }

    public function rejectRequest($id)
    {
        $requestModel = new RequestModel();
        $request = $requestModel->find($id);

        if ($request && $request['status'] == 'pending') {
            $data = [
                'status' => 'rejected', // Ganti status menjadi 'rejected'
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $requestModel->update($id, $data); // Rejected
        }

        return redirect()->back()->with('message', 'Permintaan telah ditolak.');
    }
}
