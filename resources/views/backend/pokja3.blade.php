{{-- @extends('backend/layouts.template') --}}

{{-- @section('content1') --}}

<!DOCTYPE html>
,<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Laporan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 <!-- Favicons -->
 <link href="backend/assets/img/favicon.png" rel="icon">
 <link href="backend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.gstatic.com" rel="preconnect">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <!-- Vendor CSS Files -->
 <link href="backend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="backend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 <link href="backend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
 <link href="backend/assets/vendor/quill/quill.snow.css" rel="stylesheet">
 <link href="backend/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
 <link href="backend/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
 <link href="backend/assets/vendor/simple-datatables/style.css" rel="stylesheet">

 <!-- Template Main CSS File -->
 <link href="backend/assets/css/style.css" rel="stylesheet">

  {{-- fontawesome --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="{{asset('backend/assets/img/pkk.png')}}" alt="">
          <span class="d-none d-lg-block">PKK NGANJUK</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->
  
      <nav class="header-nav ms-auto">
      </nav><!-- End Icons Navigation -->
  
    </header><!-- End Header -->
  
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('ttd.index') }}">
          <i class="fa-solid fa-signature"></i>
            <span>Tanda Tangan</span>
          </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('input_berita.index') }}">
            <i class="fa-solid fa-newspaper"></i>
            <span>Berita</span>
          </a>
        </li><!-- End Dashboard Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('input_pengumuman.index') }}">
            <i class="fa-sharp fa-solid fa-bullhorn"></i>
            <span>Pengumuman</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#galeri_nav" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-image"></i><span>Galeri</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="galeri_nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('galeribidangumum.index') }}">
                <i class="bi bi-circle"></i><span>Bidang Umum</span>
              </a>
            </li>
            <li>
              <a href="{{ route('galeripokja1.index') }}">
                <i class="bi bi-circle"></i><span>Kelompok Kerja 1</span>
              </a>
            </li>
            <li>
              <a href="{{ route('galeripokja2.index') }}">
                <i class="bi bi-circle"></i><span>Kelompok Kerja 2</span>
              </a>
            </li>
            <li>
              <a href="{{ route('galeripokja3.index') }}">
                <i class="bi bi-circle"></i><span>Kelompok Kerja 3</span>
              </a>
            </li>
            <li>
              <a href="{{ route('galeripokja4.index') }}">
                <i class="bi bi-circle"></i><span>Kelompok Kerja 4</span>
              </a>
            </li>
          </ul>
        </li><!-- End Components Nav -->
  
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-book"></i><span>Kelompok Kerja</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('accbidangumum.index') }}">
                <i class="bi bi-circle"></i><span>Bidang Umum</span>
              </a>
            </li>
            <li>
              <a href="{{ route('pokja1.index') }}">
                <i class="bi bi-circle"></i><span>Kelompok Kerja 1</span>
              </a>
            </li>
            <li>
              <a href="{{ route('pokja2.index') }}">
                <i class="bi bi-circle"></i><span>Kelompok Kerja 2</span>
              </a>
            </li>
            <li>
              <a href="{{ route('pokja3.index') }}" class="active">
                <i class="bi bi-circle"></i><span>Kelompok Kerja 3</span>
              </a>
            </li>
            <li>
              <a href="{{ route('pokja4.index') }}">
                <i class="bi bi-circle"></i><span>Kelompok Kerja 4</span>
              </a>
            </li>
          </ul>
        </li><!-- End Components Nav -->
  
        <li class="nav-heading">Halaman</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('profile.index') }}" >
            <i class="fa-solid fa-user"></i>
            <span>Profil</span>
          </a>
        </li>
  
        <li class="nav-item">
          <a class="nav-link collapsed" href="logout" onclick="return confirm('Apakah anda yakin ingin keluar?')">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Keluar</span>
          </a>
        </li><!-- End Contact Page Nav -->
  
      </ul>
  
    </aside><!-- End Sidebar-->


    <main id="main" class="main">

      <section class="section dashboard">
        <div class="row">
    
            <!-- Left side columns -->
    
              <div class="row">

                  <!-- Sales Card -->
                  <div class="col-xxl-6 col-md-6">
                    <div class="card info-card sales-card">
                      <div class="card-body">
                        <h5 class="card-title">Cetak Perbulan</h5>
  
                        <form action="{{ route('pangan.filter') }}" method="GET">
                          <a>Bulanan : </a><input type="month" name="search" value="Laporan Perbulan" class="input-laporan">
                          <button type="submit" class="input-laporan-btn btn-sm">Cetak</button>
                        </form>
                        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
                        <script type="text/javascript">
                            $(function() {
                              $( "#date" ).datepicker({dateFormat: 'yy'});
                            });
                        </script>
                      </div>
                    </div>
                  </div><!-- End Sales Card -->
  
                  <!-- Sales Card -->
                  <div class="col-xxl-6 col-md-6">
                    <div class="card info-card sales-card">
                      <div class="card-body">
                        <h5 class="card-title">Cetak Pertahun</h5>
  
                        <form action="{{ route('pangan.filter') }}" method="GET">
                          <a>Tahunan : </a><select name="search2" class="input-laporan mt-2">
                              <option>-- Pilih --</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                            </select>
                          
                            <button type="submit" class="input-laporan-btn btn-sm">Cetak</button>
                          </form>
      
                      </div>
                    </div>
                  </div><!-- End Sales Card -->
    
                <!-- Sales Card -->
                <div class="col-xxl-6 col-md-6">
                  <div class="card info-card sales-card">
                    <a href="{{ route('accpangan.index') }}">
    
                    <div class="card-body">
                      <h5 class="card-title">Program Pangan</h5>
    
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="fa-sharp fa-solid fa-book"></i>
                        </div>
                        <div class="ps-3">
                          <h6>{{ $modelPertama }}</h6>
                          <span class="text-muted small pt-2 ps-1">Jumlah total laporan</span>
                        </a>
                        </div>
                      </div>
                    </div>
    
                  </div>
                </div><!-- End Sales Card -->
    
                <!-- Revenue Card -->
                <div class="col-xxl-6 col-md-6">
                  <div class="card info-card sales-card">
                    <a href="{{ route('accsandang.index') }}">
    
                    <div class="card-body">
                      <h5 class="card-title">Program Sandang</h5>
    
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="fa-sharp fa-solid fa-book"></i>
                        </div>
                        <div class="ps-3">
                          <h6>{{ $modelKedua }}</h6>
                          <span class="text-muted small pt-2 ps-1">Jumlah total laporan</span>
                        </div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div><!-- End Revenue Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-6 col-md-6">
                  <div class="card info-card sales-card">
                    <a href="{{ route('accperumahan.index') }}">
    
                    <div class="card-body">
                      <h5 class="card-title">Program Perumahan Dan Tata Laksana Rumah Tangga</h5>
    
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="fa-sharp fa-solid fa-book"></i>
                        </div>
                        <div class="ps-3">
                          <h6>{{ $modelKetiga }}</h6>
                          <span class="text-muted small pt-2 ps-1">Jumlah total laporan</span>
                        </div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div><!-- End Revenue Card -->

                      <!-- Revenue Card -->
                      <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">
                          <a href="{{ route('acclaporanpokja3.index') }}">
                          <div class="card-body">
                            <h5 class="card-title">Kader Pokja 3</h5>
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-sharp fa-solid fa-book"></i>
                              </div>
                              <div class="ps-3">
                                <h6>{{ $modelKeempat }}</h6>
                                <span class="text-muted small pt-2 ps-1">Jumlah total laporan</span>
                              </div>
                            </div>
                          </div>
                        </a>
                        </div>
                      </div><!-- End Revenue Card -->
                
                <div class="col-md-12 mx-auto mt-2">
        </div>
    
    
          </div>
        </div>
      </section>
    
      </main><!-- End #main -->
    

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="backend/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="backend/assets/vendor/chart.js/chart.umd.js"></script>
<script src="backend/assets/vendor/echarts/echarts.min.js"></script>
<script src="backend/assets/vendor/quill/quill.min.js"></script>
<script src="backend/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="backend/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="backend/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="backend/assets/js/main.js"></script>

<script type="text/javascript">
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#pdf', {
          maxFilesize: 1,
          acceptedFiles: ".pdf",
          addRemoveLinks: true,
          autoProcessQueue: false,
          init: function() {
            $("button").click(function (e) {
              e.preventDefault();
              myDropzone.processQueue();
            });

            this.on('sending', function(file, xhr, formData) {
              var data = $('#pdf').serializeArray();
              $.each(data, function(key, el) {
                formData.append(el.name, el.value);
              });
            });
          }
        });
</script>

</body>

{{-- </html> --}}
{{-- @endsection --}}