<?php
include "../db_connect.php";

$email = $_GET["email"];

$sqlStatement = "SELECT * FROM user WHERE email='$email'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);

$sqlStatement = "DELETE FROM user WHERE email='$email'";
$query = mysqli_query($conn, $sqlStatement);
if ($query) {
    header('location:petugas.php?info=hapus');
}

mysqli_close($conn);
