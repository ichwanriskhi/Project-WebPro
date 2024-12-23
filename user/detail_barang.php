<?php
include '../layout/mainsidebar.php';

include "../db_connect.php";

$id_barang = $_GET['id_barang'];
// Query untuk mengambil data barang dan kategori, termasuk kondisi dan lokasi
$sqlStatement = "SELECT 
                    barang.id_barang, 
                    barang.nama_barang, 
                    kategori.nama_kategori, 
                    barang.harga_awal, 
                    barang.foto, 
                    barang.kondisi, 
                    barang.deskripsi,
                    barang.lokasi,
                    user.nama,
                    lelang.id_lelang
                 FROM barang 
                 JOIN kategori ON barang.id_kategori = kategori.id_kategori
                 JOIN user ON barang.id_penjual = user.email
                 JOIN lelang ON barang.id_barang = lelang.id_barang
                 WHERE barang.id_barang = $id_barang";

$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_assoc($query);

if ($data) {
    // Variabel untuk mempermudah
    $namaBarang = $data['nama_barang'];
    $namaKategori = $data['nama_kategori'];
    $hargaAwal = $data['harga_awal'];
    $kondisi = $data['kondisi'];
    $lokasi = $data['lokasi'];
    $deskripsi = $data['deskripsi'];
    $penjual = $data['nama'];
    $id_lelang = $data['id_lelang'];

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
                        WHERE id_barang = $id_barang";

$queryTawaran = mysqli_query($conn, $sqlTawaranTertinggi);
$rowTawaran = mysqli_fetch_assoc($queryTawaran);

$tawaranTertinggi = $rowTawaran['tawaran_tertinggi'] ?? 0; // Jika tidak ada data, gunakan 0 sebagai default

// Query untuk memeriksa apakah email ada di penawaran untuk barang dan lelang tertentu
$emailPengguna = $_SESSION['email'];
$sqlCheckPenawaran = "SELECT COUNT(*) AS total 
                      FROM penawaran 
                      WHERE id_pembeli = '$emailPengguna' 
                      AND id_barang = $id_barang 
                      AND id_lelang = $id_lelang";

$queryCheck = mysqli_query($conn, $sqlCheckPenawaran);
$resultCheck = mysqli_fetch_assoc($queryCheck);

$disabled = ($resultCheck['total'] > 0) ? 'disabled' : ''; // Jika ada, form akan disabled
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg px-0 pt-3">
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="index.html">Beranda</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Barang</li>
        </ol>
      </nav>
      <div class="row mt-3">
      <?php
            $sqlStatement = "SELECT foto FROM barang
            WHERE  id_barang = $id_barang";
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
          <h5 class="h5 fw-bolder"> <?= $namaBarang ?> </h5>
          <div class="category-product d-flex mt-3">
            <p class="text-sm me-5"><?= $namaKategori ?></p>
            <p class="text-sm me-5"><?= $lokasiTampil ?></p>
            <p class="text-sm text-capitalize"><?= $kondisi ?></p>
          </div>
          <div class="row d-flex justify-content-between">
            <div class="col-md-6">
              <label class="form-label text-sm fw-bold text-dark ms-0" for="harga_awal">Harga Awal</label>
              <input class="form-control bg-white ps-3 text-md fw-bold" id="nominalTawaran" type="text"
                value="Rp. <?= number_format($hargaAwal) ?>" disabled>
            </div>
            <div class="col-md-6">
              <label class="form-label text-sm fw-bold text-dark ms-0" for="tawaran_tertinggi">Tawaran Tertinggi</label>
              <input class="form-control bg-white ps-3 text-md fw-bold" id="nominalTawaran" type="text"
                value="Rp. <?= number_format($tawaranTertinggi) ?>" disabled>
            </div>
          </div>
          <form action="addpenawaran.php" method="POST" class="mt-3">
            <div class="mb-3">
                <input type="number" name="id_lelang" value="<?= $id_lelang ?>" hidden>
                <input type="number" name="id_barang" value="<?= $id_barang ?>" hidden>
                <label class="form-label text-sm fw-bold text-dark ms-0" for="penawaran_harga">Nominal Tawaran</label>
                <input class="form-control bg-white ps-3 text-md text-sm" id="penawaran_harga" name="penawaran_harga"
                placeholder="Silakan masukkan tawaran anda..." type="text" style="padding: 0.7rem;" oninput="updateUangMuka()" <?= $disabled ?> required>
            </div>
            <div class="mb-3">
                <label class="form-label text-sm fw-bold text-dark ms-0" for="uangmuka">Uang Muka</label>
                <input class="form-control bg-white ps-3 text-md text-sm" id="uangmuka" name="uangmuka"
                placeholder="Minimal 10% dari nominal tawaran yang diajukan" type="text" style="padding: 0.7rem;" oninput="validateUangMuka()" <?= $disabled ?> required>
            </div>
            <button class="btn btn-dark w-100" type="submit">Ikuti Lelang</button>
        </form>
          <p class="text-md text-bold">Dari Penjual Ini:</p>
          <div class="row">
            <div class="col d-flex justify-content-between align-items-center">
              <div>
                <span class="text-sm text-bold">Barang Terlelang: </span>
                <span class="text-sm text-bold">14</span>
              </div>
              <div>
                <i class="ms-4 fas fa-star star" style="font-size: 25px;"></i>
                <span class="h5">4.9</span>
                <span class="rating-scale">/5.0</span>
              </div>
              <span class="ms-4 text-sm text-bold">98% pembeli merasa puas</span>
            </div>
          </div>
          <!-- <div class="rating-container justify-content-between">
            <span class="text-sm text-bold">Barang Terjual</span>
            <span class="text-sm text-bold">14</span>
            <i class="ms-4 fas fa-star star" style="font-size: 25px;"></i>
            <span class="h5">4.9</span>
            <span class="rating-scale">/5.0</span>
            <span class="ms-4 text-sm text-bold">98% pembeli merasa puas</span>
            <span class="ms-4 text-sm">30 rating</span>
            <span><i class="fas fa-circle mx-2" style="font-size: 5px; vertical-align: middle;"></i></span>
            <span class="text-sm">10 ulasan</span>
          </div> -->
        </div>
      </div>
      <div class="col-lg-12 mt-4">
        <h6>Deskripsi Barang</h6>
        <div class="desc card py-3 px-4">
          <p class="text-sm">
            <?= nl2br(htmlspecialchars($deskripsi)) ?>
          </p>
        </div>
        <h6 class="mt-4">Profil Penjual</h6>
        <div class="prof-penjual d-flex justify-content-between p-3 bg-white border-radius-md">
          <div class="d-flex align-items-center">
            <img
              src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              class="rounded-circle" alt="Profil Penjual" style="width: 50px; height: 50px;">
            <p class="text-md ms-3 mt-3"><?= $penjual ?></p>
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
        <h6 class="mt-4">Ulasan Terbaru</h6>
        <div class="ulasan-seller d-flex" style="overflow-x: scroll;">
          <div class="col-lg-6 col-md-6 mb-4 me-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mt-1">
                    <img
                      src="https://plus.unsplash.com/premium_photo-1690407617542-2f210cf20d7e?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                      alt="Produk" style="object-fit: cover; width: 50px; height: 50px; border-radius: 50%;">
                    <div class="ms-3">
                      <p class="mb-0 text-sm">Anindita Saputri</p>
                      <p class="text-sm text-muted">3 bulan lalu</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center mt-0">
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <p class="mb-0 ms-2 text-sm">5.0</p>
                  </div>
                </div>
                <p class="mb-0 text-sm">Barangnya bagus mulus meskipun second like new banget cuman pengiriman rada lama
                  + sellernya sering ngegas gajelas. 4 bintang buat barangnya ga 5 bintang karna respon seller yg
                  gajelas suka marah-marah.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-4 me-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mt-1">
                    <img
                      src="https://plus.unsplash.com/premium_photo-1690407617542-2f210cf20d7e?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                      alt="Produk" style="object-fit: cover; width: 50px; height: 50px; border-radius: 50%;">
                    <div class="ms-3">
                      <p class="mb-0 text-sm">Anindita Saputri</p>
                      <p class="text-sm text-muted">3 bulan lalu</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center mt-0">
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <p class="mb-0 ms-2 text-sm">5.0</p>
                  </div>
                </div>
                <p class="mb-0 text-sm">Barangnya bagus mulus meskipun second like new banget cuman pengiriman rada lama
                  + sellernya sering ngegas gajelas. 4 bintang buat barangnya ga 5 bintang karna respon seller yg
                  gajelas suka marah-marah.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div class="d-flex mt-1">
                    <img
                      src="https://plus.unsplash.com/premium_photo-1690407617542-2f210cf20d7e?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                      alt="Produk" style="object-fit: cover; width: 50px; height: 50px; border-radius: 50%;">
                    <div class="ms-3">
                      <p class="mb-0 text-sm">Anindita Saputri</p>
                      <p class="text-sm text-muted">3 bulan lalu</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center mt-0">
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <p class="mb-0 ms-2 text-sm">5.0</p>
                  </div>
                </div>
                <p class="mb-0 text-sm">Barangnya bagus mulus meskipun second like new banget cuman pengiriman rada lama
                  + sellernya sering ngegas gajelas. 4 bintang buat barangnya ga 5 bintang karna respon seller yg
                  gajelas suka marah-marah.</p>
              </div>
            </div>
          </div>
        </div>
        <h6 class="mt-4">Diskusi Barang</h6>
        <div class="col-lg-12">
          <div class="card">
            <div class="mt-2 px-4 mb-3">
              <div class="d-flex mt-1 align-items-center">
                <img
                  src="https://plus.unsplash.com/premium_photo-1673866484792-c5a36a6c025e?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                  alt="Produk" style="object-fit: cover; width: 50px; height: 50px; border-radius: 50%;">
                <div class="pt-2">
                  <span class="ms-3 text-sm">Johannes Simatupang</span>
                  <span><i class="fas fa-circle mx-2" style="font-size: 5px; vertical-align: middle;"></i></span>
                  <span class="text-sm text-muted">2 hari lalu</span>
                  <p class="text-sm ms-3">Pemakaian berapa lama kak kalau boleh tau?</p>
                </div>
              </div>
              <hr class="border border-gray border-1 my-0">
              <div class="d-flex mt-1 align-items-center ms-5">
                <img
                  src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                  alt="Produk" style="object-fit: cover; width: 50px; height: 50px; border-radius: 50%;">
                <div class="pt-2">
                  <span class="ms-3 text-sm">Dewangga Saputra Pidieanto</span>
                  <span><i class="fas fa-circle mx-2" style="font-size: 5px; vertical-align: middle;"></i></span>
                  <span class="text-sm text-muted">2 hari lalu</span>
                  <p class="text-sm ms-3">Baru 3 harian kak, salah beli tipe</p>
                </div>
              </div>
              <hr class="border border-gray border-1 my-0 ms-5">
              <div class="d-flex mt-1 align-items-center ms-5">
                <img
                  src="https://plus.unsplash.com/premium_photo-1673866484792-c5a36a6c025e?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                  alt="Produk" style="object-fit: cover; width: 50px; height: 50px; border-radius: 50%;">
                <div class="pt-2">
                  <span class="ms-3 text-sm">Johannes Simatupang</span>
                  <span><i class="fas fa-circle mx-2" style="font-size: 5px; vertical-align: middle;"></i></span>
                  <span class="text-sm text-muted">2 hari lalu</span>
                  <p class="text-sm ms-3">Siap kak, ikut nawar juga deh sapa tau rejeki</p>
                </div>
              </div>
              <hr class="border border-gray border-1 my-0 ms-5">
              <div class="d-flex mt-1 align-items-center">
                <img
                  src="https://images.unsplash.com/photo-1506863530036-1efeddceb993?q=80&w=1944&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                  alt="Produk" style="object-fit: cover; width: 50px; height: 50px; border-radius: 50%;">
                <div class="pt-2">
                  <span class="ms-3 text-sm">Andrea Hiragana</span>
                  <span><i class="fas fa-circle mx-2" style="font-size: 5px; vertical-align: middle;"></i></span>
                  <span class="text-sm text-muted">1 hari lalu</span>
                  <p class="text-sm ms-3">Kak ini mulus beneran kan?</p>
                </div>
              </div>
              <form action="" class="d-flex align-items-center mt-2">
                <input type="text" class="form-control bg-gray-100 ps-3" placeholder="Ajukan pertanyaan">
                <button class="btn btn-transparent mb-0"><i class="fas fa-paper-plane"
                    style="color: #4154f1;"></i></button>
              </form>
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

    // Fungsi untuk menyesuaikan layout berdasarkan jumlah foto
    window.onload = function() {
        var fotoCount = <?= $fotoCount ?>; // Ambil jumlah foto dari PHP
        var thumbnailContainer = document.getElementById('thumbnailContainer');

        if (fotoCount == 5) {
            thumbnailContainer.style.justifyContent = 'space-between';
        } else {
            thumbnailContainer.style.justifyContent = 'flex-start';
        }
    };
  </script>
<script>
  // Fungsi untuk menambahkan format pemisah ribuan
  function formatNumber(value) {
    return value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  // Fungsi untuk menghapus format saat input, dan mengembalikan nilai numerik
  function removeFormat(value) {
    return value.replace(/[^0-9.-]+/g, "");
  }

  function updateUangMuka() {
    var penawaranHarga = removeFormat(document.getElementById('penawaran_harga').value);
    var uangMuka = document.getElementById('uangmuka');
    if (penawaranHarga) {
      // Menghitung 10% dari nominal tawaran
      var calculatedUangMuka = penawaranHarga * 0.1;
      // Secara otomatis mengisi uang muka dengan nilai 10% nominal tawaran dan menambahkan format
      uangMuka.value = formatNumber(calculatedUangMuka.toFixed(0));
    }
  }

  function validateUangMuka() {
    var penawaranHarga = parseFloat(removeFormat(document.getElementById('penawaran_harga').value));
    var uangMuka = parseFloat(removeFormat(document.getElementById('uangmuka').value));
    if (penawaranHarga && uangMuka < penawaranHarga * 0.1) {
      // Memberikan peringatan jika uang muka kurang dari 10% dari nominal tawaran
      alert('Uang muka tidak boleh kurang dari 10% dari nominal tawaran');
      // Reset nilai uang muka ke 10% dari nominal tawaran dan menambahkan format
      document.getElementById('uangmuka').value = formatNumber((penawaranHarga * 0.1).toFixed(0));
    }
  }

  // Menambahkan format angka saat pengguna mengetik di input
  document.getElementById('penawaran_harga').addEventListener('input', function() {
    this.value = formatNumber(removeFormat(this.value));
  });

  document.getElementById('uangmuka').addEventListener('input', function() {
    this.value = formatNumber(removeFormat(this.value));
  });
</script>

</body>

</html>