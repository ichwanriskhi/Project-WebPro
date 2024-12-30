<?php
include '../layout/mainsidebar.php';

include "../db_connect.php";

$penjual = $_SESSION['email'];

$sqlStatement = "SELECT barang.id_barang, barang.nama_barang, barang.harga_awal, barang.kondisi, barang.status, barang.id_penjual,
    kategori.nama_kategori 
    FROM barang 
    JOIN kategori ON barang.id_kategori = kategori.id_kategori
    JOIN user ON barang.id_penjual = user.email
    WHERE barang.id_penjual = '$penjual'";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

$dtdisetujui = "SELECT COUNT(*) as total FROM barang WHERE status = 'disetujui' AND id_penjual = '$penjual'";
$dtbelumdisetujui = "SELECT COUNT(*) as total FROM barang WHERE status = 'belum disetujui' AND id_penjual = '$penjual'";
$dtditolak = "SELECT COUNT(*) as total FROM barang WHERE status = 'ditolak' AND id_penjual = '$penjual'";

$disetujui = mysqli_query($conn, $dtdisetujui);
$belumdisetujui = mysqli_query($conn, $dtbelumdisetujui);
$ditolak = mysqli_query($conn, $dtditolak);

if ($disetujui && $belumdisetujui && $ditolak) {
    $datasetuju = mysqli_fetch_assoc($disetujui);
    $databelum = mysqli_fetch_assoc($belumdisetujui);
    $datatolak = mysqli_fetch_assoc($ditolak);
    
    $total_disetujui = $datasetuju['total'];
    $total_belumdisetujui = $databelum['total'];
    $total_ditolak = $datatolak['total'];
} else {
    // Penanganan jika query gagal
    $total_disetujui = 0;
    $total_belumdisetujui = 0;
    $total_ditolak = 0;
}

// Ambil nomor halaman dari parameter URL, default ke halaman 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Tentukan jumlah data per halaman
$limit = 5;

// Hitung offset
$offset = ($page - 1) * $limit;

// Query untuk menghitung total data
$totalQuery = "SELECT COUNT(*) as total FROM barang";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalData = $totalRow['total'];

