<?php
include '../layout/mainsidebar.php';
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg pt-3">
    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pesanan</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between mt-4">
            <h5 class="mb-3">Data Pesanan</h5>
            <div class="col-xl-2 col-sm-4 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-header p-2 ps-3 d-flex justify-content-between">
                      <div class="">
                        <p class="text-sm mb-0 text-capitalize">perlu diproses</p>
                        <h4 class="mb-0 text-center ">5</h4>
                      </div>
                      <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded opacity-10">list</i>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-sm-4 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-header p-2 ps-3 d-flex justify-content-between">
                      <div class="">
                        <p class="text-sm mb-0 text-capitalize">perlu dikirim</p>
                        <h4 class="mb-0 text-center ">5</h4>
                      </div>
                      <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded opacity-10">send</i>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-sm-4 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-header p-2 ps-3 d-flex justify-content-between">
                      <div class="">
                        <p class="text-sm mb-0 text-capitalize">selesai</p>
                        <h4 class="mb-0 text-center ">5</h4>
                      </div>
                      <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded opacity-10">done</i>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-sm-4 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-header p-2 ps-3 d-flex justify-content-between">
                      <div class="">
                        <p class="text-sm mb-0 text-capitalize">Ajuan Return</p>
                        <h4 class="mb-0 text-center ">5</h4>
                      </div>
                      <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded opacity-10">cycle</i>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-sm-4 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-header p-2 ps-3 d-flex justify-content-between">
                      <div class="">
                        <p class="text-sm mb-0 text-capitalize">Proses Return</p>
                        <h4 class="mb-0 text-center ">5</h4>
                      </div>
                      <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded opacity-10">update</i>
                      </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="row mt-4">
  
            <div class="col-12">
            <h6 class="mb-2">Data Pesanan</h6>
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <button class="btn btn-dark text-xs mb-0">Ajukan Barang</button>
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
                          <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Foto</th>
                          <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Status</th>
                          <th class="text-center text-uppercase text-white text-xs font-weight-bolder">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <p class="text-xs font-weight-bold mb-0 ms-3">1</p>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">Asus Vivobook 14</p>
                          </td>
                          <td>
                            <p class="align-middle text-center text-xs font-weight-bold mb-0">Elektronik</p>
                          </td>
                          <td>
                            <p class="align-middle text-center text-xs font-weight-bold mb-0">Bekas</p>
                          </td>
                          <td>
                            <p class="align-middle text-center text-xs font-weight-bold mb-0">Rp. 6.000.000</p>
                          </td>
                          <td class="align-middle text-center">
                            <button class="btn btn-dark text-xs mb-0">Lihat</button>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">Disetujui</span>
                          </td>
                          <td class="align-middle text-center">
                            <button class="btn btn-dark text-xs mb-0">Lihat Detail</button>
                          </td>
                        </tr>
                        <tr>
                            <td>
                              <p class="text-xs font-weight-bold mb-0 ms-3">1</p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">Asus Vivobook 14</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Elektronik</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Bekas</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Rp. 6.000.000</p>
                            </td>
                            <td class="align-middle text-center">
                              <button class="btn btn-dark text-xs mb-0">Lihat</button>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success">Disetujui</span>
                            </td>
                            <td class="align-middle text-center">
                              <button class="btn btn-dark text-xs mb-0">Lihat Detail</button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="text-xs font-weight-bold mb-0 ms-3">1</p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">Asus Vivobook 14</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Elektronik</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Bekas</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Rp. 6.000.000</p>
                            </td>
                            <td class="align-middle text-center">
                              <button class="btn btn-dark text-xs mb-0">Lihat</button>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success">Disetujui</span>
                            </td>
                            <td class="align-middle text-center">
                              <button class="btn btn-dark text-xs mb-0">Lihat Detail</button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="text-xs font-weight-bold mb-0 ms-3">1</p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">Asus Vivobook 14</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Elektronik</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Bekas</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Rp. 6.000.000</p>
                            </td>
                            <td class="align-middle text-center">
                              <button class="btn btn-dark text-xs mb-0">Lihat</button>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                            </td>
                            <td class="align-middle text-center">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="text-xs font-weight-bold mb-0 ms-3">1</p>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">Asus Vivobook 14</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Elektronik</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Bekas</p>
                            </td>
                            <td>
                              <p class="align-middle text-center text-xs font-weight-bold mb-0">Rp. 6.000.000</p>
                            </td>
                            <td class="align-middle text-center">
                              <button class="btn btn-dark text-xs mb-0">Lihat</button>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-secondary">Belum Disetujui</span>
                            </td>
                            <td class="align-middle text-center">
                            </td>
                          </tr>
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center">
                      <p class="text-xs text-secondary font-weight-bold ms-4 mt-3">Showing 1 to 5 of 11 entries</p>
                      <nav aria-label="...">
                        <ul class="pagination me-4">
                          <li class="page-item disabled">
                            <a class="page-link text-xs text-secondary font-weight-bold me-3" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link text-xs text-white font-weight-bold active" href="#">1</a></li>
                          <li class="page-item">
                            <a class="page-link text-xs text-secondary font-weight-bold" href="#">2 <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="page-item"><a class="page-link text-xs text-secondary font-weight-bold" href="#">3</a></li>
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
        <?php
      include '../layout/mainfooter.php';
      ?>
  </main>

  <!-- JS File -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/chartjs.min.js"></script>

</body>

</html>