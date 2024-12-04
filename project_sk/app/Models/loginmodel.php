<?php

namespace App\Models;  // Pastikan namespace ini

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'login';

    public function getUser($id)
{
    $user = $this->where('id_admin', $id)
                ->first();
    if (!$user) {
        $user = $this->where('id_pengaju', $id)
                    ->first();
    }
    if (!$user) {
        $user = $this->where('id_staff', $id)
                    ->first();
    }
    if (!$user) {
        $user = $this->where('id_pimpinan', $id)
                    ->first();
    }

    return $user;
}
}
