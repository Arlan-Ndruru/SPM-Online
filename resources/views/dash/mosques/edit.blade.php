@extends('layouts.dash.main')

@section('content-main')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Data Masjid</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <a href="{{ route('dashMosques') }}" class="m-3 btn btn-success">Back</a>
                    <div class="form col-md-6 mx-4">
                        <form role="form" method="POST" action="{{route('dashMosqueUpdate',$mosque->slug)}}"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group w-75">
                                <label class="form-label">Nama Masjid : </label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required
                                    value="{{old('name', $mosque->name)}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                {{-- <label class="form-label">Slug : </label> --}}
                                <input type="text" hidden id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                    required value="{{old('slug', $mosque->slug)}}">
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Nama Ketua Masjid : </label>
                                <input type="text" name="name_ketua" class="form-control @error('name_ketua') is-invalid @enderror"
                                    required value="{{old('name_ketua', $mosque->name_ketua)}}">
                                @error('name_ketua')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label for="jtMasjid" class="form-label">Jenis Tipologi Masjid : </label>

                                <select class="form-select" name="jtMasjid" id="jtMasjid">
                                    <option hidden>Pilih Tipologi</option>
                                    <option value="Masjid Negara" {{ ($mosque->jtMasjid == "Masjid Negara") ? 'selected' : '' }}>Masjid Negara</option>
                                    <option value="Masjid Nasional" {{ ($mosque->jtMasjid == "Masjid Nasional") ? 'selected' : '' }}>Masjid Nasional</option>
                                    <option value="Masjid Raya" {{ ($mosque->jtMasjid == "Masjid Raya") ? 'selected' : '' }}>Masjid Raya</option>
                                    <option value="Masjid Agung" {{ ($mosque->jtMasjid == "Masjid Agung") ? 'selected' : '' }}>Masjid Agung</option>
                                    <option value="Masjid Besar" {{ ($mosque->jtMasjid == "Masjid Besar") ? 'selected' : '' }}>Masjid Besar</option>
                                    <option value="Masjid Jami" {{ ($mosque->jtMasjid == "Masjid Jami") ? 'selected' : '' }}>Masjid Jami</option>
                                    <option value="Masjid Bersejarah" {{ ($mosque->jtMasjid == "Masjid Bersejarah") ? 'selected' : '' }}>Masjid Bersejarah</option>
                                    <option value="Masjid Publik" {{ ($mosque->jtMasjid == "Masjid Publik") ? 'selected' : '' }}>Masjid Publik</option>
                                </select>

                                {{-- <input type="text" name="jtMasjid" class="form-control @error('jtMasjid') is-invalid @enderror"
                                    required value="{{old('jtMasjid', $mosque->jtMasjid)}}">
                                @error('jtMasjid')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror --}}
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Alamat Lengkap : </label>
                                <input type="text" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror" required
                                    value="{{old('alamat', $mosque->alamat)}}">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">RT : </label>
                                <input type="number" name="rtMasjid"
                                    class="form-control @error('rtMasjid') is-invalid @enderror" required
                                    value="{{old('rtMasjid', $mosque->rtMasjid)}}">
                                @error('rtMasjid')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">RW : </label>
                                <input type="number" name="rwMasjid"
                                    class="form-control @error('rwMasjid') is-invalid @enderror" required
                                    value="{{old('rwMasjid', $mosque->rwMasjid)}}">
                                @error('rwMasjid')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Kecamatan : </label>

                                <select name="kecm" class="form-control opacity-8" id="kecm" autofocus>
                                    @if(count($district)) @foreach($district as $row)
                                    <option hidden></option>
                                    <option value="{{old('kecm', $row->id)}}" {{ ($row->id == $mosque->kecm) ? 'selected' : '' }}
                                        >{{$row->name}} | {{ $row->kota }}</option>
                                    @endforeach @endif
                                </select>

                                {{-- <input type="text" name="kecm"
                                    class="form-control @error('kecm') is-invalid @enderror" required
                                    value="{{old('kecm', $mosque->kecm)}}"> --}}
                                {{-- @error('kecm')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror --}}
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Phone Number (+62)</label>
                                <input type="number" name="no_hpMasjid"
                                    class="form-control @error('no_hpMasjid') is-invalid @enderror" required
                                    value="{{old('no_hpMasjid', $mosque->no_hpMasjid)}}">
                                @error('no_hpMasjid')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-75">
                                <label class="form-label">Keterangan :</label>
                                <input type="text" name="ket" class="form-control @error('ket') is-invalid @enderror" value="{{ old('ket', $mosque->ket) }}" >
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
                            fetch('/dashboard/mosques/checkSlug?name=' + name.value)
                            .then(response => response.json())
                            .then(data => slug.value = data.slug)
                        });
    </script>

@endsection