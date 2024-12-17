@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Product Details</h1>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mb-3">Back to List</a>

            <div class="row">
                <!-- Left Side: Product Details -->
                <div class="col-md-6">
                    <h2>{{ $product->name }}</h2>

                    <h4>Price:</h4>
                    <p>€{{ $product->price }}</p>

                    <h4>Color:</h4>
                    <p>{{ $product->color ?? 'N/A' }}</p>

                    <h4>Short Description:</h4>
                    <p>{{ $product->short_description ?? 'N/A' }}</p>

                    

                    <h4>Long Description:</h4>
                    <div>{!! $product->long_description !!}</div>

                    <!-- Edit and Delete Buttons -->
                    <div class="mt-4">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning me-2">Edit</a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </div>
                </div>

                <!-- Right Side: Product Images -->
                <div class="col-md-6">
                    <div class="product-image-container position-relative">
                        <img 
                            src="{{ $product->image1 ? asset('storage/' . $product->image1) : asset('default-placeholder.png') }}" 
                            alt="Product Image 1" 
                            class="img-fluid main-image"
                        >
                        
                        @if ($product->image2)
                            <img 
                                src="{{ asset('storage/' . $product->image2) }}" 
                                alt="Product Image 2" 
                                class="img-fluid hover-image"
                            >
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.partial.footer')

{{-- Inline CSS for hover effect and image ratio --}}
<style>
    .product-image-container {
        position: relative;
        display: inline-block;
        max-width: 85%; /* Ensures images fit in the column */
        height: auto; /* Maintain aspect ratio */
        overflow: hidden;
    }

    .product-image-container img {
        display: block;
        width: 85%;
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

    .product-image-container:hover .main-image {
        opacity: 0; /* Hide main image */
    }
</style>
