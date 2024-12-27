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
    public function getPengajuanWithStatus($id_pengaju)
{
    return $this->db->table('pengajuan')
                    ->select('pengajuan.*, melihat_status.status')
                    ->join('melihat_status', 'pengajuan.id_sk = melihat_status.id_sk', 'left')
                    ->where('pengajuan.id_pengaju', $id_pengaju)
                    ->get()
                    ->getResultArray();
}
/**public function updateStatusSK($id_sk, $status)
{
    return $this->db->table('pengajuan')->where('id_sk', $id_sk)->update(['status' => $status]);
}*/
public function updateStatusSK($id_sk, $status)
{
    // Periksa apakah id_sk ada di tabel pengajuan
    $pengajuan = $this->db->table('pengajuan')
                        ->select('id_sk')
                        ->where('id_sk', $id_sk)
                        ->get()
                        ->getRowArray();

    if (!$pengajuan) {
        // Jika tidak ada data, kembalikan false
        return false;
    }

    // Update status di tabel melihat_status
    return $this->db->table('melihat_status')
                    ->where('id_sk', $id_sk)
                    ->update(['status' => $status]);
}


}
