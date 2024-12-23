<?php
include '../layout/mainsidebar.php';
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg px-0 pt-3">
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Beranda</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Bantuan</li>
        </ol>
      </nav>
      <h5 class="mb-4 mt-4">Pertanyaan Yang Sering Diajukan</h5>
        <div class="row mt-4">
            <div class="col-md-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="btn text-start tab-button mb-0"><a class="nav-link fw-bold active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Informasi Umum</a></button>
                    <button class="btn text-start tab-button"><a class="nav-link fw-bold" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Akun</a></button>
                </div>
            </div>
            <div class="col-md-9">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="accordion" id="accordionExample">
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHarga" aria-expanded="true" aria-controls="collapseHarga">
                          <p class="text-sm ">Apa yang dimaksud dengan harga awal?</p>
                        </button>
                      </h2>
                      <div id="collapseHarga" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          <strong>Harga awal</strong> adalah harga minimal barang yang akan dilelang dan ditetapkan oleh Penjual/Pemilik Barang.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTawaran" aria-expanded="true" aria-controls="collapseTawaran">
                          <p class="text-sm ">Apa yang dimaksud dengan “tawaran tertinggi”?</p>
                        </button>
                      </h2>
                      <div id="collapseTawaran" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          <strong>Tawaran tertinggi</strong> adalah jumlah uang tertinggi yang ditawarkan oleh peserta lelang untuk suatu barang selama periode lelang berlangsung.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTingkat" aria-expanded="true" aria-controls="collapseTingkat">
                          <p class="text-sm ">Bagaimana cara melihat tingkat kepercayaan penjual?</p>
                        </button>
                      </h2>
                      <div id="collapseTingkat" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Tingkat kepercayaan penjual biasanya dapat dilihat melalui rating atau ulasan yang diberikan oleh pembeli sebelumnya. Ini dapat ditemukan di halaman “Detail barang".
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLihat" aria-expanded="true" aria-controls="collapseLihat">
                          <p class="text-sm ">Bagaimana cara melihat barang lelang yang sudah dimenangkan?</p>
                        </button>
                      </h2>
                      <div id="collapseLihat" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Untuk melihat barang lelang yang sudah dimenangkan, Anda dapat pergi ke akun Anda dan mencari bagian “Aktivitas” Di sana, akan terdapat daftar barang yang berhasil Anda menangkan.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDiskusi" aria-expanded="true" aria-controls="collapseDiskusi">
                          <p class="text-sm ">Bagaimana cara menggunakan fitur diskusi?</p>
                        </button>
                      </h2>
                      <div id="collapseDiskusi" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Fitur diskusi biasanya tersedia pada halaman “Detail barang”. Anda dapat menggunakannya dengan menulis pertanyaan atau komentar di kolom yang disediakan dan mengirimkannya. Penjual atau peserta lelang lainnya dapat memberikan tanggapan di sana.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUlasan" aria-expanded="true" aria-controls="collapseUlasan">
                          <p class="text-sm ">Bagaimana cara memberikan ulasan kepada penjual?</p>
                        </button>
                      </h2>
                      <div id="collapseUlasan" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Setelah transaksi selesai, pembeli akan diarahkan ke halaman “Detail transaksi” untuk memberikan ulasan. Anda bisa memberikan rating bintang dan menulis ulasan mengenai pengalaman Anda dengan penjual. 
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDetail" aria-expanded="true" aria-controls="collapseDetail">
                          <p class="text-sm ">Bagaimana cara melihat detail lelang yang telah diikuti?</p>
                        </button>
                      </h2>
                      <div id="collapseDetail" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Anda dapat melihat detail lelang yang telah diikuti dengan pergi ke menu “Aktivitas”. Di sana akan ditampilkan informasi lengkap mengenai lelang yang Anda ikuti.  
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTinggi" aria-expanded="true" aria-controls="collapseTinggi">
                          <p class="text-sm ">Bagaimana cara melihat penawaran tertinggi?</p>
                        </button>
                      </h2>
                      <div id="collapseTinggi" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Penawaran tertinggi biasanya ditampilkan pada halaman “Detail barang”. Anda bisa melihat jumlah tawaran tertinggi saat ini.  
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKembali" aria-expanded="true" aria-controls="collapseTinggi">
                          <p class="text-sm ">Ketentuan apa saja yang memungkinkan untuk pengembalian barang?</p>
                        </button>
                      </h2>
                      <div id="collapseKembali" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Ketentuan pengajuan pengembalian dilakukan dalam waktu tidak lebih dari 2 x 24 jam setelah barang diterima, serta barang harus dikembalikan dalam kondisi asli dengan kemasan dan aksesoris lengkap.  
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeleksi" aria-expanded="true" aria-controls="collapseTinggi">
                          <p class="text-sm ">Apakah barang lelang telah diseleksi oleh admin?</p>
                        </button>
                      </h2>
                      <div id="collapseSeleksi" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Platform lelang “ElangKuy” memiliki proses seleksi oleh admin untuk memastikan barang yang dilelang memenuhi standar.  
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <div class="accordion" id="accordionExample">
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRegist" aria-expanded="true" aria-controls="collapseOne">
                          <p class="text-sm ">Bagaimana cara memelakukan registrasi/membuat akun baru?</p>
                        </button>
                      </h2>
                      <div id="collapseRegist" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          klik daftar pada landing page, lalu isi pendaftaran akun dengan memasukkan identitas yg diperlukan. Lalu Anda harus memiliki alamat email aktif 
                          untuk membuat akun yang akan digunakan. klik daftar pada landing page, lalu isi pendaftaran akun dengan memasukkan identitas yg diperlukan. 
                          Selanjutnya, Anda wajib melengkapi beberapa data di halaman profil Anda.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLupa" aria-expanded="true" aria-controls="collapseOne">
                          <p class="text-sm ">Apa yang harus saya lakukan jika lupa kata sandi?</p>
                        </button>
                      </h2>
                      <div id="collapseLupa" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Anda dapat mengatur ulang kata sandi dengan mengklik 'Lupa Kata Sandi?', lalu anda isa memasukkan email/nomor telepon yang terdaftar, lalu 
                          anda bisa melakukan verifikasi terlebih dahulu, kemudian aplikasi akan mengirimkan kode OTP lewat e-mail anda yg sudah terdaftar, anda dapat 
                          mengatur ulang kata sandi.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProfil" aria-expanded="true" aria-controls="collapseOne">
                          <p class="text-sm ">Bagaimana cara memperbarui informasi profil saya?</p>
                        </button>
                      </h2>
                      <div id="collapseProfil" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          di sebelah kiri ada ikon profil bisa anda klik nanti akan muncul detail profil anda, lalu anda bisa memperbarui isi profil diri anda lalu klik simpan.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTelepon" aria-expanded="true" aria-controls="collapseOne">
                          <p class="text-sm ">Bagaimana cara memperbarui nomor telepon yang terkait dengan akun saya?</p>
                        </button>
                      </h2>
                      <div id="collapseTelepon" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          di sebelah kiri ada ikon profil bisa anda klik nanti akan muncul detail profil anda, lalu anda bisa memperbarui nomor telepon yang terkain dengan akun anda lalu klik simpan.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrg" aria-expanded="true" aria-controls="collapseOne">
                          <p class="text-sm ">Apakah akun pribadi bisa digunakan untuk mengikuti lelang orang lain?</p>
                        </button>
                      </h2>
                      <div id="collapseOrg" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Akun pribadi pada Elangkuy hanya dapat digunakan untuk mengikuti lelang untuk diri sendiri.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item card px-4 py-0 mb-2 bg-white">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEmail" aria-expanded="true" aria-controls="collapseOne">
                          <p class="text-sm ">Bagaimana jika saya lupa alamat email?</p>
                        </button>
                      </h2>
                      <div id="collapseEmail" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-xs pt-0">
                          Silahkan Anda membuat akun baru dengan data yang sama dengan alamat email yang berbeda.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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

</body>

</html>