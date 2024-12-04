<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // Ambil peran dari session
        $role = session()->get('role');

        // Redirect pengguna ke dashboard sesuai dengan peran
        if ($role == 'admin') {
            return view('admin_dashboard'); // Menampilkan view untuk admin
        } elseif ($role == 'pengaju') {
            return view('pengaju_dashboard'); // Menampilkan view untuk pengaju
        } elseif ($role == 'pimpinan') {
            return view('pimpinan_dashboard'); // Menampilkan view untuk pimpinan
        } elseif ($role == 'staff') {
            return view('staff_dashboard'); // Menampilkan view untuk staff
        }

        // Jika tidak ada peran, arahkan ke halaman login
        return redirect()->to('/login');
    }
    public function admin()
    {
        return view('admin_dashboard');
    }

    public function pengaju()
    {
        return view('pengaju_dashboard');
    }

    public function pimpinan()
    {
        return view('pimpinan_dashboard');
    }

    public function staff()
    {
        return view('staff_dashboard');
    }
}

