<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Brand</h4>
                </div>
                <div class="card-body">
                    @foreach ($category->brands as $brandItem)
                        <label class="d-block">
                            <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}" />
                            {{ $brandItem->name }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" wire:model="priceInput" value="high-to-low" />
                        High to Low
                    </label>
                    <label class="d-block">
                        <input type="radio" wire:model="priceInput" value="low-to-high" />
                        Low to High
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($product->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                @endif
                                @if ($product->productImages->count() > 0)
                                    <a
                                        href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}">
                                        <img src="{{ asset($product->productImages[0]->image) }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brand }}</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div>
                                    {{-- <span class="selling-price">@currency($product->selling_price)</span> --}}
                                    <span class="selling-price">{{ $product->selling_price }}</span>
                                    <span class="original-price">{{ $product->original_price }}</span>
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn1">Add To Cart</a>
                                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                    <a href="" class="btn btn1"> View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>Product Not Avilable</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
