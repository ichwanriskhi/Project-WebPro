<?php

include '../db_connect.php';

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Tangkap data dari form
  $id_kategori =$_POST['id_kategori'];
  $nama_kategori = $_POST['nama_kategori'];

  // Validasi data (opsional)
  if (!empty($id_kategori) && !empty($nama_kategori)) {
      // Query untuk menyimpan data ke tabel kategori
      $sql = "INSERT INTO kategori (id_kategori, nama_kategori) VALUES ('$id_kategori', '$nama_kategori')";

      if (mysqli_query($conn, $sql)) {
          // Redirect jika berhasil
          header('location:kategori.php?info=berhasil');
          exit();
      } else {
          // Redirect jika gagal
          header('Location: kategori.php?info=gagal');
          exit();
      }
  } else {
      // Redirect jika ada field yang kosong
      header('Location: kategori.php?info=gagal');
      exit();
  }
}

// Tutup koneksi database
mysqli_close($conn);
?>