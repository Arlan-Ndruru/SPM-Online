<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ URL::asset('dash/img/favicon.png') }}">
    <title>
        SISTEM INFORMASI PENGOLAAN DATA MUSTAHIK BAZNAS KOTA PEKANBARU | 
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{URL::asset('dash/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{URL::asset('dash/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{URL::asset('dash/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ URL::asset('dash/css/argon-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
</head>

<body class="" oncontextmenu="return false">
    <!-- Navbar -->
        @include('layouts.auth.nav')
    <!-- End Navbar -->

    {{-- content-main --}}
        @yield('content-main')
    {{-- end content-main --}}
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        @include('layouts.auth.footer')
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="{{ URL::asset('dash/js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('dash/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('dash/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('dash/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ URL::asset('dash/js/argon-dashboard.min.js?v=2.0.1') }}"></script>
</body>

</html>