<?php

include 'db_connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sqlStatement = "SELECT * FROM user WHERE email = '$email'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);

if ($row == "") { // Username tidak ditemukan
    header("location:login_seller.php?info=gagal");
} else { // Username ditemukan
    // Gunakan password_verify() untuk memverifikasi password
    if (password_verify($password, $row['password'])) { // Username dan password cocok
        session_start();
        $_SESSION['email'] = $row['email'];
        $_SESSION['nama'] = $row['nama'];
        if ($row['role'] == "petugas"){
            $_SESSION['role'] = "petugas";
            $_SESSION['status'] = "login";
            header("location:petugas/index.php");
            exit();
        } 
        else if ($row['role'] == "admin"){
            $_SESSION['role'] = "admin";
            $_SESSION['status'] = "login";
            header("location:admin/index.php");
            exit();
        } 
    } else {
        header("location:login_admin.php?info=gagal");
    }
}
?>
