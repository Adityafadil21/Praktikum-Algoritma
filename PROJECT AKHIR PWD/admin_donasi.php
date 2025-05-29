<?php
session_start();
include 'koneksi.php';

// Cek apakah user adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "Anda tidak memiliki akses ke halaman ini.";
    exit();
}

// Ambil semua data donasi
$query = "SELECT * FROM donasi";
$result = mysqli_query($konek, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            background: url(loginalam.jpg);
        }

        .hero {
            background-color: #e9ecef;
            padding: 4rem 0;
            text-align: center;
            margin-bottom: 2rem;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .container {
            margin-top: 2rem;
        }
        .navbar-nav .nav-link {
            color: white;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }

        .card {
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            background: rgba(255, 255, 255, 0.8);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 0.75rem 1.25rem;
            font-weight: bold;
        }

        .card-body {
            padding: 1.25rem;
        }

        .table {
            margin-top: 1rem;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: #2e7d32;
            border-color: #2e7d32;
        }

        .btn-primary:hover {
            background-color: #1b5e20;
            border-color: #1b5e20;
        }

        .btn-warning, .btn-danger {
            margin-right: 0.5rem;
        }

        .alert {
            margin-top: 1rem;
        }

        .footer {
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">World Tree</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="finalproject.html">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="TentangKami.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="aksi.php">Aksi Kami</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="DataWilayah.php">Data Wilayah</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="admin_donasi.php">Donasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="login.php">Login</a></li>
                            <li><a class="dropdown-item" href="index.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Kelola Data Donasi
            </div>
            <div class="card-body">
                <h3>Daftar Donasi</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['nama'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . number_format($row['jumlah']) . "</td>";
                                    echo "<td>" . $row['tanggal'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='edit_donasi.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'><i class='bi bi-pencil'></i> Edit</a> ";
                                    echo "<a href='hapus_donasi.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus donasi ini?\")'><i class='bi bi-trash'></i> Hapus</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>Tidak ada data donasi.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <a href="admin_page.php" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali ke Admin</a>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center p-3">
        <div class="container">
            <p>Supported by Pigeon | Media Partners: Green Network, Kompasiana, Tribun News</p>
            <p>© 2023 Funhutan Indonesia - #JagaHutanJagaIklim</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>