<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        return view('admin_dashboard'); // Halaman utama admin
    }
}
