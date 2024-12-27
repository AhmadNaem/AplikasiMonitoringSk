<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 20px auto;
            max-width: 1200px;
        }
        nav {
            background-color: #333;
            color: #fff;
            padding: 15px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 15px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .msg {
            margin: 10px 0;
            padding: 10px;
            color: #fff;
            background-color: #5cb85c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table th {
            background-color: #f4f4f4;
        }
        .form-section {
            margin-top: 30px;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        .form-section h2 {
            margin-top: 0;
        }
        .form-section label {
            display: block;
            margin-top: 10px;
        }
        .form-section input, .form-section select, .form-section textarea, .form-section button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        .form-section button {
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .form-section button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <nav>
        <a href="#laporan">Daftar Laporan</a>
        <a href="#buat-laporan">Buat Laporan</a>
        <a href="#update-status">Perbarui Status SK</a>
        <a href="<?= site_url('logout') ?>" class="btn btn-danger float-end">Logout</a>
    </nav>

    <div class="container">
        <?php if (session()->getFlashdata('msg')): ?>
            <div class="msg"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>

        <!-- Bagian Daftar Laporan -->
        <section id="laporan">
            <h1>Daftar Laporan</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID Laporan</th>
                        <th>Judul SK</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Laporan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($laporan) && count($laporan) > 0): ?>
                        <?php foreach ($laporan as $item): ?>
                            <tr>
                                <td><?= $item['id_pelaporan'] ?></td>
                                <td><?= $item['id_sk'] ?></td>
                                <td><?= $item['deskripsi'] ?></td>
                                <td><?= $item['tanggal_laporan'] ?></td>
                                <td>
                                
                                    <a href="dashboard/publishSK/<?= $item['id_sk'] ,$item['id_admin']?>">Publikasikan</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Tidak ada laporan ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <!-- Bagian Buat Laporan -->
        <section id="buat-laporan" class="form-section">
            <h2>Buat Laporan Penerbitan SK</h2>
            <form action="dashboard/createReport" method="post">
                <label for="id_sk">Pilih SK:</label>
                <select name="id_sk" id="id_sk" required>
                    <option value="">-- Pilih SK --</option>
                    <?php foreach ($pengajuan as $item): ?>
                        <option value="<?= $item['id_sk'] ?>"><?= $item['judul_sk'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="deskripsi">Deskripsi Laporan:</label>
                <textarea name="deskripsi" id="deskripsi" rows="5" required></textarea>
                <label for="tanggal_laporan" class="form-label">Tanggal Pengajuan</label>
                <input type="date" class="form-control" id="tanggal_laporan" name="tanggal_laporan" required>
                <button type="submit">Simpan Laporan</button>
            </form>
        </section>

        <!-- Bagian Perbarui Status SK -->
        <section id="update-status" class="form-section">
            <h2>Perbarui Status SK</h2>
            <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul SK</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pengajuan as $sk): ?>
                <tr>
                    
                    <td><?= $sk['id_sk'] ?></td>
                    <td><?= $sk['judul_sk'] ?></td>
                    <td><?= $sk['status'] ?? 'Belum Diverifikasi'; ?></td>
                    <td>
                    <form action="dashboard/updateStatusSK" method="post">
                    <input type="hidden" name="id_sk" value="<?= $sk['id_sk'] ?>">
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="disetujui">Disetujui</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="dipublikasikan">Dipublikasikan</option>
                </select>
                <button type="submit">Perbarui Status</button>
            </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        </section>
    </div>
    
    <script>
        function fillUpdateStatusForm(id_sk, status) {
            document.getElementById('update_id_sk').value = id_sk;
            document.getElementById('status').value = status;
        }
    </script>
</body>
</html>
