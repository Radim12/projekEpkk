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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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
            <a href="{{ route('accbidangumum.index') }}" class="active">
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
        <a class="nav-link collapsed" href="{{ route('profile.index') }}">
          <i class="fa-solid fa-user"></i>
          <span>Profil</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}"
          onclick="return confirm('Apakah anda yakin ingin keluar?')">
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
            <h1>Review Laporan Bidang Umum</h1>
          </div><!-- End Page Title -->
          <div class="card">
            <div class="card-body mt-4">
              <form action="{{ route('bidangumum.update', $data->id_laporan_umum) }}" method="POST"
                enctype="multipart/form-data" onsubmit="return confirmSubmission()">

                @csrf
                @method('PUT')
                <div class="form-outline mb-4">

                  <div class="form-outline mb-4 mt-3">
                    <label for="id_laporan_umum " class="form-label">ID Laporan Bidang Umum</label>
                    <input type="text" name="id_laporan_umum " id="id_laporan_umum " class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi id laporan')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->id_laporan_umum  }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="dusun_lingkungan" class="form-label">Dusun Lingkungan</label>
                    <input type="text" name="dusun_lingkungan" id="dusun_lingkungan" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi kategori laporan')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->dusun_lingkungan }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="PKK_RW" class="form-label">PKK RW</label>
                    <input type="text" name="PKK_RW" id="PKK_RW" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah posyandu')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->PKK_RW }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="desa_wisma" class="form-label">Desa Wisma</label>
                    <input type="text" name="desa_wisma" id="desa_wisma" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah posyandu terintegrasi')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->desa_wisma }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="KRT" class="form-label">KRT</label>
                    <input type="text" name="KRT" id="KRT" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->KRT }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="KK" class="form-label">KK</label>
                    <input type="text" name="KK" id="KK" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->KK }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jiwa_laki" class="form-label">Jiwa Laki</label>
                    <input type="text" name="jiwa_laki" id="jiwa_laki" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jiwa_laki }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jiwa_perempuan" class="form-label">Jiwa Perempuan</label>
                    <input type="text" name="jiwa_perempuan" id="jiwa_perempuan" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jiwa_perempuan }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="anggota_laki" class="form-label">Anggota Laki</label>
                    <input type="text" name="anggota_laki" id="anggota_laki" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->anggota_laki }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="anggota_perempuan" class="form-label">Anggota Perempuan</label>
                    <input type="text" name="anggota_perempuan" id="anggota_perempuan" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->anggota_perempuan }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="umum_laki" class="form-label">Umum Laki</label>
                    <input type="text" name="umum_laki" id="umum_laki" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah umum')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->umum_laki }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="umum_perempuan" class="form-label">umum Perempuan</label>
                    <input type="text" name="umum_perempuan" id="umum_perempuan" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah umum')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->umum_perempuan }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="khusus_laki" class="form-label">Khusus Laki</label>
                    <input type="text" name="khusus_laki" id="khusus_laki" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah ')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->khusus_laki }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="khusus_perempuan" class="form-label">Khusus Perempuan</label>
                    <input type="text" name="khusus_perempuan" id="khusus_perempuan" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah ')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->khusus_perempuan }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="honorer_laki" class="form-label">Honorer Laki</label>
                    <input type="text" name="honorer_laki" id="honorer_laki" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah ')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->honorer_laki }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="honorer_perempuan" class="form-label">Honorer Perempuan</label>
                    <input type="text" name="honorer_perempuan" id="honorer_perempuan" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah ')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->honorer_perempuan }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="bantuan_laki" class="form-label">Bantuan Laki</label>
                    <input type="text" name="bantuan_laki" id="bantuan_laki" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah ')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->bantuan_laki }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="bantuan_perempuan" class="form-label">Bantuan Perempuan</label>
                    <input type="text" name="bantuan_perempuan" id="bantuan_perempuan" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah ')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->bantuan_perempuan }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="id_user" class="form-label">Id Pengguna</label>
                    <input type="text" name="id_user" id="id_user" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi id pengguna')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->id_user }}" />
                  </div>

                  <div class="form-outline mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="datepicker-trigger form-control hasDatepicker"
                      onchange="exibeMsg(this.value);">
                      <option value="">--Pilih--</option>
                      <option value="Revisi">Revisi</option>
                      @if(Auth::guard('pengguna')->check())
              <option value="Disetujui">Disetujui (Kecamatan)</option>
            @else
              <option value="Disetujui">Disetujui (Admin)</option>
            @endif
                    </select>
                  </div>

                  <div class="form-outline mb-1 mt-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <input type="text" name="catatan" id="catatan" class="form-control" placeholder="Masukkan Catatan"
                      value="{{ $data->catatan }}" />
                  </div>
                  <p class="mb-4">*Jika laporan perlu di revisi maka bisa menambahkan catatan dan catatan hanya di isi
                    jika status laporan menjadi <b>Revisi</b></p>

                  <div class="form-outline mb-4 mt-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="text" name="tanggal" id="tanggal" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi judul')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->tanggal }}" />
                  </div>

                  <div class="text-end pt-1 pb-1 mt-4">
                    <button class="btn btn-success ps-xxl-5 pe-xxl-5 mr-auto background-blue-1 mb-2 fw-semibold fs-5"
                      type="submit">Upload</button>
                  </div>

              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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
  <script>
    function confirmSubmission() {
      var status = document.querySelector('select[name="status"]').value;
      if (status === "Revisi") {
        return confirm('Apakah Anda yakin ingin mengubah status menjadi Revisi? Catatan perlu diisi.');
      } else if (status === "Disetujui") {
        return confirm('Apakah Anda yakin ingin menyetujui laporan ini?');
      } else {
        alert('Harap pilih status laporan.');
        return false; // Prevent form submission if no status is selected
      }
    }
  </script>
</body>

{{--

</html> --}}
{{-- @endsection --}}