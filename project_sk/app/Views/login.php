<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .login-container {
            background-color: #ffffff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <form action="<?= site_url('login/auth') ?>" method="post">
        <?= csrf_field(); ?> <!-- Menambahkan CSRF token, ini tidak mempengaruhi rute -->
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" required autofocus placeholder="Enter your ID">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required placeholder="Enter your password">
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
