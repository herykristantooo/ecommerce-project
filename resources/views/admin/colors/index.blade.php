@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Color
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Color</a>
                    </h4>
                    @if (session('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif
                </div>
                <div class="card-body">
                    {{-- table --}}
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>{{ $color->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/' . $color->id . '/edit') }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ url('admin/colors/' . $color->id . '/delete') }}"
                                            onclick="return confirm('Are You Sure to Delete Color?')"
                                            class="btn btn-danger">Delete</a>
                                        {{-- <a href="#" wire:click='deleteCategory({{ $category->id }})'
                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        class="btn btn-danger">Delete</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{-- {{ $categories->links() }} --}}
                    </div>
                    {{-- end table --}}
                </div>
            </div>
        </div>
    </div>
@endsection
