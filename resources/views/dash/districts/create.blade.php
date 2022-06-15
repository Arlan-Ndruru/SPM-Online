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
                    <a href="{{ route('dashDistricts') }}" class="m-3 btn btn-success">Back</a>
                    <div class="form col-md-6 mx-4">
                        <form role="form" method="POST" action="{{route('dashDistrictStore')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-75">
                                <label class="form-label">Nama Kecamatan : </label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required
                                    value="{{old('name')}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                {{-- <label class="form-label">Slug : </label> --}}
                                <input type="text" id="slug" name="slug" hidden class="form-control @error('slug') is-invalid @enderror"
                                    required value="{{old('slug')}}">
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Nama Kota : </label>
                                <input type="text" name="kota" readonly class="form-control @error('kota') is-invalid @enderror"
                                    required value="Kota Pekanbaru">
                                @error('kota')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Keterangan :</label>
                                <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" value="{{ old('ket') }}" >
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
    </div>
</div>
<script>
    const name = document.querySelector('#name');
            const slug = document.querySelector('#slug');
            
                    name.addEventListener('change', function(){
                        fetch('/dashboard/districts/checkSlug?name=' + name.value)
                        .then(response => response.json())
                        .then(data => slug.value = data.slug)
                    });
</script>
@endsection