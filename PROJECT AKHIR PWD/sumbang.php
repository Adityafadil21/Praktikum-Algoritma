<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Pohon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background: url(loginalam.jpg);
        }
        .donation-form {
            max-width: 600px;
            margin: 2rem auto;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #2e7d32;
            border-color: #2e7d32;
        }

        .btn-primary:hover {
            background-color: #1b5e20;
            border-color: #1b5e20;
        }

        .alert {
            margin-top: 1rem;
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
        <div class="donation-form">
            <h2>Donasi Pohon</h2>
            <p>Mari berdonasi untuk menghijaukan bumi!</p>

            <?php
            include 'koneksi.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = mysqli_real_escape_string($konek, $_POST['nama']);
                $email = mysqli_real_escape_string($konek, $_POST['email']);
                $jumlah = (int)$_POST['jumlah'];

                // Validasi
                if ($jumlah <= 0) {
                    echo '<div class="alert alert-danger">Jumlah donasi harus lebih dari 0.</div>';
                } else {
                    $query = "INSERT INTO donasi (nama, email, jumlah, tanggal) VALUES ('$nama', '$email', $jumlah, NOW())";
                    if (mysqli_query($konek, $query)) {
                        $donasi_id = mysqli_insert_id($konek); // Ambil ID donasi yang baru di tambahkan
                        header("Location: donasi_sukses.php?id=$donasi_id"); // Redirect ke halaman sukses
                        exit();
                    } else {
                        echo '<div class="alert alert-danger">Terjadi kesalahan. Silakan coba lagi.</div>';
                    }
                }
            }
            ?>

            <form method="POST">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Donasi (Rp)</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
                </div>
                <button type="submit" class="btn btn-primary">Donasi Sekarang</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>