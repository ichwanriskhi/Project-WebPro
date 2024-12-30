<?php
session_start();
if($_SESSION['status'] == ""){
  header("location:../login_user.php?info=login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/logohalaman.png">
  <title>
    ElangKuy
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Boostrap Icons & Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link id="pagestyle" href="../assets/css/bootstrap/dashboard-min.css?v=3.2.0" rel="stylesheet" />
  <!-- <style>
        .thumbnail {
            cursor: pointer;
            /* Menunjukkan bahwa thumbnail dapat diklik */
            margin-right: 10px;
            /* Jarak antar thumbnail */
        }

        .thumb {
            width: 100px;
            /* Lebar thumbnail */
            height: auto;
            /* Tinggi otomatis untuk menjaga rasio */
        }

        .main-gall {
            width: 100%;
            /* Lebar gambar besar */
            height: auto;
            /* Tinggi otomatis untuk menjaga rasio */
        }
    </style> -->
</head>

<body class="dash-user g-sidenav-show bg-gray-100">
    <?php 
    if($_SESSION['role'] == "pembeli"){ ?>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="index.php" target="">
        <img src="../assets/img/logo.png" class="navbar-brand-img" width="120px" height="26" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white" href="index.php">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Beranda</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="aktivitas.php">
            <i class="material-symbols-rounded opacity-5">table_view</i>
            <span class="nav-link-text ms-1">Aktivitas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="bantuan.php">
            <i class="material-symbols-rounded opacity-5">help</i>
            <span class="nav-link-text ms-1">Bantuan</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
      <div class="mx-3">
        <!-- Dropdown Trigger -->
        <div class="dropdown dropup">
          <button class="btn btn-outline-dark mt-4 w-100 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-symbols-rounded opacity-5">person</i> <?= $_SESSION['nama']?>
          </button>
          <!-- Dropdown Menu -->
          <ul class="dropdown-menu dropdown-menu-end px-2 py-2" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#lihat-profil">Lihat Profil</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </aside>
  <!-- Modal -->
  <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body p-5 text-center">
          Apakah anda yakin ingin keluar dari aplikasi?
        </div>
        <div class="d-flex justify-content-center text-center">
            <!-- <button type="button" class="btn btn-danger me-2 w-20" data-bs-dismiss="modal"><a href="../user/logout.php">Ya</a></button> -->
            <a href="../user/logout.php" class="btn btn-danger me-2 w-20">Ya</a>
          <button type="button" class="btn btn-primary w-20">Tidak</button>
        </div>
      </div>
    </div>
  </div>
  <?php } if($_SESSION['role'] == "penjual"){ ?>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" index.php " target="_blank">
        <img src="../assets/img/logo.png" class="navbar-brand-img" width="120px" height="26" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white" href="index.php">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Beranda</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="barang.php">
            <i class="material-symbols-rounded opacity-5">table_view</i>
            <span class="nav-link-text ms-1">Barang</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="pesanan.php">
            <i class="material-symbols-rounded opacity-5">receipt_long</i>
            <span class="nav-link-text ms-1">Pesanan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="layanan.php">
            <i class="material-symbols-rounded opacity-5">chat</i>
            <span class="nav-link-text ms-1">Layanan Pelanggan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="laporan.php">
            <i class="material-symbols-rounded opacity-5">format_textdirection_r_to_l</i>
            <span class="nav-link-text ms-1">Laporan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="bantuan.php">
            <i class="material-symbols-rounded opacity-5">help</i>
            <span class="nav-link-text ms-1">Bantuan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="ulasan.php">
            <i class="material-symbols-rounded opacity-5">notes</i>
            <span class="nav-link-text ms-1">Ulasan</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
      <div class="mx-3">
        <!-- Dropdown Trigger -->
        <div class="dropdown dropup">
          <button class="btn btn-outline-dark mt-4 w-100 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-symbols-rounded opacity-5">person</i> <?= $_SESSION['nama']?>
          </button>
          <!-- Dropdown Menu -->
          <ul class="dropdown-menu dropdown-menu-end px-2 py-2" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="profil.html">Lihat Profil</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </aside>
  <!-- Modal -->
  <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body p-5 text-center">
          Apakah anda yakin ingin keluar dari aplikasi?
        </div>
        <div class="d-flex justify-content-center text-center">
          <!-- <button type="button" class="btn btn-danger me-2 w-20" data-bs-dismiss="modal"><a href="../seller/logout.php">Ya</a></button> -->
          <a href="../seller/logout.php" class="btn btn-danger me-2 w-20">Ya</a>
          <button type="button" class="btn btn-primary w-20">Tidak</button>
        </div>
      </div>
    </div>
  </div>
  <?php } if($_SESSION['role'] == "petugas"){ ?>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" index.html " target="_blank">
        <img src="../assets/img/logo.png" class="navbar-brand-img" width="120px" height="26" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white" href="index.php">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Beranda</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="barang.php">
            <i class="material-symbols-rounded opacity-5">table_view</i>
            <span class="nav-link-text ms-1">Pengajuan Barang</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="kategori.php">
            <i class="material-symbols-rounded opacity-5">receipt_long</i>
            <span class="nav-link-text ms-1">Kategori Barang</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="lelang.php">
            <i class="material-symbols-rounded opacity-5">chat</i>
            <span class="nav-link-text ms-1">Data Lelang</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
      <div class="mx-3">
        <!-- Dropdown Trigger -->
        <div class="dropdown dropup">
          <button class="btn btn-outline-dark mt-4 w-100 dropdown-toggle" type="button" id="dropdownMenuButton"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-symbols-rounded opacity-5">person</i> <?= $_SESSION['nama']?>
          </button>
          <!-- Dropdown Menu -->
          <ul class="dropdown-menu dropdown-menu-end px-2 py-2" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#lihat-profil">Lihat Profil</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </aside>
  <!-- Modal -->
  <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body p-5 text-center">
          Apakah anda yakin ingin keluar dari aplikasi?
        </div>
        <div class="d-flex justify-content-center text-center">
          <!-- <button type="button" class="btn btn-danger me-2 w-20" data-bs-dismiss="modal"><a href="../seller/logout.php">Ya</a></button> -->
          <a href="../petugas/logout.php" class="btn btn-danger me-2 w-20">Ya</a>
          <button type="button" class="btn btn-primary w-20">Tidak</button>
        </div>
      </div>
    </div>
  </div>
    <?php } if($_SESSION['role'] == "admin"){ ?>
      <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
      id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
          aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href=" index.php " target="_blank">
          <img src="../assets/img/logo.png" class="navbar-brand-img" width="120px" height="26" alt="main_logo">
        </a>
      </div>
      <hr class="horizontal dark mt-0 mb-2">
      <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-white" href="index.php">
              <i class="material-symbols-rounded opacity-5">dashboard</i>
              <span class="nav-link-text ms-1">Beranda</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="barang.php">
              <i class="material-symbols-rounded opacity-5">table_view</i>
              <span class="nav-link-text ms-1">Pengajuan Barang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="kategori.php">
              <i class="material-symbols-rounded opacity-5">receipt_long</i>
              <span class="nav-link-text ms-1">Kategori Barang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="lelang.php">
              <i class="material-symbols-rounded opacity-5">chat</i>
              <span class="nav-link-text ms-1">Data Lelang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="petugas.php">
              <i class="material-symbols-rounded opacity-5">person</i>
              <span class="nav-link-text ms-1">Data Petugas</span>
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link text-dark" href="pengguna.php">
                  <i class="material-symbols-rounded opacity-5">group</i>
                  <span class="nav-link-text ms-1">Data Pengguna</span>
              </a>
          </li>
        </ul>
      </div>
      <div class="sidenav-footer position-absolute w-100 bottom-0">
        <div class="mx-3">
          <!-- Dropdown Trigger -->
          <div class="dropdown dropup">
            <button class="btn btn-outline-dark mt-4 w-100 dropdown-toggle" type="button" id="dropdownMenuButton"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="material-symbols-rounded opacity-5">person</i> <?= $_SESSION['nama']?>
            </button>
            <!-- Dropdown Menu -->
            <ul class="dropdown-menu dropdown-menu-end px-2 py-2" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="#lihat-profil">Lihat Profil</a></li>
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </aside>
    <!-- Modal -->
  <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body p-5 text-center">
          Apakah anda yakin ingin keluar dari aplikasi?
        </div>
        <div class="d-flex justify-content-center text-center">
          <!-- <button type="button" class="btn btn-danger me-2 w-20" data-bs-dismiss="modal"><a href="../seller/logout.php">Ya</a></button> -->
          <a href="../admin/logout.php" class="btn btn-danger me-2 w-20">Ya</a>
          <button type="button" class="btn btn-primary w-20">Tidak</button>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
  <script src="../assets/js/main.js"></script>
