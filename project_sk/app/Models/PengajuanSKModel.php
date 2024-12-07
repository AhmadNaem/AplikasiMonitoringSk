<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanSkModel extends Model
{
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_sk';
    protected $allowedFields = [
        'id_pengaju', 'judul_sk', 'tanggal_pengajuan', 'tembusan', 'menimbang',
        'menetapkan', 'memperhatikan', 'mengingat'
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
