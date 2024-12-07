<?php

namespace App\Controllers;
use App\Models\PengajuanSkModel;
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
        $id_pengaju = session()->get('id');

    // Ambil daftar SK yang diajukan oleh pengaju
    $model = new PengajuanSkModel();
    $daftar_sk = $model->getByPengaju($id_pengaju); // Mengambil semua pengajuan berdasarkan id_pengaju

    // Kirim data ke view
    return view('pengaju_dashboard', ['daftar_sk' => $daftar_sk]);
        
    }

    public function ajukanSK()
{
    // Ambil data dari session
    $id_pengaju = session()->get('id');
    
    // Ambil data dari form input
    $judul_sk = $this->request->getVar('judul_sk');
    $tanggal_pengajuan = $this->request->getVar('tanggal_pengajuan');
    $tembusan = $this->request->getVar('tembusan');
    $menimbang = $this->request->getVar('menimbang');
    $menetapkan = $this->request->getVar('menetapkan');
    $memperhatikan = $this->request->getVar('memperhatikan');
    $mengingat = $this->request->getVar('mengingat');

    // Validasi data
    if (!$judul_sk || !$tanggal_pengajuan || !$tembusan || !$menimbang || !$menetapkan || !$memperhatikan || !$mengingat) {
        session()->setFlashdata('msg', 'Semua field harus diisi');
        return redirect()->back();
    }
    

    // Simpan data ke database
    $model = new PengajuanSkModel();
    $data = [
        'id_pengaju' => $id_pengaju,
        'judul_sk' => $judul_sk,
        'tanggal_pengajuan' => $tanggal_pengajuan,
        'tembusan' => $tembusan,
        'menimbang' => $menimbang,
        'menetapkan' => $menetapkan,
        'memperhatikan' => $memperhatikan,
        'mengingat' => $mengingat
    ];

    if ($model->save($data)) {
        // Simulasi file dummy untuk testing
        $dummyFilePath = WRITEPATH . 'uploads/sk/' . $judul_sk . '.pdf';

        if (!file_exists($dummyFilePath)) {
            file_put_contents($dummyFilePath, 'Dummy Content for SK PDF Testing');
        }
    }

    // Redirect atau tampilkan pesan sukses
    session()->setFlashdata('msg', 'SK berhasil diajukan');
    return redirect()->to('/pengaju/dashboard');
}

public function daftarSK()
{
    $id_pengaju = session()->get('id'); // Ambil ID pengguna dari session

    // Ambil daftar SK dari model
    $model = new PengajuanSkModel();
    $daftar_sk = $model->getByPengaju($id_pengaju);

    // Kirim data ke view
    return view('daftar_pengajuan', ['daftar_sk' => $daftar_sk]);
}

    public function pimpinan()
    {
        return view('pimpinan_dashboard');
    }

    public function staff()
    {
        return view('staff_dashboard');
    }

    public function download($id_sk)
{
    // Ambil data SK berdasarkan ID dari database
    $model = new PengajuanSkModel();
    $sk = $model->find($id_sk);

    if (!$sk) {
        session()->setFlashdata('msg', 'SK tidak ditemukan.');
        return redirect()->to('/dashboard/daftarSK');
    }

    // Tentukan path file SK di folder 'uploads/sk'
    $filePath = WRITEPATH . 'uploads/sk/' . $sk['judul_sk'] . '.pdf';

    // Periksa apakah file benar-benar ada di server
    if (!file_exists($filePath)) {
        session()->setFlashdata('msg', 'File SK tidak ditemukan di server.');
        return redirect()->to('/dashboard/daftarSK');
    }

    // Periksa MIME type file
    if (mime_content_type($filePath) !== 'application/pdf') {
        session()->setFlashdata('msg', 'File tidak valid.');
        return redirect()->to('/dashboard/daftarSK');
    }

    // Mengirim file ke browser untuk di-download
    return $this->response->download($filePath, $sk['judul_sk'] . '.pdf');
}




}

