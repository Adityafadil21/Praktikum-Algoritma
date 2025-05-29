<?php
session_start();
include 'koneksi.php';

// Cek apakah user adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "Anda tidak memiliki akses ke halaman ini.";
    exit();
}

// Ambil Data Donasi
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_edit = $_GET['id'];
    $query_edit = "SELECT * FROM donasi WHERE id = $id_edit";
    $result_edit = mysqli_query($konek, $query_edit);
    if (mysqli_num_rows($result_edit) == 1) {
        $row_edit = mysqli_fetch_assoc($result_edit);
    } else {
        echo "Data donasi tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak valid.";
    exit();
}

// Proses Update Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($konek, $_POST['nama']);
    $email = mysqli_real_escape_string($konek, $_POST['email']);
    $jumlah = (int)$_POST['jumlah'];

    $query_update = "UPDATE donasi SET nama='$nama', email='$email', jumlah=$jumlah WHERE id=$id_edit";
    if (mysqli_query($konek, $query_update)) {
        header("Location: admin_donasi.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat mengupdate data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Data Donasi</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row_edit['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row_edit['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row_edit['jumlah']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="admin_donasi.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>