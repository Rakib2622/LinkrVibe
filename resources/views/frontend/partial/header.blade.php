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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body class="template-index belle template-index-belle">
    {{-- <div id="pre-loader">
        <img src="/home/assets/images/loader.gif" alt="Loading..." />
    </div> --}}
    {{-- <div class="pageWrapper"> --}}
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

                                <li class="lvl1 parent dropdown"><a href="{{ route('products') }}">Product</a>
                                </li>

                                <li class="lvl1 parent dropdown"><a href=#>Services <i
                                            class="anm anm-angle-down-l"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('services.dMB') }}" class="site-nav">Digital Menu board </a></li>
                                        <li><a href="{{ route('services.qrPos') }}" class="site-nav">QR Menu Restuarent POS</a></li>
                                        <li><a href="{{ route('services.nfc') }}" class="site-nav">NFC Business Card</a></li>
                                        <li><a href="{{ route('services.gRC') }}" class="site-nav">Google Review Card</a></li>
                                    </ul>
                                </li>

                                <li class="lvl1 parent megamenu"><a href="{{ route('contact') }}">Contact<i
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
                            <a href="{{route('cart.index')}}" title="Cart">
                                <i class="icon anm anm-bag-l" style="font-size: 1.5rem; color: black;"></i>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--End Header-->
        <!--Mobile Menu-->
        <div class="mobile-nav-wrapper" role="navigation">
            <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
            <ul id="MobileNav" class="mobile-nav">
                <li class="lvl1 parent megamenu"><a href="{{ route('home') }}">Home </a>
                </li>

                <li class="lvl1 parent megamenu"><a href="{{ route('about') }}">About Us </a>
                </li>

                <li class="lvl1 parent megamenu"><a href="{{ route('products') }}">Products</a>
                </li>

                <li class="lvl1 parent megamenu"><a href="{{ route('services') }}">Services <i class="anm anm-plus-l"></i></a>
                  <ul>
                      <li><a href="{{ route('services.dMB') }}" class="site-nav">Digital Menu board </a></li>
                      <li><a href="{{ route('services.qrPos') }}" class="site-nav">QR Menu Restuarent POS</a></li>
                      <li><a href="{{ route('services.nfc') }}" class="site-nav">NFC Business Card</a></li>
                      <li><a href="{{ route('services.gRC') }}" class="site-nav">Google Review Card</a></li>
                 </ul>
                </li>
                <li class="lvl1 parent megamenu"><a href="{{ route('contact') }}">Contact Us</a></li>

              
            </ul>
        </div>
        <!--End Mobile Menu-->
