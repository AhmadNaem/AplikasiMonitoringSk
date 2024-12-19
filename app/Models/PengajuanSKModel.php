<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanSkModel extends Model
{
    protected $table = 'melihat_status' ;
    protected $primaryKey = 'id_status';
    protected $allowedFields = [
        'id_status', 'id_sk', 'id_pimpinan', 'id_pengaju', 'id_staff',
        'tanggal_update'
    ];
    protected $useTimestamps = true;
    public function getByPengaju($id_pengaju)
    {
        // Mengambil semua pengajuan SK yang terkait dengan id_pengaju
        return $this->where('id_pengaju', $id_pengaju)->findAll();
    }
    public function updateStatusSK($id_sk, $status)
{
    return $this->db->table('pengajuan')->where('id_sk', $id_sk)->update(['status' => $status]);
}

}
