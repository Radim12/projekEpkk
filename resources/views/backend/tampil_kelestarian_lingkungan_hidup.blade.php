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
  <!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-md-12 mx-auto mt-2">
          <div class="pagetitle">
            <h1>Review Laporan Kelestarian Lingkungan Hidup</h1>
          </div><!-- End Page Title -->
          <div class="card">
            <div class="card-body mt-4">
              <form action="{{ route('kelestarian_lingkungan_hidup.update', $data->id_pokja4_bidang2) }}" method="POST"
                enctype="multipart/form-data" onsubmit="event.preventDefault(); confirmSubmission(event)">

                @csrf
                @method('PUT')
                <div class="form-outline mb-4">

                  <div class="form-outline mb-4 mt-3">
                    <label for="id_kelpangan" class="form-label">ID Laporan Kelestarian Lingkungan Hidup</label>
                    <input type="text" name="id_kelpangan" id="id_kelpangan" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi Id')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->id_pokja4_bidang2 }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jamban" class="form-label">Jamban</label>
                    <input type="text" name="jamban" id="jamban" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jamban')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->jamban }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="spal" class="form-label">Spal</label>
                    <input type="text" name="spal" id="spal" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi spal')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->spal }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="tps" class="form-label">Tps</label>
                    <input type="text" name="tps" id="tps" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi tps')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->tps }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="mck" class="form-label">Mck</label>
                    <input type="text" name="mck" id="mck" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi mck')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->mck }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="pdam" class="form-label">Pdam</label>
                    <input type="text" name="pdam" id="pdam" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi pdam')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->pdam }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="sumur" class="form-label">Sumur</label>
                    <input type="text" name="sumur" id="sumur" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi sumur')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->sumur }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="dll" class="form-label">Dll</label>
                    <input type="text" name="dll" id="dll" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi dll')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->dll }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="id_user" class="form-label">Id Pengguna</label>
                    <input type="text" name="id_user" id="id_user" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi id user')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->id_user }}" />
                  </div>

                  <div id="statusAlert" class="alert alert-danger d-none" role="alert">
                    Harap pilih status laporan.
                  </div>

                  <div class="form-outline mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="datepicker-trigger form-control hasDatepicker"
                      onchange="exibeMsg(this.value);">
                      <option value="">--Pilih--</option>
                      <option value="Revisi">Revisi</option>
                      @if(Auth::guard('pengguna')->check())
              <option value="Disetujui1">Disetujui (Kecamatan)</option>
            @else
              <option value="Disetujui2">Disetujui (Admin)</option>
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
                      oninvalid="this.setCustomValidity('Harap lengkapi tanggal')" oninput="this.setCustomValidity('')"
                      placeholder="Masukkan Judul" value="{{ $data->created_at }}" />
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function confirmSubmission(e) {
      var status = document.querySelector('select[name="status"]').value;
      var alertBox = document.getElementById('statusAlert');
      alertBox.classList.add('d-none');

      if (status === "Revisi") {
        Swal.fire({
          title: 'Konfirmasi Revisi',
          text: 'Apakah Anda yakin ingin mengubah status menjadi Revisi? Catatan perlu diisi.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Ya, Ubah',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            e.target.submit(); // ✅ submit form jika user klik "Ya, Ubah"
          }
        });
        return false; // ⛔ cegah submit default
      } else if (status === "Disetujui1" || status === "Disetujui2") {
        Swal.fire({
          title: 'Konfirmasi Persetujuan',
          text: 'Apakah Anda yakin ingin menyetujui laporan ini?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Ya, Setujui',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            e.target.submit(); // ✅ submit form jika disetujui
          }
        });
        return false;
      } else {
        alertBox.classList.remove('d-none');
        alertBox.innerText = 'Harap pilih status laporan.';
        return false;
      }
    }
  </script>
</body>

{{--

</html> --}}
{{-- @endsection --}}