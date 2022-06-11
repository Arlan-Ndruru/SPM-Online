@extends('layouts.dash.main')

@section('content-main')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="text-uppercase">{{ $title }}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 mx-4">

                        <a href="{{ route('dashDistrictAdd') }}" class="m-3 btn btn-success"><i class="fa fa-plus"></i>
                            Tambah</a>
                        <form action="{{ route('dashDistricts') }}">
                            <div class="input-group  m-4 w-75">
                                <span class="input-group-text">Advance Search :</span>
                                <input value="{{ request('search') }}" name="search" type="text" class="form-control"
                                    aria-describedby="button-addon2">
                                <input value="{{ request('searchDate') }}" name="searchdate" type="date"
                                    class="form-control" aria-describedby="button-addon2">
                                <button type="submit" class="btn btn-primary m-2" type="button" id="button-addon2"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </form>
                        @if (session()->has('success'))
                        <div class="col-xl-5 d-inline alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-icon align-middle">
                                <div class="spinner-grow text-light" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </span>
                            <span class="alert-text text-white"><strong>{{session('success')}}</strong> check it
                                out!</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <table class="table table-striped align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary text-xxs font-weight-bolder opacity-7">NO</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kecamatan
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kota</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($districts as $district)

                                <tr>
                                    <td>
                                        <p class="text-xxs text-center font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $district->name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $district->slug }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $district->kota }}</p>
                                    </td>
                                    <td class="align-middle">
                                        {{-- <button type="button"
                                            class="btn btn-outline-warning btn-lg border-0 p-2  font-weight-bold text-xs btn-tooltip"
                                            data-bs-placement="top" title="Detail District" data-container="body"
                                            data-animation="true" data-bs-toggle="modal"
                                            data-bs-target="#modal-default"><span class="fa fa-eye"></span>
                                            Detail</button> --}}
                                        <a href="{{ route('dashDistrictShow', $district->slug) }}"
                                            class="btn btn-outline-warning btn-lg border-0 p-2 font-weight-bold btn-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Masjid"
                                            data-container="body" data-animation="true">
                                            <span class="fa fa-eye"></span> Detail
                                        </a>
                                        <a href="{{ route('dashDistrictEdit', $district->slug) }}"
                                            class="btn btn-outline-dark btn-lg border-0 p-2  font-weight-bold btn-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Masjid"
                                            data-container="body" data-animation="true">
                                            <span class="fa fa-edit"></span> Edit
                                        </a>
                                        <form action="{{route('dashDistrictDelete', $district->slug)}}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button
                                                class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Masjid"
                                                data-container="body" data-animation="true"
                                                onclick="return confirm('Delete?')">
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
                <div class="pagination pagination-success justify-content-center">
                    {{$districts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection