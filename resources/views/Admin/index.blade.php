<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('Admin/') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - SIG</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="{{ asset('Admin/img/favicon/favicon.icon')}}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('Admin/vendor/fonts/boxicons.css')}}" />

    <link rel="stylesheet" href="{{ asset('Admin/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{ asset('Admin/vendor/css/theme-default.css')}}" />
    <link rel="stylesheet" href="{{ asset('Admin/css/demo.css')}}" />

    <link rel="stylesheet" href="{{ asset('Admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('Admin/vendor/libs/apex-charts/apex-charts.css')}}" />

    <script src="{{ asset('Admin/vendor/js/helpers.js')}}"></script>
    <script src="{{ asset('Admin/js/config.js')}}"></script>

    <!-- ================= TAMBAHAN CSS (WARNA & ESTETIK SAJA) ================= -->
    <style>
      /* background dashboard */
      body {
        background: #e8f4ff;
      }

      .content-wrapper {
        background: transparent;
      }

      /* override WARNA CARD TANPA UBAH CLASS */
      .card.bg-danger {
        background: linear-gradient(135deg, #38bdf8, #0ea5e9) !important;
      }

      .card.bg-warning {
        background: linear-gradient(135deg, #2dd4bf, #14b8a6) !important;
      }

      .card.bg-primary {
        background: linear-gradient(135deg, #a7f3d0, #6ee7b7) !important;
        color: #064e3b !important;
      }

      .card {
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        position: relative;
        overflow: hidden;
      }

      .card h2,
      .card p {
        z-index: 2;
        position: relative;
      }

      /* emoji kecil di card */
      .card::after {
        content: "🏫";
        position: absolute;
        font-size: 70px;
        opacity: 0.12;
        bottom: -10px;
        right: 10px;
        z-index: 1;
      }

      /* emoji melayang */
      .emoji {
        position: fixed;
        font-size: 26px;
        animation: float 18s linear infinite;
        opacity: 0.4;
        z-index: 0;
      }

      .emoji:nth-child(1) { left: 10%; animation-duration: 14s; }
      .emoji:nth-child(2) { left: 35%; animation-duration: 18s; }
      .emoji:nth-child(3) { left: 60%; animation-duration: 16s; }
      .emoji:nth-child(4) { left: 85%; animation-duration: 20s; }

      @keyframes float {
        from {
          bottom: -50px;
          transform: rotate(0deg);
        }
        to {
          bottom: 110%;
          transform: rotate(360deg);
        }
      }
    </style>
    <!-- ================= END TAMBAHAN CSS ================= -->
  </head>

  <body>

    <!-- emoji background (TAMBAHAN AMAN) -->
    <div class="emoji">📘</div>
    <div class="emoji">📚</div>
    <div class="emoji">✏️</div>
    <div class="emoji">🎒</div>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include('layouts.admin.sidebar')

        <div class="layout-page">

          @include('layouts.admin.navbar')

          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row d-flex justify-content-between">

                <div class="col-md-6 col-xl-4">
                  <div class="card bg-danger text-white mb-3" style="max-height: 200px;height:200px;">
                    <div class="card-body">
                      <h2 class="card-title fw-bold">{{ count($fasilitas) }} Fasilitas</h2>
                      <p>Ada total {{ count($fasilitas) }} fasilitas di SMK Assalaam</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-xl-4">
                  <div class="card bg-warning text-white mb-3" style="max-height: 200px;height:200px;">
                    <div class="card-body">
                      <h2 class="card-title fw-bold">{{ count($gedung) }} Gedung</h2>
                      <p>Ada total {{ count($gedung) }} gedung di SMK Assalaam</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-xl-4">
                  <div class="card bg-primary mb-3" style="max-height: 200px;height:200px;">
                    <div class="card-body">
                      <h2 class="card-title fw-bold">{{ count($ruangan) }} Ruangan</h2>
                      <p>Ada total {{ count($ruangan) }} ruangan di SMK Assalaam</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="{{ asset('Admin/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('Admin/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('Admin/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('Admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('Admin/vendor/js/menu.js')}}"></script>

    <script src="{{ asset('Admin/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{ asset('Admin/js/main.js')}}"></script>
    <script src="{{ asset('Admin/js/dashboards-analytics.js')}}"></script>
  </body>
</html>
