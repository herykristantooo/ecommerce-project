@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Slider List
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Slider</a>
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
                                <th>No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img src="{{ asset("$slider->image") }}" style="width:70px; height: 70px"
                                            alt="image slider">
                                    </td>
                                    <td>{{ $slider->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/edit') }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/delete') }}"
                                            onclick="return confirm('Are You Sure to Delete Slider?')"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="7">No Slider Available</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{-- {{ $products->links() }} --}}
                    </div>
                    {{-- end table --}}
                </div>
            </div>
        </div>
    </div>
@endsection
