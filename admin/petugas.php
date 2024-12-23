<?php 
include "../layout/mainsidebar.php";
include "../db_connect.php";

// Mengambil data barang dari tabel user
$sqlStatement = "SELECT 
        user.email, 
        user.nama, 
        user.telepon, 
        COUNT(lelang.id_petugas) AS jumlah_disetujui
    FROM 
        user
    LEFT JOIN 
        lelang
    ON 
        user.email = lelang.id_petugas
    WHERE 
        user.role = 'petugas'
    GROUP BY 
        user.email, user.nama, user.telepon";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg pt-3">
        <div class="container-fluid py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kategori Barang</li>
                </ol>
            </nav>
            <h5 class="mb-3 mt-4">Data Petugas</h5>
            <div class="row">
                <div class="col-12">
                <?php 
      if(isset($_GET['info'])){
                    if($_GET['info'] == "gagal"){ ?>
                    <div class="alert alert-warning alert-dismissible mt-2">
                        <h6 class="text-white">Gagal</h6>
                        <p class="text-sm text-white mb-0">Anda gagal menambah data petugas</p>
                    </div>

                    <?php }else if($_GET['info'] == "hapus"){ ?>
                    <div class="alert alert-success alert-dismissible mt-2">
                        <h6 class="text-white">Berhasil</h6>
                        <p class="text-sm text-white mb-0">Anda berhasil menghapus data petugas</p>
                    </div>

                    <?php }else if($_GET['info'] == "editgagal"){ ?>
                      <div class="alert alert-warning alert-dismissible mt-2">
                        <h6 class="text-white">Gagal</h6>
                        <p class="text-sm text-white mb-0">Anda gagal mengubah data petugas</p>
                    </div>

                    <?php }else if($_GET['info'] == "edit"){ ?>
                      <div class="alert alert-success alert-dismissible mt-2">
                        <h6 class="text-white">Berhasil</h6>
                        <p class="text-sm text-white mb-0">Anda berhasil mengubah data petugas</p>
                    </div>
                                            
                    <?php }else if($_GET['info'] == "berhasil"){ ?>
                      <div class="alert alert-success alert-dismissible mt-2">
                        <h6 class="text-white">Berhasil</h6>
                        <p class="text-sm text-white mb-0">Anda berhasil menambah data petugas</p>
                    </div>
                    <?php } } ?>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <a href="addpetugas.php" class="btn btn-dark text-xs mb-0">Tambah Petugas</a>
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
                                <button class="btn btn-transparent my-2 my-sm-0" type="submit"><i
                                        class="fas fa-search"></i></button>
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
                                            <th class="text-uppercase text-white text-xs font-weight-bolder">Email Petugas
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Nama Petugas</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Telepon</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Jumlah Barang Disetujui</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php
                                            foreach ($data as $key => $dtpetugas) {
                                            ?>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ms-3"><?= ++$key ?></p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?= $dtpetugas["email"]; ?></p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                <?= $dtpetugas["nama"]; ?></p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                <?= $dtpetugas["telepon"]; ?></p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0"><?= $dtpetugas["jumlah_disetujui"]; ?></p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="editpetugas.php?email=<?= $dtpetugas["email"]; ?>" class="btn btn-secondary text-xs mb-0 me-1">Edit</a>
                                                    <a href="hapuspetugas.php?email=<?= $dtpetugas["email"]; ?>" class="btn btn-danger text-xs mb-0" onclick="return confirm('Yakin ingin menghapus petugas ini?')">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-xs text-secondary font-weight-bold ms-4 mt-3">Showing 1 to 5 of 11
                                        entries</p>
                                    <nav aria-label="...">
                                        <ul class="pagination me-4">
                                            <li class="page-item disabled">
                                                <a class="page-link text-xs text-secondary font-weight-bold me-3"
                                                    href="#" tabindex="-1">Previous</a>
                                            </li>
                                            <li class="page-item"><a
                                                    class="page-link text-xs text-white font-weight-bold active"
                                                    href="#">1</a></li>
                                            <li class="page-item">
                                                <a class="page-link text-xs text-secondary font-weight-bold" href="#">2
                                                    <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="page-item"><a
                                                    class="page-link text-xs text-secondary font-weight-bold"
                                                    href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link text-xs text-secondary font-weight-bold"
                                                    href="#">Next</a>
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