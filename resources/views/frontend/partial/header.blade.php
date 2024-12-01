<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/index.html   11 Nov 2019 12:16:10 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LinkrVibe</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/home/assets/images/favicon.png" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/home/assets/css/plugins.css">
    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="/home/assets/css/bootstrap.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/home/assets/css/style.css">
    <link rel="stylesheet" href="/home/assets/css/responsive.css">
    <script src="https://cdn.tiny.cloud/1/m2osvun5mgff1sowvfyzl572luig231xieovjikgp0lnmq0z/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body class="template-index belle template-index-belle">
    <div id="pre-loader">
        <img src="/home/assets/images/loader.gif" alt="Loading..." />
    </div>
    <div class="pageWrapper">
        <!--Search Form Drawer-->
        {{-- <div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="#">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
            </form>
            <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
        </div>
    </div> --}}
        <!--End Search Form Drawer-->
        <!--Top Header-->
        <div class="top-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                        {{-- <div class="currency-picker">
                        <span class="selected-currency">USD</span>
                        <ul id="currencies">
                            <li data-currency="INR" class="">INR</li>
                            <li data-currency="GBP" class="">GBP</li>
                            <li data-currency="CAD" class="">CAD</li>
                            <li data-currency="USD" class="selected">USD</li>
                            <li data-currency="AUD" class="">AUD</li>
                            <li data-currency="EUR" class="">EUR</li>
                            <li data-currency="JPY" class="">JPY</li>
                        </ul>
                    </div> --}}

                        <p class="phone-no"><i class="anm anm-phone-s"></i> +353833421958</p>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                        <div class="text-center">
                            <p class="top-header_middle-text"> Worldwide Express Shipping</p>
                        </div>
                    </div>
                    <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                        <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al"
                                aria-hidden="true"></i></span>
                        <ul class="customer-links list-inline">
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Create Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Top Header-->
        <!--Header-->
        <div class="header-wrap  animated d-flex">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!--Desktop Logo-->
                    <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                        <a href="{{ route('home') }}">
                            <img src="/home/assets/images/logocolor.png" alt="Simplifying Business, Amplifying Connections"
                                title="LinkrVibe Simplifying Business, Amplifying Connections" />
                        </a>
                    </div>
                    <!--End Desktop Logo-->
                    <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                        <div class="d-block d-lg-none">
                            <button type="button"
                                class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                                <i class="icon anm anm-times-l"></i>
                                <i class="anm anm-bars-r"></i>
                            </button>
                        </div>
                        <!--Desktop Menu-->
                        <nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                            <ul id="siteNav" class="site-nav medium center hidearrow">
                                <li class="lvl1 parent megamenu"><a href="{{ route('home') }}">Home <i
                                            class="anm anm-angle-down-l"></i></a>
                                </li>

                                <li class="lvl1 parent megamenu"><a href="{{ route('about') }}">About Us<i
                                            class="anm anm-angle-down-l"></i></a>
                                </li>

                                <li class="lvl1 parent dropdown"><a href="{{ route('products') }}">Product <i
                                            class="anm anm-angle-down-l"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="cart-variant1.html" class="site-nav">NFC Business Card<i
                                                    class="anm anm-angle-right-l"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="cart-variant1.html" class="site-nav">Variant1</a></li>
                                                <li><a href="cart-variant2.html" class="site-nav">Variant2</a></li>
                                                <li><a href="cart-variant2.html" class="site-nav">Variant2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="compare-variant1.html" class="site-nav">NFC & QR Card<i
                                                    class="anm anm-angle-right-l"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="compare-variant1.html" class="site-nav">Variant1</a></li>
                                                <li><a href="compare-variant2.html" class="site-nav">Variant2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="lookbook1.html" class="site-nav">Google Review Card<i
                                                    class="anm anm-angle-right-l"></i></a>
                                            <ul>
                                                <li><a href="lookbook1.html" class="site-nav">Style 1</a></li>
                                                <li><a href="lookbook2.html" class="site-nav">Style 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="404.html" class="site-nav">NFC & QR Menu </a></li>
                                    </ul>
                                </li>

                                <li class="lvl1 parent dropdown"><a href="{{ route('services') }}">Services <i
                                            class="anm anm-angle-down-l"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="cart-variant1.html" class="site-nav">Digital Menu board<i
                                                    class="anm anm-angle-right-l"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="cart-variant1.html" class="site-nav">Variant1</a></li>
                                                <li><a href="cart-variant2.html" class="site-nav">Variant2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="compare-variant1.html" class="site-nav">Restuarent POS<i
                                                    class="anm anm-angle-right-l"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="compare-variant1.html" class="site-nav">POS1</a></li>
                                                <li><a href="compare-variant2.html" class="site-nav">POS2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="lookbook1.html" class="site-nav">Restuarent Booking<i
                                                    class="anm anm-angle-right-l"></i></a>
                                            <ul>
                                                <li><a href="lookbook1.html" class="site-nav">Style 1</a></li>
                                                <li><a href="lookbook2.html" class="site-nav">Style 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="404.html" class="site-nav">Digital Business Card</a></li>
                                        <li><a href="coming-soon.html" class="site-nav">Portfolio App <span
                                                    class="lbl nm_label1">New</span> </a></li>
                                    </ul>
                                </li>

                                <li class="lvl1 parent megamenu"><a href="{{ route('contact') }}">Contact<i
                                            class="anm anm-angle-down-l"></i></a>
                                </li>
                                <li class="lvl1 parent megamenu"><a href="{{ route('cart.index') }}">Cart<i
                                    class="anm anm-angle-down-l"></i></a>
                        </li>

                            </ul>
                        </nav>
                        <!--End Desktop Menu-->
                    </div>
                    <!--Mobile Logo-->
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="/home/assets/images/logo.png"
                                    alt="Simplifying Business, Amplifying Connections"
                                    title="LinkrVibe Simplifying Business, Amplifying Connections" />
                            </a>
                        </div>
                    </div>
                    <!--Mobile Logo-->
                    <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                        <div class="site-cart">
                            <a href="{{route('cart.index')}};" class="site-header__cart" title="Cart">
                                <i class="icon anm anm-bag-l"></i>
                                <span id="CartCount" class="site-header__cart-count"
                                    data-cart-render="item_count">2</span>
                            </a>
                            <!--Minicart Popup-->
                            <div id="header-cart" class="block block-cart">
                                <ul class="mini-products-list">
                                    <li class="item">
                                        <a class="product-image" href="#">
                                            <img src="/home/assets/images/product-images/cape-dress-1.jpg"
                                                alt="3/4 Sleeve Kimono Dress" title="" />
                                        </a>
                                        <div class="product-details">
                                            <a href="#" class="remove"><i class="anm anm-times-l"
                                                    aria-hidden="true"></i></a>
                                            <a href="#" class="edit-i remove"><i class="anm anm-edit"
                                                    aria-hidden="true"></i></a>
                                            <a class="pName" href="cart.html">Sleeve Kimono Dress</a>
                                            <div class="variant-cart">Black / XL</div>
                                            <div class="wrapQtyBtn">
                                                <div class="qtyField">
                                                    <span class="label">Qty:</span>
                                                    <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                            class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                    <input type="text" id="Quantity" name="quantity"
                                                        value="1" class="product-form__input qty">
                                                    <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                            class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="priceRow">
                                                <div class="product-price">
                                                    <span class="money">$59.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <a class="product-image" href="#">
                                            <img src="/home/assets/images/product-images/cape-dress-2.jpg"
                                                alt="Elastic Waist Dress - Black / Small" title="" />
                                        </a>
                                        <div class="product-details">
                                            <a href="#" class="remove"><i class="anm anm-times-l"
                                                    aria-hidden="true"></i></a>
                                            <a href="#" class="edit-i remove"><i class="anm anm-edit"
                                                    aria-hidden="true"></i></a>
                                            <a class="pName" href="cart.html">Elastic Waist Dress</a>
                                            <div class="variant-cart">Gray / XXL</div>
                                            <div class="wrapQtyBtn">
                                                <div class="qtyField">
                                                    <span class="label">Qty:</span>
                                                    <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                            class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                    <input type="text" id="Quantity" name="quantity"
                                                        value="1" class="product-form__input qty">
                                                    <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                            class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="priceRow">
                                                <div class="product-price">
                                                    <span class="money">$99.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="total">
                                    <div class="total-in">
                                        <span class="label">Cart Subtotal:</span><span class="product-price"><span
                                                class="money">$748.00</span></span>
                                    </div>
                                    <div class="buttonSet text-center">
                                        <a href="cart.html" class="btn btn-secondary btn--small">View Cart</a>
                                        <a href="checkout.html" class="btn btn-secondary btn--small">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!--EndMinicart Popup-->
                        </div>
                        {{-- <div class="site-header__search">
                    	<button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!--End Header-->
        <!--Mobile Menu-->
        <div class="mobile-nav-wrapper" role="navigation">
            <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
            <ul id="MobileNav" class="mobile-nav">
                <li class="lvl1 parent megamenu"><a href="{{ route('home') }}">Home <i
                            class="anm anm-plus-l"></i></a>
                </li>

                <li class="lvl1 parent megamenu"><a href="{{ route('about') }}">About Us <i
                            class="anm anm-plus-l"></i></a>
                </li>

                

                <li class="lvl1 parent megamenu"><a href="{{ route('services') }}">Services <i class="anm anm-plus-l"></i></a>
                  <ul>
                    <li><a href="cart-variant1.html" class="site-nav">Digital Menu board <i
                                  class="anm anm-plus-l"></i></a>
                          <ul class="dropdown">
                              <li><a href="cart-variant1.html" class="site-nav">Variant1</a></li>
                              <li><a href="cart-variant2.html" class="site-nav">Variant2</a></li>
                              <li><a href="cart-variant2.html" class="site-nav">Variant3</a></li>
                          </ul>
                      </li>
                      <li><a href="compare-variant1.html" class="site-nav">Restuarent POS <i
                                  class="anm anm-plus-l"></i></a>
                          <ul class="dropdown">
                              <li><a href="compare-variant1.html" class="site-nav">Variant1</a></li>
                              <li><a href="compare-variant2.html" class="site-nav">Variant2</a></li>
                          </ul>
                      </li>

                      <li><a href="compare-variant1.html" class="site-nav">Restuarent Booking <i
                                  class="anm anm-plus-l"></i></a>
                          <ul class="dropdown">
                              <li><a href="compare-variant1.html" class="site-nav">Variant1</a></li>
                              <li><a href="compare-variant2.html" class="site-nav">Variant2</a></li>
                          </ul>
                      </li>
                      <li><a href="compare-variant1.html" class="site-nav">Digital Business Card
                                  </a>
                      </li>
                       <li><a href="compare-variant1.html" class="site-nav">Portfolio App </a></li>
                    </li>
                </ul>

                <li class="lvl1 parent megamenu"><a href="{{ route('products') }}">Products <i class="anm anm-plus-l"></i></a>
                    <ul>
                        <li><a href="cart-variant1.html" class="site-nav">NFC Business Card <i
                                    class="anm anm-plus-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="cart-variant1.html" class="site-nav">Variant1</a></li>
                                <li><a href="cart-variant2.html" class="site-nav">Variant2</a></li>
                                <li><a href="cart-variant2.html" class="site-nav">Variant3</a></li>
                            </ul>
                        </li>
                        <li><a href="compare-variant1.html" class="site-nav">NFC & QR Card <i
                                    class="anm anm-plus-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="compare-variant1.html" class="site-nav">Variant1</a></li>
                                <li><a href="compare-variant2.html" class="site-nav">Variant2</a></li>
                            </ul>
                        </li>

                        <li><a href="compare-variant1.html" class="site-nav">Google Review Card <i
                                    class="anm anm-plus-l"></i></a>
                            <ul class="dropdown">
                                <li><a href="compare-variant1.html" class="site-nav">Variant1</a></li>
                                <li><a href="compare-variant2.html" class="site-nav">Variant2</a></li>
                            </ul>
                        </li>
                        <li><a href="compare-variant1.html" class="site-nav">NFC & QR Menu <i
                                    class="anm anm-plus-l"></i></a>
                        </li>
                    </ul>
                </li>

                
                <li class="lvl1 parent megamenu"><a href="{{ route('contact') }}">Contact <i
                  class="anm anm-plus-l"></i></a>
                </li>

              
            </ul>
        </div>
        <!--End Mobile Menu-->
