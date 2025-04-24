<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex gap-3"><div class="logo">
        <img src="{{ asset ('frontend/assets/img/favicon.png')}}" class="img-fluid" alt="">
      </div>
      <h1 class="logo"><a href="home">Pemberdayaan Kesejahteraan Keluarga </br>Kabupaten Nganjuk<span></span></a></h1></div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ route('home.index') }}#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="{{ route('home.index') }}#portfolio">Galeri</a></li>
          <li><a class="nav-link scrollto " href="{{ route('home.index') }}#service">Program Kerja</a></li>
          
          <li class="dropdown"><a href="#informasi"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('berita.index') }}">Berita</a></li>
              {{-- <li><a href="{{ route('showkes.index') }}">Laporan Kesehatan</a></li>
              <li><a href="{{ route('showling.index') }}">Laporan Kelestarian Lingkungan Hidup</a></li>
              <li><a href="{{ route('showhat.index') }}">Laporan Perencanaan Sehat</a></li> --}}
              <li><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
             
              <li><a href="{{ route('visimisi.index') }}">Visi Misi</a></li>
              <li><a href="lambangpkk">Arti Lambang PKK</a></li>
              <li><a href="sejarah">Sejarah</a></li>
              <li><a href="mars">Mars PKK</a></li>
            </ul>
          </li>
          <li><a href="{{ route('login') }}">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->