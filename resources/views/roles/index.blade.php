@extends('layouts.main')
@section('content')

                    <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List Role
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $key => $role)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$role->role_name}}</td>
                                        </tr> 
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
@endsection