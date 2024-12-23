<?php

include '../db_connect.php';

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Tangkap data dari form
  $email =$_POST['email'];
  $nama = $_POST['nama'];
  $telepon = $_POST['telepon'];
  $password = $_POST['password'];
  $password_ubah = $_POST['password_ubah'];

  // Validasi data (opsional)
  if (!empty($password_ubah)) {
        // hashed password
        $hashed_password = password_hash($password_ubah, PASSWORD_DEFAULT);

      // Query untuk mengubah data ke tabel petugas
      $sql = "UPDATE user SET nama = '$nama', telepon = '$telepon', password = '$hashed_password' WHERE email = '$email'";

      if (mysqli_query($conn, $sql)) {
          // Redirect jika berhasil
          header('location:petugas.php?info=edit');
          exit();
      } else {
          // Redirect jika gagal
          header('Location: petugas.php?info=editgagal');
          exit();
      }
  } else {

      // Query untuk mengubah data ke tabel petugas
      $sql = "UPDATE user SET nama = '$nama', telepon = '$telepon' WHERE email = '$email'";

      if (mysqli_query($conn, $sql)) {
          // Redirect jika berhasil
          header('location:petugas.php?info=edit');
          exit();
      } else {
          // Redirect jika gagal
          header('Location: petugas.php?info=editgagal');
          exit();
      }
  }
}

// Tutup koneksi database
mysqli_close($conn);
?>