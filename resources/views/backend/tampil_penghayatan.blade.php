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
  @include('backend.includes.sidebar')

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-md-12 mx-auto mt-2">
          <div class="pagetitle">
            <h1>Review Laporan Penghayatan Dan Pengamalan Pancasila</h1>
          </div><!-- End Page Title -->
          <div class="card">
            <div class="card-body mt-4">
              <form action="{{ route('penghayatan.update', $data->id_pokja1_bidang1) }}" method="POST"
                enctype="multipart/form-data" onsubmit="return confirmSubmission()">

                @csrf
                @method('PUT')
                <div class="form-outline mb-4">

                  <div class="form-outline mb-4 mt-3">
                    <label for="id_pokja1_bidang1" class="form-label">ID Laporan Penghayatan Dan Pengamalan
                      Pancasila</label>
                    <input type="text" name="id_pokja1_bidang1" id="id_pokja1_bidang1" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi id laporan kesehat')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->id_pokja1_bidang1 }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_kel_simulasi1" class="form-label">Jumlah Kelompok Simulasi 1</label>
                    <input type="text" name="jumlah_kel_simulasi1" id="jumlah_kel_simulasi1" class="form-control"
                      required readonly oninvalid="this.setCustomValidity('Harap lengkapi kategori laporan')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_kel_simulasi1 }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_anggota1" class="form-label">Jumlah Anggota 1</label>
                    <input type="text" name="jumlah_anggota1" id="jumlah_anggota1" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah posyandu')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_anggota1 }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_kel_simulasi2" class="form-label">Jumlah Kelompok Simulasi 2</label>
                    <input type="text" name="jumlah_kel_simulasi2" id="jumlah_kel_simulasi2" class="form-control"
                      required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah posyandu terintegrasi')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_kel_simulasi2 }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_anggota2" class="form-label">Jumlah Anggota 2</label>
                    <input type="text" name="jumlah_anggota2" id="jumlah_anggota2" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_anggota2 }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_kel_simulasi3" class="form-label">Jumlah Kelompok Simulasi 3</label>
                    <input type="text" name="jumlah_kel_simulasi3" id="jumlah_kel_simulasi3" class="form-control"
                      required readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_kel_simulasi3 }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_anggota3" class="form-label">Jumlah Anggota 3</label>
                    <input type="text" name="jumlah_anggota3" id="jumlah_anggota3" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_anggota3 }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_kel_simulasi4" class="form-label">Jumlah Kelompok Simulasi 4</label>
                    <input type="text" name="jumlah_kel_simulasi4" id="jumlah_kel_simulasi4" class="form-control"
                      required readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_kel_simulasi4 }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_anggota4" class="form-label">Jumlah Anggota 4</label>
                    <input type="text" name="jumlah_anggota4" id="jumlah_anggota4" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_anggota4 }}" />
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