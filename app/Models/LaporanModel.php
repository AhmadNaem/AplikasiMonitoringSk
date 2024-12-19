<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan_penerbitan_sk';
    protected $primaryKey = 'id_pelaporan';
    protected $allowedFields = ['id_admin', 'id_sk', 'deskripsi', 'tanggal_laporan'];

    // Mendapatkan semua laporan
    public function getAllLaporan()
    {
        return $this->findAll();
    }

    // Menambahkan laporan baru
    public function insertLaporan($data)
    {
        return $this->insert($data);
    }
}
