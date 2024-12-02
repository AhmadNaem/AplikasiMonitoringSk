<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new LoginModel();
        $id = $this->request->getVar('id');
        $password = $this->request->getVar('password');
        $user = $model->getUser($id);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'id' => $user['id'],
                    'role' => $user['role'],
                    'logged_in' => true
                ]);

                // Redirect based on role
                switch ($user['role']) {
                    case 'admin':
                        return redirect()->to('/admin');
                    case 'pimpinan':
                        return redirect()->to('/pimpinan');
                    case 'staff':
                        return redirect()->to('/staff');
                    case 'pengaju':
                        return redirect()->to('/pengaju');
                }
            } else {
                $session->setFlashdata('msg', 'Password salah.');
            }
        } else {
            $session->setFlashdata('msg', 'ID tidak ditemukan.');
        }
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
