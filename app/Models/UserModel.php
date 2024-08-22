<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $allowedFields = [
        'email', 'username', 'jenis_kelamin', 'telp', 'alamat','role_id','foto', 'statusdelete'
    ];

    public function getUsersWithLevels()
    {
        return $this->select('users.*, auth_groups_users.group_id')
                    ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                    ->where('users.statusdelete', 'no')
                    ->distinct()
                    ->findAll();
    }

    public function updateStatusDelete($id)
    {
        return $this->db->table($this->table)
            ->where('id', $id)
            ->update(['statusdelete' => 'delete']);
    }

    public function viewdatauser($id)
    {
        return $this->where('id', $id)->first();
    }
    public function editdatauser($id)
    {
        return $this->where('id', $id)->first();
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }
}
