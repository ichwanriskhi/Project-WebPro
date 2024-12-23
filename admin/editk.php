<?php

include '../db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan'])){
    $id_kategori = $_POST['id_kategori'];
    $nama = $_POST['nama_kategori'];

    $sqlStatement = "UPDATE kategori SET nama_kategori = '$nama' WHERE id_kategori ='$id_kategori'";
    $query = mysqli_query($conn, $sqlStatement);
    if ($query) {
        header('location:kategori.php?info=edit');
        exit();
    } else {
        header('location:kategori.php?info=editgagal');
        exit();
    }
}