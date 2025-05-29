<?php
session_start();

// Cek apakah user adalah Admin
if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: index.html"); // Atau halaman login Anda
    exit();
}

include 'koneksi.php';

$error = ""; // Inisialisasi variabel error

// Ambil ID dari URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Ambil data wilayah dari database
    $stmt = $konek->prepare("SELECT id_wilayah, nama_wilayah FROM wilayah WHERE id_wilayah = ?");
    if (!$stmt) {
        $error = "Gagal menyiapkan query: " . $konek->error;
    } else {
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            $error = "Gagal menjalankan query: " . $stmt->error;
        } else {
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
            } else {
                $error = "Data wilayah tidak ditemukan.";
            }
        }
        $stmt->close();
    }

} else {
    $error = "ID tidak valid.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Wilayah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 2rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Data Wilayah</h2>

        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php else: ?>
            <form method="post" action="DataWilayah.php">  <input type="hidden" name="id_wilayah" value="<?php echo $row['id_wilayah']; ?>">
                <div class="form-group">
                    <label for="nama_wilayah">Nama Wilayah:</label>
                    <input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah" value="<?php echo htmlspecialchars($row['nama_wilayah'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="edit_wilayah">Simpan Perubahan</button>
                <a href="DataWilayah.php" class="btn btn-secondary">Batal</a>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>