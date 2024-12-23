<?php 
include "../layout/mainsidebar.php";

include '../db_connect.php';
?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg px-0 pt-3">
        <div class="container-fluid py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a>
                    </li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Data
                            Lelang</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Lelang</li>
                </ol>
            </nav>
            <div class="row mt-3">
                <div class="col-md-5 gallery">
                    <img id="mainImage" alt="iPhone 14 Plus 256GB Blue" class="img-fluid main-gall"
                        src="https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/a5e3653c-56a7-4b32-9986-ca0019306c50.jpg" />
                    <div class="d-flex mt-2 justify-content-between" style="margin-right: 75px;">
                        <div class="thumbnail"
                            onclick="changeImage('https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/a5e3653c-56a7-4b32-9986-ca0019306c50.jpg')">
                            <img alt="Thumbnail 1" class="thumb"
                                src="https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/a5e3653c-56a7-4b32-9986-ca0019306c50.jpg">
                        </div>
                        <div class="thumbnail"
                            onclick="changeImage('https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/246bc7fd-8ddb-42f5-95ff-730d71c89a8d.jpg')">
                            <img alt="Thumbnail 2" class="thumb"
                                src="https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/246bc7fd-8ddb-42f5-95ff-730d71c89a8d.jpg" />
                        </div>
                        <div class="thumbnail"
                            onclick="changeImage('https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/c9a0bf40-59d9-4080-9dfd-107e7a08add1.jpg')">
                            <img alt="Thumbnail 3" class="thumb"
                                src="https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/c9a0bf40-59d9-4080-9dfd-107e7a08add1.jpg" />
                        </div>
                        <div class="thumbnail"
                            onclick="changeImage('https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/fde4d507-5ebd-4492-b60e-d7aa5774a735.jpg')">
                            <img alt="Thumbnail 4" class="thumb"
                                src="https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/fde4d507-5ebd-4492-b60e-d7aa5774a735.jpg" />
                        </div>
                        <div class="thumbnail"
                            onclick="changeImage('https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/ba5a7e1c-3bdc-420e-bf9e-f474d7fe365f.jpg')">
                            <img alt="Thumbnail 5" class="thumb"
                                src="https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/ba5a7e1c-3bdc-420e-bf9e-f474d7fe365f.jpg" />
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h5 class="h5 fw-bolder"> iPhone 14 Plus 256GB Blue </h5>
                    <div class="category-product d-flex mt-3">
                        <p class="text-sm me-5">Elektronik</p>
                        <p class="text-sm me-5">Telkom University Bandung</p>
                        <p class="text-sm">Baru</p>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold text-dark ms-0" for="harga_awal">Harga Awal</label>
                            <input class="form-control bg-white ps-3 text-md fw-bold" id="nominalTawaran" type="text"
                                value="Rp. 11.000.000" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold text-dark ms-0" for="tawaran_tertinggi">Tawaran
                                Tertinggi</label>
                            <input class="form-control bg-white ps-3 text-md fw-bold" id="nominalTawaran" type="text"
                                value="Rp. 11.500.000" disabled>
                        </div>
                    </div>
                    <form class="mt-3">
                        <div class="mb-3">
                            <label class="form-label text-sm fw-bold text-dark ms-0" for="penawartertinggi">Penawar
                                Tertinggi</label>
                            <input class="form-control bg-white ps-3 text-md fw-bold" id="penawartertinggi"
                                name="penawartertinggi" placeholder="Silakan masukkan tawaran anda..." type="text"
                                value="Alexandre Christie" disabled>
                        </div>
                        <button class="btn btn-dark w-100" type="submit">Akhiri Lelang</button>
                    </form>
                    <h6 class="mt-4">Profil Penjual</h6>
                    <div class="prof-penjual d-flex justify-content-between p-3 bg-white border-radius-md">
                        <div class="d-flex align-items-center">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="rounded-circle" alt="Profil Penjual" style="width: 50px; height: 50px;">
                            <p class="text-md ms-3 mt-3">Dewangga Saputra Pidieanto</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <i class="fas fa-star star"></i>
                            <p class="mb-0 ms-3 bg-dark-blue text-white px-2 border-radius-xl">5.0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4">
                <h6>Deskripsi Barang</h6>
                <div class="desc card py-3 px-4">
                    <p class="text-sm">
                        Apple iPhone 14 SECOND ORIGINAL iPhone 14 Plus 256GB BEKAS MULUS FULLSETPhone 14. Dengan sistem
                        kamera ganda
                        paling hebat di iPhone. Ambil foto yang memukau dalam pencahayaan rendah maupun terang. Deteksi
                        Tabrakan,
                        sebuah fitur keselamatan baru, memanggil bantuan saat Anda tak bisa. <br> <br>
                        Poin-poin fitur utama : <br>
                        * Layar Super Retina XDR 6,1 inci <br>
                        * Sistem kamera canggih untuk foto yang lebih baik dalam berbagai kondisi pencahayaan <br>
                        * Mode Sinematik kini dalam Dolby Vision 4K pada kecepatan hingga 30 fps <br>
                        * Mode Aksi untuk video handheld yang stabil <br>
                        * Fitur keselamatan penting, —Deteksi Tabrakan memanggil bantuan saat Anda tak bisa <br>
                        * Kekuatan baterai sepanjang hari dan pemutaran video hingga 20 jam <br>
                        * Chip A15 Bionic dengan GPU 5-core untuk performa secepat kilat. Seluler 5G super cepat <br>
                        * Fitur ketahanan terdepan di industri dengan Ceramic Shield dan tahan air <br>
                        * iOS 16 menawarkan semakin banyak cara untuk personalisasi, komunikasi, dan berbagi <br>
                    </p>
                </div>
                <h6 class="mt-4">Rincian Penawaran Barang</h6>
                <div class="card mb-3 mt-2">
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 table-striped">
                                <thead style="background-color: #4154f1;">
                                    <tr>
                                        <th class="text-uppercase text-white text-xs font-weight-bolder">#</th>
                                        <th class="text-uppercase text-white text-xs font-weight-bolder">Nama</th>
                                        <th class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                            Nominal Tawaran</th>
                                        <th class="text-center text-uppercase text-white text-xs font-weight-bolder">
                                            Waktu Penawaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3">
                                            <p class="text-xs font-weight-bold mb-0 ms-3">1</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">Jonathan</p>
                                        </td>
                                        <td>
                                            <p class="align-middle text-center text-xs font-weight-bold mb-0">Rp.
                                                12.000.000</p>
                                        </td>
                                        <td>
                                            <p class="align-middle text-center text-xs font-weight-bold mb-0">29 Januari
                                                2024 09:54:32</p>
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
                                            <a class="page-link text-xs text-secondary font-weight-bold me-3" href="#"
                                                tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item"><a
                                                class="page-link text-xs text-white font-weight-bold active"
                                                href="#">1</a></li>
                                        <li class="page-item">
                                            <a class="page-link text-xs text-secondary font-weight-bold" href="#">2
                                                <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a
                                                class="page-link text-xs text-secondary font-weight-bold" href="#">3</a>
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
    <script src="../assets/js/chart.js"></script>
    <script>
        function changeImage(imageUrl) {
            document.getElementById('mainImage').src = imageUrl; // Mengubah src gambar besar
        }
    </script>

</body>

</html>