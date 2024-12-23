<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElangKuy</title>

     <!-- logo halaman -->
     <link href="assets/img/logohalaman.png" rel="icon">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <section>
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div class="row w-100">
                <!-- Bagian Kiri -->
                <div class="col-md-6 split-left d-flex justify-content-center align-items-center text-center">
                    <div>
                        <h4 class="mb-1 fw-bold">Jadilah Penjual Terbaik</h4>
                        <p class="mb-4">Jual barang Anda secara efisien di Elangkuy</p>
                        <img src="assets/img/cart.png" alt="seller-cart" class="img-fluid w-100">
                    </div>
                </div>
                <!-- Bagian Kanan -->
                <div class="col-md-6 split-right d-flex justify-content-center">
                    <div class="login-card">
                        <div class="mb-4">
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/img/logo.png" width="200px" alt="logo">
                            </a>
                            <h3 class="login-title fw-bold pt-4">Masuk ke akun anda</h3>
                            <p class="pt-1">Selamat datang! Silakan masuk ke akun Anda:</p>
                            <?php 
                            if(isset($_GET['info'])){
                                if($_GET['info'] == "gagal"){ ?>
                                <div class="alert alert-warning alert-dismissible">
                                    <h5>Mohon Maaf</h5>
                                    Login gagal! username atau password salah!
                                </div>
                                <?php } else if($_GET['info'] == "logout"){ ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <h5>Sukses</h5>
                                        Anda telah berhasil logout
                                    </div>
                                <?php }else if($_GET['info'] == "login"){ ?>
                                    <div class="alert alert-info alert-dismissible">
                                        <h5>Mohon Maaf</h5>
                                        Anda harus login terlebih dahulu
                                    </div>
                            <?php } } ?>
                        </div>
                        <form action="autentikasi_seller.php" method="POST">
                            <div class="mb-3 mt-5">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan alamat email..." required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan kata sandi ..." required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="#" class="text-decoration-none">Lupa kata sandi?</a>
                              </div>
                            <div class="d-grid mt-4">
                                <button type="submit" id="login" class="btn btn-primary">Masuk</button>
                            </div>
                        </form>
                        <div class="text-link text-center mt-3">
                            Belum memiliki akun? <a href="register_seller.php" class="text-decoration-none">Daftar disini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var myCarousel = document.querySelector('#carouselExampleSlidesOnly');
          var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 3000,
            ride: 'carousel'
          });
        });
      </script>
</body>
</html>