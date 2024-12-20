<?php

namespace App\Models;

use CodeIgniter\Model;

class PimpinanModel extends Model
{
    protected $table = 'persetujuan_sk';
    protected $primaryKey = 'id_persetujuan';
    protected $allowedFields = ['id_sk','id_pimpinan','jenis_keputusan','tanggal_keputusan','keterangan'];

    public function getVerifiableSKs()
    {
        return $this->db->table('persetujuan_sk')
            ->where('jenis_keputusan IS NULL')
            ->get()
            ->getResultArray();
    }

    public function approveSK($id_sk)
    {
        $this->db->table('persetujuan_sk')->where('id_sk', $id_sk)->update([
            'jenis_keputusan' => 'approved',
            'tanggal_keputusan' => date('Y-m-d H:i:s'),
        ]);
    }

    public function rejectSK($id_sk, $alasan)
    {
        $this->db->table('persetujuan_sk')->where('id_sk', $id_sk)->update([
            'jenis_keputusan' => 'rejected',
            'keterangan' => $alasan,
            'tanggal_keputusan' => date('Y-m-d H:i:s'),
        ]);
    }

    public function getSKById($id_sk)
    {
        return $this->db->table('persetujuan_sk')
            ->where('id_sk', $id_sk)
            ->get()
            ->getRowArray();
    }

    public function getLaporanSK()
    {
        return $this->db->table('laporan_penerbitan_sk')->get()->getResultArray();
    }
}
