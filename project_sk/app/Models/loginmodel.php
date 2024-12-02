<?php

namespace App\Models;  // Pastikan namespace ini

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'login';

    public function getUser($id)
    {
        return $this->where('id_admin', $id)
                    ->orWhere('id', $id)
                    ->orWhere('id_pengaju', $id)
                    ->orWhere('id_staff', $id)
                    ->orWhere('id_pimpinan', $id)
                    ->first();
    }
}
