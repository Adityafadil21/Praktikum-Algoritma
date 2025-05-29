<?php
session_start();

include 'koneksi.php';

$messages = [];

// Fungsi untuk periksa pengguna
function is_admin() {
    return isset($_SESSION["role"]) && $_SESSION["role"] == "admin";
}

if (!isset($_SESSION["role"])) {
    header("Location: index.php"); //halaman login
    exit();
}

// Proses Tambah Data (Hanya untuk Admin)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah_wilayah"]) && is_admin()) {
    $nama_wilayah = trim($_POST["nama_wilayah"]);

    if (empty($nama_wilayah)) {
        $messages[] = ['type' => 'danger', 'text' => 'Nama wilayah tidak boleh kosong.'];
    } elseif (strlen($nama_wilayah) > 255) {
        $messages[] = ['type' => 'danger', 'text' => 'Nama wilayah terlalu panjang.'];
    } else {
        $stmt = $konek->prepare("INSERT INTO wilayah (nama_wilayah) VALUES (?)");
        if (!$stmt) {
            $messages[] = ['type' => 'danger', 'text' => "Gagal menyiapkan query: " . $konek->error];
        } else {
            $stmt->bind_param("s", $nama_wilayah);
            if (!$stmt->execute()) {
                $messages[] = ['type' => 'danger', 'text' => "Gagal menambahkan wilayah: " . $stmt->error];
            } else {
                $messages[] = ['type' => 'success', 'text' => "Wilayah berhasil ditambahkan."];
            }
            $stmt->close();
        }
    }
}

// Proses Edit Data (Hanya untuk Admin)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_wilayah"]) && is_admin()) {
    $id_wilayah = (int)$_POST["id_wilayah"];
    $nama_wilayah = trim($_POST["nama_wilayah"]);

    if (empty($nama_wilayah)) {
        $messages[] = ['type' => 'danger', 'text' => 'Nama wilayah tidak boleh kosong.'];
    } elseif (strlen($nama_wilayah) > 255) {
        $messages[] = ['type' => 'danger', 'text' => 'Nama wilayah terlalu panjang.'];
    } else {
        $stmt = $konek->prepare("UPDATE wilayah SET nama_wilayah = ? WHERE id_wilayah = ?");
        if (!$stmt) {
            $messages[] = ['type' => 'danger', 'text' => "Gagal menyiapkan query: " . $konek->error];
        } else {
            $stmt->bind_param("si", $nama_wilayah, $id_wilayah);
            if (!$stmt->execute()) {
                $messages[] = ['type' => 'danger', 'text' => "Gagal mengupdate wilayah: " . $stmt->error];
            } else {
                $messages[] = ['type' => 'success', 'text' => "Wilayah berhasil diupdate."];
            }
            $stmt->close();
        }
    }
}

// Proses Hapus Data (Hanya untuk Admin)
if (isset($_GET["hapus"]) && is_numeric($_GET["hapus"]) && is_admin()) {
    $id_wilayah = (int)$_GET["hapus"];

    $stmt = $konek->prepare("DELETE FROM wilayah WHERE id_wilayah = ?");
    if (!$stmt) {
        $messages[] = ['type' => 'danger', 'text' => "Gagal menyiapkan query: " . $konek->error];
    } else {
        $stmt->bind_param("i", $id_wilayah);
        if (!$stmt->execute()) {
            $messages[] = ['type' => 'danger', 'text' => "Gagal menghapus wilayah: " . $stmt->error];
        } else {
            $messages[] = ['type' => 'success', 'text' => "Wilayah berhasil dihapus."];
        }
        $stmt->close();
    }
}

// Ambil Data Wilayah
$result = $konek->query("SELECT id_wilayah, nama_wilayah FROM wilayah ORDER BY nama_wilayah ASC");
if (!$result) {
    $messages[] = ['type' => 'danger', 'text' => "Gagal mengambil data wilayah: " . $konek->error];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wilayah - World Tree</title>
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
            background: url(loginalam.jpg);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 0.75rem 1.25rem;
            font-weight: bold;
        }

        .card-body {
            padding: 1.25rem;
            color: #ffffff;
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
                            <li><a class="dropdown-item" href="index.php">Login</a></li>
                            <li><a class="dropdown-item" href="index.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $message): ?>
                <div class="alert alert-<?php echo $message['type']; ?> alert-dismissible fade show" role="alert">
                    <?php echo $message['text']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <?php if (is_admin()): ?>
                    Kelola Data Wilayah
                <?php else: ?>
                    Daftar Wilayah
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php if (is_admin()): ?>
                    <h3>Tambah Wilayah Baru</h3>
                    <form method="post" class="mb-3">
                        <div class="mb-3">
                            <label for="nama_wilayah" class="form-label">Nama Wilayah:</label>
                            <input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="tambah_wilayah">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </button>
                    </form>
                <?php endif; ?>

                <h3>Daftar Wilayah</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Wilayah</th>
                                <?php if (is_admin()): ?>
                                    <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id_wilayah"] . "</td>";
                                    echo "<td>" . htmlspecialchars($row["nama_wilayah"], ENT_QUOTES, 'UTF-8') . "</td>";
                                    if (is_admin()) {
                                        echo "<td>";
                                        echo "<a href='edit_wilayah.php?id=" . $row["id_wilayah"] . "' class='btn btn-sm btn-warning'><i class='bi bi-pencil'></i> Edit</a>";
                                        echo "<a href='DataWilayah.php?hapus=" . $row["id_wilayah"] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'><i class='bi bi-trash'></i> Hapus</a>";
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='" . (is_admin() ? '3' : '2') . "'>Tidak ada data wilayah.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <br>
                <?php if (is_admin()): ?>
                    <a href="admin_page.php" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali ke Admin</a>
                <?php else: ?>
                    <a href="finalproject.html" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali ke Beranda</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <br><br>

   <footer class="bg-dark text-white text-center p-3">
        <div class="container">
            <p>Supported by Pigeon | Media Partners: Green Network, Kompasiana, Tribun News</p>
            <p>© 2023 Funhutan Indonesia - #JagaHutanJagaIklim</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>