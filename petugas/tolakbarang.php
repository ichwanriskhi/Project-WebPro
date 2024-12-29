<?php
include '../db_connect.php';

$id_barang = $_GET['id_barang'];

// Pastikan koneksi database berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$update_barang_query = "UPDATE barang SET status = 'ditolak' WHERE id_barang = '$id_barang'";
$result = mysqli_query($conn, $update_barang_query);

if ($result) {
    // Jika berhasil, redirect ke barang.php
    header('location:barang.php?info=tolak');
} else {
    // Jika gagal, tampilkan pesan error
    header('location:barang.php?info=gagaltolak');
}
exit();

