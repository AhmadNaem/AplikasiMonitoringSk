<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melihat Status SK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }
        .nav {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        .container {
            margin-top: 80px;
            padding: 20px;
        }
        .content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .empty-message {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: #666;
        }
        .btn-download {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-download:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="<?= site_url('pengaju/dashboard') ?>">Ajukan SK</a>
        <a href="<?= site_url('dashboard/daftarSK') ?>">Status SK</a>
        <a href="<?= site_url('logout') ?>">Logout</a>
    </div>
    <div class="container">
        <div class="content">
            <h2>Status SK</h2>
            <?php if (empty($daftar_sk)): ?>
                <div class="empty-message">Menunggu Sk Diproses</div>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id_status</th>
                            <th>id_sk</th>
                            <th>id_pimpinan</th>
                            <th>id_pengaju</th>
                            <th>id_staff</th>
                            <th>tanggal_update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($daftar_sk as $index => $sk): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= esc($sk['judul_sk']) ?></td>
                                <td><?= esc($sk['id_status']) ?></td>
                                <td><?= esc($sk['id_sk']) ?></td>
                                <td><?= esc($sk['id_pimpinan']) ?></td>
                                <td><?= esc($sk['id_pengaju']) ?></td>
                                <td><?= esc($sk['id_staff']) ?></td>
                                <td><?= esc($sk['tanggal_update']) ?></td>
                                <td>
                                    <a class="btn-download" href="<?= site_url('dashboard/download/' . $sk['id_sk']) ?>">Unduh</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
