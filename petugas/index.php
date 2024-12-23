<?php 
include "../layout/mainsidebar.php";

include '../db_connect.php';
?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-2">
      <div class="row">
        <div>
          <h4 class="mb-0 h4 font-weight-bolder">Dashboard</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-0">Profil Petugas</h6>
              <div class="d-flex align-items-center mt-4">
                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=1780&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     class="rounded-circle" alt="Profil Penjual" style="width: 50px; height: 50px;">
                <div class="ms-3">
                  <p class="mb-0 fw-medium">Christina Alphine</p>
                  <div class="d-flex align-items-center">
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <i class="fas fa-star star"></i>
                    <p class="mb-0 ms-2">5.0</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-between">
        <h6 class="mb-2">Ringkasan Pengajuan Barang</h6>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3 d-flex justify-content-between">
              <div class="">
                <p class="text-sm mb-0 text-capitalize">Belum Disetujui</p>
                <h4 class="mb-0 text-center ">5</h4>
              </div>
              <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                <i class="material-symbols-rounded opacity-10">pending</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3 d-flex justify-content-between">
              <div class="">
                <p class="text-sm mb-0 text-capitalize">ditolak</p>
                <h4 class="mb-0 text-center ">5</h4>
              </div>
              <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                <i class="material-symbols-rounded opacity-10">cancel</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3 d-flex justify-content-between">
              <div class="">
                <p class="text-sm mb-0 text-capitalize">Disetujui</p>
                <h4 class="mb-0 text-center ">5</h4>
              </div>
              <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                <i class="material-symbols-rounded opacity-10">Done</i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <h6 class="mb-2">Statistik Lelang</h6>
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2">Lelang Saat Ini</h6>
              <div class="pe-2">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
              <hr class="dark horizontal">
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2">Kategori Terlaris</h6>
              <div class="pe-2">
                <div class="chart">
                  <canvas id="chart-line3" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
              <hr class="dark horizontal">
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
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Asus Vivobook", "Infinix GT", "IPhone X", "Iphone XR", "Lampu", "Mouse", "Jam"],
        datasets: [{
          label: "Jumlah Tawaran",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#4154f1",
          data: [3, 4, 2, 8, 5, 6, 6],
          barThickness: 'flex'
        },],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: '#e5e5e5'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
              color: "#737373"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    
    var ctx2 = document.getElementById("chart-line3").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Elektronik", "Fashion", "Furnitur", "Aksesoris dll"],
        datasets: [{
          label: "Terlelang",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#4154f1",
          pointBorderColor: "transparent",
          borderColor: "#4154f1",
          backgroundColor: "transparent",
          fill: true,
          data: [10, 4, 1, 2],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            callbacks: {
              title: function (context) {
                const fullMonths = ["Elektronik", "Fashion", "Furnitur", "Aksesoris dll"];
                return fullMonths[context[0].dataIndex];
              }
            }
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 12,
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 12,
                lineHeight: 2
              },
            }
          },
        },
      },
    });

  </script>

</body>

</html>