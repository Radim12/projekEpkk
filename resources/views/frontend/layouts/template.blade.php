<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TP - PKK Kabupaten Nganjuk</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset ('frontend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset ('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset ('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset ('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset ('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset ('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset ('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset ('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset ('frontend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  
  @include('frontend/layouts.navbar')
  
  @yield('content')


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

        <div class="col-lg-4 col-md-6 footer-contact">
            <h3>TP - PKK <span>Kabupaten Nganjuk</span></h3>
            <div class="mt-3">
              <h6 class="p-2 ">Kontak :</h6>
              <div class="p-2 "><a href="#" class=""><i class="bi bi-whatsapp"></i></a> 087754215178</div>
              <div class="p-2 "><a href="#" class="email"><i class="bi bi-envelope"></i></a> admin@pkk-nganjuk.my.id</div>
            <div class="p-2 "><a href="#" class=""><i class="bi bi-geo-alt-fill"></i></a>Jl. Dermojoyo No.21, Payaman, Kec. Nganjuk, Kabupaten Nganjuk, Jawa Timur 64418</div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links" style="pointer-events: none;">
            <h6 class="p-2 ">Jumlah Pengunjung :</h6>
             <p class=" ">Hari ini :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{ $visitor->count }}</p> 
             <p class=" ">Minggu ini :&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;{{ $totalMinggu }}</p>
            <p class=" ">Bulan ini :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;{{ $totalBulan }}</p>
            <p class=" ">Tahun ini :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{ $totalTahun }}</p>
            <p class=" ">Semua Pengunjung :&emsp;&emsp;&emsp;{{ $totalVisitors }}</p>
			</ul>
          </div>
    
          <div class="col-lg-4 col-md-6 footer-links" style="pointer-events: none;">
            <h6 class="p-2 ">IP Pengunjung anda :</h6>
            <?php
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $visitorIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $visitorIP = $_SERVER['REMOTE_ADDR'];
            }
            
            echo "Alamat IP pengunjung: " . $visitorIP;
?>
          </div>

         

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>A4 & B1 Politeknik Negeri Jember</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
       
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset ('frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset ('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset ('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset ('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset ('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset ('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset ('frontend/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{ asset ('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset ('frontend/assets/js/main.js')}}"></script>

</body>

</html>