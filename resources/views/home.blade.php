@php

$galerys = App\Models\Galeri::orderBy('deskripsi','ASC')->limit(6)->get();

@endphp

@extends('frontend/layouts.template')



@section('content')



{{-- @include('frontend.galeri') --}}

<!-- ======= Hero Section ======= -->

<section id="hero" class="d-flex align-items-center">

  <div class="container" data-aos="zoom-out" data-aos-delay="100">

    <!-- <h1>Selamat Datang <span>PKK Kabupaten Nganjuk</span></h1> -->

    <h2>Selamat Datang Di Portal Informasi</br> TP - PKK Kabupaten Nganjuk</h2>

    <div class="d-flex">

      <a href="#about" class="btn-get-started scrollto">Mulai</a>

      <a href="https://drive.google.com/drive/folders/1bYGBw1H4OXoxwLCmAkgBuSh2Axs0ObLs?usp=sharing" class=" btn-watch-video"><i class="bi bi-download"></i></i><span>Download Aplikasi</span></a>

    </div>

  </div>

</section><!-- End Hero -->



<!-- Main -->

<main id="main">



  <!-- ======= About Section ======= -->

  <section id="about" class="about section-bg">

    <div class="container" data-aos="fade-up">



      <div class="section-title">

        <h2>Beranda</h2>

        <h3>Ketua PKK <span>Kabupaten Nganjuk</span></h3>

        <p>Sambutan Ketua TIM Penggerak PKK Kabupaten Nganjuk.</p>

      </div>



      <div class="row">

        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">

          <img src="{{ asset ('frontend/assets/img/ketua_pkk.png')}}" class="img-fluid" alt="">

        </div>

        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up"

          data-aos-delay="100">

          <!-- <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3> -->

          <p class="fst-italic">

            Assalamualaikum wr wb</br>



            </br>الْحَمْدُ ِللهِ رَبِّ الْعَالَمِيْنَ وَالصَّلاَةُ وَالسَّلاَمُ عَلَى أَشْرَفِ اْلأَنْبِيَاءِ

            وَالْمُرْسَلِيْنَ وَعَلَى اَلِهِ وَصَحْبِهِ أَجْمَعِيْنَ أَمَّا بَعْدُ</br>



            </br>"Puji dan syukur marilah kita panjatkan kehadirat ilahi Rabbi, atas karunia-Nya kita bisa sama-sama

            berkumpul dalam rangka thalabulilmi, mencari ilmu dan pahala bersama. Alhamdulillah kita dapat bertatap muka

            dalam sebuah forum yang mulia ini dalam kadaan aman fi amanillah, sehat wal afiat. Mudah-mudahan setiap

            derap langkah bisa membuahkan pahala bagi kita semua, bisa menjadi penghapus dosa dan pengangkat derajat di

            hadapan Allah SWT. Tak lupa, shalawat serta salam senantiasa tercurah kepada junjungan kita Nabi Agung

            Muhammad Saw. Kepada keluarganya, sahabatnya, para tabi’in, tabiut tabiahum, kepada kita semua, serta kepada

            seluruh umatnya hingga akhir zaman yang menjadikan sebagai uswatun hasanah, suri tauladan yang baik. Semoga

            kita senantiasa dalam syafa'atnya Yaumul Akhir nanti, Amin Allohuma Amin..."</br>



            </br>DENGAN senang hati dan tangan terbuka kami menyampaikan salam yang hangat bagi Anda untuk mengenal TP

            PKK Kabupaten Nganjuk</br>





          </p>

        </div>



        <p class="fst-italic">



          </br>Situs ini diharapkan akan memberikan informasi yang cukup mengenai Kinerja Tim Penggerak Kabupaten

          Nganjuk secara umum tentang Rangkaian Kegiatan, Rencana Kerja, dan Program Kerja TP PKK Kabupaten

          Nganjuk.</br>



          </br>Dalam rangka penertiban Administrasi bagi seluruh anggota Tim Penggerak PKK se-kabupaten Nganjuk, Maka

          dengan ini Website PKK diluncurkan.

          Kebersamaan, dan Kegotong Royongan dalam membangun dan menebarkan mafaat sebesar-besarnya bagi Masyarakat

          adalah tujuan dalam derap langkah kami.</br>



          </br>Kabupaten Nganjuk adalah "Surga" bagi kami. Keindahan alamnya, Khasanah Budayanya, Masyarakatnya,

          Pemerintahan yang Amanah dan InshaAllah memegang komitmen dalam melayani penuh Masyarakatnya, adalah tujuan

          kami bersama.

          Kerajinan Daerahnya, serta Pariwisata yang sedang dengan serius kami upayakan agar apat mengoptimalkan potensi

          baik yang ada. Peningkatan kualitas Pendidikan Anak Usia Dini di berbagai sektor pendidikan menjadi salah satu

          fokus kerja prioritas kami. TP PKK Kabupaten Nganjuk mengusung SEPEDA KEREN (Sekolah perempuan dan Anak

          Kelompok Rentan) sebagai wujud keseriusan kami dalam upaya pengentasan kemiskinan dan ke-tidakberdayaan bagi

          kelompok marginal di Kabupaten Nganjuk.</br>



          </br>Bismillahirohmanirohim,

          Dengan kemudahan mengakses informasi tentang PKK Kabupaten Nganjuk melalui situs ini, pada kesempatan ini saya

          mengajak masyarakat Kabupaten Trenggalek untuk bersama-sama memajukan PKK dalam rangka mewujudkan

          kesejahteraan masyarakat Kabupaten Nganjuk secara menyeluruh. No One Left Behind.</br>





          </br>Wabillahi Taufik Walhidayah, Wassalammualaikum Wr. Wb.</br>





          </br>Nganjuk, 5 Juli 2019</br></br></br>

          </br>Ketua TP PKK Kabupaten Nganjuk

        </p>

      </div>





    </div>

  </section><!-- End About Section -->



  <!-- ======= Skills Section ======= 

    <section id="skills" class="skills">

      <div class="container" data-aos="fade-up">



        <div class="row skills-content">



          <div class="col-lg-6">



            <div class="progress">

              <span class="skill">HTML <i class="val">100%</i></span>

              <div class="progress-bar-wrap">

                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>

              </div>

            </div>



            <div class="progress">

              <span class="skill">CSS <i class="val">90%</i></span>

              <div class="progress-bar-wrap">

                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>

              </div>

            </div>



            <div class="progress">

              <span class="skill">JavaScript <i class="val">75%</i></span>

              <div class="progress-bar-wrap">

                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>

              </div>

            </div>



          </div>



          <div class="col-lg-6">



            <div class="progress">

              <span class="skill">PHP <i class="val">80%</i></span>

              <div class="progress-bar-wrap">

                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>

              </div>

            </div>



            <div class="progress">

              <span class="skill">WordPress/CMS <i class="val">90%</i></span>

              <div class="progress-bar-wrap">

                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>

              </div>

            </div>



            <div class="progress">

              <span class="skill">Photoshop <i class="val">55%</i></span>

              <div class="progress-bar-wrap">

                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>

              </div>

            </div>



          </div>



        </div>



      </div>

    </section> End Skills Section -->



  <!-- ======= Counts Section ======= -->

  {{-- <section id="counts" class="counts">

      <div class="container" data-aos="fade-up">



        <div class="row">



          <div class="col-lg-3 col-md-6">

            <div class="count-box">

              <i class="bi bi-emoji-smile"></i>

              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>

              <p>Happy Clients</p>

            </div>

          </div>



          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">

            <div class="count-box">

              <i class="bi bi-journal-richtext"></i>

              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>

              <p>Projects</p>

            </div>

          </div>



          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">

            <div class="count-box">

              <i class="bi bi-headset"></i>

              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>

              <p>Hours Of Support</p>

            </div>

          </div>



          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">

            <div class="count-box">

              <i class="bi bi-people"></i>

              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>

              <p>Hard Workers</p>

            </div>

          </div>



        </div>



      </div>

    </section><!-- End Counts Section --> --}}



  <!-- ======= Clients Section =======

    <section id="clients" class="clients section-bg">

      <div class="container" data-aos="zoom-in">



        <div class="row">



          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">

            <img src="{{ asset ('frontend/assets/img/clients/client-1.png')}}" class="img-fluid" alt="">

          </div>



          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">

            <img src="{{ asset ('frontend/assets/img/clients/client-2.png')}}" class="img-fluid" alt="">

          </div>



          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">

            <img src="{{ asset ('frontend/assets/img/clients/client-3.png')}}" class="img-fluid" alt="">

          </div>



          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">

            <img src="{{ asset ('frontend/assets/img/clients/client-4.png')}}" class="img-fluid" alt="">

          </div>



          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">

            <img src="{{ asset ('frontend/assets/img/clients/client-5.png')}}" class="img-fluid" alt="">

          </div>



          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">

            <img src="{{ asset ('frontend/assets/img/clients/client-6.png')}}" class="img-fluid" alt="">

          </div>



        </div>



      </div>

    </section> End Clients Section -->

  <!-- ======= Portfolio Section ======= -->

  {{-- <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">



        <div class="section-title">

          <h2>Portfolio</h2>

          <p>Check our Portfolio</p>

        </div>



        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-12 d-flex justify-content-center">

            <ul id="portfolio-flters">

              <li data-filter="*" class="filter-active">All</li>

              <li data-filter=".filter-app">App</li>

              <li data-filter=".filter-card">Card</li>

              <li data-filter=".filter-web">Web</li>

            </ul>

          </div>

        </div>



        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">



          <div class="col-lg-4 col-md-6 portfolio-item filter-app">

            <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">

            <div class="portfolio-info">

              <h4>App 1</h4>

              <p>App</p>

              <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>

              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>

            </div>

          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-web">

            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">

            <div class="portfolio-info">

              <h4>Web 3</h4>

              <p>Web</p>

              <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>

              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>

            </div>

          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-app">

            <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">

            <div class="portfolio-info">

              <h4>App 2</h4>

              <p>App</p>

              <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>

              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>

            </div>

          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-card">

            <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">

            <div class="portfolio-info">

              <h4>Card 2</h4>

              <p>Card</p>

              <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>

              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>

            </div>

          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-web">

            <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">

            <div class="portfolio-info">

              <h4>Web 2</h4>

              <p>Web</p>

              <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>

              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>

            </div>

          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-app">

            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">

            <div class="portfolio-info">

              <h4>App 3</h4>

              <p>App</p>

              <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>

              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>

            </div>

          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-card">

            <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">

            <div class="portfolio-info">

              <h4>Card 1</h4>

              <p>Card</p>

              <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>

              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>

            </div>

          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-card">

            <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">

            <div class="portfolio-info">

              <h4>Card 3</h4>

              <p>Card</p>

              <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>

              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>

            </div>

          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-web">

            <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">

            <div class="portfolio-info">

              <h4>Web 3</h4>

              <p>Web</p>

              <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>

              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>

            </div>

          </div>



        </div>

        <div class="d-flex justify-content-center fs-2 gap-4 p-4">

          <button class="btn btn-primary" type="button">Galeri Lainnya</button>

      </div>

    </section><!-- End Portfolio Section --> --}}



  <!-- ======= Portfolio Section ======= -->

  

  <section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">



      <div class="section-title">

        <h2>Galeri</h2>

    <h3>Galeri PKK <span>Kabupaten Nganjuk</span></h3>

    <p>Galeri kegiatan PKK Kabupaten Nganjuk.</p>

      </div>

      

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200" >

        @forelse ($galerys as $tampil)

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">

          <img src="{{ asset('frontend2/gallery2/'.$tampil->gambar) }}" class="img-fluid" alt="">

          <div class="portfolio-info">

            <h4 >{{ $tampil->deskripsi }}</h4>

            <p>{{ $tampil->tanggal }}</p>

            {{-- <a href="{{ asset ('frontend/assets/img/team-2.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>

            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a> --}}

          </div>

        </div>

        @empty

      Data Post belum Tersedia.

    @endforelse

        

       

        

      </div>

      

    

    </div>

    <div class="d-flex justify-content-center fs-2 gap-4 p-4 " >

      <a href="{{ route('galery.index') }}" class="btn btn-primary " type="button">Galeri Lainnya</a>

    </div>

  </section><!-- End Portfolio Section -->



  <!-- ======= Services Section ======= -->

  <section id="service" class="services section-bg">

    <div class="container" data-aos="fade-up">



      <div class="section-title">

        <h2>Program Kerja</h2>

        <h3>Program Kerja PKK <span>Kabupaten Nganjuk </span></h3>

        <p>Program Kerja yang akan dikerjakan Ketua PKK Kabupaten Nganjuk.</p>

      </div>





      <div class="row gy-3">



        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">

          <div class="card">

            <div class="card-img">

              <img src="{{ asset ('frontend/assets/img/l.jpg')}}" alt="" class="img-fluid">

            </div>

            <h3><a href="{{ route('pokja.index') }}" class="stretched-link">Kelompok Kerja 1</a></h3>

            <p>Membidangi Pembinaan Karakter dalam Keluarga, yang di antaranya menglola program Penghayatan dan

              Pengalaman Pancasila serta Gotong Royong.</p>

          </div>

        </div><!-- End Card Item -->







        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">

          <div class="card">

            <div class="card-img">

              <img src="{{ asset ('frontend/assets/img/o.jpeg')}}" alt="" class="img-fluid">

            </div>

            <h3><a href="{{ route('pokjathu.index') }}" class="stretched-link">Kelompok Kerja 2</a></h3>

            <p>Membidangi Pendidikan & Peningkatan Ekonomi Keluarga, mengelola program pendidikan & keterampulan, serta

              pengalaman kehidupan berkoperasi.</p>

          </div>

        </div><!-- End Card Item -->



        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">

          <div class="card">

            <div class="card-img">

              <img src="{{ asset ('frontend/assets/img/t.jpeg')}}" alt="" class="img-fluid">

            </div>

            <h3><a href="{{ route('pokjatre.index') }}" class="stretched-link">Kelompok Kerja 3</a></h3>

            <p>Membidangi penguatan ketahanan keluarga, yang diantaranya mengelola program Pangan, Sandang, serta

              Perumahan dan Tata laksana Rumah Tangga.</p>

          </div>

        </div><!-- End Card Item -->



        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">

          <div class="card">

            <div class="card-img">

              <img src="{{ asset ('frontend/assets/img/i.jpeg')}}" alt="" class="img-fluid">

            </div>

            <h3><a href="{{ route('pokjafou.index') }}" class="stretched-link">Kelompok Kerja 4</a></h3>

            <p>Membidangi Kesehatan Keluarga dan Lingkungan, diantaranya mengelola program kesehatan, Kelestarian

              lingkungan hidup dan perencanaan sehat.</p>

          </div>

        </div><!-- End Card Item -->







      </div>



    </div>

  </section><!-- End Services Section -->





  <!-- ======= Testimonials Section ======= -->

  {{-- <section id="testimonials" class="testimonials">

      <div class="container" data-aos="zoom-in">



        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">

          <div class="swiper-wrapper">



            <div class="swiper-slide">

              <div class="testimonial-item">

                <img src="{{ asset ('frontend/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img"

  alt="">

  <h3>Saul Goodman</h3>

  <h4>Ceo &amp; Founder</h4>

  <p>

    <i class="bx bxs-quote-alt-left quote-icon-left"></i>

    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam,

    ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.

    <i class="bx bxs-quote-alt-right quote-icon-right"></i>

  </p>

  </div>

  </div><!-- End testimonial item -->



  <div class="swiper-slide">

    <div class="testimonial-item">

      <img src="{{ asset ('frontend/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">

      <h3>Sara Wilsson</h3>

      <h4>Designer</h4>

      <p>

        <i class="bx bxs-quote-alt-left quote-icon-left"></i>

        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum

        velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.

        <i class="bx bxs-quote-alt-right quote-icon-right"></i>

      </p>

    </div>

  </div><!-- End testimonial item -->



  <div class="swiper-slide">

    <div class="testimonial-item">

      <img src="{{ asset ('frontend/assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">

      <h3>Jena Karlis</h3>

      <h4>Store Owner</h4>

      <p>

        <i class="bx bxs-quote-alt-left quote-icon-left"></i>

        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore

        quem eram duis noster aute amet eram fore quis sint minim.

        <i class="bx bxs-quote-alt-right quote-icon-right"></i>

      </p>

    </div>

  </div><!-- End testimonial item -->



  <div class="swiper-slide">

    <div class="testimonial-item">

      <img src="{{ asset ('frontend/assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">

      <h3>Matt Brandon</h3>

      <h4>Freelancer</h4>

      <p>

        <i class="bx bxs-quote-alt-left quote-icon-left"></i>

        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor

        enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.

        <i class="bx bxs-quote-alt-right quote-icon-right"></i>

      </p>

    </div>

  </div><!-- End testimonial item -->



  <div class="swiper-slide">

    <div class="testimonial-item">

      <img src="{{ asset ('frontend/assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">

      <h3>John Larson</h3>

      <h4>Entrepreneur</h4>

      <p>

        <i class="bx bxs-quote-alt-left quote-icon-left"></i>

        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore

        duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.

        <i class="bx bxs-quote-alt-right quote-icon-right"></i>

      </p>

    </div>

  </div><!-- End testimonial item -->



  </div>

  <div class="swiper-pagination"></div>

  </div>



  </div>

  </section><!-- End Testimonials Section --> --}}



  <!-- ======= Portfolio Section ======= -->

  {{-- <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

      

        <div class="section-title">

          <h2>Galeri</h2>

          <h3>Galeri PKK <span>Kabupaten Nganjuk</span></h3>

          <p>Galeri kegiatan PKK Kabupaten Nganjuk.</p>

        </div>



        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-12 d-flex justify-content-center">

            <ul id="portfolio-flters">

              <li data-filter="*" class="filter-active">All</li>

              <li data-filter=".filter-app">App</li>

              <li data-filter=".filter-card">Card</li>

              <li data-filter=".filter-web">Web</li>

            </ul>

          </div>

        </div>



        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          

        {{-- @forelse ($galerys as $tampil)

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">

            <img src="{{ asset('frontend/assets/img/galeri/'.$tampil->gambar) }}" class="img-fluid" alt="">

  <div class="portfolio-info">

    <h4>{{ $tampil->judul }}</h4>

    <p>{{ $tampil->deskripsi }}</p>

    <a href="{{ asset('frontend/assets/img/galeri/'.$tampil->gambar) }}" data-gallery="portfolioGallery"

      class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>

    <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>

  </div>

  </div>

  @empty

  Data Post belum Tersedia.

  @endforelse --}}



  {{-- </div> --}}



  {{-- </div> --}}

  {{-- </section><!-- End Portfolio Section -->  --}}

  <!-- ======= Services Section ======= -->





  <!-- ======= Team Section ======= -->





  <!-- ======= Pricing Section ======= -->





  <!-- ======= Frequently Asked Questions Section ======= -->



  <!-- ======= Contact Section ======= -->





</main><!-- End #main -->



@endsection