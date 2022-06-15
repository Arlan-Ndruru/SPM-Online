@extends('layouts.dash.main')

@section('content-main')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Users</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0 mx-4">
                            
                            <a href="{{ route('dashUserAdd') }}" class="m-3 btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                            <form action="{{ route('dashUsers') }}">
                                <div class="input-group  m-4 w-75">
                                    <span class="input-group-text">Advance Search :</span>
                                    <input value="{{ request('search') }}" name="search" type="text" class="form-control"
                                        aria-describedby="button-addon2">
                                    <input value="{{ request('searchDate') }}" name="searchdate" type="date" class="form-control"
                                        aria-describedby="button-addon2">
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
                                    <span class="alert-text text-white"><strong>{{session('success')}}</strong> check it out!</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table class="table table-striped align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Role</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (Auth::user()->hasRole('Admin|Ketua'))
                                    @foreach ($usersAdmin as $user)
                                        
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{-- <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Admin</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($user->status === 1)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                {{-- <button type="button" class="btn btn-outline-warning btn-lg border-0 p-2  font-weight-bold text-xs btn-tooltip"
                                                data-bs-placement="top" title="Detail User" data-container="body" data-animation="true" data-bs-toggle="modal"
                                                    data-bs-target="#modal-default"><span class="fa fa-eye"></span> Detail</button> --}}
                                                <a href="{{ route('dashUserShow', $user->email) }}" class="btn btn-outline-warning btn-lg border-0 p-2 font-weight-bold btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail User" data-container="body" data-animation="true">
                                                    <span class="fa fa-eye"></span> Detail
                                                </a>
                                                <a href="{{ route('dashUserEdit', $user->email) }}" class="btn btn-outline-dark btn-lg border-0 p-2  font-weight-bold btn-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" data-container="body" data-animation="true">
                                                    <span class="fa fa-edit"></span> Edit
                                                </a>
                                                <form action="{{route('dashUserDelete', $user->email)}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Hapus User" data-container="body" data-animation="true"
                                                    onclick="return confirm('Delete?')">
                                                    <i class="fa fa-trash-o"></i> Hapus
                                                </button>
                                                </form>
                                                
                                            </td>
                                        </tr>

                                    @endforeach
                                    @foreach ($usersKetua as $user)
                                        
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{-- <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Ketua Baznas Pekanbaru</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($user->status === 1)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                {{-- <button type="button" class="btn btn-outline-warning btn-lg border-0 p-2  font-weight-bold text-xs btn-tooltip"
                                                data-bs-placement="top" title="Detail User" data-container="body" data-animation="true" data-bs-toggle="modal"
                                                    data-bs-target="#modal-default"><span class="fa fa-eye"></span> Detail</button> --}}
                                                <a href="{{ route('dashUserShow', $user->email) }}" class="btn btn-outline-warning btn-lg border-0 p-2 font-weight-bold btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail User" data-container="body" data-animation="true">
                                                    <span class="fa fa-eye"></span> Detail
                                                </a>
                                                <a href="{{ route('dashUserEdit', $user->email) }}" class="btn btn-outline-dark btn-lg border-0 p-2  font-weight-bold btn-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" data-container="body" data-animation="true">
                                                    <span class="fa fa-edit"></span> Edit
                                                </a>
                                                <form action="{{route('dashUserDelete', $user->email)}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Hapus User" data-container="body" data-animation="true"
                                                    onclick="return confirm('Delete?')">
                                                    <i class="fa fa-trash-o"></i> Hapus
                                                </button>
                                                </form>
                                                
                                            </td>
                                        </tr>

                                    @endforeach
                                    @foreach ($usersSD as $user)
                                        
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{-- <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Staf Distribusi</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($user->status === 1)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                {{-- <button type="button" class="btn btn-outline-warning btn-lg border-0 p-2  font-weight-bold text-xs btn-tooltip"
                                                data-bs-placement="top" title="Detail User" data-container="body" data-animation="true" data-bs-toggle="modal"
                                                    data-bs-target="#modal-default"><span class="fa fa-eye"></span> Detail</button> --}}
                                                <a href="{{ route('dashUserShow', $user->email) }}" class="btn btn-outline-warning btn-lg border-0 p-2 font-weight-bold btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail User" data-container="body" data-animation="true">
                                                    <span class="fa fa-eye"></span> Detail
                                                </a>
                                                <a href="{{ route('dashUserEdit', $user->email) }}" class="btn btn-outline-dark btn-lg border-0 p-2  font-weight-bold btn-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" data-container="body" data-animation="true">
                                                    <span class="fa fa-edit"></span> Edit
                                                </a>
                                                <form action="{{route('dashUserDelete', $user->email)}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Hapus User" data-container="body" data-animation="true"
                                                    onclick="return confirm('Delete?')">
                                                    <i class="fa fa-trash-o"></i> Hapus
                                                </button>
                                                </form>
                                                
                                            </td>
                                        </tr>

                                    @endforeach
                                    @foreach ($usersSR as $user)
                                        
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{-- <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Staf Resepsionis</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($user->status === 1)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                {{-- <button type="button" class="btn btn-outline-warning btn-lg border-0 p-2  font-weight-bold text-xs btn-tooltip"
                                                data-bs-placement="top" title="Detail User" data-container="body" data-animation="true" data-bs-toggle="modal"
                                                    data-bs-target="#modal-default"><span class="fa fa-eye"></span> Detail</button> --}}
                                                <a href="{{ route('dashUserShow', $user->email) }}" class="btn btn-outline-warning btn-lg border-0 p-2 font-weight-bold btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail User" data-container="body" data-animation="true">
                                                    <span class="fa fa-eye"></span> Detail
                                                </a>
                                                <a href="{{ route('dashUserEdit', $user->email) }}" class="btn btn-outline-dark btn-lg border-0 p-2  font-weight-bold btn-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" data-container="body" data-animation="true">
                                                    <span class="fa fa-edit"></span> Edit
                                                </a>
                                                <form action="{{route('dashUserDelete', $user->email)}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Hapus User" data-container="body" data-animation="true"
                                                    onclick="return confirm('Delete?')">
                                                    <i class="fa fa-trash-o"></i> Hapus
                                                </button>
                                                </form>
                                                
                                            </td>
                                        </tr>

                                    @endforeach
                                @endif
                                    @foreach ($usersCM as $user)
                                        
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{-- <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Calon Mustahik</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($user->status === 1)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                {{-- <button type="button" class="btn btn-outline-warning btn-lg border-0 p-2  font-weight-bold text-xs btn-tooltip"
                                                data-bs-placement="top" title="Detail User" data-container="body" data-animation="true" data-bs-toggle="modal"
                                                    data-bs-target="#modal-default"><span class="fa fa-eye"></span> Detail</button> --}}
                                                <a href="{{ route('dashUserShow', $user->email) }}" class="btn btn-outline-warning btn-lg border-0 p-2 font-weight-bold btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail User" data-container="body" data-animation="true">
                                                    <span class="fa fa-eye"></span> Detail
                                                </a>
                                                <a href="{{ route('dashUserEdit', $user->email) }}" class="btn btn-outline-dark btn-lg border-0 p-2  font-weight-bold btn-tooltip"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User" data-container="body" data-animation="true">
                                                    <span class="fa fa-edit"></span> Edit
                                                </a>
                                                <form action="{{route('dashUserDelete', $user->email)}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger border-0 p-2 font-weight-bold text-md btn-tooltip" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Hapus User" data-container="body" data-animation="true"
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
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection