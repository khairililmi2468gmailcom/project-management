<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgresModel extends Model
{
    protected $table = 'progres';
    protected $primaryKey = 'id_progres';
    protected $allowedFields = [
        'id_modul', 'tanggal_pengajuan', 'tanggal_peninjauan', 'id_status', 'bukti', 'catatan'
    ];

    public function getProgres($userId)
    {
        return $this->select('progres.*, modul.id_modul, modul.nama_modul')
            ->join('modul', 'progres.id_modul = modul.id_modul')
            ->join('project', 'modul.id_project = project.id_project')
            ->where('project.id', $userId) // Filter by logged-in user
            ->where('modul.id_status !=', 1) // Exclude modules with status 1
            ->distinct() // Remove duplicates
            ->findAll();
    }
}

