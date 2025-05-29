<?php
session_start();

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //Prepared statements buat mencegah SQL Injection
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($konek, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]) {  //  Perbandingan password
            // Login berhasil
            // Simpan informasi role di session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['username'] = $row['username'];

            // Redirect berdasarkan role
            if ($_SESSION['role'] == 'admin') {
                header("Location: admin_page.php");
            } else {
                header("Location: finalproject.html");
            }
            exit();
        } else {
            // Password salah
            $_SESSION['login_error'] = "Password salah.";
            header("Location: index.php");
            exit();
        }
    } else {
        // Username tidak ditemukan
        $_SESSION['login_error'] = "Username tidak ditemukan.";
        header("Location: index.php");
        exit();
    }
} else {
    // Jika bukan metode POST, redirect ke halaman login
    header("Location: index.php");
    exit();
}
?>