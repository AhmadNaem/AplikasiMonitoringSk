<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Selamat Datang, <?= session()->get('username') ?></h1>
    <p>Role: <?= session()->get('role') ?></p>
    <a href="/logout">Logout</a>
</body>
</html>
