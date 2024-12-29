<?php 
include "../layout/mainsidebar.php";

include "../db_connect.php";

$id_lelang = $_GET['id_lelang'];
// Query untuk mengambil data barang dan kategori, termasuk kondisi dan lokasi
$sqlStatement = "SELECT 
                    lelang.id_lelang,
                    barang.id_barang, 
                    barang.nama_barang, 
                    kategori.nama_kategori, 
                    barang.harga_awal, 
                    barang.foto, 
                    barang.kondisi, 
                    barang.deskripsi,
                    barang.lokasi,
                    penjual.nama AS nama_penjual,
                    pembeli.nama AS nama_penawar
                FROM barang 
                JOIN kategori ON barang.id_kategori = kategori.id_kategori
                JOIN user AS penjual ON barang.id_penjual = penjual.email
                JOIN lelang ON barang.id_barang = lelang.id_barang
                LEFT JOIN penawaran ON penawaran.id_lelang = lelang.id_lelang
                LEFT JOIN user AS pembeli ON penawaran.id_pembeli = pembeli.email
                WHERE lelang.id_lelang = $id_lelang";

$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_assoc($query);

if ($data) {
    // Variabel untuk mempermudah
    $idBarang = $data['id_barang'];
    $namaBarang = $data['nama_barang'];
    $namaKategori = $data['nama_kategori'];
    $hargaAwal = $data['harga_awal'];
    $kondisi = $data['kondisi'];
    $lokasi = $data['lokasi'];
    $deskripsi = $data['deskripsi'];
    $penjual = $data['nama_penjual'];
    $pembeli = $data['nama_penawar'];

    // Menyesuaikan nama lokasi berdasarkan nilai lokasi dari database
    switch (strtolower(trim($lokasi))) {
        case 'bandung':
            $lokasiTampil = 'Telkom University Bandung';
            break;
        case 'surabaya':
            $lokasiTampil = 'Telkom University Surabaya';
            break;
        case 'jakarta':
            $lokasiTampil = 'Telkom University Jakarta';
            break;
        default:
            $lokasiTampil = $lokasi; // Jika lokasi tidak cocok, tampilkan lokasi asli
            break;
    }
} else {
    echo "Data tidak ditemukan.";
    exit;
}

// Query untuk mendapatkan tawaran tertinggi
$sqlTawaranTertinggi = "SELECT MAX(penawaran_harga) AS tawaran_tertinggi 
                        FROM penawaran 
                        WHERE id_barang = $idBarang";

$queryTawaran = mysqli_query($conn, $sqlTawaranTertinggi);
$rowTawaran = mysqli_fetch_assoc($queryTawaran);

$tawaranTertinggi = $rowTawaran['tawaran_tertinggi'] ?? 0; // Jika tidak ada data, gunakan 0 sebagai default
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
                <?php
                $sqlStatement = "SELECT foto FROM barang
                WHERE  id_barang = $idBarang";
                $query = mysqli_query($conn, $sqlStatement);
                $dataft = mysqli_fetch_assoc($query);
                    // Ambil data foto dari tabel barang (dalam format string, misalnya: "foto1.jpg,foto2.jpg,...")
                    $foto = $dataft['foto']; 
                    $fotoArray = explode(',', $foto); // Pecah string menjadi array
                    $fotoCount = count($fotoArray); // Hitung jumlah foto
                
                    // Ambil foto utama untuk ditampilkan sebagai gambar utama
                    $mainImage = trim($fotoArray[0]); // Mengambil foto pertama
                ?>
                    <div class="col-md-5 gallery">
                    <img id="mainImage" alt="<?= $dtbrg['nama_barang'] ?>" class="img-fluid main-gall"
                    src="../assets/img/uploaded/<?= $mainImage ?>" />
                    <div class="d-flex mt-2 justify-content-between" id="thumbnailContainer" style="margin-right: 75px;">
                    <?php foreach ($fotoArray as $image) { 
                        $image = trim($image); // Hapus spasi berlebih
                        ?>
                        <div class="thumbnail" onclick="changeImage('../assets/img/uploaded/<?= $image ?>')">
                            <img alt="Thumbnail" class="thumb" src="../assets/img/uploaded/<?= $image ?>" />
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-7">
                    <h5 class="h5 fw-bolder"> <?=$namaBarang?></h5>
                    <div class="category-product d-flex mt-3">
                        <p class="text-sm me-5"><?=$namaKategori?></p>
                        <p class="text-sm me-5"><?=$lokasiTampil?></p>
                        <p class="text-sm text-capitalize"><?=$kondisi?></p>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold text-dark ms-0" for="harga_awal">Harga Awal</label>
                            <input class="form-control bg-white ps-3 text-md fw-bold" id="nominalTawaran" type="text"
                                value="Rp. <?= number_format($hargaAwal) ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-sm fw-bold text-dark ms-0" for="tawaran_tertinggi">Tawaran
                                Tertinggi</label>
                            <input class="form-control bg-white ps-3 text-md fw-bold" id="nominalTawaran" type="text"
                                value="Rp. <?= number_format($tawaranTertinggi) ?>" disabled>
                        </div>
                    </div>
                    <form class="mt-3">
                        <div class="mb-3">
                            <label class="form-label text-sm fw-bold text-dark ms-0" for="penawartertinggi">Penawar
                                Tertinggi</label>
                            <input class="form-control bg-white ps-3 text-md fw-bold" id="penawartertinggi"
                                name="penawartertinggi" placeholder="Silakan masukkan tawaran anda..." type="text"
                                value="<?=$pembeli?>" disabled>
                        </div>
                        <button class="btn btn-dark w-100" type="submit">Akhiri Lelang</button>
                    </form>
                    <h6 class="mt-4">Profil Penjual</h6>
                    <div class="prof-penjual d-flex justify-content-between p-3 bg-white border-radius-md">
                        <div class="d-flex align-items-center">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="rounded-circle" alt="Profil Penjual" style="width: 50px; height: 50px;">
                            <p class="text-md ms-3 mt-3"><?=$penjual?></p>
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
                        <?= nl2br(htmlspecialchars($deskripsi)) ?>
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
                                <?php
                                $sqltawar = "SELECT penawaran.id_penawaran, penawaran.id_lelang, penawaran.penawaran_harga, penawaran.id_pembeli, penawaran.waktu, user.nama
                                                FROM penawaran
                                                JOIN user ON penawaran.id_pembeli = user.email
                                                WHERE penawaran.id_lelang = $id_lelang";
                                
                                $query = mysqli_query($conn, $sqltawar);
                                $datapenawaran = mysqli_fetch_assoc($query);
                                ?>
                                    <tr>
                                        <?php
                                       foreach ($datapenawaran as $dttawar) {
                                        ?>
                                        <td class="py-3">
                                            <p class="text-xs font-weight-bold mb-0 ms-3"></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $dttawar['nama'] ?></p>
                                        </td>
                                        <td>
                                            <p class="align-middle text-center text-xs font-weight-bold mb-0">Rp.
                                            <?= $dttawar['penawaran_harga'] ?></p>
                                        </td>
                                        <td>
                                            <p class="align-middle text-center text-xs font-weight-bold mb-0"><?= $dttawar['waktu'] ?></p>
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