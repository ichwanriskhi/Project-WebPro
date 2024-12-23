<?php 
include "../layout/mainsidebar.php";

?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg pt-3">
        <div class="container-fluid py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Aktivitas</li>
                </ol>
            </nav>
            <div class="row d-flex justify-content-center mt-4">
                <h5 class="mb-3">Data Pengguna</h5>
                <div class="col-xl-6 col-sm-4 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3 d-flex justify-content-between">
                            <div class="">
                                <p class="text-sm mb-0 text-capitalize">Pembeli</p>
                                <h4 class="mb-0 text-center ">5</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">shop</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-4 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3 d-flex justify-content-between">
                            <div class="">
                                <p class="text-sm mb-0 text-capitalize">Penjual</p>
                                <h4 class="mb-0 text-center ">5</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">store</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <div class="tabs mb-0">
                            <button class="btn tab-btn btn-dark" onclick="showTab('pembeli')">Pembeli</button>
                            <button class="btn tab-btn btn-transparent" onclick="showTab('penjual')">Penjual</button>
                        </div>
                        <div class="ms-md-auto d-flex align-items-center">
                            <div class="input-group input-group-outline bg-white">
                                <input type="text" class="form-control" placeholder="Cari data barang...">
                                <button class="btn btn-transparent my-2 my-sm-0" type="submit"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="pembeli" class="card mb-3 tab-content active">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 table-striped">
                                    <thead style="background-color: #4154f1;">
                                        <tr>
                                            <th class="text-uppercase text-white text-xs font-weight-bolder">#</th>
                                            <th class="text-uppercase text-white text-xs font-weight-bolder">Email</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Nama</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Telepon</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Bank</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Nomor Rekening</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Lelang Diikuti</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Lelang Dimenangkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="py-3">
                                                <p class="text-xs font-weight-bold mb-0 ms-3">1</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">anastasyaputri@gmail.com</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    Anastasya Putri</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    087654356789</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">BNI
                                                </p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    787490234</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">7</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">3</p>
                                            </td>
                                        </tr>
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
                    <div id="penjual" class="card mb-3 tab-content">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 table-striped">
                                    <thead style="background-color: #4154f1;">
                                        <tr>
                                            <th class="text-uppercase text-white text-xs font-weight-bolder">#</th>
                                            <th class="text-uppercase text-white text-xs font-weight-bolder">Email</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Nama</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Telepon</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Bank</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Nomor Rekening</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Lelang Aktif</th>
                                            <th
                                                class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                                Lelang Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="py-3">
                                                <p class="text-xs font-weight-bold mb-0 ms-3">1</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">anastasyaputri@gmail.com</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    Anastasya Putri</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    087654356789</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">BNI
                                                </p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    787490234</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">7</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">3</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-3">
                                                <p class="text-xs font-weight-bold mb-0 ms-3">1</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">anastasyaputri@gmail.com</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    Anastasya Putri</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    087654356789</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">BNI
                                                </p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    787490234</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">7</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">3</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-3">
                                                <p class="text-xs font-weight-bold mb-0 ms-3">1</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">anastasyaputri@gmail.com</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    Anastasya Putri</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    087654356789</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">BNI
                                                </p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">
                                                    787490234</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">7</p>
                                            </td>
                                            <td>
                                                <p class="align-middle text-center text-xs font-weight-bold mb-0">3</p>
                                            </td>
                                        </tr>
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
    <script>
        function showTab(tabId) {
          // Sembunyikan semua tab
          const tabContents = document.querySelectorAll('.tab-content');
          tabContents.forEach(content => content.classList.remove('active'));
    
          // Hapus kelas btn-dark dari semua tombol
          const tabButtons = document.querySelectorAll('.tab-btn');
          tabButtons.forEach(btn => btn.classList.remove('btn-dark'));
          tabButtons.forEach(btn => btn.classList.add('btn-transparent')); // Pastikan tombol lain memiliki gaya "non aktif"
    
          // Tampilkan tab yang dipilih
          document.getElementById(tabId).classList.add('active');
    
          // Tambahkan kelas btn-dark ke tombol yang diklik
          event.target.classList.remove('btn-transparent');
          event.target.classList.add('btn-dark');
        }
      </script>
</body>

</html>