{{-- resources/views/backend/includes/sidebar.blade.php --}}
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Dashboard - Akses semua -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}"
                href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Tanda Tangan - Hanya untuk guard web -->
        @auth('web')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('ttd.*') ? '' : 'collapsed' }}" href="{{ route('ttd.index') }}">
                    <i class="fa-solid fa-signature"></i>
                    <span>Tanda Tangan</span>
                </a>
            </li>
        @endauth

        <!-- Berita - Hanya untuk guard web -->
        @auth('web')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('input_berita.*') ? '' : 'collapsed' }}"
                    href="{{ route('input_berita.index') }}">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>
        @endauth

        <!-- Pengumuman - Hanya untuk guard web -->
        @auth('web')
            @if(request()->routeIs('ttd.*'))
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('input_pengumuman.*') ? '' : 'collapsed' }}"
                        href="{{ route('input_pengumuman.index') }}">
                        <i class="fa-sharp fa-solid fa-bullhorn"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>
            @endif
        @endauth

        <!-- Galeri - Akses semua -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#galeri_nav" data-bs-toggle="collapse" href="#">
                <i class="fa-solid fa-image"></i><span>Galeri</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="galeri_nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('galeribidangumum.index') }}"><i class="bi bi-circle"></i><span>Bidang
                            Umum</span></a></li>
                <li><a href="{{ route('galeripokja1.index') }}"><i class="bi bi-circle"></i><span>Kelompok Kerja
                            1</span></a></li>
                <li><a href="{{ route('galeripokja2.index') }}"><i class="bi bi-circle"></i><span>Kelompok Kerja
                            2</span></a></li>
                <li><a href="{{ route('galeripokja3.index') }}"><i class="bi bi-circle"></i><span>Kelompok Kerja
                            3</span></a></li>
                <li><a href="{{ route('galeripokja4.index') }}"><i class="bi bi-circle"></i><span>Kelompok Kerja
                            4</span></a></li>
            </ul>
        </li>

        <!-- Kelompok Kerja - Akses semua -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-solid fa-book"></i><span>Kelompok Kerja</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('accbidangumum.index') }}"><i class="bi bi-circle"></i><span>Bidang
                            Umum</span></a></li>
                <li><a href="{{ route('pokja1.index') }}"><i class="bi bi-circle"></i><span>Kelompok Kerja 1</span></a>
                </li>
                <li><a href="{{ route('pokja2.index') }}"><i class="bi bi-circle"></i><span>Kelompok Kerja 2</span></a>
                </li>
                <li><a href="{{ route('pokja3.index') }}"><i class="bi bi-circle"></i><span>Kelompok Kerja 3</span></a>
                </li>
                <li><a href="{{ route('pokja4.index') }}"><i class="bi bi-circle"></i><span>Kelompok Kerja 4</span></a>
                </li>
            </ul>
        </li>

        <!-- Halaman -->
        <li class="nav-heading">Halaman</li>

        <!-- Profil - Akses semua -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('profile.*') ? '' : 'collapsed' }}"
                href="{{ route('profile.index') }}">
                <i class="fa-solid fa-user"></i>
                <span>Profil</span>
            </a>
        </li>

        <!-- Keluar - Akses semua -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="logout" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar</span>
            </a>
        </li>
    </ul>
</aside>