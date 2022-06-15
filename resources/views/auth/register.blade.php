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
                <div class="col-xl-6 col-lg-6 col-md-8 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Register Mustahik</h5>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                                @csrf
                                <div class="feedback">
                                    <i class="text-primary text-sm">Catatan : Isi Data Sesuai Data KTP !</i>
                                </div>
                                <div class="mb-3 w-75 input-group">
                                    <span class="input-group-text" id="basic-addon1">NIK : </span>
                                    <input type="number" value="{{ old('unique_number') }}"
                                    maxlength="16"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                     class="form-control @error('unique_number') is-invalid @enderror" name="unique_number" required placeholder="NIK" aria-label="NIK">
                                     @error('unique_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                     @enderror
                                </div>
                                <div class="mb-3 w-75 input-group">
                                    <span class="input-group-text" id="basic-addon1">Nama Lengkap : </span>
                                    <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" required placeholder="Nama Lengkap" aria-label="Name">
                                </div>
                                <div class="feedback">
                                    <i class="text-dark text-sm">Contoh : nik@gmail.com</i>
                                </div>
                                <div class="mb-3 w-75 input-group">
                                    <span class="input-group-text" id="basic-addon1">Email : </span>
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" required placeholder="Email" aria-label="Email">
                                </div>
                                <div class="feedback">
                                    <i class="text-dark text-sm">*Password lebih dari sama dengan 8 digit</i>
                                </div>
                                <div class="input-group w-75 mb-3" id="show_hide_password">
                                    <span class="input-group-text" id="basic-addon1">Password : </span>
                                    <input type="password" id="showpassword" autocomplete="current-password" class="form-control @error('password') is-invalid @enderror form-control-lg"
                                        placeholder="Password" aria-label="Password" name="password" required>
                                    <a href="#"><i class="btn btn-success mt-1 mb-0 border-0 fa fa-eye-slash" aria-hidden="true"></i></a>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="feedback">
                                    <i class="text-dark text-sm">*Gunakan Format : +62</i>
                                </div>
                                <div class="mb-3 w-75 input-group">
                                    <span class="input-group-text" id="basic-addon1">No HP : </span>
                                    <input type="number" name="no_hp"
                                    maxlength="15"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp',62) }}" class="form-control" required placeholder="No Handphone"
                                        aria-label="Password">
                                </div>
                                <div class="feedback form-group">
                                    <label for="sr_upzlabel" class="form-label">Surat Rekomendasi UPZ</label><br>
                                    <i class="text-dark text-sm">*Berkas blanko dari baznas dan telah diisi berupa file PDF [max:2mb]</i>
                                    <iframe src="" frameborder="0" class="w-75"></iframe>
                                </div>
                                <div class="form-group w-75 position-relative">
                                    <input type="file" id="sr_upzlabel" name="sr_upz" class="form-control @error('sr_upz') is-invalid @enderror" id="file-open"
                                        onchange="previewFile()">
                                    @error('sr_upz')
                                    <div class="invalid-tooltip">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <br>
                                <label for="" class="form-label">Pilih Jenis Role</label>
                                <div class="input-group w-75 mb-3">
                                    <select name="role_id" class="form-control opacity-8" id="roles">
                                        <option value="Calon-Mustahik">Calon Mustahik</option>
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

    function previewFile() {
        const preview = document.querySelector('iframe');
        const file = document.querySelector('input[type=file]').files[0];
        const reader = new FileReader();
        var filename = file.name;

        reader.addEventListener("load", function () {
        // convert file to base64 string
        preview.src = reader.result;
        }, false);

        if (file) {
        reader.readAsDataURL(file);
        }
    }
</script>
@endsection