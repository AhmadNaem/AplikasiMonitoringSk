<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'laporan_penerbitan_sk'; // Sesuaikan dengan nama tabel SK Anda
    protected $primaryKey = 'id_pelaporan'; // Sesuaikan dengan primary key yang ada di tabel SK Anda

    protected $allowedFields = [
        'id_sk', 'id_admin', 'deskripsi', 'tanggal_laporan'
];
protected $useTimestamps = true;
    // Fungsi untuk mendapatkan laporan penerbitan
    public function getSKById($id_sk)
{
    return $this->db->table('pengajuan')->where('id_sk', $id_sk)->get()->getRowArray();
}
public function createReport($data)
{
    return $this->db->table('laporan_penerbitan_sk')->insert($data);

}

    public function getLaporanPenerbitan()
    {
        return $this->db->table('laporan_penerbitan_sk')->get()->getResultArray();
    }
    public function getLaporanPenerbitan1()
    {
        return $this->db->table('laporan_penerbitan_sk')->get()->getResultArray();
    }
    public function updateStatusSK($id_sk, $status)
{
    // Update status SK berdasarkan ID SK
    return $this->db->table('status_sk')
        ->where('id_sk', $id_sk)
        ->update(['status' => $status, 'tanggal_update' => date('Y-m-d')]);
}

public function publishSK($id_sk)
{
    // Periksa apakah SK sudah diterbitkan sebelumnya
    $exists = $this->db->table('menerbitkan_sk')->where('id_sk', $id_sk)->countAllResults();
    if ($exists > 0) {
        throw new \Exception('SK sudah diterbitkan sebelumnya.');
    }

    // Simpan data penerbitan SK
    $this->db->table('menerbitkan_sk')->insert([
        'id_sk' => $id_sk,
        'id_admin'=> $id_admin,
        'status_penerbitan' => 'published',
        'tanggal_penerbitan' => date('Y-m-d H:i:s'),
    ]);
}
}
