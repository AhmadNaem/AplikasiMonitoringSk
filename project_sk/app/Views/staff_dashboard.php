<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard Staff</h1>
        <a href="<?= site_url('logout') ?>" class="btn btn-danger float-end">Logout</a>
        <hr>
        <h2>Verifikasi SK</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID SK</th>
                    <th>Judul</th>
                    <th>Status Verifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($skList as $sk): ?>
                    <tr>
                        <td><?= $sk['id_sk'] ?></td>
                        <td><?= $sk['judul_sk'] ?></td>
                        <td><?= $sk['status_verifikasi'] ?? 'Belum Diverifikasi' ?></td>
                        <td>
                            <form action="dashboard/verifySK/<?= $sk['id_sk'] ?>" method="post" class="d-inline">
                                <select name="status" class="form-select form-select-sm d-inline-block w-auto" required>
                                    <option value="">Pilih Status</option>
                                    <option value="approved">Setujui</option>
                                    <option value="rejected">Tolak</option>
                                    <option value="revised">Revisi</option>
                                </select>
                                <textarea name="catatan" class="form-control form-control-sm d-inline-block w-50" placeholder="Catatan..." required></textarea>
                                <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Verifikasi SK</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID SK</th>
                    <th>Judul</th>
                    <th>Status Verifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($skstaff as $sk): ?>
                    <tr>
                        <td><?= $sk['id_sk'] ?></td>
                        <td><?= $sk['status_verifikasi'] ?></td>
                        <td><?= $sk['deskripsi_aturan'] ?></td>
                        <td><?= $sk['status_aturan'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <hr>

        
    </div>
</body>
</html>
