<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

</head>
<style>
    #google_translate_element {
        padding: 5px 20px !important;
        border-radius: 2px;
    }
</style>

<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">
        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">Preloader Close</div>
            </div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>


        <!-- main header -->
        <header class="main-header style-two">
            <div class="header-top">
                <div class="auto-container">
                    <div class="top-inner clearfix">
                            <div class="top-right pull-right">
                                <p><img src="{{ asset('assets/images/free-shipping-white.png') }}" alt="Free Shipping" style="width: 30px;"> &nbsp; FREE shipping on orders over $249 *</p>
                            
                            <!--<div class="language">-->
                            <!--    <div class="lang-btn">-->
                            <!--        <span class="flag"><img-->
                            <!--                src="{{ asset('assets/images/icons/icon-lang.png') }}"-->
                            <!--                alt="" title="English"></span>-->
                            <!--        <span class="txt">English</span>-->
                            <!--        <span class="arrow fa fa-angle-down"></span>-->
                                    <!--<div id="google_translate_element"></div>-->
                            <!--    </div>-->
                            <!--    <div class="lang-dropdown">-->
                            <!--        <ul>-->
                            <!--            <li><a href="#">German</a></li>-->
                            <!--            <li><a href="#">Italian</a></li>-->
                            <!--            <li><a href="#">Chinese</a></li>-->
                            <!--            <li><a href="#">Russian</a></li>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="price-box">-->
                            <!--    <span>USD</span>-->
                            <!--    <ul class="price-list clearfix">-->
                            <!--        <li><a href="#">USD</a></li>-->
                            <!--        <li><a href="#">UK</a></li>-->
                            <!--        <li><a href="#">URO</a></li>-->
                            <!--        <li><a href="#">Spanish</a></li>-->
                            <!--    </ul>-->
                            <!--</div>-->
                        </div>
                        <div class="top-left pull-left">
                            <ul class="info clearfix">
                                <li><i class="flaticon-email"></i><a
                                        href="mailto:support@example.com">syncvogue@example.com</a></li>
                                <li><i class="flaticon-global"></i> Kleine Pierbard 8-6 2249 KV Vries</li>
                            </ul>
                            <ul class="social-links clearfix">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="header-upper">
                <div class="auto-container">
                    <div class="upper-inner">
                        <figure class="logo-box"><a href="{{ route('home') }}"><img
                                    src="{{ asset('assets/images/logo.png') }}" alt="logo"
                                    style="height: 65px;"></a></figure>
                        <div class="search-info">
                            <div class="select-box">
                                <select class="wide" name='categories'>
                                        <option value="all">All Categories</option>
                                     @foreach ($topCategories as $category)
                                        <option value="{{custom_slug($category)}}">{{$category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <form action="{{ route('product.search') }}" method="post" class="search-form">
                                @csrf
                                <div class="form-group">
                                    <input type="search" name="search-field" placeholder="Search Product..."
                                        required="">
                                    <button type="submit"><i class="flaticon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <ul class="menu-right-content clearfix">
                            {{-- <li><a href="#"><i class="flaticon-like"></i></a></li> --}}
                            {{-- <li><a href="#"><i class="flaticon-user"></i></a></li> --}}
                            <li class="shop-cart">
                                <a href="{{ route('cart') }}">
                                    <i class="flaticon-shopping-cart-1"></i>
                                    <span>{{ $totalQuantity ?? 0 }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-lower">
                <div class="auto-container">
                    <div class="outer-box clearfix justify-content-center">
                        {{-- <div class="category-box pull-left">
                            <p>All Categories</p>
                            <ul class="category-content">
                                <li class="dropdown-option"><i class="flaticon-dress"></i>
                                    <a href="index-2.html">Women’s Clothing</a>
                                    <ul>
                                        <li><a href="index-2.html">Categories 01</a></li>
                                        <li><a href="index-2.html">Categories 02</a></li>
                                        <li><a href="index-2.html">Categories 03</a></li>
                                        <li><a href="index-2.html">Categories 04</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-option"><i class="flaticon-t-shirt"></i>
                                    <a href="index-2.html">Man Fashion</a>
                                    <ul>
                                        <li><a href="index-2.html">Categories 01</a></li>
                                        <li><a href="index-2.html">Categories 02</a></li>
                                        <li><a href="index-2.html">Categories 03</a></li>
                                        <li><a href="index-2.html">Categories 04</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-option"><i class="flaticon-woman"></i>
                                    <a href="index-2.html">Kid’s Clothing</a>
                                    <ul>
                                        <li><a href="index-2.html">Categories 01</a></li>
                                        <li><a href="index-2.html">Categories 02</a></li>
                                        <li><a href="index-2.html">Categories 03</a></li>
                                        <li><a href="index-2.html">Categories 04</a></li>
                                    </ul>
                                </li>
                                <li><i class="flaticon-necklace-1"></i><a href="index-2.html">Jewelry & Watches</a>
                                </li>
                                <li><i class="flaticon-backpack"></i><a href="index-2.html">Bags & Shoes</a></li>
                                <li><i class="flaticon-rocking-horse"></i><a href="index-2.html">Toys & Kids</a></li>
                                <li class="dropdown-option"><i class="flaticon-lightbulb-1"></i>
                                    <a href="index-2.html">Electronics</a>
                                    <ul>
                                        <li><a href="index-2.html">Categories 01</a></li>
                                        <li><a href="index-2.html">Categories 02</a></li>
                                        <li><a href="index-2.html">Categories 03</a></li>
                                        <li><a href="index-2.html">Categories 04</a></li>
                                    </ul>
                                </li>
                                <li><i class="flaticon-laptop"></i><a href="index-2.html">Computers</a></li>
                                <li><i class="flaticon-plus-1"></i><a href="index-2.html">Others</a></li>
                            </ul>
                        </div> --}}
                        <div class="menu-area pull-left">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        {{-- <li><a href="#">About Us</a></li> --}}
                                        <li><a href="{{ route('shop') }}">Shop</a></li>
                                        <li class="dropdown"><a href="#">Brands</a>
                                            <div class="megamenu">
                                                {{-- <div class="row clearfix">
                                                    <div class="col-md-2 column">
                                                        <ul>
                                                            <li>
                                                                <h5>A</h5>
                                                            </li>
                                                            <li><a href="">Shop 01</a></li>

                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 column">
                                                        <ul>
                                                            <li>
                                                                <h5>B-C</h5>
                                                            </li>
                                                            <li><a href="">Shop 01</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 column">
                                                        <ul>
                                                            <li>
                                                                <h5>D-G</h5>
                                                            </li>
                                                            <li><a href="">Shop 01</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 column">
                                                        <ul>
                                                            <li>
                                                                <h5>H-M</h5>
                                                            </li>
                                                            <li><a href="">Shop 01</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 column">
                                                        <ul>
                                                            <li>
                                                                <h5>N-R</h5>
                                                            </li>
                                                            <li><a href="">Shop 01</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 column">
                                                        <ul>
                                                            <li>
                                                                <h5>S-Z</h5>
                                                            </li>
                                                            <li><a href="">Shop 01</a></li>
                                                        </ul>
                                                    </div>
                                                </div> --}}

                                                <div class="row clearfix">
                                                    @foreach ($groupedBrands as $group => $brands)
                                                        <div class="col-lg-2 column">
                                                            <ul>
                                                                <li>
                                                                    <h5 class='brand-range'>{{ $group }}</h5>
                                                                </li>
                                                                @foreach ($brands as $brand)
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('shop.by.brand', ['brand' => custom_slug($brand)]) }}">
                                                                            {{ $brand }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </li>
                                        <li class="dropdown"><a href="#">Categories</a>
                                            <div class="megamenu">
                                                <div class="row clearfix">
                                                    @foreach ($categories as $group)
                                                        <div class="col-lg-2 column">
                                                            <ul>
                                                                @foreach ($group as $category)
                                                                    <li>
                                                                        <a href="{{ custom_slug($category) }}">{{ $category }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                    <div class="col column">
                                                        <div class="row">
                                                            <div class="col-lg-6 d-flex justify-content-center px-3">
                                                                <img src="{{ asset('assets/images/brands/hanes.jpg') }}" class=" w-100 nav-brand-img" style="height: 80px;" alt="Brand Image">
                                                            </div>
                                                            <div class="col-lg-6 d-flex justify-content-center px-3">
                                                                <img src="{{ asset('assets/images/brands/fruit_of_loom.jpg') }}"  class="w-100 nav-brand-img" style="height: 80px;" alt="Brand Image">
                                                            </div>
                                                            <div class="col-lg-6 d-flex justify-content-center px-3">
                                                                <img src="{{ asset('assets/images/brands/Flexfit.jpg') }}" class=" w-100 nav-brand-img" style="height: 80px;" alt="Brand Image">
                                                            </div>
                                                            <div class="col-lg-6 d-flex justify-content-center px-3">
                                                                <img src="{{ asset('assets/images/brands/gilden.jpg') }}" class=" w-100 nav-brand-img" style="height: 80px;" alt="Brand Image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box clearfix">
                        <div class="logo-box pull-left">
                            <figure class="logo"><a href="{{ route('home') }}"><img
                                        src="{{ asset('assets/images/logo.png') }}" alt=""
                                        style="height: 50px;"></a></figure>
                        </div>
                        <div class="menu-area pull-right">
                            <nav class="main-menu clearfix">
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{ route('home') }}"><img src="{{ asset('assets/images/footer-logo.png') }}" alt="logo"
                                    ></a></div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="popup-overlay" id="overlay"></div>
        <div class="subscribe" id="subscribePopup">
            <div class="close-icon">
                <i class="fas fa-times" id="closeIcon"></i>
            </div>
            <h2 class="subscribe__title">Let's keep in touch</h2>
            <p class="subscribe__copy">Subscribe to keep up with top and trendy products. We promise not to spam you!
            </p>
            <div id='success-box' class="d-none">
                <img src="{{ asset('assets/images/like.gif') }}" alt="Like">
            </div>
            <form id="subscribeForm" class="form">
                <input type="email" class="form__email" id="email" placeholder="Enter your email address" />
                <button class="form__button" type="submit">Send</button>
            </form>
            <div class="notice" id="notice">
                <input type="checkbox" id="agree" required>
                <span class="notice__copy">I agree to my email address being stored and uses to recieve new
                    arrivals.</span>
            </div>
            <div id="message" class="message"></div>
        </div>
