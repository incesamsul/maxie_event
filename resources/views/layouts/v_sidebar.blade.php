<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">based</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            {{-- MENU PENGGUNA --}}
            {{-- SEMUA PENGGUNA / USER MEMPUNYAI MENU INI --}}
            <li class="menu-header">Pengguna</li>
            <li class="" id="liDashboard"><a class="nav-link" href="{{ URL::to('/dashboard') }}"><i
                        class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li class="" id="liProfile"><a class="nav-link" href="{{ URL::to('/profile') }}"><i class="fas fa-user"></i>
                    <span>Profile</span></a></li>
            <li class="" id="liBantuan"><a class="nav-link" href="{{ URL::to('/bantuan') }}"><i
                        class="fas fa-question-circle"></i> <span>Bantuan</span></a></li>



            @if (auth()->user()->role == 'Administrator')
            {{-- MENU ADMIN --}}
            <li class="menu-header">Admin</li>
            {{-- <li class="nav-item dropdown " id="liPengguna">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>Pengguna</span></a>
                <ul class="dropdown-menu">
                    <li id="liManajemenPengguna"><a class="nav-link" href="/admin/pengguna">Manajemen Pengguna</a></li>
                </ul>
            </li> --}}
            <li class="" id="liTamu"><a class="nav-link" href="{{ URL::to('/admin/tamu') }}"><i
                class="fas fa-users"></i> <span>Tamu</span></a></li>
            <li class="" id="liSambutan"><a class="nav-link" href="{{ URL::to('/admin/sambutan') }}"><i
                class="fas fa-smile"></i> <span>Sambutan</span></a></li>
            <li class="" id="liScanner"><a class="nav-link" href="{{ URL::to('/admin/scanner') }}"><i
                class="fas fa-qrcode"></i> <span>Scanner</span></a></li>
            <li class="" id="liRekapTamuHadir"><a class="nav-link" href="{{ URL::to('/admin/rekap_tamu_hadir') }}"><i
                class="fas fa-list"></i> <span>Rekap tamu hadir</span></a></li>
            <li class="" id="liRekapTamuTidakHadir"><a class="nav-link" href="{{ URL::to('/admin/rekap_tamu_tidak_hadir') }}"><i
                class="fas fa-list"></i> <span>Rekap tamu tidak hadir</span></a></li>
                

            {{-- END OF MENU ADMIN --}}
            @endif







        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ URL::to('/logout') }}" class="btn btn-dark btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>
