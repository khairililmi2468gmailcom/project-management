<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project';
    protected $primarykey = 'id_project';
    protected $allowedFields = [
        'id_project', 'id', 'nama_project', 'deskripsi_project','upload_file'
    ];

    public function delete_project($id_project)
    {
        return $this->where(['id_project' => $id_project])->delete();
    }

    public function getProjectDetail($id_project)
    {
        return $this->where(['id_project' => $id_project])->first();
    }

    public function getProjectsByManager($id)
    {
        return $this->where('id', $id)->findAll(); // Ganti 'manager_id' dengan nama kolom yang sesuai
    }
}


