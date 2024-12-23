<?php
include '../layout/mainsidebar.php';

include "../db_connect.php";
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg pt-3">
    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Barang</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengajuan Barang</li>
            </ol>
        </nav>
        <div class="mt-4">
          <div class="card py-3 px-3">
            <h6 class="mb-3">Pengajuan Barang Lelang</h6>
              <form action="add.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <p class="fw-bold text-sm text-dark mb-0">Foto Barang</p>
                  <div id="photo-upload-container" class="col-md-12 photo-upload">
                      <input id="file-upload" type="file" name="foto[]" multiple style="display: none;" accept="image/*" required>
                      <label for="file-upload" class="upload-label">+</label>
                  </div>
                </div>                                  
                <div class="row">
                <input type="email" name="id_penjual" value="<?= $_SESSION['email'] ?>" hidden>
                  <div class="col-md-4 mb-3">
                    <label for="nama_barang" class="fw-bold text-dark">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control ps-3 bg-gray-100" placeholder="Masukkan nama Anda..." required>
                  </div>
                  <div class="col-md-4">
                    <label for="harga_awal" class="fw-bold text-dark">Harga Awal</label>
                    <input type="text" id="harga_awal" name="harga_awal" class="form-control ps-3 bg-gray-100" placeholder="Masukkan nama Anda..." required>
                  </div>
                  <div class="col-md-4">
                    <label for="lokasi" class="fw-bold text-dark">Lokasi</label>
                    <select name="lokasi" class="form-control bg-gray-100 ps-3" id="lokasi" required>
                      <option selected>Pilih Lokasi</option>
                      <option value="bandung">Bandung</option>
                      <option value="jakarta">Jakarta</option>
                      <option value="surabaya">Surabaya</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="kondisi" class="fw-bold text-dark">Kondisi Barang</label>
                    <select class="form-control bg-gray-100 ps-3" name="kondisi" id="kondisiBarang" required>
                      <option selected>Pilih Kondisi</option>
                      <option value="bekas">Bekas</option>
                      <option value="baru">Baru</option>p
                    </select>
                  </div>
                  <div class="col-md-6">
                  <?php
                    include '../db_connect.php';
                    $sqlStatement = "SELECT * FROM kategori";
                    $query = mysqli_query($conn, $sqlStatement);
                    $dtkategori = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    ?>
                    <label for="id_kategori" class="fw-bold text-dark">Kategori</label>
                    <select class="form-control bg-gray-100 ps-3" name="id_kategori" id="kategori" required>
                      <option selected>Pilih Kategori</option>
                        <?php
                        foreach ($dtkategori as $key => $kategori) {
                        ?> 
                        <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="deskripsi" class="fw-bold text-dark">Deskripsi</label>
                    <textarea class="form-control ps-3 bg-gray-100" name="deskripsi" id="deskripsi" rows="10" placeholder="Deskripsi Barang" required></textarea>
                  </div>
                  <div class="text-center mt-3">
                    <button type="submit" name="simpan" class="btn btn-dark w-10">Ajukan</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
  </main>

  <!-- JS File -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="../assets/js/chartjs.min.js"></script>
   <script>
    document.getElementById("file-upload").addEventListener("change", function (event) {
    const files = event.target.files;
    const container = document.getElementById("photo-upload-container");
    const label = container.querySelector(".upload-label");

    // Tambahkan preview untuk setiap file baru
    Array.from(files).forEach((file) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            // Buat elemen gambar
            const img = document.createElement("img");
            img.src = e.target.result;
            
            // Pastikan tidak ada label baru dihapus
            container.insertBefore(img, label);
        };
        reader.readAsDataURL(file);
    });
});

   </script>
<script>
    const hargaAwalInput = document.getElementById('harga_awal');

    hargaAwalInput.addEventListener('input', function () {
        // Ambil nilai input dan hilangkan semua koma
        let value = this.value.replace(/,/g, '').replace(/[^0-9]/g, '');

        // Format nilai dengan menambahkan koma sebagai pemisah ribuan
        if (value) {
            this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        } else {
            this.value = ''; // Kosongkan input jika semua karakter dihapus
        }
    });

    hargaAwalInput.addEventListener('blur', function () {
        // Pastikan input tetap terformat saat kehilangan fokus
        let value = this.value.replace(/,/g, '');
        if (value) {
            this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
    });
</script>
</body>

</html>