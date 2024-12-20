<?php

namespace App\Controllers;

use App\Models\PengajuanSkModel;
use App\Models\AdminModel;
use App\Models\StaffModel;
use App\Models\VerifikasiModel;
use App\Models\RevisiModel;
use App\Models\PimpinanModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $role = session()->get('role');

        switch ($role) {
            case 'admin':
                return redirect()->to('/admin/dashboard');
            case 'pengaju':
                return redirect()->to('/pengaju/dashboard');
            case 'staff':
                return redirect()->to('/staff/dashboard');
            case 'pimpinan':
                return redirect()->to('/pimpinan/dashboard');
            default:
                return redirect()->to('/login');
        }
    }

    // Controller untuk Admin
    public function admin()
{
    $id_admin = session()->get('id');
    $model = new AdminModel();
    $laporan = $model->getLaporanPenerbitan();

    // Tambahkan data pengajuan
    $pengajuanModel = new PengajuanSkModel();
    $pengajuan = $pengajuanModel->findAll();

    return view('admin_dashboard', [
        'laporan' => $laporan,
        'pengajuan' => $pengajuan
    ]);
}
public function createReport()
{
    $id_admin = session()->get('id');
    $model = new AdminModel();
    $data = $this->request->getPost();

    // Ambil data dari form
    $data['id_admin'] = session()->get('id');
    $data['tanggal_laporan'] = date('Y-m-d H:i:s');

    // Validasi input
    if (empty($data['id_sk']) || empty($data['deskripsi'])) {
        session()->setFlashdata('msg', 'ID SK dan deskripsi harus diisi.');
        return redirect()->back();
    }

    // Simpan laporan ke database
    if ($model->createReport($data)) {
        session()->setFlashdata('msg', 'Laporan berhasil dibuat.');
    } else {
        session()->setFlashdata('msg', 'Gagal membuat laporan.');
    }

    return redirect()->to('admin/dashboard');
}
public function showUpdateStatusForm($id_sk)
{
    $model = new AdminModel();

    // Ambil detail SK berdasarkan ID
    $sk = $model->getSKById($id_sk);

    if (!$sk) {
        session()->setFlashdata('msg', 'SK tidak ditemukan.');
        return redirect()->to('/admin/dashboard');
    }

    // Tampilkan formulir untuk memperbarui status SK
    return view('admin_dashboard', ['sk' => $sk]);
}

public function updateStatusSK()
{
    $model = new AdminModel();

    // Ambil data dari form
    $id_sk = $this->request->getVar('id_sk');
    $status = $this->request->getVar('status');

    // Validasi input
    if (!$status || !$id_sk) {
        session()->setFlashdata('msg', 'Status dan ID SK harus diisi.');
        return redirect()->back();
    }

    // Update status SK di database
    $updated = $model->updateStatusSK($id_sk, $status);

    if ($updated) {
        session()->setFlashdata('msg', 'Status SK berhasil diperbarui.');
    } else {
        session()->setFlashdata('msg', 'Gagal memperbarui status SK.');
    }

    return redirect()->to('admin/dashboard');
}


