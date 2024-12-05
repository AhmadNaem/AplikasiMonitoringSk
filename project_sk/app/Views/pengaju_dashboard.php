<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan SK</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="nav">
        <h1>Dashboard Pengaju</h1>
        <a href="">Ajukan SK</a>
        <a href="#">Daftar Pengajuan</a>
        <a href="#">Logout</a>
    </div>
    <div class="container">
        <div class="content">
            <h2>Ajukan SK Baru</h2>
            <form action="<?= site_url('dashboard/ajukanSK') ?>" method="POST">
                <div class="form-group">
                    <label for="judul_sk">Judul SK</label>
                    <input type="text" id="judul_sk" name="judul_sk" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                    <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" required>
                </div>
                <div class="form-group">
                    <label for="tembusan">Tembusan</label>
                    <textarea id="tembusan" name="tembusan" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="menimbang">Menimbang</label>
                    <textarea id="menimbang" name="menimbang" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="menetapkan">Menetapkan</label>
                    <textarea id="menetapkan" name="menetapkan" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="memperhatikan">Memperhatikan</label>
                    <textarea id="memperhatikan" name="memperhatikan" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="mengingat">Mengingat</label>
                    <textarea id="mengingat" name="mengingat" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn">Ajukan SK</button>
            </form>
        </div>
    </div>
</body>
</html>
