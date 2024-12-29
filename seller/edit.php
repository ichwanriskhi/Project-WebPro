<?php
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan'])) {
    $id_barang = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $harga_awal = str_replace(['Rp.', ',', '.'], '', $_POST['harga_awal']);
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $kondisi = $_POST['kondisi'];
    $id_kategori = $_POST['id_kategori'];

    // Ambil foto lama dari database
    $query = "SELECT foto FROM barang WHERE id_barang = '$id_barang'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $fotoLama = $row['foto'];

    // Proses upload foto baru
    $uploadedPhotos = [];
    if (!empty($_FILES['foto']['name'][0])) {
        for ($i = 0; $i < count($_FILES['foto']['name']); $i++) {
            $fileName = time() . '_' . $_FILES['foto']['name'][$i];
            $fileTmp = $_FILES['foto']['tmp_name'][$i];
            
            if (move_uploaded_file($fileTmp, '../assets/img/uploaded/' . $fileName)) {
                $uploadedPhotos[] = $fileName;
            }
        }
    }

    // Gabungkan foto lama dengan foto baru
    if (!empty($fotoLama)) {
        $allPhotos = array_merge(explode(',', $fotoLama), $uploadedPhotos);
    } else {
        $allPhotos = $uploadedPhotos;
    }

    // Gabungkan semua foto menjadi string
    $photoNames = implode(',', $allPhotos);

    // Update data barang
    $sqlStatement = "UPDATE barang SET 
                     nama_barang = '$nama', 
                     harga_awal = '$harga_awal', 
                     lokasi = '$lokasi', 
                     deskripsi = '$deskripsi', 
                     kondisi = '$kondisi', 
                     id_kategori = '$id_kategori', 
                     foto = '$photoNames',
                     diubah = NOW() 
                     WHERE id_barang = '$id_barang'";

    if (mysqli_query($conn, $sqlStatement)) {
        header('location:barang.php?info=edit');
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
