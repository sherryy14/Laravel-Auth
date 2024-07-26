@extends('web.layout.app')
@section('title')
    SYNCVOGUE - An E-Commerce Store
@endsection
@section('content')
    
    <!-- banner-section -->
    <section class="banner-style-two">
        <div class="auto-container p-0">
            <div class="banner-carousel-2 owl-carousel owl-theme owl-nav-none">
                <a href="{{route('shop')}}">
                    <div class="content-box"
                        style="background-image: url({{ asset('assets/images/banner/syncvogue-banner-02.jpg') }});">
                        <!--<div class="inner-box">-->
                        <!--    <h1>Discover & <span>Shop</span> The Trend</h1>-->
                        <!--    <p>New Modern Stylist Fashionable Men's Wear Jeans Shirt.</p>-->
                        <!--    <a href="{{ route('shop') }}" class="theme-btn-two">Explore Now<i class="flaticon-right-1"></i></a>-->
                        <!--</div>-->
                    </div>
                </a>
                <a href="{{route('shop')}}">
                    <div class="content-box"
                        style="background-image: url({{ asset('assets/images/banner/syncvogue-banner-03.jpg') }}); ">
                        <!--<div class="inner-box">-->
                        <!--    <h1>Discover & <span>Shop</span> The Trend</h1>-->
                        <!--    <p>New Modern Stylist Fashionable Men's Wear Jeans Shirt.</p>-->
                        <!--    <a href="{{ route('shop') }}" class="theme-btn-two">Explore Now<i class="flaticon-right-1"></i></a>-->
                        <!--</div>-->
                    </div>
                </a>
                <a href="{{route('shop')}}">
                    <div class="content-box"
                        style="background-image: url({{ asset('assets/images/banner/syncvogue-banner-01.jpg') }});">
                        <!--<div class="inner-box">-->
                        <!--    <h1>Discover & <span>Shop</span> The Trend</h1>-->
                        <!--    <p>New Modern Stylist Fashionable Men's Wear Jeans Shirt.</p>-->
                        <!--    <a href="{{ route('shop') }}" class="theme-btn-two">Explore Now<i class="flaticon-right-1"></i></a>-->
                        <!--</div>-->
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- banner-section end -->
    <!-- collection-section -->
    <section class="collection-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                    <a href="{{ route('shop.by.brand', ['brand' => 'flexfit']) }}">
                        <div class="single-item wow fadeInLeft animated animated animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box"
                                style="background-image: url({{ asset('assets/images/banner/Banner-01-01.jpg') }}); ">
                                <!--<h2>Get Discount <br />For Headphone</h2>-->
                                <!--<p>World Best Brands</p>-->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                    <div class="single-item wow fadeInRight animated animated animated" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box"
                            style="background-image: url({{ asset('assets/images/banner/Banner-01-02.jpg') }});">
                            <!--<h2>Only For <br />Girls Fashion</h2>-->
                            <!--<p>Incredible Quality</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- collection-section end -->


     <!-- topcategory-section -->
    <section class="topcategory-section centred">
        <div class="auto-container">
            <div class="sec-title">
                <h2>Top Brands</h2>
                <p>Follow the most popular trends and get exclusive items from SyncVogue shop</p>
                <span class="separator"
                    style="background-image: url({{ asset('assets/images/icons/separator-1.png') }});"></span>
            </div>
            <div class="row clearfix justify-content-center">
                <!--@foreach ($productsByMill as $millName => $products)-->
                <!--    <div class="col-lg-3 col-md-6 col-sm-12 category-block">-->
                <!--        <a href="{{ route('shop.by.brand', ['brand' => custom_slug($millName)]) }}">-->
                            
                <!--        <div class="category-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">-->
                <!--            <figure class="image-box">-->
                <!--                @if ($products->isNotEmpty())-->
                <!--                    <img src="{{ asset('assets/images/brands/' . $products->first()->brand_image_url) }}" alt="{{ $millName }}">-->
                <!--                @else-->
                <!--                    <img src="{{ asset('assets/images/resource/default-image.png') }}" alt="{{ $millName }}">-->
                <!--                @endif-->
                <!--            </figure>-->
                <!--            <h5><a href="{{ route('shop.by.brand', ['brand' => custom_slug($millName)]) }}">{{ $millName }} Collections</a></h5>-->
                <!--        </div>-->
                <!--        </a>-->
                <!--    </div>-->
                <!--@endforeach-->
                <div class="col-lg-3 col-md-4 col-sm-6 category-block">
                    <a href="{{ route('shop.by.brand', ['brand' => 'gildan']) }}">
                        
                    <div class="category-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <figure class="image-box">
                                <img src="{{ asset('assets/images/brands/g180_cd_p-01.jpg') }}" alt="g180_cd_p-01.jpg">
                        </figure>
                        <h5><a href="{{ route('shop.by.brand', ['brand' => 'gildan']) }}">Gildan Collections</a></h5>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 category-block">
                    <a href="{{ route('shop.by.brand', ['brand' => 'fruit-of-the-loom']) }}">
                        
                    <div class="category-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <figure class="image-box">
                            <img src="{{ asset('assets/images/brands/secound_logo-01.jpg') }}" alt="secound_logo-01.jpg">
                        </figure>
                        <h5><a href="{{ route('shop.by.brand', ['brand' => 'fruit-of-the-loom']) }}">Fruit Of The Loom Collections</a></h5>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 category-block">
                    <a href="{{ route('shop.by.brand', ['brand' => 'hanes']) }}">
                        
                    <div class="category-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <figure class="image-box">
                           <img src="{{ asset('assets/images/brands/third_logo-01.jpg') }}" alt="third_logo-01.jpg">
                        </figure>
                        <h5><a href="{{ route('shop.by.brand', ['brand' => 'hanes']) }}">Hanes Collections</a></h5>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 category-block">
                    <a href="{{ route('shop.by.brand', ['brand' => 'flexfit']) }}">
                        
                    <div class="category-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <figure class="image-box">
                            <img src="{{ asset('assets/images/brands/fourth_logo-01.jpg') }}" alt="fourth_logo-01.jpg">
                        </figure>
                        <h5><a href="{{ route('shop.by.brand', ['brand' => 'flexfit']) }}">Flexfit Collections</a></h5>
                    </div>
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- topcategory-section end -->



    <section class="newarrivals-section">
        <div class="auto-container">
            @foreach ($productsByMill as $millName => $products)
                <div class="sec-title">
                    <h2>Shop By {{ $millName }}</h2>
                    @if($millName == 'Flexfit')
                    <p>Elevate Your Fit, Elevate Your Style</p>
                    @elseif ($millName == 'Hanes')
                    <p>Comfort That Speaks for Itself</p>
                    @elseif ($millName == 'Fruit Of The Loom')
                    <p>Fresh Styles, Everyday Comfort</p>
                    @elseif ($millName == 'Gildan')
                    <p>Where Comfort Meets Durability</p>
                    @endif
                    <span class="separator"
                        style="background-image: url({{ asset('assets/images/icons/separator-1.png') }});"></span>
                </div>
                <div class="four-item-carousel owl-carousel owl-theme owl-dots-none my-3">
                    @foreach ($products as $item)
                        @php
                            $description = $item->description;
                            $position = strpos($description, ' -');
                            $trimmedDescription =
                                $position !== false ? substr($description, 0, $position) : $description;
                            $title = $item->mill_name . ' ' . $item->style_code . ' ' . $trimmedDescription;

                            $slug = strtolower($item->mill_name) . '-' . strtolower($item->style_code);
                            $discountPercentage = 50;
                            $originalPrice = $item->piece_price * 2;
                            $discountAmount = $originalPrice * ($discountPercentage / 100);
                            $discountedPrice = $originalPrice - $discountAmount;
                        @endphp
                        <div class="shop-block">
                            <div class="shop-block-one">
                                <span class="discount-offer">{{ $discountPercentage }}%</span>
                                <a href="{{ route('product.detail', ['id' => $slug]) }}">

                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ $item->domain }}{{ $item->front_of_image_name }}"
                                                title="{{ $title }}" alt="{{ $title }}">
                                        </figure>
                                        <div class="lower-content">
                                            <a href="{{ route('product.detail', ['id' => $slug]) }}">
                                                <h5>{{ $title }}</h5>
                                            </a>
                                            <div class="d-flex justify-content-between my-2">

                                                <span class="available-colors">Available Colors
                                                    {{ $hexCodeCounts->has($item->style_code) ? $hexCodeCounts[$item->style_code]->color_count : 0 }}
                                                </span>

                                                <img src="{{ $item->brand_image_url ? asset('assets/images/brands/' . $item->brand_image_url) : asset('assets/images/brands/default.jpg') }}"
                                                    width="70px" alt="{{ $item->mill_name }} Brand Image">
                                            </div>
                                            <div class="d-flex justify-content-between">

                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star-half-stroke"></i>
                                                </div>
                                                <span class="price-box"><span
                                                        class="discount-price">${{ number_format($discountedPrice, 2) }}</span>
                                                    <span
                                                        class="original-price">${{ number_format($originalPrice, 2) }}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <div class="more-btn centred"><a href="{{ route('shop') }}" class="theme-btn-one">View All Products<i
                        class="flaticon-right-1"></i></a></div>
        </div>
    </section>


    <!-- cta-style-two -->
    <section class="cta-style-two" style="background-image: url({{ asset('assets/images/banner/bottom-banner.jpg') }});">
        <div class="auto-container">
            <div class="inner-box">
                <div class="inner">
                    <h2>End of Season Clearance Sale upto 50%</h2>
                    <p>Welcome to the new range of shaving products from master barber. We have over three decades of
                        experience.</p>
                    <a href="{{ route('shop') }}" class="theme-btn-three">Shop Now<i class="flaticon-right-1"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-style-two end -->


    <!-- shop-section -->
    {{-- <section class="shop-section pa-0">
        <div class="auto-container">
            <div class="inner-container sec-pad">
                <div class="sec-title">
                    <h2>Our Top Collection</h2>
                    <p>There are some product that we featured for choose your best</p>
                    <span class="separator"
                        style="background-image: url({{ asset('assets/images/icons/separator-1.png') }});"></span>
                </div>
                <div class="sortable-masonry">
                    <div class="filters">
                        <ul class="filter-tabs filter-btns centred clearfix">
                            <li class="active filter" data-role="button" data-filter=".best_seller">Best Seller</li>
                            <li class="filter" data-role="button" data-filter=".new_arraivals">New Arraivals</li>
                            <li class="filter" data-role="button" data-filter=".top_rate">Top Rate</li>
                        </ul>
                    </div>
                    <div class="items-container row clearfix">
                        <div
                            class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column best_seller new_arraivals top_rate">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset('assets/images/resource/shop/shop-1.jpg') }}" alt="">

                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Cold Crewneck Sweater</a>
                                        <span class="price">$70.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column best_seller">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset('assets/images/resource/shop/shop-2.jpg') }}" alt="">
                                        <span class="category green-bg')}}">New</span>

                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Multi-Way Ultra Crop Top</a>
                                        <span class="price">$50.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column best_seller top_rate">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset('assets/images/resource/shop/shop-3.jpg') }}" alt="">

                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Side-Tie Tank</a>
                                        <span class="price">$40.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column best_seller new_arraivals">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset('assets/images/resource/shop/shop-4.jpg') }}" alt="">

                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Cold Crewneck Sweater</a>
                                        <span class="price">$60.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column best_seller top_rate">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset('assets/images/resource/shop/shop-5.jpg') }}" alt="">

                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Side-Tie Tank</a>
                                        <span class="price">$35.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column best_seller new_arraivals">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset('assets/images/resource/shop/shop-6.jpg') }}" alt="">

                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Must-Have Easy Tank</a>
                                        <span class="price">$25.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column best_seller new_arraivals top_rate">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset('assets/images/resource/shop/shop-7.jpg') }}" alt="">
                                        <span class="category red-bg')}}">Hot</span>

                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Woven Crop Cami</a>
                                        <span class="price">$90.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column best_seller new_arraivals">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ asset('assets/images/resource/shop/shop-8.jpg') }}" alt="">

                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Must-Have Easy Tank</a>
                                        <span class="price">$20.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="more-btn centred"><a href="{{ route('shop') }}" class="theme-btn-one">View All Products<i
                            class="flaticon-right-1"></i></a></div>
            </div>
        </div>
    </section> --}}
    <!-- shop-section end -->


    <!-- news-section -->
    {{-- <section class="news-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="sec-title">
                    <h2>Castro News</h2>
                    <p>Excepteur sint occaecat cupidatat non proident sunt</p>
                    <span class="separator"
                        style="background-image: url({{ asset('assets/images/icons/separator-1.png') }});"></span>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><a href="blog-details.html"><img
                                            src="{{ asset('assets/images/news/news-1.jpg') }}" alt=""></a>
                                </figure>
                                <div class="lower-content">
                                    <span class="post-date">May 05, 2020</span>
                                    <h3><a href="blog-details.html">Why is a ticket to lagos so expensive?</a></h3>
                                    <ul class="post-info clearfix">
                                        <li><a href="index.html">by admin</a></li>
                                        <li><a href="index.html">03 Comments</a></li>
                                    </ul>
                                    <p>Tempor incididunt labore dolore magna aliqua. enim minim veniam quis nostrud
                                        exercitation laboris.</p>
                                    <div class="link"><a href="blog-details.html">Read More<i
                                                class="flaticon-right-1"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="300ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><a href="blog-details.html"><img
                                            src="{{ asset('assets/images/news/news-2.jpg') }}" alt=""></a>
                                </figure>
                                <div class="lower-content">
                                    <span class="post-date">May 04, 2020</span>
                                    <h3><a href="blog-details.html">But i must explain to you how all this mistaken
                                            idea.</a></h3>
                                    <ul class="post-info clearfix">
                                        <li><a href="index.html">by admin</a></li>
                                        <li><a href="index.html">07 Comments</a></li>
                                    </ul>
                                    <p>Tempor incididunt labore dolore magna aliqua. enim minim veniam quis nostrud
                                        exercitation laboris.</p>
                                    <div class="link"><a href="blog-details.html">Read More<i
                                                class="flaticon-right-1"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="600ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><a href="blog-details.html"><img
                                            src="{{ asset('assets/images/news/news-3.jpg') }}" alt=""></a>
                                </figure>
                                <div class="lower-content">
                                    <span class="post-date">May 03, 2020</span>
                                    <h3><a href="blog-details.html">The Biebers Just Switched Up Their Couple Style</a>
                                    </h3>
                                    <ul class="post-info clearfix">
                                        <li><a href="index.html">by admin</a></li>
                                        <li><a href="index.html">05 Comments</a></li>
                                    </ul>
                                    <p>Tempor incididunt labore dolore magna aliqua. enim minim veniam quis nostrud
                                        exercitation laboris.</p>
                                    <div class="link"><a href="blog-details.html">Read More<i
                                                class="flaticon-right-1"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- news-section end -->


    <!-- service-style-two -->
    <section class="service-style-two">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="flaticon-truck"></i></div>
                                <h3><a href="#">Free Shipping</a></h3>
                                <p>Free shipping on oder over $100</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="300ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="flaticon-24-7"></i></div>
                                <h3><a href="#">Support 24/7</a></h3>
                                <p>Contact us 24 hours a day, 7 days a week</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="600ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="flaticon-undo"></i></div>
                                <h3><a href="#">30 Days Return</a></h3>
                                <p>Simply return it within 30 days for an exchange.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-style-two end -->
@endsection
