<?php
session_start();
include 'koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID donasi tidak valid.";
    exit();
}

$donasi_id = $_GET['id'];

$query = "SELECT nama, email, jumlah, tanggal FROM donasi WHERE id = $donasi_id";
$result = mysqli_query($konek, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Data donasi tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
                body {
            background-color: #f8f9fa;
            background: url(loginalam.jpg);
        }

        .container {
            margin-top: 2rem;
        }

        .navbar-nav .nav-link {
            color: white;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }

        .donation-success {
            max-width: 960px;
            margin: 2rem auto;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
            color: #212529;
        }

        .donation-success h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #2e7d32;
        }

        .donation-success h4 {
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .donation-success p {
            margin-bottom: 0.75rem;
        }

        .donation-success .btn-primary {
            background-color: #2e7d32;
            border-color: #2e7d32;
        }

        .donation-success .btn-primary:hover {
            background-color: #1b5e20;
            border-color: #1b5e20;
        }

        .donation-success a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container donation-success">
        <h2>Donasi Anda Berhasil!</h2>
        <p>Terima kasih atas kontribusi Anda.</p>

        <h4>Detail Donasi:</h4>
        <p>Nama: <?php echo $row['nama']; ?></p>
        <p>Email: <?php echo $row['email']; ?></p>
        <p>Jumlah: Rp <?php echo number_format($row['jumlah']); ?></p>
        <p>Tanggal: <?php echo $row['tanggal']; ?></p>

        <a href="finalproject.html" class="btn btn-primary">Kembali ke Beranda</a>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <p><a href="admin_donasi.php">Kelola Data Donasi (Admin)</a></p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>