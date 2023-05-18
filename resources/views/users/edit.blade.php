@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" action="{{route('users.update', $user)}}"  enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group mb-2">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama lengkap" name="name" value="{{$user->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{$user->email ?? old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Telepon" name="phone" value="{{$user->phone ?? old('phone')}}">
                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="address">Alamat</label>
                        <input type="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Masukkan alamat" name="address" value="{{$user->address ?? old('address')}}">
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="role">Role</label>
                        <input type="role" class="form-control @error('role') is-invalid @enderror" id="role" placeholder="Masukkan role" name="role" value="{{$user->role ?? old('role')}}">
                        @error('role') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="avatar" class="form-label">Pilih Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('avatar') is-invalid @enderror"  type="file" id="avatar" name="avatar"
                        onchange="previewImage()">
                        @error('avatar')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" value="{{$user->password ?? old('password')}}">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Konfirmasi Password" name="password_confirmation" value="{{$user->password ?? old('password')}}">
                    </div>

                </div>

                <div class="card-footer mb-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
   
    <script>
        function previewImage(){
            const image = document.querySelector('#avatar');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
      }
       
    }
    </script>
@stop