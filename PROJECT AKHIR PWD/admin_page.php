<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php"); //halaman login
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin - World Tree</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background: url(loginalam.jpg);
        }

        .admin-container {
            margin-top: 4rem;
            background-color:transparent;
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .admin-heading {
            color:#fff;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .admin-greeting {
            font-size: 1.2rem;
            color:#fff;
            margin-bottom: 2rem;
            text-align: center;
        }

        .dashboard-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .action-card {
            background-color: #e9ecef;
            padding: 2rem;
            border-radius: 8px;
            text-align: center;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .action-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .action-icon {
            font-size: 2rem;
            color: #2e7d32;
            margin-bottom: 1rem;
        }

        .action-title {
            font-weight: bold;
            color: #495057;
        }

        .btn-logout {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-logout:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container admin-container">
        <h2 class="admin-heading">Panel Administrasi</h2>
        <p class="admin-greeting">Selamat Datang, <span class="fw-bold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>!</p>

        <div class="dashboard-actions">
            <div class="action-card">
                <i class="bi bi-geo-alt-fill action-icon"></i>
                <h3 class="action-title">Kelola Data Wilayah</h3>
                <p>Lihat, tambah, edit, dan hapus data wilayah.</p>
                <a href="DataWilayah.php" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i> Buka
                </a>
            </div>

            <div class="action-card">
                <i class="bi bi-heart-fill action-icon" style="color: #007bff;"></i>
                <h3 class="action-title">Kelola Data Donasi</h3>
                <p>Pantau dan kelola informasi donasi yang masuk.</p>
                <a href="admin_donasi.php" class="btn btn-info btn-sm">
                    <i class="bi bi-eye-fill"></i> Lihat
                </a>
            </div>

            </div>

        <div class="text-center">
            <a href="logout.php" class="btn btn-danger btn-logout">
                <i class="bi bi-box-arrow-left"></i> Logout
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>