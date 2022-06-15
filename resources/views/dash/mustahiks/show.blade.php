@extends('layouts.dash.main')

@section('content-main')
<div class="container-fluid py-4">
    <div class="card shadow-lg mx-4 ">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <a href="{{ route('dashMustahiks') }}" class="m-3 btn btn-success">Back</a>
                </div>
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('storage/'.$mustahik->f_foto) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $mustahik->name }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Detail Mustahik</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Data Mustahik</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">NIK : </label>
                                    <input class="form-control" type="text" value="{{ $mustahik->unique_number }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Mustahik</label>
                                    <input class="form-control" type="text" value="{{ $mustahik->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Alamat</label>
                                    <input class="form-control" type="text" value="{{ $mustahik->alamat }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" value="{{ $mustahik->t_lahir }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Masjid</label>
                                    <input class="form-control" type="text" value="{{ $mustahik->mosque->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Keterangan</label>
                                    <hr>
                                    @if (Auth::user()->hasRole(['Admin', 'Ketua']))
                                        @if($mustahik->ket == 1){{-- Staf Mustahik --}}
                                        <span class="badge bg-secondary">Belum Verifikasi</span>
                                        @elseif($mustahik->ket == 2){{-- Staf Mustahik --}}
                                        <span class="badge bg-success">Telah Verifikasi</span>
                                        @elseif($mustahik->ket == 3){{-- Staf TU --}}
                                        <span class="badge bg-success">Telah Survey</span>
                                        @elseif($mustahik->ket == 4){{-- Staf TU --}}
                                        <span class="badge bg-danger">Di Tolak</span>
                                        @else
                                        <span class="badge bg-warning">Done</span>
                                        @endif
                                    @endif
                                    @if (Auth::user()->hasRole(['resepsionis']))
                                        @if($mustahik->ket == 1){{-- Staf Mustahik --}}
                                        <span class="badge bg-secondary">Belum Verifikasi</span>
                                        @elseif($mustahik->ket == 2){{-- Staf Mustahik --}}
                                        <span class="badge bg-success">Telah Verifikasi</span>
                                        @elseif($mustahik->ket == 3){{-- Staf TU --}}
                                        <span class="badge bg-success">Telah Survey</span>
                                        @elseif($mustahik->ket == 4){{-- Staf TU --}}
                                        <span class="badge bg-danger">Di Tolak</span>
                                        @else
                                        <span class="badge bg-warning">Done</span>
                                        @endif
                                    @endif
                                    @if (Auth::user()->hasRole(['Staf-Distribusi']))
                                        @if($mustahik->ket == 2){{-- Staf Mustahik --}}
                                        <span class="badge bg-success">Telah Verifikasi</span>
                                        @elseif($mustahik->ket == 3){{-- Staf TU --}}
                                        <span class="badge bg-success">Telah Survey (Done)</span>
                                        @elseif($mustahik->ket == 4){{-- Staf TU --}}
                                        <span class="badge bg-danger">Di Tolak</span>
                                        @else
                                        <span class="badge bg-warning">Done</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Berkas</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ asset('storage/'.$mustahik->surat_pengantar) }}" target="_blank">
                                    <span class="badge bg-success">1. Download File Surat Pengantar.pdf</span>
                                    </a><br>
                                    <a href="{{ asset('storage/'.$mustahik->f_ktp) }}" target="_blank">
                                    <span class="badge bg-primary">2. Download KTP.pdf</span>
                                    </a><br>
                                    <a href="{{ asset('storage/'.$mustahik->f_kk) }}" target="_blank">
                                    <span class="badge bg-warning">3. Download KK.pdf</span>
                                    </a><br>
                                    <a href="{{ asset('storage/'.$mustahik->f_foto) }}" target="_blank">
                                    <span class="badge bg-dark">4. Download Pas Foto</span>
                                    </a><br>
                                    {{-- <iframe src="{{ asset('storage/'.$mustahik->surat_pengantar) }}" frameborder="0"></iframe> --}}
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Contact Information</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No Handphone Masjid</label>
                                    <input class="form-control" type="text"
                                        value="{{ $mustahik->no_hpM }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                           <a href="{{ route('dashMustahikEdit', $mustahik->slug) }}" class="btn btn-outline-dark btn-lg border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Edit Mustahik" data-container="body" data-animation="true" "><i class="fa fa-edit"></i>
                            Edit</a>
                            <form action="{{route('dashMustahikDelete', $mustahik->slug)}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger btn-lg border-0 p-2 font-weight-bold text-md  btn-tooltip" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Hapus Mustahik" data-container="body" data-animation="true"
                                    onclick="return confirm('Delete?')">
                                    <i class="fa fa-trash-o"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <div class="d-grid text-center">
                                        {{-- <span class="text-lg font-weight-bolder">100</span> --}}
                                        <span class="text-sm opacity-8">Data Mustahik</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection