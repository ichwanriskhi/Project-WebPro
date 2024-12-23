<?php
include '../layout/mainsidebar.php';

include '../db_connect.php';

    // Query untuk memilih barang yang status lelangnya 'dibuka'
    $sqlStatement = "SELECT barang.id_barang, barang.nama_barang, kategori.nama_kategori, barang.harga_awal , barang.foto
    FROM barang 
    JOIN lelang ON barang.id_barang = lelang.id_barang 
    JOIN kategori ON barang.id_kategori = kategori.id_kategori
    WHERE lelang.status = 'dibuka'";

$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg px-0 pt-3">
    <div class="container-fluid">
      <div class="ms-md-auto d-flex align-items-center sticky-top">
        <div class="input-group input-group-outline">
          <input type="text" class="form-control bg-white" placeholder="Cari barang yang anda inginkan disini...">
          <button id="filterToggle" class="btn btn-dark filter-trigger mb-0 me-5"><i class="material-symbols-rounded me-2">sort</i></button>
          <i class="bi bi-search search-icon"></i>
        </div>
      </div>
      <div id="carouselBanner" class="carousel slide mt-2" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="../assets/img/banner1.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="../assets/img/banner2.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="../assets/img/banner3.png" alt="Third slide">
          </div>
        </div>
      </div>
      <div class="category d-flex justify-content-center gap-5 mt-3">
        <div class="type2">
            <a href="">Furnitur</a>
        </div>
        <div class="type1">
          <a href="">Gadget</a>
      </div>
        <div class="type2">
            <a href="">Elektronik
            </a>
        </div>
        <div class="type1">
            <a href="">Fashion</a>
        </div>
        <div class="type2">
            <a href="">Aksesoris & Koleksi</a>
        </div>
        <div class="type1">
            <a href="">Lain-lain</a>
        </div>
      </div>
      <div class="product mt-3">
            <div class="product-card d-flex justify-content-center">
          <?php foreach ($data as $key => $dtbrg) { 
              $foto = $dtbrg['foto'];
              $fotoArray = explode(',', $foto); // Memecah string foto menjadi array
              $image = trim($fotoArray[0]); // Mengambil gambar pertama

              // Membatasi panjang nama barang
              $maxLength = 14; // Panjang maksimum nama barang
              $namaBarang = $dtbrg['nama_barang'];
              if (strlen($namaBarang) > $maxLength) {
                  $namaBarang = substr($namaBarang, 0, $maxLength) . '...';
              }
              ?>
              <div class="card">
                  <img src="../assets/img/uploaded/<?= $image ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title"><?= $namaBarang ?></h5>
                      <p class="card-text"><?= $dtbrg['nama_kategori'] ?></p>
                      <a href="detail_barang.php?id_barang=<?= $dtbrg["id_barang"]; ?>" class="btn btn-primary">Rp. <?= number_format($dtbrg['harga_awal']) ?></a>
                  </div>
              </div>
          <?php } ?>
      </div>
      </div>
      <nav aria-label="Page navigation">
        <ul class="pagination pag-user">
            <li class="page-icon"><a href="#"><i class="fas fa-angle-left"></i></a></li>
            <li class="page-item"><a class="page-link mx-1 active text-white" href="#">1</a></li>
            <li class="page-item"><a class="page-link mx-1 text-dark" href="#">2</a></li>
            <li class="page-item"><a class="page-link mx-1 text-dark" href="#">3</a></li>
            <li class="page-item"><a class="page-link mx-1" href="#">...</a></li>
            <li class="page-icon"><a href="#"><i class="fas fa-angle-right"></i></a></li>
        </ul>
      </nav>
      <?php
      include '../layout/mainfooter.php';
      ?>
    </div>
  </main>

  <aside class="filter-sidebar navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-end me-2  bg-white my-2" id="filterSidebar" style="visibility: hidden;">
    <div class="sidenav-header">
      <h6 class="text-dark text-center fw-bold mt-3 mb-4"><i class="material-symbols-rounded me-2">sort</i>Filter</h6>
    </div>
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
      <form>
        <div class="px-4 mb-2">
          <p class="fw-medium">Lokasi</p>
          <div class="form-check d-flex ps-0">
            <input class="form-check-input" type="checkbox" id="lokasi1">
            <label class="form-check-label" for="lokasi1">Telkom University Bandung</label>
          </div>
          <div class="form-check d-flex ps-0">
            <input class="form-check-input" type="checkbox" id="lokasi2">
            <label class="form-check-label" for="lokasi2">Telkom University Jakarta</label>
          </div>
          <div class="form-check d-flex ps-0">
            <input class="form-check-input" type="checkbox" id="lokasi3">
            <label class="form-check-label" for="lokasi3">Telkom University Surabaya</label>
          </div>
        </div>
        
        <div class="px-4 mb-2">
          <p class="fw-medium">Batas Harga</p>
          <div class="d-flex align-items-center">
            <input type="number" class="form-control me-2" placeholder="Rp.">
            <span class="mx-1">—</span>
            <input type="number" class="form-control ms-2" placeholder="Rp.">
          </div>
        </div>

        <div class="px-4 mb-2">
          <p class="fw-medium">Kondisi Barang</p>
          <div class="form-check ps-0">
            <input class="form-check-input" type="checkbox" id="kondisi1">
            <label class="form-check-label" for="baru">Baru</label>
          </div>
          <div class="form-check ps-0">
            <input class="form-check-input" type="checkbox" id="kondisi2">
            <label class="form-check-label" for="bekas">Bekas</label>
          </div>
        </div>

        <div class="px-4 mb-2">
          <p class="fw-medium">Kategori Barang</p>
          <div class="form-check ps-0">
            <input class="form-check-input" type="checkbox" id="lokasi1">
            <label class="form-check-label" for="lokasi1">Elektronik</label>
          </div>
          <div class="form-check ps-0">
            <input class="form-check-input" type="checkbox" id="lokasi2">
            <label class="form-check-label" for="lokasi2">Fashion</label>
          </div>
          <div class="form-check ps-0">
            <input class="form-check-input" type="checkbox" id="lokasi3">
            <label class="form-check-label" for="lokasi3">Furnitur</label>
          </div>
          <div class="form-check d-flex ps-0">
            <input class="form-check-input" type="checkbox" id="lokasi3">
            <label class="form-check-label" for="lokasi3">Aksesoris & Koleksi</label>
          </div>
        </div>
      </form>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
      <div class="mx-3">
          <button class="btn btn-dark mt-4 w-100" type="button">
            Terapkan
          </button>
      </div>
    </div>
  </aside>
  <!-- JS File -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/chartjs.min.js"></script>
  <script src="../assets/js/chart.js"></script>
  <script src="../assets/js/dashboard.js"></script>
 
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var myCarousel = document.querySelector('#carouselBanner');
      var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 4000,
        ride: 'carousel'
      });
    });
  </script>

  <script>
    document.getElementById("filterToggle").addEventListener("click", function () {
    const filterSidebar = document.getElementById("filterSidebar");
    const mainContent = document.querySelector(".dash-user .main-content");

    if (filterSidebar.style.visibility === "hidden") {
        filterSidebar.style.visibility = "visible";
        filterSidebar.classList.add("visible");
        mainContent.style.marginRight = "calc(230px + 10px)";
    } else {
        filterSidebar.style.visibility = "hidden";
        filterSidebar.classList.remove("visible");
        mainContent.style.marginRight = "0";
    }
});

  </script>

</body>

</html>