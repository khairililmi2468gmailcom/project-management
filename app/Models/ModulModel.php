<?php

namespace App\Models;

use CodeIgniter\Model;

class ModulModel extends Model
{
    protected $table = 'modul';
    protected $primaryKey = 'id_modul';
    protected $allowedFields = ['nama_modul', 'id_project', 'id_status', 'id', 'tanggal_mulai', 'tanggal_selesai', 'deadline', 'prioritas', 'upload', 'bobot'];

    public function getModulByProject($projectId)
    {
        return $this->select('modul.id_modul, modul.nama_modul, modul.id_project, modul.id, modul.tanggal_mulai, modul.tanggal_selesai, modul.deadline, modul.bobot, modul.upload, project.nama_project, users.username')
            ->join('project', 'project.id_project = modul.id_project')
            ->join('users', 'users.id = modul.id')
            ->where('modul.id_project', $projectId)
            ->findAll();
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function delete_modul($id_modul)
    {
        return $this->where(['id_modul' => $id_modul])->delete();
    }

    public function getModulCountByProject($id_project)
    {
        return $this->where('id_project', $id_project)->countAllResults();
    }

    public function getModulDetail($id_modul)
    {
        return $this->where(['id_modul' => $id_modul])->first();
    }

    public function getDetailTugas($id_modul)
    {
        return $this->select('modul.*, project.nama_project, users.username')
            ->join('project', 'modul.id_project = project.id_project')
            ->join('users', 'modul.id = users.id')
            ->where('modul.id_modul', $id_modul)
            ->first();
    }

    public function getTotalBobotByProject($id_project)
    {
        $query = $this->selectSum('bobot')->where('id_project', $id_project)->first();
        return $query['bobot'] ?? 0;
    }

    public function getmodulbyuser($id)
    {
        return $this->where('id', $id)->findAll(); // Ganti 'manager_id' dengan nama kolom yang sesuai
    }
}
