@extends('layouts.dash.main')

@section('content-main')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tambah Users</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <a href="{{ route('dashUsers') }}" class="m-3 btn btn-success">Back</a>
                        <div class="form col-md-6 mx-4">
                            <form role="form" method="POST" action="{{route('dashUserStore')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group w-75">
                                    <label class="form-label">Nomor Identitas (NIK) : </label>
                                    <div class="text-dark text-sm ">
                                        <i>Note : Berdasarkan Data KTP, Harus 16 digit</i>
                                    </div>
                                    <input type="number" maxlength="16"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                     name="unique_number" class="form-control @error('unique_number') is-invalid @enderror" required
                                        value="{{old('unique_number')}}" autofocus>
                                    @error('unique_number')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">Nama Lengkap :</label>
                                    <div class="text-dark text-sm ">
                                        <i>Note : Berdasarkan Data KTP</i>
                                    </div>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required
                                        value="{{old('name')}}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">Email</label>
                                    <div class="text-dark text-sm ">
                                        <i>Saran : NIK@gmail.com</i>
                                    </div>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required
                                        value="{{old('email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                @if (Auth::user()->hasRole('Ketua|Admin'))  
                                    <div class="form-group w-75">
                                        <label class="form-label">Pilih role</label>
                                        <select name="role_id" class="form-control opacity-8" id="roles">
                                            <option hidden>Sebagai:</option>
                                            @if(count($roles)) @foreach($roles as $row)
                                            <option value="{{old('role_id', $row->id)}}">{{$row->display_name}}</option>
                                            @endforeach @endif
                                        </select>
                                    </div>
                                @endif
                                @if (Auth::user()->hasRole('Staf-Resepsionis'))  
                                    <div class="form-group w-75">
                                        <label class="form-label">Pilih role</label>
                                        <select name="role_id" class="form-control opacity-8" id="roles">
                                            <option hidden>Sebagai:</option>
                                            <option value="Calon-Mustahik">Calon Mustahik</option>
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group w-75">
                                    <label class="form-label">Phone Number (+62)</label>
                                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" required
                                    maxlength="15"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        value="{{old('no_hp', 62)}}">
                                    @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group position-relative">
                                    <label for="" class="form-label">Surat Rekomendasi UPZ</label>
                                    <input type="file" name="sr_upz"
                                        class="form-control is-valid @error('sr_upz') is-invalid @enderror" id="file-open"
                                        onchange="previewFile()">
                                
                                    <div class="valid-feedback">
                                        *Berkas blanko dari baznas dan telah diisi berupa file PDF [max:2mb]
                                    </div>
                                    @error('sr_upz')
                                    <div class="invalid-tooltip">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="text-white btn btn-lg bg-success btn-lg w-75 mt-4 mb-0">Add Account</button>
                                </div>
                                <div class="col-xl-12">
                                    <div class="card-body d-flex justify-content-center">
                                        <iframe src="" id="iframe-pdf" width="1200px" height="800px"></iframe>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
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