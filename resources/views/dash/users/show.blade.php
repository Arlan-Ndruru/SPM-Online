@extends('layouts.dash.main')

@section('content-main')
<div class="container-fluid py-4">
    <div class="card shadow-lg mx-4">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <a href="{{ route('dashUsers') }}" class="m-3 btn btn-success">Back</a>
                    {{-- <div class="avatar avatar-xl position-relative">
                        <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div> --}}
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $user->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                    <i class="ni ni-app"></i>
                                    <span class="ms-2">App</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-email-83"></i>
                                    <span class="ms-2">Messages</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span class="ms-2">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Detail Profile</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">User Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">NIK</label>
                                    <input class="form-control" type="text" value="{{ $user->unique_number }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email address</label>
                                    <input class="form-control" type="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label d-block">Status</label>
                                    @if ($user->status === 1)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Berkas Surat Pengantar Dari UPZ</p>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ asset('storage/'.$user->sr_upz) }}" target="_blank">
                                    <span class="badge bg-success">1. Download File Berkas Surat Pengantar Dari UPZ.pdf</span>
                                </a><br><br>
                            </div>
                        </div>
                        @if ($user->sr_upz)
                            <iframe src="{{ asset('storage/'.$user->sr_upz) }}" width="600px" height="400px"></iframe>
                        @endif

                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Contact Information</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">No Handphone</label>
                                    <input class="form-control" type="text"
                                        value="{{ $user->no_hp }}">
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
                           <a href="{{ route('dashUserEdit', $user->email) }}" class="btn btn-outline-dark btn-lg border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Edit User" data-container="body" data-animation="true" "><i class="fa fa-edit"></i>
                            Edit</a>
                            <form action="{{route('dashUserDelete', $user->email)}}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger btn-lg border-0 p-2 font-weight-bold text-md  btn-tooltip" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Hapus User" data-container="body" data-animation="true"
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
                                        <span class="text-lg font-weight-bolder">1</span>
                                        <span class="text-sm opacity-8">Berkas</span>
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