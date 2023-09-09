<div>
    @include('livewire.admin.brand.modalForm')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brands
                        <a href="#" data-bs-toggle="modal" data-bs-target="#AddBrandModal"
                            class="btn btn-primary btn-sm float-end">Add
                            Brand List</a>
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
                                <th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Stastus</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($brand->category)
                                            {{ $brand->category->name }}
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="#" wire:click='editBrand({{ $brand->id }})'
                                            data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                            class="btn btn-success">Edit</a>
                                        <a href="#" wire:click='deleteBrand({{ $brand->id }})'
                                            data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5"> No Brand Found</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $brands->links() }}
                    </div>
                    {{-- end table --}}
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#AddBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        });
    </script>
@endpush
