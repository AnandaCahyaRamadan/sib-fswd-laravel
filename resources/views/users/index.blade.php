@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('users.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Opsi</th>
                            <th>Avatar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    <a href="{{route('users.show', $user)}}" class="btn btn-primary btn-xs">
                                        Detail
                                    </a>
                                    <a href="{{route('users.edit', $user)}}" class="btn btn-warning btn-xs">
                                        Edit
                                    </a>
                                    <form class='d-inline' action="{{route('users.destroy', $user)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                                <td><img src="{{ asset('storage/' . $user->avatar )}}" class="img-fluid rounded-circle" width="100px"></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->roles->role_name}}</td>
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
                    <div class=mt-2>
                        Current Page : {{ $users->currentPage() }} <br>
                        Jumlah Data : {{ $users->total() }} <br>
                        Data perhalaman : {{ $users->perPage() }} <br>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

