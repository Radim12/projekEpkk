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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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
  @include('backend.includes.sidebar')


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Daftar Laporan Kelestarian Lingkungan Hidup</h1>
    </div><!-- End Page Title -->

    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
      {{ $message }}
    </div>
  @endif

    <div class="card mt-2">
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              @if (Auth::guard('web')->check())
          <th class="text-center" scope="col">Kecamatan</th>
          <th class="text-center" scope="col">Desa</th>
        @elseif (Auth::guard('pengguna')->check())
          <th class="text-center" scope="col">Desa</th>
        @endif
              <th class="text-center" scope="col">Jamban</th>
              <th class="text-center" scope="col">Spal</th>
              <th class="text-center" scope="col">Tps</th>
              <th class="text-center" scope="col">Mck</th>
              <th class="text-center" scope="col">Pdam</th>
              <th class="text-center" scope="col">Sumur</th>
              <th class="text-center" scope="col">Dll</th>
              <th scope="col">Status</th>
              <th scope="col">tanggal</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
        $no = 1;
        @endphp
            @forelse ($data2 as $pangan1)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            @if (Auth::guard('web')->check())
          <td class="text-center">{{ $pangan1->nama_kec }}</td>
          <td class="text-center">{{ $pangan1->nama_desa }}</td>
        @elseif (Auth::guard('pengguna')->check())
          <td class="text-center">{{ $pangan1->nama_desa }}</td>
        @endif
            <td class="text-center">{{ $pangan1->jamban }}</td>
            <td class="text-center">{{ $pangan1->spal }}</td>
            <td class="text-center">{{ $pangan1->tps }}</td>
            <td class="text-center">{{ $pangan1->mck }}</td>
            <td class="text-center">{{ $pangan1->pdam }}</td>
            <td class="text-center">{{ $pangan1->sumur }}</td>
            <td class="text-center">{{ $pangan1->dll }}</td>
            <td>{{ $pangan1->status }}</td>
            <td>{{ $pangan1->created_at}}</td>
            <td>

            <form action="{{ route('deckelestarian.destroy', $pangan1->id_pokja4_bidang2)}}" method="POST"
              class="d-inline delete-form">
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(this)">Hapus</button>
            </form>

            </td>
          </tr>
      @empty
        <div class="alert alert-danger mt-4">
          Tidak ada data laporan kelestarian lingkugan hidup
        </div>
      @endforelse

          </tbody>
        </table>

      </div>
    </div>
  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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
      init: function () {
        $("button").click(function (e) {
          e.preventDefault();
          myDropzone.processQueue();
        });

        this.on('sending', function (file, xhr, formData) {
          var data = $('#pdf').serializeArray();
          $.each(data, function (key, el) {
            formData.append(el.name, el.value);
          });
        });
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    function confirmDelete(button) {
      Swal.fire({
        title: 'Yakin hapus data?',
        text: "Data yang dihapus tidak bisa dikembalikan.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          // Cari form terdekat dan submit
          button.closest('form').submit();
        }
      });
    }
  </script>

</body>

{{--

</html> --}}
{{-- @endsection --}}