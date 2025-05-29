<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hutan Adalah Jantung Dunia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style.css">

    <style>
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="Logtam">
        <form action="login_process.php" method="POST">
            <h1>LOGIN</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required> </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required> </div>
            <div class="remember-forgot mb-3 p-3">
                <label><input type="checkbox">Remember me</label>
                <a href="">Forgot Password?</a>
            </div>
            <div class="register-link">
                <p>Dont have account?
                    <a href="registrasi.php">Register</a>
                </p>
            </div>
            <button type="submit" class="btn">Login</button>
            <div id="error-message" class="error-message">
                <?php
                if (isset($_SESSION['login_error'])) {
                    echo $_SESSION['login_error'];
                    unset($_SESSION['login_error']);
                }
                ?>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>