<?php
// koneksi database
include 'db_connect.php';

// menangkap data yang di kirim dari form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnSubmit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  // hashed password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
  // query untuk memeriksa apakah email sudah terdaftar
  $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND role = 'penjual'");
  
  // memeriksa jumlah baris hasil query
  $count = mysqli_num_rows($query);
  
  // jika email sudah terdaftar, tampilkan pesan kesalahan
  if ($count > 0) {
    echo "<script>
            alert('email sudah terdaftar. Silahkan gunakan email lain.');
            window.location='register_seller.php';
          </script>";
          header("location:register_seller.php?info=terdaftar");
  } else {
    // jika email belum terdaftar maka simpan data ke dalam database
      mysqli_query($conn, "INSERT INTO user VALUES('$email', '$hashed_password', '', '', '', '', '', 'penjual', '')");
      header("location:register_seller.php?info=daftar");
  }
}
?>