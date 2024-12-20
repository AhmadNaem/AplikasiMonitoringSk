<?php

namespace App\Models;

use CodeIgniter\Model;

class VerifikasiModel extends Model
{
    protected $table      = 'verifikasi_sk';
    protected $primaryKey = 'id_aturan';

    protected $allowedFields = [
        'id_aturan','id_sk','id_staff','status_verifikasi','deskripsi_aturan','status_aturan'
];

}
