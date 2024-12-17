@include('frontend.partial.header')
    
    <!--Body Content-->
    <div id="page-content">
    	<!--Home slider-->
    	@include('frontend.partial.hero')
        <!--End Home slider-->
        <!--Collection Tab slider-->
        <div class="tab-slider-product section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Our Products</h2>
                            <p>Browse the huge variety of our products</p>
                        </div>
                        <div class="tabs-listing">
                            <ul class="tabs clearfix">
                                @foreach ($categories as $index => $category)
                                    <li class="{{ $index === 0 ? 'active' : '' }}" rel="tab{{ $index + 1 }}">{{ $category->name }}</li>
                                @endforeach
                            </ul>
                            <div class="tab_container">
                                @foreach ($categories as $index => $category)
                                    <div id="tab{{ $index + 1 }}" class="tab_content grid-products {{ $index === 0 ? 'active' : '' }}">
                                        <div class="productSlider">
                                            @forelse ($category->products as $product)
                                                <div class="col-12 item">
                                                    <!-- Start product image -->
                                                    <div class="product-image">
                                                        <a href="{{ route('products.show', $product->id) }}">
                                                            <img class="primary blur-up lazyload" data-src="{{ asset('storage/' . $product->image1) }}" src="{{ asset('storage/' . $product->image1) }}" alt="{{ $product->name }}">
                                                            @if ($product->image2)
                                                                <img class="hover blur-up lazyload" data-src="{{ asset('storage/' . $product->image2) }}" src="{{ asset('storage/' . $product->image2) }}" alt="{{ $product->name }}">
                                                            @endif
                                                        </a>
                                                        {{-- <form class="variants add" action="{{ route('cart.add', $product->id) }}" method="POST">
                                                            @csrf
                                                            <button class="btn btn-addto-cart" type="submit">Add To Cart</button>
                                                        </form> --}}
                                                        
                                                    </div>
                                                    <!-- End product image -->
        
                                                    <!-- Start product details -->
                                                    <div class="product-details text-center">
                                                        <div class="product-name">
                                                            <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                                        </div>
                                                        <div class="product-price">
                                                            <span class="price">€{{ number_format($product->price, 2) }}</span>
                                                        </div>
                                                    </div>
                                                    <!-- End product details -->
                                                </div>
                                            @empty
                                                <p>No products available in this category.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Collection Tab slider-->
        
        <!--Collection Box slider-->

        <div class="section-header text-center">
            <h2 class="h2">Our Services</h2>
            <p>Browse the huge variety of our service</p>
        </div>

        <div class="section feature-content">
            <div class="container">
                <div class="row">
                    <div class="feature-row">
                        <div class="col-12 col-sm-12 col-md-6 feature-row__item">
                            <img src="home/assets/images/Untitled-design.gif" alt="NFC & QR Code Tabletop Menus" title="NFC & QR Code Tabletop Menus" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 feature-row__item">
                            <div class="row-text">
                                <h1 class="h1">NFC & QR Code Tabletop Menus</h1>
                                <h2 class="h2">Complete POS & Table Ordering System!</h2>
                                <div class="rte-setting featured-row__subtext">
                                    <p>Upgrade your restaurant's dining experience with our NFC and QR code-enabled tabletop menus! Allow customers to easily browse your menu, place orders, and make payments directly from their smartphones.</p>
                                    
                                </div>
                                <a href="#" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Second Section: Adjust ordering for mobile -->
        <div class="section feature-content">
            <div class="container">
                <div class="row">
                    <div class="feature-row">
                        <!-- Text section will appear after the image on mobile -->
                        <div class="col-12 col-sm-12 col-md-6 feature-row__item order-2 order-sm-2 order-md-1">
                            <div class="row-text">
                                <h1 class="h1">Digital Menu Board</h1>
                                <h2 class="h2">Transform Your Restaurant’s Menu with a Custom Digital Menu Board!</h2>
                                <div class="rte-setting featured-row__subtext">
                                    <p>Digital menu is clean, easy to read, and provides an interactive experience for diners. Custom Digital Menu Board Design Service for Restaurants. 
                                    </p>
                                    
                                </div>
                                <a href="#" class="btn">Shop Now</a>
                            </div>
                        </div>
                        <!-- Image section will appear first on mobile -->
                        <div class="col-12 col-sm-12 col-md-6 feature-row__item order-1 order-sm-1 order-md-2">
                            <img src="home/assets/images/Digital-Menu-Board.png" alt="Fast Fashion Only available at BElle" title="Fast Fashion Only available at BElle" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section feature-content">
            <div class="container">
                <div class="row">
                    <div class="feature-row">
                        <div class="col-12 col-sm-12 col-md-6 feature-row__item">
                            <img src="home/assets/images/5-Pack-of-Google-review-card.png" alt="Fast Fashion Only available at BElle" title="Fast Fashion Only available at BElle" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 feature-row__item">
                            <div class="row-text">
                                <h1 class="h1">Google Review Card</h1>
                                <h2 class="h2">Transform Your Restaurant’s Menu with a Custom Digital Menu Board!</h2>
                                <div class="rte-setting featured-row__subtext">
                                    <p>With our NFC-enabled Google Review Cards, you can encourage walk-in customers to leave a review with just a simple tap. It’s never been this easy to collect valuable feedback that will boost your business visibility on Google Maps!
                                    </p>
                                    
                                </div>
                                <a href="#" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--End Collection Box slider-->
        
        <!--Logo Slider-->
        <div class="section logo-section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                		<div class="logo-bar">
                    <div class="logo-bar__item">
                        <img src="home/assets/images/logo/brandlogo1.png" alt="" title="" />
                    </div>
                    <div class="logo-bar__item">
                        <img src="home/assets/images/logo/brandlogo2.png" alt="" title="" />
                    </div>
                    <div class="logo-bar__item">
                        <img src="home/assets/images/logo/brandlogo3.png" alt="" title="" />
                    </div>
                    <div class="logo-bar__item">
                        <img src="home/assets/images/logo/brandlogo4.png" alt="" title="" />
                    </div>
                    <div class="logo-bar__item">
                        <img src="home/assets/images/logo/brandlogo5.png" alt="" title="" />
                    </div>
                    <div class="logo-bar__item">
                        <img src="home/assets/images/logo/brandlogo6.png" alt="" title="" />
                    </div>
                </div>
                	</div>
                </div>
            </div>
        </div>
        <!--End Logo Slider-->
        
        <!--Featured Product-->
        <div class="product-rows section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Best Seller</h2>
                            <p>Our most popular products based on sales</p>
                        </div>
                    </div>
                </div>
                <div class="grid-products">
                    <div class="row">
                        @foreach($bestSellingProducts as $product)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                            <div class="grid-view_image">
                                <!-- Start product image -->
                                <a href="{{ route('products.show', $product->id) }}" class="grid-view-item__link">
                                    <!-- Primary image -->
                                    <img class="grid-view-item__image primary blur-up lazyload" 
                                        data-src="{{ $product->image1 ? asset('storage/' . $product->image1) : asset('default-placeholder.png') }}" 
                                        src="{{ $product->image1 ? asset('storage/' . $product->image1) : asset('default-placeholder.png') }}" 
                                        alt="{{ $product->name }}" 
                                        title="{{ $product->name }}">
                                    <!-- Hover image -->
                                    <img class="grid-view-item__image hover blur-up lazyload" 
                                        data-src="{{ $product->image2 ? asset('storage/' . $product->image2) : asset('default-placeholder.png') }}" 
                                        src="{{ $product->image2 ? asset('storage/' . $product->image2) : asset('default-placeholder.png') }}" 
                                        alt="{{ $product->name }}" 
                                        title="{{ $product->name }}">
                                </a>
                                <!-- End product image -->
                                
                                <!-- Start product details -->
                                <div class="product-details hoverDetails text-center mobile">
                                    <!-- Product name -->
                                    <div class="product-name">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </div>
                                    <!-- End product name -->
                                    
                                    <!-- Product price -->
                                    <div class="product-price">
                                        @php
                                            $oldPrice = ceil($product->price * 1.2); // Calculate old price as 20% extra
                                        @endphp
                                        <span class="old-price">€{{ number_format($oldPrice,2) }}</span>
                                        <span class="price">€{{ number_format($product->price, 2) }}</span>
                                    </div>
                                    <!-- End product price -->
                                </div>
                                <!-- End product details -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <!--End Featured Product-->
        
        
        
        <!--Store Feature-->
        <div class="store-feature section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    	<ul class="display-table store-info">
                        	<li class="display-table-cell">
                            	<i class="icon anm anm-truck-l"></i>
                            	<h5>Free Shipping &amp; Return</h5>
                            	<span class="sub-text">Free shipping on all US orders</span>
                            </li>
                          	<li class="display-table-cell">
                            	<i class="icon anm anm-dollar-sign-r"></i>
                                <h5>Money Guarantee</h5>
                                <span class="sub-text">30 days money back guarantee</span>
                          	</li>
                          	<li class="display-table-cell">
                            	<i class="icon anm anm-comments-l"></i>
                                <h5>Online Support</h5>
                                <span class="sub-text">We support online 24/7 on day</span>
                            </li>
                          	<li class="display-table-cell">
                            	<i class="icon anm anm-credit-card-front-r"></i>
                                <h5>Secure Payments</h5>
                                <span class="sub-text">All payment are Secured and trusted.</span>
                        	</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Store Feature-->
    </div>
    <!--End Body Content-->
    
@include('frontend.partial.footer')