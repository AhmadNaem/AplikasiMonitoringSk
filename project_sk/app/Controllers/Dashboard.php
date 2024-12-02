<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
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
