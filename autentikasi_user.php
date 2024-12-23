<?php

include 'db_connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sqlStatement = "SELECT * FROM user WHERE email = '$email' AND role = 'pembeli'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);

if ($row == "") { // Username tidak ditemukan
    header("location:login_user.php?info=gagal");
} else { // Username ditemukan
    // Gunakan password_verify() untuk memverifikasi password
    if (password_verify($password, $row['password'])) { // Username dan password cocok
        session_start();
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = "pembeli";
        $_SESSION['status'] = "login";
        header("location:user/index.php");
    } else {
        header("location:login_user.php?info=gagal");
    }
}
?>
