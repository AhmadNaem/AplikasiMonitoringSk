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
        $inputId = $this->request->getVar('id');  // Ambil input ID dari form
        $password = $this->request->getVar('password');  // Ambil input password
    
        // Periksa ID di setiap kolom sesuai peran
        $user = $model->getUser($inputId);
    
        if ($user && password_verify($password, $user['password'])) {
            $role = '';
    
            // Tentukan role berdasarkan kolom ID yang cocok
            if ($user['id_admin'] === $inputId) {
                $role = 'admin';
            } elseif ($user['pengaju'] === $inputId) {
                $role = 'pengaju';
            } elseif ($user['id_staff'] === $inputId) {
                $role = 'staff';
            } elseif ($user['id_pimpinan'] === $inputId) {
                $role = 'pimpinan';
            }
    
            // Jika role ditemukan, set session dan arahkan ke dashboard
            if ($role) {
                $session->set([
                    'id' => $inputId,
                    'role' => $role,
                    'logged_in' => true
                ]);
                return redirect()->to("/{$role}/dashboard");
            }
        }
    
        // Jika gagal, kembalikan ke login dengan pesan error
        $session->setFlashdata('msg', 'ID atau Password salah.');
        return redirect()->to('/login');
    }
    
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