// Hitung total halaman
$totalPages = ceil($totalData / $limit);
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg pt-3">
    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Barang</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-center mt-4">
            <h5 class="mb-3">Data Pengajuan Barang</h5>
            <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-header p-2 ps-3 d-flex justify-content-between">
                      <div class="">
                        <p class="text-sm mb-0 text-capitalize">belum disetujui</p>
                        <h4 class="mb-0 text-center "><?= $total_belumdisetujui ?></h4>
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
                        <p class="text-sm mb-0 text-capitalize">ditolak</p>
                        <h4 class="mb-0 text-center "><?= $total_ditolak ?></h4>
                      </div>
                      <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded opacity-10">cancel</i>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-header p-2 ps-3 d-flex justify-content-between">
                      <div class="">
                        <p class="text-sm mb-0 text-capitalize">disetujui</p>
                        <h4 class="mb-0 text-center "><?= $total_disetujui ?></h4>
                      </div>
                      <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded opacity-10">task</i>
                      </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="row mt-4">
  
            <div class="col-12">
            <h6 class="mb-2">Data Pengajuan</h6>
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <a href="addbarang.php" class="btn btn-dark text-xs mb-0">Ajukan Barang</a>
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
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-dark dropdown-toggle mb-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item" href="#">Semua</a></li>
                      <li><a class="dropdown-item" href="#">Disetujui</a></li>
                      <li><a class="dropdown-item" href="#">Belum Disetujui</a></li>
                      <li><a class="dropdown-item" href="#">Ditolak</a></li>
                    </ul>
                </div>
                <div class="ms-md-auto d-flex align-items-center">
                    <div class="input-group input-group-outline bg-white">
                      <input type="text" class="form-control" placeholder="Cari data barang...">
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
                          <th class="text-uppercase text-white text-xs font-weight-bolder">Nama Barang</th>
                          <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Kategori</th>
                          <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Jenis Barang</th>
                          <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Harga Awal</th>
                          <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Status</th>
                          <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <?php
                          foreach ($data as $key => $dtbrg) {
                        ?>
                          <td>
                            <p class="text-xs font-weight-bold mb-0 ms-3"><?= ++$key ?></p>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0"><?= $dtbrg["nama_barang"]; ?></p>
                          </td>
                          <td>
                            <p class="align-middle text-center text-xs font-weight-bold mb-0"><?= $dtbrg["nama_kategori"]; ?></p>
                          </td>
                          <td>
                            <p class="align-middle text-center text-xs font-weight-bold mb-0"><?= $dtbrg["kondisi"]; ?></p>
                          </td>
                          <td>
                            <p class="align-middle text-center text-xs font-weight-bold mb-0">Rp.<?= number_format($dtbrg["harga_awal"]) ?></p>
                          </td>
                          <td class="align-middle text-center text-sm">
                          <?php
                            // Contoh variabel status, ini biasanya berasal dari database
                            $status = $dtbrg["status"]; // Ubah ini sesuai status dari database

                            if ($status == "disetujui") {
                                echo '<span class="badge badge-sm bg-gradient-success" style="width: 113px;">Disetujui</span>';
                            } elseif ($status == "belum disetujui") {
                                echo '<span class="badge badge-sm bg-gradient-secondary" style="width: 113px;">Belum Disetujui</span>';
                            } elseif ($status == "ditolak") {
                                echo '<span class="badge badge-sm bg-gradient-danger" style="width: 113px;">Ditolak</span>';
                            } else {
                                echo '<span class="badge badge-sm bg-gradient-dark" style="width: 113px;">Status Tidak Diketahui</span>';
                            }
                            ?>
                          </td>
                          <td class="align-middle text-center">
                            <!-- <button class="btn btn-dark text-xs mb-0">Lihat Detail</button> -->
                            <?php
                              // Contoh variabel status, ini biasanya berasal dari database
                              $status = $dtbrg["status"]; // Ubah ini sesuai status dari database

                              if ($status == "disetujui") { ?>
                                  <a href="#" class="btn btn-dark text-xs mb-0">Lihat Detail</a>
                              <?php } ?> 
                              <?php if ($status == "belum disetujui") { ?>
                                <a href="delete.php?id_barang=<?= $dtbrg["id_barang"]; ?>" class="btn btn-danger text-xs mb-0" style="width: 95px;"  onclick="return confirm('Yakin ingin membatalkan pengajuan?')">Batal</a>
                            <?php } 
                            if ($status == "ditolak") { ?>
                                  <a href="editbarang.php?id_barang=<?= $dtbrg["id_barang"]; ?>" class="btn btn-secondary text-xs mb-0" style="width: 95px;">Edit</a>
                              <?php } ?> 
                          </td>
                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center">
                      <p class="text-xs text-secondary font-weight-bold ms-4 mt-3">
                        Showing <?= $offset + 1 ?> to <?= min($offset + $limit, $totalData) ?> of <?= $totalData ?> entries
                      </p>
                      <nav aria-label="...">
                        <ul class="pagination me-4">
                          <?php if ($page > 1): ?>
                            <li class="page-item">
                              <a class="page-link text-xs text-secondary font-weight-bold me-3" href="?page=<?= $page - 1 ?>">Previous</a>
                            </li>
                          <?php else: ?>
                            <li class="page-item disabled">
                              <a class="page-link text-xs text-secondary font-weight-bold me-3" href="#" tabindex="-1">Previous</a>
                            </li>
                          <?php endif; ?>

                          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                              <a class="page-link text-xs <?= $i == $page ? 'text-white font-weight-bold' : 'text-secondary font-weight-bold' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                          <?php endfor; ?>

                          <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                              <a class="page-link text-xs text-secondary font-weight-bold" href="?page=<?= $page + 1 ?>">Next</a>
                            </li>
                          <?php else: ?>
                            <li class="page-item disabled">
                              <a class="page-link text-xs text-secondary font-weight-bold" href="#" tabindex="-1">Next</a>
                            </li>
                          <?php endif; ?>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php
      include '../layout/mainfooter.php';
      ?>
  </main>

  <!-- JS File -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/chartjs.min.js"></script>

</body>

</html>