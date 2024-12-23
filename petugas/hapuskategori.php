<?php
include "../db_connect.php";

$id_kategori = $_GET["id_kategori"];

$sqlStatement = "SELECT * FROM kategori WHERE id_kategori='$id_kategori'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);

$sqlStatement = "DELETE FROM kategori WHERE id_kategori='$id_kategori'";
$query = mysqli_query($conn, $sqlStatement);
if ($query) {
    header('location:kategori.php?info=hapus');
}

mysqli_close($conn);
