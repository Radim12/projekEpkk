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
            <h1>Review Laporan Pendidikan Dan Keterampilan</h1>
          </div><!-- End Page Title -->
          <div class="card">
            <div class="card-body mt-4">
              <form action="{{ route('pendidikan.update', $data->id_pokja2_bidang1) }}" method="POST"
                enctype="multipart/form-data" onsubmit="event.preventDefault(); confirmSubmission(event)">

                @csrf
                @method('PUT')
                <div class="form-outline mb-4">

                  <div class="form-outline mb-4 mt-3">
                    <label for="id_pokja2_bidang1" class="form-label">ID Laporan Pendidikan Dan Keterampilan</label>
                    <input type="text" name="id_pokja2_bidang1" id="id_pokja2_bidang1" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi id laporan')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->id_pokja2_bidang1 }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="warga_buta" class="form-label">Warga Buta</label>
                    <input type="text" name="warga_buta" id="warga_buta" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi kategori laporan')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->warga_buta }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="kel_belajarA" class="form-label">Kelompok Belajar A</label>
                    <input type="text" name="kel_belajarA" id="kel_belajarA" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah posyandu')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->kel_belajarA }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="warga_belajarA" class="form-label">Warga Belajar A</label>
                    <input type="text" name="warga_belajarA" id="warga_belajarA" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah posyandu terintegrasi')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->warga_belajarA }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="kel_belajarB" class="form-label">Kelompok Belajar B</label>
                    <input type="text" name="kel_belajarB" id="kel_belajarB" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->kel_belajarB }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="warga_belajarB" class="form-label">Warga Belajar B</label>
                    <input type="text" name="warga_belajarB" id="warga_belajarB" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->warga_belajarB }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="kel_belajarC" class="form-label">Kelompok Belajar C</label>
                    <input type="text" name="kel_belajarC" id="kel_belajarC" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->kel_belajarC }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="warga_belajarC" class="form-label">Warga Belajar C</label>
                    <input type="text" name="warga_belajarC" id="warga_belajarC" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->warga_belajarC }}" />
                  </div>


                  <div class="form-outline mb-4 mt-3">
                    <label for="kel_belajarKF" class="form-label">Kelompok Belajar KF</label>
                    <input type="text" name="kel_belajarKF" id="kel_belajarKF" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->kel_belajarKF }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="warga_belajarKF" class="form-label">Warga Belajar KF</label>
                    <input type="text" name="warga_belajarKF" id="warga_belajarKF" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->warga_belajarKF }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="paud" class="form-label">Paud</label>
                    <input type="text" name="paud" id="paud" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->paud }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="taman_bacaan" class="form-label">Taman Bacaan</label>
                    <input type="text" name="taman_bacaan" id="taman_bacaan" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->taman_bacaan }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_klp" class="form-label">Jumlah Klp</label>
                    <input type="text" name="jumlah_klp" id="jumlah_klp" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_klp }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_ibu_peserta" class="form-label">Jumlah Ibu Peserta</label>
                    <input type="text" name="jumlah_ibu_peserta" id="jumlah_ibu_peserta" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_ibu_peserta }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_ape" class="form-label">Jumlah Ape</label>
                    <input type="text" name="jumlah_ape" id="jumlah_ape" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_ape }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="jumlah_kel_simulasi" class="form-label">Jumlah Kelompok Simulasi</label>
                    <input type="text" name="jumlah_kel_simulasi" id="jumlah_kel_simulasi" class="form-control" required
                      readonly oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->jumlah_kel_simulasi }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="KF" class="form-label">KF</label>
                    <input type="text" name="KF" id="KF" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->KF }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="paud_tutor" class="form-label">Paud Tutor</label>
                    <input type="text" name="paud_tutor" id="paud_tutor" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->paud_tutor }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="BKB" class="form-label">BKB</label>
                    <input type="text" name="BKB" id="BKB" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->BKB }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="koperasi" class="form-label">Koperasi</label>
                    <input type="text" name="koperasi" id="koperasi" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->koperasi }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="ketrampilan" class="form-label">Ketrampilan</label>
                    <input type="text" name="ketrampilan" id="ketrampilan" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->ketrampilan }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="LP3PKK" class="form-label">LP3PKK</label>
                    <input type="text" name="LP3PKK" id="LP3PKK" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->LP3PKK }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="TP3PKK" class="form-label">TP3PKK</label>
                    <input type="text" name="TP3PKK" id="TP3PKK" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah klp')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->TP3PKK }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="damas_pkk" class="form-label">Damas PKK</label>
                    <input type="text" name="damas_pkk" id="damas_pkk" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi jumlah anggota')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul"
                      value="{{ $data->damas_pkk }}" />
                  </div>

                  <div class="form-outline mb-4 mt-3">
                    <label for="id_user" class="form-label">Id Pengguna</label>
                    <input type="text" name="id_user" id="id_user" class="form-control" required readonly
                      oninvalid="this.setCustomValidity('Harap lengkapi id pengguna')"
                      oninput="this.setCustomValidity('')" placeholder="Masukkan Judul" value="{{ $data->id_user }}" />
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
                      oninvalid="this.setCustomValidity('Harap lengkapi judul')" oninput="this.setCustomValidity('')"
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