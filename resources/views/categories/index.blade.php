@extends('layouts.main')
@section('content')

                    <div class="card mb-4 mt-3">
                        <div class="card-header">
                            <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah</a>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Aksi</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $key => $category)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-xs">
                                                    Edit
                                                </a>
                                                <form class='d-inline' action="{{ route('categories.destroy', $category) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                            <td>{{$category->category_name}}</td>
                                        </tr> 
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
@endsection