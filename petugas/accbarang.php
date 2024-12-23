<?php
include '../db_connect.php';

if (isset($_POST['simpan'])) {
    $id_barang = mysqli_real_escape_string($conn, $_POST['id_barang']);
    $id_petugas = mysqli_real_escape_string($conn, $_POST['id_petugas']);

    // Update status barang
    $update_barang_query = "UPDATE barang SET status = 'disetujui' WHERE id_barang = '$id_barang'";
    if (mysqli_query($conn, $update_barang_query)) {
        // Tambahkan data ke tabel lelang
        $insert_lelang_query = "INSERT INTO lelang (id_barang, tgl_dibuka, tgl_selesai, id_petugas, status, id_pembeli, id_user) 
                        VALUES ('$id_barang', NOW(), NULL, '$id_petugas', 'dibuka', NULL, NULL)";
        if (mysqli_query($conn, $insert_lelang_query)) {
            header('location:barang.php?info=berhasil');
            exit();
        } else {
            error_log("Error inserting to lelang table: " . mysqli_error($conn));
            header('location:barang.php?info=gagal');
            exit();
        }
    } else {
        error_log("Error updating barang table: " . mysqli_error($conn));
        header('location:barang.php?info=gagal');
        exit();
    }
} else {
    header('location:barang.php?info=gagal');
    exit();
}
?>
