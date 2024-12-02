<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'login';
    protected $allowedFields = ['id', 'password', 'role'];

    public function getUser($id)
    {
        return $this->where('id', $id)->first();
    }
}
