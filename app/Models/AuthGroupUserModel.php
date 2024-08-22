<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupUserModel extends Model
{
    protected $table = 'auth_groups_users';
    protected $primarykey = 'id';
    protected $allowedFields = [
        'group_id','user_id', 'username'
    ];
}
