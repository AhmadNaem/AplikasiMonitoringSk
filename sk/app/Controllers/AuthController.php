<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('login'); // Menampilkan halaman login
    }

    public function processLogin()
    {
        $session = session();
        $model = new UserModel();

        $id = $this->request->getPost('id');
        $password = $this->request->getPost('password');

        $user = $model->where('id', $id)->first();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'id' => $user['id'],
                    
                    
                    'logged_in' => true
                ]);

                // Arahkan ke halaman utama sesuai role
                return redirect()->to('/admin');
            } else {
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
