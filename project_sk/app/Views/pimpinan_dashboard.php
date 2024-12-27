<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pimpinan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard Pimpinan</h1>
        <a href="<?= site_url('logout') ?>" class="btn btn-danger float-end">Logout</a>
        <hr>

        <h2>Daftar Pengajuan SK</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID SK</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($daftar_pengajuan as $pengajuan): ?>
                    <tr>
                        <td><?= $pengajuan['id_sk'] ?></td>
                        <td><?= $pengajuan['judul_sk'] ?></td>
                        <td>
                            <a href="<?= site_url('dashboard/approveSK/' . $pengajuan['id_sk']) ?>" class="btn btn-success">Setujui</a>
                            <form action="<?= site_url('dashboard/rejectSK/' . $pengajuan['id_sk']) ?>" method="post" style="display:inline;">
                                <input type="text" name="alasan" placeholder="Alasan" required>
                                <button type="submit" class="btn btn-danger">Tolak</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Laporan SK</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID SK</th>
                    <th>deskripsi</th>
                    
                    <th>Tanggal laporan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporan as $lap): ?>
                    <tr>
                        <td><?= $lap['id_sk'] ?></td>
                        
                        <td><?= $lap['deskripsi'] ?></td>
                        <td><?= $lap['tanggal_laporan'] ?></td>
                        <td><a href="<?= site_url('dashboard/cetakLaporan/' . $lap['id_sk']) ?>" class="btn btn-primary btn-sm">Cetak</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
