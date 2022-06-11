<nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
    <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-dark" href="/">
            <img src="{{ URL::asset('dash/img/favicon.png') }}" class="navbar-brand-img" style="height: 30px;" alt="Baznas Kota Pekanbaru">
            SPM BAZNAS KOTA PEKANBARU
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                        href="#">
                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                        Dashboard
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link me-2" href="https://kotapekanbaru.baznas.go.id/index.php/struktur-organisasi/">
                        <i class="fa fa-user opacity-6 text-dark me-1"></i>
                        Tentang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="/register">
                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                        Registrer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="/login">
                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                        Login
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                    <a href="https://kotapekanbaru.baznas.go.id/" target="_blank"
                        class="btn btn-sm mb-0 me-1 btn-success">BAZNAS Kota Pekanbaru</a>
                </li>
            </ul>
        </div>
    </div>
</nav>