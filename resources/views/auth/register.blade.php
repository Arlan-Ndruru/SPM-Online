@extends('layouts.auth.main')

@section('content-main')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-success opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
                        <p class="text-lead text-white">SISTEM INFORMASI PENGOLAHAN DATA MUSTAHIK BAZNAS KOTA PEKANBARU.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Register</h5>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3 input-group">
                                    <span class="input-group-text" id="basic-addon1">NIK : </span>
                                    <input type="number" class="form-control" name="unique_number" required placeholder="NIK" aria-label="NIK">
                                </div>
                                <div class="mb-3 input-group">
                                    <span class="input-group-text" id="basic-addon1">Nama Lengkap : </span>
                                    <input type="text" class="form-control" name="name" required placeholder="Nama Lengkap" aria-label="Name">
                                </div>
                                <div class="mb-3 input-group">
                                    <span class="input-group-text" id="basic-addon1">Email : </span>
                                    <input type="email" name="email" class="is-valid form-control" required placeholder="Email" aria-label="Email">
                                    <div class="valid-feedback">
                                        <i>Contoh : nik@gmail.com</i>
                                    </div>
                                </div>
                                <div class="mb-3 input-group">
                                    <span class="input-group-text" id="basic-addon1">Password : </span>
                                    <input type="password" name="password" class="form-control" required placeholder="Password"
                                        aria-label="Password">
                                </div>
                                <div class="mb-3 input-group">
                                    <span class="input-group-text" id="basic-addon1">No HP : </span>
                                    <input type="number" name="no_hp" class="form-control" required placeholder="No Handphone"
                                        aria-label="Password">
                                </div>
                                <div class="input-group mb-3">
                                    <select name="role_id" class="form-control opacity-8" id="roles">
                                        <option hidden>Register Sebagai:</option>
                                        <option value="Calon-Mustahik">Calon Mustahik</option>
                                        <option value="Staf-Resepsionis">Staf Receptionist</option>
                                        <option value="Staf-Distribusi">Staf Distribusi</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">Register</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Sudah Punya Akun? <a href="javascript:;"
                                        class="text-success font-weight-bolder">Silahkan Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection