<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .container { padding: 20px; }
        .nav { background-color: #007BFF; padding: 15px; color: white; text-align: center; }
        .nav a { color: white; margin: 0 15px; text-decoration: none; }
        .nav a.active { font-weight: bold; }
        .content { margin-top: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #007BFF; color: white; }
        .form-group { margin-bottom: 15px; }
        textarea { width: 100%; height: 100px; }
    </style>
    <script>
        function showContent(sectionId) {
            // Sembunyikan semua konten
            document.querySelectorAll('.content').forEach(content => {
                content.style.display = 'none';
            });

            // Tampilkan konten yang dipilih
            document.getElementById(sectionId).style.display = 'block';

            // Atur navigasi aktif
            document.querySelectorAll('.nav a').forEach(navLink => {
                navLink.classList.remove('active');
            });
            document.querySelector(`.nav a[data-section="${sectionId}"]`).classList.add('active');
        }
    </script>
</head>
<body onload="showContent('welcome')">
    <div class="nav">
        <h1>Dashboard Admin</h1>
        <a href="#" data-section="welcome" onclick="showContent('welcome')">Beranda</a>
        <a href="#" data-section="laporan" onclick="showContent('laporan')">Laporan SK</a>
        <a href="#" data-section="buatLaporan" onclick="showContent('buatLaporan')">Buat Laporan SK</a>
        <a href="#" data-section="perbarui" onclick="showContent('perbarui')">Perbarui SK</a>
        <a href="<?= site_url('logout') ?>">Logout</a>
    </div>

    <div class="container">
        <!-- Bagian Selamat Datang -->
        <div id="welcome" class="content">
            <h2>Selamat datang, Admin!</h2>
            <p>Kelola data pengguna, pantau proses SK, dan lakukan verifikasi data.</p>
        </div>

        <!-- Bagian Laporan SK -->
        <div id="laporan" class="content" style="display:none;">
            <h2>Laporan Penerbitan SK</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Laporan</th>
                        <th>ID Admin</th>
                        <th>ID SK</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Laporan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($laporan)): ?>
                        <?php foreach ($laporan as $row): ?>
                            <tr>
                                <td><?= $row['id_pelaporan'] ?></td>
                                <td><?= $row['id_admin'] ?></td>
                                <td><?= $row['id_sk'] ?></td>
                                <td><?= $row['deskripsi'] ?></td>
                                <td><?= $row['tanggal_laporan'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Belum ada laporan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Bagian Buat Laporan SK -->
        <div id="buatLaporan" class="content" style="display:none;">
            <h2>Buat Laporan Penerbitan SK</h2>
            <form action="/admin/buatLaporan" method="POST">
                <div class="form-group">
                    <label for="id_sk">ID SK:</label>
                    <input type="text" id="id_sk" name="id_sk" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" required></textarea>
                </div>
                <button type="submit">Buat Laporan</button>
            </form>
        </div>

        <!-- Bagian Perbarui Status SK -->
        <div id="perbarui" class="content" style="display:none;">
            <h2>Perbarui Status SK</h2>
            <form action="/admin/ubahStatusSK" method="POST">
                <div class="form-group">
                    <label for="id_sk_status">ID SK:</label>
                    <input type="text" id="id_sk_status" name="id_sk" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="dalam proses">Dalam Proses</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>
                <button type="submit">Perbarui Status</button>
            </form>
        </div>
    </div>
</body>
</html>
