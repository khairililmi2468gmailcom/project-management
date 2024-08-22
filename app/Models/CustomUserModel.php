<?php

namespace App\Models;

use Myth\Auth\Models\UserModel;

class CustomUserModel extends UserModel
{
    public function getUsersWithLevels()
    {
        return $this->db->table($this->table)
            ->select('users.id, users.username, users.email, auth_groups_users.group_id')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->groupBy('users.id, users.username, users.email, auth_groups_users.group_id') // Tambahkan kolom yang diperlukan dalam GROUP BY
            ->get()
            ->getResultArray();
    }

    public function getUsersByRoleAndMonth($roleId, $month, $year)
    {
        return $this->select('users.*, auth_groups_users.group_id')
                    ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                    ->where('auth_groups_users.group_id', $roleId)
                    ->where('MONTH(users.created_at)', $month)
                    ->where('YEAR(users.created_at)', $year)
                    ->countAllResults();
    }
}
