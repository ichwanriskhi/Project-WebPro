<?php
include '../layout/mainsidebar.php';
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg pt-3">
    <div class="container-fluid py-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profil</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-center mt-4">
          <h5 class="mb-3">Profil Saya</h5>
          <div class="page-header min-height-200 border-radius-lg" style="background-image: url('https://images.unsplash.com/photo-1614850523011-8f49ffc73908?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); max-width: 98%;">
            <div class="profile-picture position-absolute top-50 start-50 translate-middle">
              <img src="https://images.unsplash.com/photo-1543610892-0b1f7e6d8ac1?q=80&w=1856&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Profile Picture" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
          </div>
          <div class="form mt-4">
            <h6 class="fw-bolder">Data Diri</h6>
            <form action="">
            <div class="row">
              <div class="col-md-6">
                <label for="nama" class="fw-bold text-dark">Nama</label>
                <input type="text" name="nama" class="form-control bg-white ps-3" placeholder="Masukkan nama Anda...">
              </div>
              <div class="col-md-6">
                <label for="email" class="fw-bold text-dark">Email</label>
                <input type="email" name="email" class="form-control bg-white ps-3" placeholder="Masukkan email Anda...">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6">
                <label for="telepon" class="fw-bold text-dark">Telepon</label>
                <input type="number" name="telepon" class="form-control bg-white ps-3" placeholder="Masukkan nomor telepon Anda...">
              </div>
              <div class="col-md-6">
                <label for="password" class="fw-bold text-dark">Kata Sandi</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control bg-white ps-3" value="12345">
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                        <i class="fas fa-eye me-3" id="eyeIcon"></i>
                    </span>
                </div>
            </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <label for="alamat" class="fw-bold text-dark">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control bg-white ps-3 h-100" placeholder="Masukkan alamat lengkap anda..."></textarea>
              </div>
            </div>
            <h6 class="fw-bolder mt-5">Rekening Pencairan Dana</h6>
            <div class="row">
              <div class="col-md-6">
                <label for="bank" class="fw-bold text-dark">Bank</label>
                <select name="bank" id="bank" class="form-control ps-3 bg-white">
                  <option selected>Pilih Bank</option>
                  <option value="bni">Bank Nasional Indonesia</option>
                  <option value="bri">Bank Rakyat Indonesia</option>
                  <option value="bca">Bank Central Asia</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="rekening" class="fw-bold text-dark">Nomor Rekening</label>
                <input type="number" name="rekening" class="form-control bg-white ps-3" placeholder="Masukkan nomor rekening Anda...">
              </div>
            </div>
            <div class="text-center mt-4">
              <button type="submit" class="btn btn-dark w-15 border-radius-lg bg-gradient-dark">Simpan</button>
            </div>
          </form>
          </div>
        </div>
        <?php
      include '../layout/mainfooter.php';
      ?>
    </div>
  </main>

  <!-- JS File -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="../assets/js/chartjs.min.js"></script>
   <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
        // Toggle the type attribute
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle the eye icon
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
</script>
</body>

</html>