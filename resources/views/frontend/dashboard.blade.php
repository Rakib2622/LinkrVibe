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

        <div class="section-header text-center" style="background: #f6f4f4; padding:20px">
            <h2>Our Services</h2>
            <p>Browse the huge variety of our service</p>
        </div>


        <div class="slider desktop-padding" style="display: flex; align-items: center; background: linear-gradient(to right, #ffffff, white);">
            <div class="slider-text">
                <h3>Complete POS & Table Ordering System!</h3>
                <h1>NFC & QR Code Tabletop Menus</h1>
                <p>
                    Upgrade your restaurant's dining experience with our NFC and QR code-enabled tabletop menus! Allow customers to easily browse your menu, place orders, and make payments directly from their smartphones.
                </p>
                <button onclick="contactNow()" class="btn-primary">Contact Now</button>
                <button onclick="tryDemo()" class="btn-secondary">Try Demo</button>
            </div>
            <div class="slider-image">
                <img src="home/assets/images/Untitled-design.gif" alt="NFC & QR Code Tabletop Menus">
            </div>
        </div>
        
        <!-- Second Section -->
        <div class="slider desktop-padding" style="display: flex; align-items: center; background: #f9f9f9;">
            <div class="slider-image">
                <img src="\home\assets\images\dmb\menuslider.gif" alt="Digital Menu Board">
            </div>
            <div class="slider-text">
                <h3>Digital Menu Board</h3>
                <h1>Transform Your Restaurant’s Menu!</h1>
                <p>
                    Digital menus are clean, easy to read, and provide an interactive experience for diners. Perfect for modern restaurants!
                </p>
                <button onclick="contactNow()" class="btn-primary">Contact Now</button>
            </div>
        </div>
        
        <!-- Third Section -->
        <div class="slider desktop-padding" style="display: flex; align-items: center; background: linear-gradient(to right, #ffffff, #f0f0f0);">
            <div class="slider-text">
                <h3>Google Review Card</h3>
                <h1>Boost Your Business Visibility!</h1>
                <p>
                    With our NFC-enabled Google Review Cards, encourage walk-in customers to leave a review with just a simple tap. Easy and effective!
                </p>
                <button onclick="contactNow()" class="btn-primary">Contact Now</button>
            </div>
            <div class="slider-image">
                <img src="home/assets/images/5-Pack-of-Google-review-card.png" alt="Google Review Card">
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

    <div class="testimonials" style="padding: 20px; margin-top:10px; text-align: center; background-color: #e6e6e6;">
        <h2 style="font-size: 2em; margin-bottom: 20px;">What Our Clients Say</h2>
        <div class="testimonial-slider" style="display: flex; overflow-x: scroll; gap: 20px; padding: 20px;">
            @foreach ($testimonials as $testimonial)
                <div style="min-width: 350px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <p style="font-size: 1.2em;">{{ $testimonial['message'] }}</p>
                    <strong>- {{ $testimonial['name'] }}</strong>
                </div>
            @endforeach
        </div>
    </div>
    <!--End Body Content-->


    <script>
        function contactNow() {
            window.location.href = '/contact';
        }
    
        function tryDemo() {
            window.location.href = "https://menu.smartapcard.com/"; // Replace this with the actual demo URL
        }
    </script>
    
@include('frontend.partial.footer')

<style>
    /* General Styles */
    .slider {
        display: flex;
        margin: 0 auto;
        max-width: 95%; /* Centralize layout */
    }
    
    /* Add padding for desktop view */
    .desktop-padding {
        padding: 20px 30px; /* Outer padding for desktop view */
    }
    
    /* Content styling */
    .slider-text,
    .slider-image {
        flex: 1;
        padding: 20px; /* Inner padding for consistent spacing */
    }
    
    .slider-text h3 {
        font-size: 2em;
        font-family: cursive;
        margin-bottom: 20px;
    }
    
    .slider-text h1 {
        font-size: 2.5em;
        font-weight: bold;
        margin-bottom: 20px;
    }
    
    .slider-text p {
        font-size: 1.2em;
        margin-bottom: 30px;
    }
    
    /* Button Styles */
    .btn-primary,
    .btn-secondary {
        border: none;
        padding: 10px 20px;
        font-size: 1.2em;
        font-weight: bold;
        cursor: pointer;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background: rgb(233, 104, 24);
        color: white;
    }
    
    .btn-primary:hover {
        background: orange;
    }
    
    .btn-secondary {
        background: rgb(47, 137, 2);
        color: white;
        margin-left: 10px;
    }
    
    .btn-secondary:hover {
        background: orange;
    }

    .store-info {
    display: flex;
    flex-wrap: wrap;
    padding: 0; 
    margin: 0;
    list-style: none;
    justify-content: space-between; /* Adjust spacing between items */
}

.store-info li {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 15px;
    flex: 1 1 25%; /* Default: four items in one line */
    box-sizing: border-box;
}
    
    /* Responsive styles for mobile */
    @media (max-width: 768px) {
        .slider {
            flex-direction: column;
            text-align: center;
        }
    
        .desktop-padding {
            padding: 5px;
        }
    
        .slider-image {
            order: -1;
            text-align: center;
        }
    
        .slider-image img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .store-info li {
        flex: 1 1 45%; /* Two items in one row */
    }
    }
    </style>