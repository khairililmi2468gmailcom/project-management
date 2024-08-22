<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $table = 'requests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'status', 'created_at', 'updated_at', 'username'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getRequests()
    {
        return $this->select('requests.*, users.username')
            ->join('users', 'users.id = requests.user_id')
            ->findAll();
    }
}
