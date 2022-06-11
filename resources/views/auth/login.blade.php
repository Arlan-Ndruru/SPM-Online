@extends('layouts.auth.main')

@section('content-main')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Silahkan Login</h4>
                                    <p class="mb-0">Masukkan Email dan Password! </p>
                                </div>
                                <div class="card-body">
                                    @if (session()->has('need'))
                                    <div class="alert alert-success" role="alert">
                                        <i class="text-white">{{session('need')}}</i>
                                    </div>
                                    @endif
                                    @if (session()->has('confirm'))
                                    <div class="alert alert-info" role="alert">
                                        <i class="text-white">{{session('confirm')}} <br> or you can wait within 24 hours</i>
                                        <i class="bi bi-emoji-smile text-white"></i>
                                    </div>
                                    @endif
                                    <form role="form" method="POST" action="{{ ROUTE('login') }}">
                                        @csrf
                                        <div class="mb-3 input-group">
                                            <span class="input-group-text" id="basic-addon1">Email : </span>
                                            <input type="email" class="form-control form-control-lg" placeholder="Email"
                                                aria-label="Email" name="email" required autofocus>
                                        </div>
                                        <div class="input-group mb-3" id="show_hide_password">
                                            <span class="input-group-text" id="basic-addon1">Password : </span>
                                            <input type="password" id="showpassword" autocomplete="current-password" class="form-control form-control-lg" placeholder="Password"
                                                aria-label="Password" name="password" required>
                                                <a href="#"><i class="btn btn-success mt-1 mb-0 border-0 fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-success btn-lg w-100 mt-4 mb-0">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Belum Punya Akun?
                                        <a href="javascript:;" class="text-success text-gradient font-weight-bold">Silahkan Register</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-success h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
              background-size: cover;">
                                <span class="mask bg-gradient-success opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"SELAMAT DATANG !"</h4>
                                <p class="text-white position-relative">SISTEM INFORMASI PENGOLAHAN DATA MUSTAHIK BAZNAS KOTA PEKANBARU</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
            }
            });
            });
    </script>
@endsection