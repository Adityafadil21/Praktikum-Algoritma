<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil Data dari Formulir
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi Data
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Semua field harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format email tidak valid.";
    } elseif ($password != $confirm_password) {
        echo "Password dan konfirmasi password tidak cocok.";
    } else {
        // Cek apakah username sudah ada
        $query_cek = "SELECT username FROM users WHERE username = '$username'";
        $result_cek = mysqli_query($konek, $query_cek);
        if (mysqli_num_rows($result_cek) > 0) {
            echo "Username sudah terdaftar.";
        } else {
            // Proses dan Simpan Data
            $username = mysqli_real_escape_string($konek, $username);
            $email = mysqli_real_escape_string($konek, $email);
            $password = mysqli_real_escape_string($konek, $password);
            $role = 'user';

            $query_insert = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
            if (mysqli_query($konek, $query_insert)) {
                // Redirect ke index setelah berhasil
                header("Location: index.php");
                exit(); // Untuk menghentikan eksekusi
            } else {
                echo "Terjadi kesalahan saat registrasi: " . mysqli_error($konek);
            }
        }
    }
} else {
    echo "Akses tidak sah."; // Jika langsung mengakses register process tanpa submit form
}
?>