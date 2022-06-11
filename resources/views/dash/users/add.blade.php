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
                                    <input type="number" name="unique_number" class="form-control @error('unique_number') is-invalid @enderror" required
                                        value="{{old('unique_number')}}" autofocus>
                                    @error('unique_number')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">Nama :</label>
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
                                <div class="form-group w-75">
                                    <label class="form-label">Pilih role</label>
                                    <select name="role_id" class="form-control opacity-8" id="roles">
                                        <option>Sebagai:</option>
                                        @if(count($roles)) @foreach($roles as $row)
                                        <option value="{{old('role_id', $row->id)}}">{{$row->display_name}}</option>
                                        @endforeach @endif
                                    </select>
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">Phone Number (+62)</label>
                                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" required
                                        value="62{{old('no_hp')}}">
                                    @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="text-white btn btn-lg bg-success btn-lg w-75 mt-4 mb-0">Add Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection