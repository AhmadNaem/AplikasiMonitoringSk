<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengaju</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background gradient untuk seluruh halaman */
        body {
            background: linear-gradient(to right, #f8f9fa, #e0e0e0);
            font-family: 'Arial', sans-serif;
        }

        /* Gaya untuk form pengajuan SK */
        .paper-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
            max-width: 700px;
            border-top: 4px solid #28a745; /* Menambahkan garis hijau di atas form */
        }

        .paper-form h2 {
            font-size: 26px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        /* Gaya untuk tombol collapse */
        .btn-collapse {
            background-color: #17a2b8;
            color: #fff;
            border-color: #17a2b8;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            text-align: center;
            border-radius: 8px;
        }

        .btn-collapse:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        /* Tabel daftar pengajuan */
        .table-container {
            margin-top: 40px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .table th, .table td {
            text-align: center;
            font-size: 16px;
            padding: 12px;
        }

        .table thead {
            background-color: #f8f9fa;
        }

        /* Header halaman */
        h1 {
            text-align: center;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #333;
        }

        .btn-danger {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <!-- Judul Halaman -->
        <h1>Dashboard Pengaju</h1>

        <!-- Logout Button -->
        
        <a href="<?= site_url('logout') ?>" class="btn btn-danger float-end">Logout</a>

        <hr>

        <!-- Button to toggle form -->
        <button class="btn btn-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#formPengajuan" aria-expanded="false" aria-controls="formPengajuan">
            Ajukan SK Baru
        </button>

        <!-- Form Ajukan SK Baru dalam bentuk Kertas (collapsed by default) -->
        <div class="collapse mt-3" id="formPengajuan">
            <div class="paper-form">
                <h2>Ajukan SK Baru</h2>
                <form action="dashboard/ajukanSK" method="post">
                    <div class="mb-3">
                        <label for="judul_sk" class="form-label">Judul SK</label>
                        <input type="text" class="form-control" id="judul_sk" name="judul_sk" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" required>
                    </div>
                    <div class="mb-3">
                        <label for="tembusan" class="form-label">Tembusan</label>
                        <textarea class="form-control" id="tembusan" name="tembusan" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="menimbang" class="form-label">Menimbang</label>
                        <textarea class="form-control" id="menimbang" name="menimbang" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="menetapkan" class="form-label">Menetapkan</label>
                        <textarea class="form-control" id="menetapkan" name="menetapkan" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="memperhatikan" class="form-label">Memperhatikan</label>
                        <textarea class="form-control" id="memperhatikan" name="memperhatikan" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mengingat" class="form-label">Mengingat</label>
                        <textarea class="form-control" id="mengingat" name="mengingat" rows="3" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-success">Ajukan SK</button>
                </form>
            </div>
        </div>

        <hr>
        <h2 class="text-center">Daftar Pengajuan</h2>
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID SK</th>
                        <th>Judul</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengajuan as $sk): ?>
                        <tr>
                            <td><?= $sk['id_sk'] ?></td>
                            <td><?= $sk['judul_sk'] ?></td>
                            <td><?= $sk['status'] ?? 'Belum Diverifikasi'; ?></td>
                            <td>
                <a href="<?= site_url('dashboard/cetakLaporan/' . $sk['id_sk']) ?>" class="btn btn-primary btn-sm">Cetak</a>
            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
