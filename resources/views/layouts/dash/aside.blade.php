<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}" target="_blank">
            <img src="{{ URL::asset('dash/img/favicon.png') }}" class="navbar-brand-img h-100" alt="Baznas Kota Pekanbaru">
            <span class="ms-1 font-weight-bold">SPM BAZNAS PEKANBARU</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if (Auth::user()->hasRole(['Admin', 'Ketua', 'Staf-Distribusi', 'Staf-Resepsionis', 'Calon-Mustahik']))
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active bg-success' : '' }}" href="/dashboard">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 {{ Request::is('dashboard') ? 'text-white' : 'text-success' }} text-sm"></i>
                        </div>
                        <span class="nav-link-text {{ Request::is('dashboard') ? 'text-white' : 'text-success' }} ms-1">Dashboard</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->hasRole(['Admin', 'Ketua', 'Staf-Resepsionis']))                    
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/users*') ? 'active bg-success' : '' }}" href="{{ route('dashUsers') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 {{ Request::is('dashboard/users*') ? 'text-white' : 'text-success' }} text-sm"></i>
                        </div>
                        <span class="nav-link-text {{ Request::is('dashboard/users*') ? 'text-white' : 'text-success' }} ms-1">Users</span>
                    </a>
                </li>
            @endif                    
            @if (Auth::user()->hasRole(['Admin', 'Ketua', 'Staf-Distribusi', 'Staf-Resepsionis']))                    
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/mustahik*') ? 'active bg-success' : '' }}" href="{{ route('dashMustahiks') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users {{ Request::is('dashboard/mustahik*') ? 'text-white' : 'text-success' }} text-sm"></i>
                    </div>
                    <span class="nav-link-text {{ Request::is('dashboard/mustahik*') ? 'text-white' : 'text-success' }} ms-1">Data Mustahik</span>
                </a>
            </li>
            @endif                    
            @if (Auth::user()->hasRole(['Admin', 'Ketua', 'Staf-Resepsionis']))                                    
                <li class="nav-item mb-1">
                    <a class="nav-link btn btn-toggle align-items-center rounded collapsed {{ Request::is('dashboard/mosques*','dashboard/districts*') ? 'bg-success' : '' }}" data-bs-toggle="collapse"
                        data-bs-target="#home-collapse" aria-expanded="true">
                        <i class="fa fa-mosque {{ Request::is('dashboard/mosques*','dashboard/districts*') ? 'text-white' : 'text-success' }}"></i>
                        <span class="nav-link-text {{ Request::is('dashboard/mosques*','dashboard/districts*') ? 'text-white' : 'text-success' }}  ms-1">Data Mesjid</span>
                    </a>
                    <div class="collapse {{ Request::is('dashboard/mosques*','dashboard/districts*' ) ? 'show opacity-8' : '' }}" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a href="{{ route('dashMosques') }}" class="nav-link {{ Request::is('dashboard/mosques*') ? 'active bg-dark' : '' }}  rounded">
                                    <span class="nav-link-text {{ Request::is('dashboard/mosques*') ? 'text-white' : 'text-success' }}"><i class="fa fa-server"></i> Manage Masjid</span>
                                </a>
                            </li>
                            @if (Auth::user()->hasRole(['Admin', 'Ketua']))
                                <li>
                                    <a href="{{ route('dashDistricts') }}" class="nav-link {{ Request::is('dashboard/districts*') ? 'active bg-dark' : '' }} rounded">
                                        <span class="nav-link-text {{ Request::is('dashboard/districts*') ? 'text-white' : 'text-success' }}"><i
                                                class="fa fa-server"></i> Manage Kecamatan</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif                                        
        </ul>
    </div>
</aside>