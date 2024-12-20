<?php

namespace App\Models;

use CodeIgniter\Model;

    class StaffModel extends Model
{
    protected $table = 'verifikasi_sk';
    protected $primaryKey = 'id_aturan';
    protected $allowedFields = ['id_sk', 'id_staff', 'status_verifikasi', 'deskripsi_aturan', 'status_aturan'];

    // Mendapatkan status SK dari tabel verifikasi_sk
    public function getSKStatuses()
    {
        return $this->db->table('verifikasi_sk')
                        ->join('pengajuan', 'pengajuan.id_sk = verifikasi_sk.id_sk')
                        ->get()
                        ->getResultArray();
    }

    // Memverifikasi SK (menyimpan status dan catatan)
    public function verifySK($id_sk, $id_staff, $status, $catatan)
    {
        $this->save([
            'id_sk' => $id_sk,
            'id_staff' => $id_staff,
            'status_verifikasi' => $status,
            'deskripsi_aturan' => $catatan,
            'status_aturan' => $status === 'approved' ? 'disetujui' : 'ditolak'
        ]);
    }
}

