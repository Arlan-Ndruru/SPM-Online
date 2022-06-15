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
                            <form role="form" method="POST" action="{{route('dashUserUpdate', $user->email)}}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group w-75">
                                    <label class="form-label">Nomor Identitas (NIK) : </label>
                                    <input type="number" name="unique_number" class="form-control @error('unique_number') is-invalid @enderror" required
                                        value="{{old('unique_number', $user->unique_number)}}" autofocus>
                                    @error('unique_number')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">Nama :</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required
                                        value="{{old('name', $user->name)}}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required
                                        value="{{old('email', $user->email)}}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="password" class="form-control is-valid @error('password') is-invalid @enderror">
                                    <div class="valid-feedback">
                                        <i>*Kosongkan jika tidak ingin merubah password</i>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="0" {{ ($user->status == 0) ? 'selected' : '' }}>Noctive</option>
                                        <option value="1" {{ ($user->status == 1) ? 'selected' : '' }}>Active</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">Pilih role</label>
                                    <select name="role_id" class="form-control is-valid opacity-8" id="roles">
                                        <option hidden>Sebagai:</option>
                                        @if(count($roles)) @foreach($roles as $row)
                                        <option value="{{old('role_id', $row->id)}}" {{ $user->roles->contains($row->id) ? 'selected' : '' }} >{{$row->display_name}}</option>
                                        @endforeach @endif
                                    </select>
                                    <div class="valid-feedback">
                                        <i>*Abaikan jika tidak ingin merubah Role</i>
                                    </div>
                                </div>
                                <div class="form-group w-75">
                                    <label class="form-label">Phone Number (+62)</label>
                                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" required
                                        value="{{old('no_hp', $user->no_hp)}}">
                                    @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group w-75">
                                    <label for="" class="form-label">Berkas Surat Rekomendasi UPZ</label>
                                    <input type="text" name="sr_upzOld" hidden value="{{ $user->sr_upz }}">
                                    <input type="file" name="sr_upz"
                                        class="form-control is-valid @error('sr_upz') is-invalid @enderror" id="file-open"
                                        onchange="previewFile()">
                                
                                    <div class="valid-feedback">
                                        *Berkas sesuai yang format
                                        dan kosongkan jika tidak ingin mengubah
                                    </div>
                                    @error('sr_upz')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="text-white btn btn-lg bg-dark btn-lg w-75 mt-4 mb-0">Edit Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card-body d-flex justify-content-center">
                        <iframe src="{{ asset('storage/'.$user->sr_upz) }}" id="iframe-pdf" width="1200px" height="800px"></iframe>
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