<?php

include '../db_connect.php';

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Tangkap data dari form
  $email =$_POST['email'];
  $nama = $_POST['nama'];
  $telepon = $_POST['telepon'];
  $password = $_POST['password'];

  // Validasi data (opsional)
  if (!empty($email) && !empty($nama) && !empty($telepon) && !empty($password)) {
        // hashed password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Query untuk menyimpan data ke tabel kategori
      $sql = "INSERT INTO user (email, password, nama, telepon, role) VALUES ('$email', '$hashed_password', '$nama', '$telepon', 'petugas')";

      if (mysqli_query($conn, $sql)) {
          // Redirect jika berhasil
          header('location:petugas.php?info=berhasil');
          exit();
      } else {
          // Redirect jika gagal
          header('Location: petugas.php?info=gagal');
          exit();
      }
  } else {
      // Redirect jika ada field yang kosong
      header('Location: petugas.php?info=gagal');
      exit();
  }
}

// Tutup koneksi database
mysqli_close($conn);
?>