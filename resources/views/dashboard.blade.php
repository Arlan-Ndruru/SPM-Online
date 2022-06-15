@extends('layouts.dash.main')

@section('content-main')

    <div class="container-fluid py-4">
        <div class="row">
            @if (Auth::user()->hasRole(['Admin','Ketua','Staf-Distribusi','Staf-Resepsionis']))
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <a href="{{ route('dashMustahiks') }}">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Data Mustahik</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $cmustahik }}
                                        </h5>
                                        <p class="mb-0">
                                            <span class="text-success font-weight-bolder">Tedata</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->hasRole(['Admin','Ketua']))
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <a href="{{ route('dashUsers') }}">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Staf</p>
                                            <h5 class="font-weight-bolder">
                                                {{ $cstaf }}
                                            </h5>
                                            <p class="mb-0">
                                                <span class="text-success text-sm font-weight-bolder">Active</span>
                                                
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                            <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->hasRole(['Admin','Ketua','Staf-Resepsionis']))
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <a href="{{ route('dashMosques') }}">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Data Masjid</p>
                                            <h5 class="font-weight-bolder">
                                                {{ $cmasjid }}
                                            </h5>
                                            <p class="mb-0">
                                                <span class="text-success text-sm font-weight-bolder">Terdata</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="fa fa-mosque bg-gradient-success shadow-success text-center rounded-circle">
                                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->hasRole(['Admin','Ketua','Staf-Resepsionis']))
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <a href="{{ route('dashUsers') }}">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">User</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $cuser }}
                                        </h5>
                                        <p class="mb-0">
                                            <span class="text-success text-sm font-weight-bolder">Active</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @if (Auth::user()->hasRole(['Calon-Mustahik']))
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Calon {{ $title }}, {{ Auth::user()->name }}</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0 mx-4">
                                <table class="table table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary text-xxs font-weight-bolder opacity-7">NO</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Masjid</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Files
                                                </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mustahiks as $mustahik)
                                        <tr>
                                            <td>
                                                <p class="text-xxs text-center font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{-- <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="mustahik1">
                                                    </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $mustahik->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">NIK : {{ $mustahik->unique_number }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $mustahik->mosque->name }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if (Auth::user()->hasRole(['Calon-Mustahik']))
                                                    @if($mustahik->ket == 1){{-- Staf Mustahik --}}
                                                    <span class="badge bg-secondary">Menunggu Verifikasi</span>
                                                    @elseif($mustahik->ket == 3){{-- Staf TU --}}
                                                    <span class="badge bg-success">Selesai</span>
                                                    @elseif($mustahik->ket == 4){{-- Staf TU --}}
                                                    <span class="badge bg-danger">Data Bermasalah, Silahkan Uploud ulang setelah data ini di delete</span>
                                                    @else
                                                    <span class="badge bg-warning">Dalam Proses</span>
                                                    @endif
                                                @endif
                                                
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <a href="{{ asset('storage/'.$mustahik->surat_pengantar) }}" target="_blank">
                                                <span class="badge bg-dark btn-tooltip" title="1. File Blanko"  data-bs-toggle="tooltip" data-bs-placement="top">
                                                    1
                                                </span>
                                                </a>
                                                <a href="{{ asset('storage/'.$mustahik->f_ktp) }}" target="_blank">
                                                <span class="badge bg-dark btn-tooltip" title="2. File KTP"  data-bs-toggle="tooltip" data-bs-placement="top">
                                                    3
                                                </span>
                                                </a>
                                                <a href="{{ asset('storage/'.$mustahik->f_kk) }}" target="_blank">
                                                <span class="badge bg-dark btn-tooltip" title="3. File KK" data-bs-toggle="tooltip" data-bs-placement="top">
                                                    2
                                                </span>
                                                </a>
                                                <a href="{{ asset('storage/'.$mustahik->f_foto) }}" target="_blank">
                                                <span class="badge bg-dark btn-tooltip" title="4. File Foto" data-bs-toggle="tooltip" data-bs-placement="top">
                                                    4
                                                </span>
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                {{-- <button type="button"
                                                    class="btn btn-outline-warning btn-lg border-0 p-2  font-weight-bold text-xs btn-tooltip"
                                                    data-bs-placement="top" title="Detail mustahik" data-container="body" data-animation="true"
                                                    data-bs-toggle="modal" data-bs-target="#modal-default"><span class="fa fa-eye"></span> Detail</button> --}}
                                                <form action="{{route('dashdeletebyMustahik', $mustahik->slug)}}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Mustahik" data-container="body"
                                                        data-animation="true" onclick="return confirm('Delete?')">
                                                        <i class="fa fa-trash-o"></i> Hapus
                                                    </button>
                                                </form>
                                        
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="row">
                        <div class="col-6">
                            @if (session()->has('error'))
                            <div class="col-md-5 d-inline alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-icon align-middle">
                                    <div class="spinner-grow text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </span>
                                <span class="alert-text text-white"><strong>{{session('error')}}</strong> check it out!</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if (session()->has('success'))
                            <div class="col-md-5 d-inline alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-icon align-middle">
                                    <div class="spinner-grow text-light" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </span>
                                <span class="alert-text text-white"><strong>{{session('success')}}</strong> check it out!</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="card-header pb-0">
                                <h6>Form Pendaftaran Calon Mustahik</h6>
                            </div>
                            <div class="card-body m-4 px-0 pt-0 pb-2 ">
                                <form role="form" method="POST" action="{{route('storebyMustahiks')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group w-75">
                                        <label class="form-label">NIK : </label>
                                        <input type="text" readonly id="unique_number" name="unique_number"
                                            class="form-control is-valid @error('unique_number') is-invalid @enderror" required
                                            value="{{old('unique_number', Auth::user()->unique_number)}}">
                                        <div class="valid-feedback">
                                            Pastikan NIK sesuai KTP dan saat register
                                        </div>
                                        @error('unique_number')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-75">
                                        <label class="form-label">Nama Lengkap Mustahik : </label>
                                        <input type="text" id="name" name="name" autofocus class="form-control @error('name') is-invalid @enderror"
                                            required value="{{old('name')}}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-75">
                                        {{-- <label class="form-label">Slug : </label> --}}
                                        <input type="text" hidden id="slug" name="slug"
                                            class="form-control @error('slug') is-invalid @enderror" required value="{{old('slug')}}">
                                        @error('slug')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-75">
                                        <label class="form-label">Alamat Lengkap : </label>
                                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" required
                                            value="{{old('alamat')}}">
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-75">
                                        <label class="form-label">Tempat Lahir : </label>
                                        <input type="text" name="t_lahir" class="form-control @error('t_lahir') is-invalid @enderror"
                                            required value="{{old('t_lahir')}}">
                                        @error('t_lahir')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-75">
                                        <label class="form-label">Tanggal Lahir : </label>
                                        <input type="date" name="tl" class="form-control @error('tl') is-invalid @enderror" required
                                            value="{{old('tl')}}">
                                        @error('tl')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-75">
                                        <label class="form-label" for="masjid">Masjid : </label>
                                        <select name="masjid" class="form-select" id="masjid">
                                            <option hidden>-Pilih Masjid-</option>
                                            @foreach ($mosque as $row)
                                            {{-- <option value="{{ $row->id }}" {{ (Input::old("masjid")==$row->id ? "selected" :"") }}>{{ $row->name }}</option> --}}
                                            <option {{ old('masjid') == $row->id ? "selected" : "" }} value="{{ $row->id }}">{{ $row->name }}</option>

                                            {{-- <option value="{{ $row->id }}">{{ $row->name }}</option> --}}
                                            @endforeach
                                        </select>
                                        @error('masjid')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-75">
                                        <label class="form-label">Phone Number (+62)</label>
                                        <input type="number" name="no_hpM" class="form-control is-valid @error('no_hpM') is-invalid @enderror"
                                            required value="{{old('no_hpM')}}">
                                            <div class="valid-feedback">
                                                Contoh : 628989822321
                                            </div>
                                        @error('no_hpM')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <hr class="horizontal dark">
                                    <div class="form-group position-relative">
                                        <label for="" class="form-label">Berkas Blanko</label>
                                        <input type="file" name="surat_pengantar"
                                            class="form-control is-valid @error('surat_pengantar') is-invalid @enderror" id="file-open"
                                            onchange="previewFile()">
                    
                                        <div class="valid-feedback">
                                            *Berkas blanko dari baznas dan telah diisi berupa file PDF [max:2mb]
                                        </div>
                                        @error('surat_pengantar')
                                        <div class="invalid-tooltip">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-75 position-relative">
                                        <br>
                                        <label for="" class="form-label">Kartu Tanda Penduduk (KTP)</label>
                                        <input type="file" name="f_ktp" class="form-control is-valid @error('f_ktp') is-invalid @enderror"
                                            id="file-open" onchange="previewFile()">
                    
                                        <div class="valid-feedback">
                                            *Scan KTP asli berupa file PDF [max:2mb]
                                        </div>
                                        @error('f_ktp')
                                        <div class="invalid-tooltip">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group w-75 position-relative">
                                        <br>
                                        <label for="" class="form-label">Kartu Keluarga (KK)</label>
                                        <input type="file" name="f_kk" class="form-control is-valid @error('f_kk') is-invalid @enderror"
                                            id="file-open" onchange="previewFile()">
                                        @error('f_kk')
                                        <div class="invalid-tooltip">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="valid-feedback">
                                            *Scan KK asli berupa file PDF [max:2mb]
                                        </div>
                                    </div>
                                    <div class="form-group w-75 position-relative">
                                        <br>
                                        <label for="" class="form-label">Foto 3x4</label>
                                        <input type="file" name="f_foto" class="form-control is-valid @error('f_foto') is-invalid @enderror" id="customImage"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Masukkan Gambar" onchange="previewImage()">
                                            @error('f_foto')
                                            <div class="invalid-tooltip">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <div class="valid-feedback">
                                                *foto 3x4 [dalam format png/jpg]
                                            </div>
                                    </div>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <div class="text-center">
                                        <button type="submit" class="text-white btn btn-lg bg-success btn-lg w-75 mt-4 mb-0">Simpan</button>
                                    </div>
                                </form>
                    
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-header">
                                <a href="{{ asset('storage/'.Auth::user()->sr_upz) }}"><span class="badge bg-primary">1. Download Surat Blanko Permohonan Baznas</span></a>
                                <a href="{{ asset('storage/'.Auth::user()->sr_upz) }}"><span class="badge bg-dark">2. Lihat Surat Rekomendasi UPZ {{ Auth::user()->name }}</span></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card-body d-flex justify-content-center">
                        <iframe src="" id="iframe-pdf" width="1200px" height="800px"></iframe>
                    </div>
                </div>
            </div>
        @endif
    </div>
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
            
        name.addEventListener('change', function(){
            fetch('/dashboard/bymustahiks/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
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
    function previewImage() {
        const image = document.querySelector('#customImage');
        const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
                oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
    }
</script>
@endsection