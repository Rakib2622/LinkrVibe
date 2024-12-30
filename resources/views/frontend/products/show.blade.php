@include('frontend.partial.header')

<div class="container my-5">
    <div class="row">
        <!-- Left Section: Product Images -->
        <div class="col-md-6">
            <div class="product-image-container">
                <!-- Primary Image -->
                <img src="{{ $product->image1 ? asset('storage/' . $product->image1) : asset('default-placeholder.png') }}" alt="{{ $product->name }}" class="img-fluid mb-3 primary-image">
                
                <!-- Hover Image -->
                @if($product->image2)
                    <img src="{{ asset('storage/' . $product->image2) }}" alt="{{ $product->name }} - hover" class="img-fluid hover-image">
                @endif
            </div>
        </div>

        <!-- Right Section: Product Details -->
        <div class="col-md-6">
            <h1 class="product-title">{{ $product->name }}</h1>
            <p class="short-description">{{ $product->short_description }}</p>
            <p><strong>Price:</strong> €{{ number_format($product->price, 2) }}</p>
            <p><strong>Color:</strong> {{ $product->color }}</p>
            @if($product->category)
            <h1>How to Order:</h1>
            <div>{!! $product->category->description !!}</div>
            @endif


            <!-- Custom Fields -->
            @if($product->category && $product->category->customFields->count() > 0)
            <form action="{{ route('cart.add', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach($product->category->customFields as $field)
                    <div class="mb-3">
                        <label for="custom_field_{{ $field->id }}" class="form-label">{{ $field->field_name }} @if($field->is_required) <span class="text-danger">*</span> @endif</label>
                
                        @if($field->field_type === 'text' || $field->field_type === 'url') <!-- Fix this condition -->
                            <input type="text" name="custom_fields[{{ $field->id }}]" id="custom_field_{{ $field->id }}" class="form-control" @if($field->is_required) required @endif>
                        @elseif($field->field_type === 'image')
                            <input type="file" name="custom_fields[{{ $field->id }}]" id="custom_field_{{ $field->id }}" class="form-control" @if($field->is_required) required @endif>
                        @elseif($field->field_type === 'boolean')
                            <div class="form-check">
                                <input type="checkbox" name="custom_fields[{{ $field->id }}]" id="custom_field_{{ $field->id }}" class="form-check-input" value="1">
                                <label class="form-check-label" for="custom_field_{{ $field->id }}">Yes</label>
                            </div>
                        @endif
                    </div> 
                @endforeach
                
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
                </div>
                    <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
                </form>
            @endif
        </div>
    </div>

    <!-- Long Description Section -->
    <div class="row mt-5">
        <div class="col-12">
            <h1>Product Description:</h1>
            <div>{!! $product->long_description !!}</div>
        </div>
    </div>

    <!-- Similar Products Section -->
    <div class="row mt-5">
        <div class="col-12">
            <h3>Similar Products</h3>
            <div class="row">
                @foreach($similarProducts as $similarProduct)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <a href="{{ route('products.show', $similarProduct->id) }}">
                                <img src="{{ $similarProduct->image1 ? asset('storage/' . $similarProduct->image1) : asset('default-placeholder.png') }}" alt="{{ $similarProduct->name }}" class="card-img-top">
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $similarProduct->name }}</h5>
                                <p class="card-text">€{{ number_format($similarProduct->price, 2) }}</p>
                                <a href="{{ route('products.show', $similarProduct->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('frontend.partial.footer')

<!-- Custom CSS for Hover Effect -->
<style>
    .product-image-container {
        position: relative;
        display: inline-block;
        max-width: 100%; /* Ensures images fit in the column */
        height: auto; /* Maintain aspect ratio */
        overflow: hidden;
    }

    .product-image-container img {
        display: block;
        width: 100%; /* Makes sure images scale correctly */
        height: auto; /* Maintain aspect ratio */
        transition: opacity 0.3s ease-in-out; /* Smooth transition */
    }

    .product-image-container .hover-image {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        z-index: 2;
    }

    .product-image-container:hover .hover-image {
        opacity: 1; /* Show hover image */
    }

    .product-image-container:hover .primary-image {
        opacity: 0; /* Hide primary image */
    }

    /* Mobile view (default) */
    @media (max-width: 768px) {
        .product-image-container {
            padding-left: 0; /* Remove padding */
            margin-left: 0; /* Remove margin */
        }

        .product-image-container img {
            width: 100%; /* Ensure the image fits well */
        }
    }

    /* Desktop view */
    @media (min-width: 769px) {
        .product-image-container {
            padding-left: 20px; /* Add left padding */
            margin-left: 20px; /* Add left margin */
        }

        .product-image-container img {
            width: 80%; /* Reduce image size */
        }
    }
</style>