public function publishSK($id_sk)
{
    $id_admin = session()->get('id');
    $model = new AdminModel();

    // Validasi apakah ID SK valid
    if (!$model->getLaporanPenerbitan1()) {
        session()->setFlashdata('msg', 'ID SK tidak ditemukan.');
        return redirect()->to('admin/dashboard');
    }

    // Publikasikan SK
    try {
        $model->publishSK($id_sk);
        session()->setFlashdata('msg', 'SK berhasil diterbitkan.');
    } catch (\Exception $e) {
        log_message('error', 'Error saat mempublikasikan SK: ' . $e->getMessage());
        session()->setFlashdata('msg', 'Gagal menerbitkan SK.');
    }

    return redirect()->to('admin/dashboard');
}

    // Controller untuk Pengaju
    public function pengaju()
    {
        $id_pengaju = session()->get('id');
        $model = new PengajuanSkModel();
        $data['pengajuan'] = $model->getPengajuanWithStatus($id_pengaju);
        return view('pengaju_dashboard', $data);
    }

    public function ajukanSK()
    {
        $model = new PengajuanSkModel();
        $data = $this->request->getPost();
        $data['id_pengaju'] = session()->get('id');
        
        if ($model->save($data)) {
            session()->setFlashdata('msg', 'Pengajuan SK berhasil.');
        } else {
            session()->setFlashdata('msg', 'Gagal mengajukan SK.');
        }
        return redirect()->to('/pengaju/dashboard');
    }
    public function cetakLaporan($id_sk)
{
    $pengajuanModel = new PengajuanSkModel();

    // Ambil data pengajuan berdasarkan id_sk
    $data['pengajuan'] = $pengajuanModel->find($id_sk);

    if (!$data['pengajuan']) {
        return redirect()->to('/dashboard')->with('error', 'Data SK tidak ditemukan');
    }

    // Kirim data ke view laporan
    return view('laporan_pengajuan', $data);
}

    // Controller untuk Staff
    public function staff()
    {
        $staffModel = new StaffModel();
        $pengajuanModel = new PengajuanSkModel();
        $verifikasiModel = new VerifikasiModel();

        $id_staff = session()->get('id'); // Mengambil ID staff dari session

        // Menampilkan daftar SK yang ada di tabel pengajuan
        $skList = $pengajuanModel->findAll();
        $skstaff = $verifikasiModel->findAll();

        // Menampilkan status SK dari tabel verifikasi_sk
        $skStatuses = $staffModel->getSKStatuses();

        return view('staff_dashboard', [
            'skstaff' => $skstaff,
            'skList' => $skList,
            'skStatuses' => $skStatuses
        ]);
    }

    // Verifikasi SK (Setujui, Tolak, atau Minta Revisi)
    public function verifySK($id_sk)
    {
        $staffModel = new StaffModel();
        $revisiModel = new RevisiModel();

        $id_staff = session()->get('id');
        $status = $this->request->getVar('status');
        $catatan = $this->request->getVar('catatan');

        if ($status === 'revised') {
            // Jika status revisi, masukkan ke tabel revisi
            $revisiModel->save([
                'id_sk' => $id_sk,
                'id_staff' => $id_staff,
                'deskripsi_revisi' => $catatan,
                'tanggal_revisi' => date('Y-m-d H:i:s'),
                'status_revisi' => 'pending'
            ]);
        } else {
            // Jika status approved/rejected, masukkan ke tabel verifikasi_sk
            $staffModel->verifySK($id_sk, $id_staff, $status, $catatan);
        }

        session()->setFlashdata('msg', 'Verifikasi SK berhasil diperbarui.');
        return redirect()->to('/staff/dashboard');
    }


    // Controller untuk Pimpinan
    public function pimpinan()
    {
        $model = new PimpinanModel();
        $daftar_pengajuan = $model->getVerifiableSKs();
        $laporan = $model->getLaporanSK();
        return view('pimpinan_dashboard', [
            'daftar_pengajuan' => $daftar_pengajuan,
            'laporan' => $laporan,
        ]);
    }

    public function approveSK($id_sk)
    {
        $model = new PimpinanModel();

        // Validasi apakah ID SK ada
        if (!$model->getSKById($id_sk)) {
            session()->setFlashdata('msg', 'ID SK tidak ditemukan.');
            return redirect()->to('/pimpinan/dashboard');
        }

        // Proses persetujuan
        try {
            $model->approveSK($id_sk);
            session()->setFlashdata('msg', 'SK berhasil disetujui.');
        } catch (\Exception $e) {
            log_message('error', 'Error saat menyetujui SK: ' . $e->getMessage());
            session()->setFlashdata('msg', 'Gagal menyetujui SK.');
        }

        return redirect()->to('/pimpinan/dashboard');
    }

    public function rejectSK($id_sk)
    {
        $model = new PimpinanModel();
        $alasan = $this->request->getPost('alasan');

        // Validasi apakah ID SK ada
        if (!$model->getSKById($id_sk)) {
            session()->setFlashdata('msg', 'ID SK tidak ditemukan.');
            return redirect()->to('/pimpinan/dashboard');
        }

        // Proses penolakan
        try {
            $model->rejectSK($id_sk, $alasan);
            session()->setFlashdata('msg', 'SK berhasil ditolak.');
        } catch (\Exception $e) {
            log_message('error', 'Error saat menolak SK: ' . $e->getMessage());
            session()->setFlashdata('msg', 'Gagal menolak SK.');
        }

        return redirect()->to('/pimpinan/dashboard');
    }

}
