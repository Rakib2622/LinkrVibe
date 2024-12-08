

@include('frontend.partial.header')


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="page section-header text-center">
    <div class="page-title">
        <div class="wrapper">
            <h1 class="page-width">Products</h1>
        </div>
    </div>
</div>

<div class="container my-5">
    
    <div class="row">
        <!-- Sidebar -->
        <div class="col-12 col-md-3 sidebar filterbar">
            <div class="sidebar_tags">
                <!-- Categories Filter -->
                <div class="sidebar_widget categories filter-widget">
                    <div class="widget-title"><h2>Categories</h2></div>
                    <div class="widget-content">
                        <ul class="sidebar_categories">
                            <li><a href="{{ route('products') }}">All</a></li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('products', ['category_id' => $category->id]) }}" 
                                       class="{{ request('category_id') == $category->id ? 'active' : '' }}">
                                       {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Price Filter -->
                <div class="sidebar_widget filterBox filter-widget">
                    <div class="widget-title"><h2>Price</h2></div>
                    <form method="GET" action="{{ route('products') }}" class="price-filter">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type="number" name="min_price" class="form-control" placeholder="Min" value="{{ request('min_price') }}">
                            </div>
                            <div class="col-6 mb-3">
                                <input type="number" name="max_price" class="form-control" placeholder="Max" value="{{ request('max_price') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary btn-sm w-100">Filter</button>
                    </form>
                </div>
                <!-- Popular Products -->
                <div class="sidebar_widget">
                    <div class="widget-title"><h2>Popular Products</h2></div>
                    <div class="widget-content">
                        <div class="list list-sidebar-products">
                            @foreach($popularProducts as $product)
                                <div class="mini-list-item">
                                    <div class="mini-view_image">
                                        <a href="{{ route('products.show', $product->id) }}">
                                            <img src="{{ $product->image1 ? asset('storage/' . $product->image1) : asset('default-placeholder.png') }}" alt="{{ $product->name }}">
                                        </a>
                                    </div>
                                    <div class="details">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Sidebar Banner -->
                <div class="sidebar_widget static-banner">
                    <img src="assets/images/side-banner-2.jpg" alt="Sidebar Banner">
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <!-- Main Content -->
        <div class="col-12 col-md-9 main-col">
            <div class="productList product-load-more">
                <div class="grid-products grid--view-items">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                <div class="product-image">
                                    <a href="{{ route('products.show', $product->id) }}">
                                        <img class="primary" src="{{ $product->image1 ? asset('storage/' . $product->image1) : asset('default-placeholder.png') }}" alt="{{ $product->name }}">
                                        @if($product->image2)
                                            <img class="hover" src="{{ asset('storage/' . $product->image2) }}" alt="{{ $product->name }}">
                                        @endif
                                    </a>
                                    <div class="product-labels rectangular">
                                        <span class="lbl on-sale">New</span>
                                    </div>
                                    <form class="variants add" action="#">
                                        <button class="btn btn-addto-cart">View Product</button>
                                    </form>
                                </div>
                                <div class="product-details text-center">
                                    <div class="product-name">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </div>
                                    <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="pagination">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
</div>

@include('frontend.partial.footer')

<!-- Custom CSS -->
<style>
    .product-image img {
        width: 100%;
        height: auto;
        transition: transform 0.3s;
    }
    .product-image:hover img.primary {
        transform: scale(1.1);
    }
    .sidebar .active {
        font-weight: bold;
        color: #000;
    }
</style>
