<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Hutan Adalah Jantung Dunia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .registration-form {
            width: 420px;
            background: transparent;
            color: aliceblue;
            border-radius: 10px;
            padding: 30px 40px;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
        }

        .registration-form h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            color: aliceblue;
            margin-bottom: 5px;
        }

        .form-group input.form-control {
            width: 100%;
            height: 40px;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: aliceblue;
            padding: 10px 20px;
        }

        .form-group input.form-control::placeholder {
            color: aliceblue;
        }

        .btn-primary {
            width: 100%;
            height: 45px;
            background: floralwhite;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            cursor: pointer;
            font-size: 16px;
            color: black;
            font-weight: 600;
        }

        .login-link {
            font-size: 14.5px;
            text-align: center;
            margin-top: 20px;
        }

        .login-link p a {
            color: aliceblue;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link p a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="registration-form">
        <form action="register_process.php" method="POST">
            <h1>Registrasi</h1>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username"
                    required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"
                    required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                    placeholder="Konfirmasi password" required>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
            <div class="login-link">
                <p>Sudah punya akun? <a href="index.php">Login</a></p>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>