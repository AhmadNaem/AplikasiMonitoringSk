<!DOCTYPE html>
<html>
<head>
    <title>Surat Keputusan Universitas Maritim Raja Ali Haji</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
        }
        .header h1, .header h2, .header h3, .header p {
            margin: 0;
            font-weight: normal;
        }
        .header h1 {
            font-size: 20px;
            text-transform: uppercase;
        }
        .header h2 {
            font-size: 18px;
        }
        .header h3 {
            font-size: 16px;
            font-style: italic;
        }
        .line {
            border-top: 3px solid black;
            margin: 10px 0 20px 0;
        }
        .title {
            text-align: center;
            margin: 20px 0;
        }
        .title h2 {
            margin: 0;
            text-decoration: underline;
            font-size: 18px;
        }
        .content {
            font-size: 14px;
            line-height: 1.5;
            text-align: justify;
        }
        .content p {
            margin: 10px 0;
        }
        .content .point {
            margin-left: 20px;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .signature p {
            margin: 0;
            line-height: 2;
        }
        .print-button {
            margin-bottom: 20px;
            text-align: right;
        }
        .print-button button {
            padding: 10px 20px;
            font-size: 14px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .print-button button:hover {
            background-color: #0056b3;
        }
    </style>
    
    <div class="header">
    
        <h1>UNIVERSITAS MARITIM RAJA ALI HAJI</h1>
        <h2>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h2>
        <h3>Jl. Politeknik Km. 24 Kota Tanjungpinang - Kepulauan Riau</h3>
        <div class="line"></div>
    </div>

    <div class="title">
        <h2>SURAT KEPUTUSAN</h2>
        <p>REKTOR UNIVERSITAS MARITIM RAJA ALI HAJI</p>
        <p>NOMOR: .....................</p>
        <p>TENTANG</p>
        <p>.....................................................</p>
    </div>

    <div class="content">
        <p><b>Menimbang:</b></p>
        <p class="point">1. <?= $pengajuan['menimbang'] ?></p>
        <p class="point">2. .............................................................</p>

        <p><b>Mengingat:</b></p>
        <p class="point">1. <?= $pengajuan['mengingat'] ?></p>

        <p><b>Memperhatikan:</b></p>
        <p class="point">1. <?= $pengajuan['memperhatikan'] ?></p>

        <p><b>Menetapkan:</b></p>
        <p class="point">1. Judul SK: <?= $pengajuan['judul_sk'] ?></p>
        <p class="point">2. Tanggal Pengajuan: <?= $pengajuan['tanggal_pengajuan'] ?></p>
        <p class="point">3. Tembusan: <?= $pengajuan['tembusan'] ?></p>
    </div>

    <div class="signature">
        <p>Tanjungpinang, <?= date('d F Y') ?></p>
        <p><b>REKTOR UNIVERSITAS MARITIM RAJA ALI HAJI</b></p>
        <br><br><br>
        <p><b><u>Nama Rektor</u></b></p>
        <p>NIP: .....................</p>
    </div>
</body>
</html>

<script>
        window.print();
    </script>