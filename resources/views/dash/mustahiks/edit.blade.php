@extends('layouts.dash.main')

@section('content-main')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>{{ $title }}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <a href="{{ route('dashMustahiks') }}" class="m-3 btn btn-success">Back</a>
                    <div class="form col-md-6 mx-4">
                        <form role="form" method="POST" action="{{route('dashMustahikUpdate', $mustahik->slug)}}"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group w-75">
                                <label class="form-label">NIK : </label>
                                <input type="text" id="unique_number" name="unique_number" class="form-control @error('unique_number') is-invalid @enderror" required
                                    value="{{old('unique_number', $mustahik->unique_number)}}">
                                @error('unique_number')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Nama Lengkap Mustahik : </label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required
                                    value="{{old('name', $mustahik->name)}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Slug : </label>
                                <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                    required value="{{old('slug', $mustahik->slug)}}">
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Alamat Lengkap : </label>
                                <input type="text" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror" required
                                    value="{{old('alamat', $mustahik->alamat)}}">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Tempat Lahir : </label>
                                <input type="text" name="t_lahir" class="form-control @error('t_lahir') is-invalid @enderror" required
                                    value="{{old('t_lahir', $mustahik->t_lahir)}}">
                                @error('t_lahir')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Tanggal Lahir : </label>
                                <input type="date" name="tl"
                                    class="form-control @error('tl') is-invalid @enderror" required
                                    value="{{old('tl', $mustahik->tl)}}">
                                @error('tl')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label" for="masjid">Masjid : </label>
                                <select name="masjid" class="form-select" id="masjid">
                                    <option hidden> Pilih Masjid </option>
                                    @foreach ($mosque as $row)
                                    <option value="{{ $row->id }}" {{ ($row->id == $mustahik->masjid) ? 'selected' : '' }}>{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Phone Number (+62)</label>
                                <input type="number" name="no_hpM"
                                    class="form-control @error('no_hpM') is-invalid @enderror" required
                                    value="{{old('no_hpM', $mustahik->no_hpM)}}">
                                @error('no_hpM')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label for="" class="form-label">Berkas Pengantar</label>
                                <input type="text" name="surat_pengantarOld" hidden value="{{ $mustahik->surat_pengantar }}">
                                <input type="file" name="surat_pengantar"
                                    class="form-control is-valid @error('surat_pengantar') is-invalid @enderror" id="file-open"
                                    onchange="previewFile()">
                            
                                <div class="valid-feedback">
                                    *Berkas sesuai yang format
                                    dan kosongkan jika tidak ingin mengubah
                                </div>
                                @error('surat_pengantar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label for="" class="form-label">Kartu Tanda Penduduk (KTP)</label>
                                <input type="text" name="f_ktpOld" hidden value="{{ $mustahik->f_ktp }}">
                                <input type="file" name="f_ktp" class="form-control is-valid @error('f_ktp') is-invalid @enderror" id="file-open"
                                    onchange="previewFile()">
                            
                                <div class="valid-feedback">
                                    *Scan KTP asli dan kosongkan jika tidak ingin merubah
                                </div>
                                @error('f_ktp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label for="" class="form-label">Kartu Keluarga (KK)</label>
                                <input type="text" name="f_kkOld" hidden value="{{ $mustahik->f_kk }}">
                                <input type="file" name="f_kk" class="form-control is-valid @error('f_kk') is-invalid @enderror" id="file-open"
                                    onchange="previewFile()">
                            
                                <div class="valid-feedback">
                                    *Scan KK asli dan kosongkan jika tidak ingin merubah
                                </div>
                                @error('f_kk')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75 position-relative">
                                <br>
                                <label for="" class="form-label">Foto 3x4</label>
                                <input type="file" name="f_foto" class="form-control is-valid @error('f_foto') is-invalid @enderror"
                                    id="customImage" aria-describedby="inputGroupFileAddon04" aria-label="Masukkan Gambar"
                                    onchange="previewImage()">
                                @error('f_foto')
                                <div class="invalid-tooltip">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="valid-feedback">
                                    *foto 3x4 [dalam format png/jpg]
                                </div>
                            </div>
                            <input type="hidden" name="f_fotoOld" value=" {{$mustahik->f_foto}} ">
                                @if ($mustahik->f_foto)
                                    <img src=" {{ asset('storage/' . $mustahik->f_foto) }} " class="img-preview img-fluid my-5 col-sm-5"
                                        alt="{{$mustahik->name}}">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                            <div class="form-group w-75">
                                <label class="form-label" for="ket">Keterangan :</label>
                                <select name="ket" id="ket" class="form-select">
                                    @if (Auth::user()->hasRole(['Admin','Ketua']))
                                    <option value="1" {{ ( 1 ==$mustahik->ket) ? 'selected' : '' }}>Belum Verifikasi</option>
                                    <option value="2" {{ ( 2 ==$mustahik->ket) ? 'selected' : '' }}>Terverifikasi (Belum Disurvei)</option>
                                    <option value="3" {{ ( 3 ==$mustahik->ket) ? 'selected' : '' }}>Survey (Selesai)</option>
                                    <option value="4" {{ ( 4 ==$mustahik->ket) ? 'selected' : '' }}>Tolak</option>
                                    @endif
                                    @if (Auth::user()->hasRole(['Staf-Resepsionis']))
                                    <option value="1" {{ ( 1 ==$mustahik->ket) ? 'selected' : '' }}>Belum Verifikasi</option>
                                    <option value="2" {{ ( 2 ==$mustahik->ket) ? 'selected' : '' }}>Terverifikasi (Belum Disurvei)</option>
                                    <option value="4" {{ ( 4 ==$mustahik->ket) ? 'selected' : '' }}>Tolak</option>
                                    @endif
                                    @if (Auth::user()->hasRole(['Staf-Distribusi']))
                                    <option value="2" {{ ( 2 ==$mustahik->ket) ? 'selected' : '' }}>Belum Disurvei</option>
                                    <option value="3" {{ ( 3 ==$mustahik->ket) ? 'selected' : '' }}>Sudah Disurvei Done</option>
                                    <option value="4" {{ ( 4 ==$mustahik->ket) ? 'selected' : '' }}>Tolak</option>
                                    @endif
                                </select>
                                @error('ket')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="text-white btn btn-lg bg-success btn-lg w-75 mt-4 mb-0">Simpan</button>
                            </div>
                        </form>
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
</div>
<script>
    const name = document.querySelector('#name');
            const slug = document.querySelector('#slug');
            
                    name.addEventListener('change', function(){
                        fetch('/dashboard/mustahiks/checkSlug?name=' + name.value)
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