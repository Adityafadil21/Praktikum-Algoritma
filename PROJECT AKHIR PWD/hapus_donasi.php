<?php
session_start();
include 'koneksi.php';

// Cek apakah user adalah Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "Anda tidak memiliki akses ke halaman ini.";
    exit();
}

// Proses Hapus Data
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_hapus = $_GET['id'];
    $query_hapus = "DELETE FROM donasi WHERE id = $id_hapus";
    if (mysqli_query($konek, $query_hapus)) {
        header("Location: admin_donasi.php"); // Kembali ke halaman Admin
        exit();
    } else {
        echo "Terjadi kesalahan saat menghapus data.";
    }
} else {
    echo "ID tidak valid.";
}
?>