@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Products</a>
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
                                <th scope="col">Categry</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Stastus</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($product->category)
                                        <td>{{ $product->category->name }}</td>
                                    @else
                                        <td>No Category Available</td>
                                    @endif
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/products/' . $product->id . '/edit') }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ url('admin/products/' . $product->id . '/delete') }}"
                                            onclick="return confirm('Are You Sure to Delete Product?')"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="7">No Products Available</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $products->links() }}
                    </div>
                    {{-- end table --}}
                </div>
            </div>
        </div>
    </div>
@endsection
