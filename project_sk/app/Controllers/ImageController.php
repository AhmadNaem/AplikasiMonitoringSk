<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ImageController extends Controller
{
    public function display($filename)
    {
        // Lokasi file gambar yang berada di luar folder public
        $path = ROOTPATH . 'assets/images/' . $filename;

        // Cek apakah file ada
        if (file_exists($path)) {
            // Menampilkan file dengan MIME type yang sesuai
            return $this->response->setFile($path)->setContentType('image/png');
        } else {
            // Jika file tidak ditemukan
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
