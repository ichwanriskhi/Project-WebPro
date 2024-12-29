<?php
include '../layout/mainsidebar.php';
?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg px-0 pt-3">
        <div class="container-fluid py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="index.html">Beranda</a>
                    </li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                            href="aktivitas.html">Aktivitas</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Transaksi</li>
                </ol>
            </nav>
            <div class="row mt-3">
                <div class="col-md-5 gallery">
                    <img id="mainImage" alt="iPhone 14 Plus 256GB Blue" class="img-fluid main-gall"
                        src="https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/a5e3653c-56a7-4b32-9986-ca0019306c50.jpg" />
                </div>
                <div class="col-md-7">
                    <h5 class="h5 fw-bolder"> iPhone 14 Plus 256GB Blue </h5>
                    <div class="category-product d-flex mt-3">
                        <p class="text-sm me-5">Elektronik</p>
                        <p class="text-sm me-5">Telkom University Bandung</p>
                        <p class="text-sm">Baru</p>
                    </div>
                    <div class="desc py-3">
                        <p class="text-sm">
                            Apple iPhone 14 SECOND ORIGINAL iPhone 14 Plus 256GB BEKAS MULUS FULLSETPhone 14. Dengan
                            sistem kamera ganda
                            paling hebat di iPhone. Ambil foto yang memukau dalam pencahayaan rendah maupun terang.
                            Deteksi Tabrakan,
                            sebuah fitur keselamatan baru, memanggil bantuan saat Anda tak bisa. <br> <br>
                            Poin-poin fitur utama : <br>
                            * Layar Super Retina XDR 6,1 inci <br>
                            * Sistem kamera canggih untuk foto yang lebih baik dalam berbagai kondisi pencahayaan <br>
                            * Mode Sinematik kini dalam Dolby Vision 4K pada kecepatan hingga 30 fps <br>
                            * Mode Aksi untuk video handheld yang stabil <br>
                            * Fitur keselamatan penting, —Deteksi Tabrakan memanggil bantuan saat Anda tak bisa <br>
                            * Kekuatan baterai sepanjang hari dan pemutaran video hingga 20 jam <br>
                            * Chip A15 Bionic dengan GPU 5-core untuk performa secepat kilat. Seluler 5G super cepat
                            <br>
                            * Fitur ketahanan terdepan di industri dengan Ceramic Shield dan tahan air <br>
                            * iOS 16 menawarkan semakin banyak cara untuk personalisasi, komunikasi, dan berbagi <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 mt-4">
                    <h6>Ringkasan Pesanan</h6>
                    <div class="card py-4 px-5">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-xs text-bold">Subtotal</span>
                            <span class="text-xs">Rp. 12.000.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-xs text-bold">Uang Muka</span>
                            <span class="text-xs">Rp. 1.200.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-xs text-bold">Biaya Layanan</span>
                            <span class="text-xs">Rp. 1.500</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-xs text-bold">Total</span>
                            <span class="text-xs">Rp. 10.801.500</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-4">
                    <h6>Status Pembayaran</h6>
                    <div class="card py-3 px-5">
                        <div class="d-flex justify-content-between">
                            <span class="text-xs ">Belum Dibayar</span>
                            <button class="btn btn-dark text-xs fw-light">Bayar Sekarang</button>
                        </div>
                        <span class="text-xs">*Batas waktu pembayaran adalah 1 x 24 jam, jika lebih dari itu pesanan akan dibatalkan</span>
                        <span class="h6 mt-2">23 Jam : 59 Menit : 58 Detik</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="d-flex align-items-center">
                            <i class="material-symbols-rounded opacity-5">chat</i> 
                            <a href="" class="text-sm ms-2">Chat Penjual</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="material-symbols-rounded opacity-5">help</i> 
                            <a href="" class="text-sm ms-2">Bantuan/FAQ</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="material-symbols-rounded opacity-5">edit</i> 
                            <a href="" class="text-sm ms-2"  data-bs-toggle="modal" data-bs-target="#ulasan">Tulis Ulasan</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="material-symbols-rounded opacity-5">cycle</i> 
                            <a href="" class="text-sm ms-2">Ajukan Pengembalian</a>
                        </div>
                    </div>
                    <!-- Modal Ulasan -->
                    <div class="modal fade" id="ulasan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                                <h6 class="text-center">Tulis Ulasan</h6>
                                <div class="d-flex align-items-center my-3 mx-5">
                                    <img src="https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/24/a5e3653c-56a7-4b32-9986-ca0019306c50.jpg" alt="barang1" 
                                    style="
                                    width: 150px;
                                    height: 150px;
                                    object-fit: cover;
                                    border-radius: 5px;
                                    border: 1px solid #ced4da;">
                                    <div class="ms-5">
                                        <p class="text-sm text-bold">Iphone 14 Plus 256</p>
                                        <div class="rating d-flex justify-content-between mt-5">
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                        </div>
                                        <p class="text-sm mt-3">*Ulas Barang Ini</p>
                                    </div>
                                </div>
                                <div class="mx-5 mb-3">
                                    <form action="">
                                        <p class="text-sm text-bold">Tulis Ulasan</p>
                                        <textarea class="form-control ps-3 bg-gray-100" name="ulasan" id="" rows="7" placeholder="Ketik disini"></textarea>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-secondary text-sm fw-light w-20" data-bs-dismiss="modal">Kembali</button>
                                    <button class="btn btn-dark text-sm ms-3 fw-light w-20">Kirim</button>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-lg-12 mt-4">
                    <h6>Perincian Lelang</h6>
                    <div class="card py-4 px-5">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-xs text text-bold">Nomor Lelang</span>
                            <span class="text-xs text">00987</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-xs text text-bold">Tanggal Lelang</span>
                            <span class="text-xs text">22 Desember 2024 09:54:32</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-xs text text-bold">Metode Pembayaran</span>
                            <span class="text-xs text">Belum Dibayar</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-xs text text-bold">Tanggal Pembayaran</span>
                            <span class="text-xs text">Belum Dibayar</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                    <h6>Jadwal Temu</h6>
                    <div class="card py-4 px-5 d-flex justify-content-between">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-5 d-flex justify-content-between">
                                <span class="text-xs text-bold">Waktu Temu</span>
                                <span class="text-xs">Belum Ditentukan</span>
                            </div>
                            <div class="col-md-5 d-flex justify-content-between">
                                <span class="text-xs text-bold">Lokasi Temu</span>
                                <span class="text-xs">Belum Ditentukan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" class="text-center mt-4">
                    <button class="btn btn-dark text-xs">Konfirmasi Selesai</button>
                </form>
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