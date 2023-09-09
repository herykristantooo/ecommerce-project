@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h4>
                </div>
                @if ($errors->any())
                    <div class="alert alert-dark">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('admin/sliders/' . $slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $slider->title }}" class="form-control" />
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $slider->title }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                <img src="{{ asset($slider->image) }}" alt="img" style="width: 80px; height:80px"
                                    class="me-4">
                            </div>
                            <div class="mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" {{ $slider->status == '1' ? 'checked' : '' }} name="status" />
                                Checked=Hidden, UnChecked=Visible
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
