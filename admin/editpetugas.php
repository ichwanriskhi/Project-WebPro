<?php 
include "../layout/mainsidebar.php";

include "../db_connect.php";

$email = $_GET['email'];
$sqlStatement = "SELECT * FROM user WHERE email='$email'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg pt-3">
    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Data Petugas</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Petugas</li>
            </ol>
        </nav>
        <div class="mt-4">
          <div class="card py-3 px-3">
            <h6 class="mb-3">Penambahan Petugas Lelang</h6>
              <form action="editp.php" method="POST">                                
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="email" class="fw-bold text-dark">Email</label>
                    <input type="email" name="email" class="form-control ps-3 bg-gray-100" value="<?= $row["email"] ?>" readonly>
                  </div>
                  <div class="col-md-6">
                    <label for="nama" class="fw-bold text-dark">Nama Petugas</label>
                    <input type="text" name="nama" class="form-control ps-3 bg-gray-100" value="<?= $row["nama"] ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label for="telepon" class="fw-bold text-dark">Nomor Telepon</label>
                    <input type="text" name="telepon" class="form-control ps-3 bg-gray-100" value="<?= $row["telepon"] ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label for="password" class="fw-bold text-dark">Password</label>
                    <input type="password" name="password" class="form-control ps-3 bg-gray-100" value="<?= $row["password"] ?>" hidden>
                    <input type="text" name="password_ubah" class="form-control ps-3 bg-gray-100" placeholder="Masukkan password baru">
                  </div>
                  <div class="text-center mt-3">
                    <button type="submit" class="btn btn-dark w-10">Tambah</button>
                  </div>
                </div>
              </form>
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
  </main>

  <!-- JS File -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/chartjs.min.js"></script>
</body>

</html>