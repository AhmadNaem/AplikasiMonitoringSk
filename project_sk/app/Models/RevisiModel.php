<?php
namespace App\Models;

use CodeIgniter\Model;

class RevisiModel extends Model
{
    protected $table = 'revisi';
    protected $primaryKey = 'id_revisi';
    protected $allowedFields = ['id_sk', 'id_staff', 'deskripsi_revisi', 'tanggal_revisi', 'status_revisi'];
}