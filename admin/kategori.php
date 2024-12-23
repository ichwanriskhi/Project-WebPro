<?php 
include '../db_connect.php';

include "../layout/mainsidebar.php";

// Query untuk kategori terpopuler (jumlah barang terbanyak)
$queryTerpopuler = "
    SELECT 
        k.nama_kategori, 
        COUNT(b.id_barang) AS jumlah_barang
    FROM 
        kategori k
    LEFT JOIN 
        barang b 
    ON 
        k.id_kategori = b.id_kategori
    GROUP BY 
        k.id_kategori, k.nama_kategori
    ORDER BY 
        jumlah_barang DESC
    LIMIT 1
";

// Query untuk kategori kurang diminati (jumlah barang paling sedikit)
$queryKurangDiminati = "
    SELECT 
        k.nama_kategori, 
        COUNT(b.id_barang) AS jumlah_barang
    FROM 
        kategori k
    LEFT JOIN 
        barang b 
    ON 
        k.id_kategori = b.id_kategori
    GROUP BY 
        k.id_kategori, k.nama_kategori
    ORDER BY 
        jumlah_barang ASC
    LIMIT 1
";

// Eksekusi query terpopuler
$resultTerpopuler = mysqli_query($conn, $queryTerpopuler);
$kategoriTerpopuler = mysqli_fetch_assoc($resultTerpopuler);

// Eksekusi query kurang diminati
$resultKurangDiminati = mysqli_query($conn, $queryKurangDiminati);
$kategoriKurangDiminati = mysqli_fetch_assoc($resultKurangDiminati);

$query = "SELECT 
        k.id_kategori, 
        k.nama_kategori, 
        COUNT(b.id_barang) AS jumlah_barang
    FROM 
        kategori k
    LEFT JOIN 
        barang b 
    ON 
        k.id_kategori = b.id_kategori
    GROUP BY 
        k.id_kategori, k.nama_kategori";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg pt-3">
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kategori Barang</li>
        </ol>
      </nav>
      <div class="row d-flex justify-content-center mt-4">
        <h5 class="mb-3">Data Kategori Barang</h5>
        <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3 d-flex justify-content-between">
              <div class="">
                <?php
                $query = "SELECT COUNT(*) AS total_kategori FROM kategori";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                ?>
                <p class="text-sm mb-0 text-capitalize">jumlah kategori</p>
                <h4 class="mb-0 text-center"><?= $row['total_kategori'] ?></h4>
              </div>
              <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                <i class="material-symbols-rounded opacity-10">pending</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3 d-flex justify-content-between">
              <div class="">
                <p class="text-sm mb-0 text-capitalize">Kategori terpopuler</p>
                <h4 class="mb-0"><?= $kategoriTerpopuler['nama_kategori'] ?></h4>
              </div>
              <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                <i class="material-symbols-rounded opacity-10">pending</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3 d-flex justify-content-between">
              <div class="">
                <p class="text-sm mb-0 text-capitalize">Kategori Kurang diminati</p>
                <h4 class="mb-0"><?= $kategoriKurangDiminati['nama_kategori'] ?></h4>
              </div>
              <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                <i class="material-symbols-rounded opacity-10">pending</i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
      if(isset($_GET['info'])){
                    if($_GET['info'] == "gagal"){ ?>
                    <div class="alert alert-warning alert-dismissible mt-2">
                        <h6 class="text-white">Gagal</h6>
                        <p class="text-sm text-white mb-0">Anda gagal menambah data kategori</p>
                    </div>

                    <?php }else if($_GET['info'] == "hapus"){ ?>
                    <div class="alert alert-success alert-dismissible mt-2">
                        <h6 class="text-white">Berhasil</h6>
                        <p class="text-sm text-white mb-0">Anda berhasil menghapus data kategori</p>
                    </div>

                    <?php }else if($_GET['info'] == "editgagal"){ ?>
                      <div class="alert alert-warning alert-dismissible mt-2">
                        <h6 class="text-white">Gagal</h6>
                        <p class="text-sm text-white mb-0">Anda gagal mengubah data kategori</p>
                    </div>

                    <?php }else if($_GET['info'] == "edit"){ ?>
                      <div class="alert alert-success alert-dismissible mt-2">
                        <h6 class="text-white">Berhasil</h6>
                        <p class="text-sm text-white mb-0">Anda berhasil mengubah data kategori</p>
                    </div>
                                            
                    <?php }else if($_GET['info'] == "berhasil"){ ?>
                      <div class="alert alert-success alert-dismissible mt-2">
                        <h6 class="text-white">Berhasil</h6>
                        <p class="text-sm text-white mb-0">Anda berhasil menambah data kategori</p>
                    </div>
                    <?php } } ?>
      <div class="row mt-4">

        <div class="col-12">
          <div class="d-flex align-items-center">
            <div class="me-3">
              <a href="addkategori.php" class="btn btn-dark text-xs mb-0">Tambah Kategori</a>
            </div>
            <div class="dataTable-top me-3">
              <div class="dataTable-dropdown">
                <label> Show
                  <select class="dataTable-selector">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                  </select>
                  entries
                </label>
              </div>
            </div>
            <div class="ms-md-auto d-flex align-items-center">
              <div class="input-group input-group-outline bg-white">
                <input type="text" class="form-control" placeholder="Cari data kategori...">
                <button class="btn btn-transparent my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <div class="card mb-3 mt-2">
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-striped">
                  <thead style="background-color: #4154f1;">
                    <tr>
                      <th class="text-uppercase text-white text-xs font-weight-bolder">#</th>
                      <th class="text-uppercase text-white text-xs font-weight-bolder">ID Kategori</th>
                      <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Nama Kategori</th>
                      <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Jumlah Barang</th>
                      <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php
                        foreach ($data as $key => $dtkategori) {
                      ?>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 ms-3"><?= ++$key ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $dtkategori["id_kategori"]; ?></p>
                      </td>
                      <td>
                        <p class="align-middle text-center text-xs font-weight-bold mb-0"><?= $dtkategori["nama_kategori"]; ?></p>
                      </td>
                      <td>
                        <p class="align-middle text-center text-xs font-weight-bold mb-0"><?= $dtkategori["jumlah_barang"]; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex justify-content-center">
                          <a href="editkategori.php?id_kategori=<?= $dtkategori["id_kategori"]; ?>" class="btn btn-secondary text-xs mb-0 me-1">Edit</a>
                          <a href="hapuskategori.php?id_kategori=<?= $dtkategori["id_kategori"]; ?>" class="btn btn-danger text-xs mb-0" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="text-xs text-secondary font-weight-bold ms-4 mt-3">Showing 1 to 5 of 11 entries</p>
                  <nav aria-label="...">
                    <ul class="pagination me-4">
                      <li class="page-item disabled">
                        <a class="page-link text-xs text-secondary font-weight-bold me-3" href="#"
                          tabindex="-1">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link text-xs text-white font-weight-bold active"
                          href="#">1</a></li>
                      <li class="page-item">
                        <a class="page-link text-xs text-secondary font-weight-bold" href="#">2 <span
                            class="sr-only">(current)</span></a>
                      </li>
                      <li class="page-item"><a class="page-link text-xs text-secondary font-weight-bold" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link text-xs text-secondary font-weight-bold" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer py-4">
        <div class="row align-items-center">
          <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg">
              &copy2024 ElangKuy, All Rights Reserved.
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!-- JS File -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/chartjs.min.js"></script>
</body>

</html>