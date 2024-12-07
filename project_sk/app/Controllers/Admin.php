<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\PengajuanSkModel;

class Admin extends BaseController
{
    protected $laporanModel;
    protected $pengajuanSkModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
        $this->pengajuanSkModel = new PengajuanSkModel();
    }

    // Tampilkan laporan SK
    public function lihatLaporan()
    {
        $data['laporan'] = $this->laporanModel->getAllLaporan();
        return view('admin/lihat_laporan', $data);
    }

    // Perbarui status SK
    public function ubahStatusSK($id_sk)
    {
        $status = $this->request->getPost('status');
        if ($status && in_array($status, ['dalam proses', 'diterima', 'ditolak'])) {
            $this->pengajuanSkModel->updateStatusSK($id_sk, $status);
            return redirect()->to('/admin/lihatLaporan')->with('success', 'Status SK berhasil diperbarui.');
        }
        return redirect()->to('/admin/lihatLaporan')->with('error', 'Status tidak valid.');
    }

    // Buat laporan penerbitan SK
    public function buatLaporan()
{
    // Ambil daftar SK dari tabel pengajuan
    $data['daftarsk'] = $this->pengajuanSkModel->where('status', 'disetujui')->findAll();

    // Jika ada request POST untuk membuat laporan
    if ($this->request->getMethod() === 'post') {
        $dataLaporan = [
            'id_admin' => session()->get('id_admin'),
            'id_sk' => $this->request->getPost('id_sk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal_laporan' => date('Y-m-d H:i:s'),
        ];

        // Simpan laporan ke database
        $this->laporanModel->insertLaporan($dataLaporan);

        return redirect()->to('/admin/lihatLaporan')->with('success', 'Laporan berhasil dibuat.');
    }

    // Tampilkan form buat laporan dengan daftar SK
    return view('admin/buatlaporan', $data);
}
}
