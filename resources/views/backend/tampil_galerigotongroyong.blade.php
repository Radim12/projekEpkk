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
 <link href="{{ asset('backend/assets/img/favicon.png') }}" rel="icon">
 <link href="{{ asset('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.gstatic.com" rel="preconnect">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <!-- Vendor CSS Files -->
 <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
 <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
 <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
 <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
 <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
 <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
 <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

 <!-- Template Main CSS File -->
 <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

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
          <ul id="galeri_nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('galeribidangumum.index') }}">
                <i class="bi bi-circle"></i><span>Bidang Umum</span>
              </a>
            </li>
            <li>
              <a href="{{ route('galeripokja1.index') }}" class="active">
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
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
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
            <a href="{{ route('pokja3.index') }}">
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
        <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="return confirm('Apakah anda yakin ingin keluar?')">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span>Keluar</span>
        </a>
      </li><!-- End Contact Page Nav -->
  
      </ul>
  
    </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-md-12 mx-auto mt-2">
          <div class="pagetitle">
            <h1>Review Galeri</h1>
          </div><!-- End Page Title -->
          <div class="card">
            <div class="card-body mt-4">
              <form action="{{ route('galerigotongroyong.update', $data->id) }}" method="POST" enctype="multipart/form-data">

                @csrf   
                @method('PUT')
                <div class="form-outline mb-4">
                  <label for="gambar" class="form-label">Gambar</label><br>
                    
                    <!-- <img src="{{ asset('frontend2/assets/gallery2/'.$data->gambar) }}" alt="{{ $data->deskripsi }}" class="rounded" width="200"> -->
                    
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                          <img src="{{ asset('frontend2/gallery2/'.$data->gambar) }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                          <img src="{{ asset('frontend2/gallery2/'.$data->gambar) }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="{{ asset('frontend2/gallery2/'.$data->gambar) }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="{{ asset('frontend2/gallery2/'.$data->gambar) }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="{{ asset('frontend2/gallery2/'.$data->gambar) }}" class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                
                <div class="form-outline mb-4 mt-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                    required readonly oninvalid="this.setCustomValidity('Harap lengkapi Deskripsi')" 
                    oninput="this.setCustomValidity('')" 
                    placeholder="Masukkan Deskripsi" value="{{ $data->deskripsi }}"/>
                </div>

                <div class="form-outline mb-4 mt-3">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="text" name="tanggal" id="tanggal" class="form-control"
                  required readonly oninvalid="this.setCustomValidity('Harap lengkapi tanggal')" 
                  oninput="this.setCustomValidity('')" 
                  placeholder="Masukkan tanggal" value="{{ $data->tanggal }}"/>
              </div>
  
                <div class="text-end pt-1 pb-1 mt-4">
                  <button class="btn btn-success ps-xxl-5 pe-xxl-5 mr-auto background-blue-1 mb-2 fw-semibold fs-5" type="submit">Upload</button>
                </div>

              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('backend/assets/js/main.js') }}"></script>

</body>

{{-- </html> --}}
{{-- @endsection --}}