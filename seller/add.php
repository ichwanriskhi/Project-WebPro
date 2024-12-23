<?php
include '../db_connect.php';

// Membuat data tambah barang
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan'])) {
    $nama = $_POST['nama_barang'];
    $harga_awal = str_replace('.', '', $_POST['harga_awal']);
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $kondisi = $_POST['kondisi'];
    $id_kategori = $_POST['id_kategori'];
    $id_penjual = $_POST['id_penjual'];

    $foto = $_FILES['foto'];
    $uploadedPhotos = [];

    if (!empty($foto['name'][0])) { // Pastikan setidaknya ada satu file yang diunggah
        for ($i = 0; $i < count($foto['name']); $i++) {
            $fileName = time() . '_' . $foto['name'][$i];
            $fileTmp = $foto['tmp_name'][$i];
            
            if (move_uploaded_file($fileTmp, '../assets/img/uploaded/' . $fileName)) {
                $uploadedPhotos[] = $fileName;
            }
        }
    }

    // Gabungkan nama file menjadi string yang dipisahkan koma
    $photoNames = implode(',', $uploadedPhotos);

    // Simpan data menggunakan insert ke dalam tabel produk
    $query = "INSERT INTO barang (nama, harga_awal, lokasi, deskripsi, kondisi, id_kategori, status, foto, id_penjual) 
              VALUES ('$nama', $harga_awal, '$lokasi', '$deskripsi', '$kondisi', '$id_kategori', 'belum disetujui', '$photoNames', '$id_penjual')";

    // Jika query berhasil, redirect ke halaman barang.php
    if ($conn->query($query) === true) {
        header('location:barang.php?info=berhasil');
    } else {
        header('location:barang.php?info=gagal');
    }

    mysqli_close($conn);
}
?>
