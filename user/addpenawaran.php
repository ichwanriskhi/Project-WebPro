<?php

include "../db_connect.php";
// Pastikan session sudah dimulai
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_lelang = $_POST['id_lelang'];
    $id_barang = $_POST['id_barang'];
    $id_pembeli = $_SESSION['email']; // Menggunakan email dari session
    $penawaran_harga = str_replace(",", "", $_POST['penawaran_harga']); // Menghapus koma jika ada
    $uangmuka = str_replace(",", "", $_POST['uangmuka']); // Menghapus koma jika ada


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk mengambil harga awal barang berdasarkan ID
    $query = "SELECT harga_awal FROM barang WHERE id_barang = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_barang);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $harga_awal = $row['harga_awal'];

        // Cek apakah penawaran harga lebih kecil dari harga awal
        if ($penawaran_harga < $harga_awal) {
            // Jika harga penawaran kurang dari harga awal, tampilkan alert
            echo "<script>alert('Nominal tawaran tidak boleh lebih rendah dari harga awal!'); window.history.back();</script>";
            exit;
        }

        // Jika penawaran valid, simpan ke database
        $query = "INSERT INTO penawaran (id_lelang, id_barang, id_pembeli, penawaran_harga, uang_muka) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iisii", $id_lelang, $id_barang, $id_pembeli, $penawaran_harga, $uangmuka);

        if ($stmt->execute()) {
            echo "<script>alert('Penawaran berhasil diajukan!'); window.location.href='detail_barang.php';</script>";
        } else {
            echo "<script>alert('Gagal mengajukan penawaran!'); window.history.back();</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Data barang tidak ditemukan!'); window.history.back();</script>";
    }

    $conn->close();
}