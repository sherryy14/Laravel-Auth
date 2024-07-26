@extends('web.layout.app')
@section('title')
    SYNCVOGUE - Shop
@endsection
@section('content')
    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/background/page-title.jpg') }}')}});">
        </div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Shop</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('home') }}">Home</a></li>
                    <li>Shop</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- shop-page-section -->
    <section class="shop-page-section sidebar-page-container shop-page-2">
        <div class="auto-container px-5">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-12 col-sm-12 sidebar-side">
                    <div class="sidebar shop-sidebar">
                        {{-- <div class="sidebar-widget search-widget">
                            <form action="index.html" method="post" class="search-form">
                                <div class="form-group">
                                    <input type="search" name="search-field" placeholder="Search..." required="">
                                    <button type="submit"><i class="flaticon-search"></i></button>
                                </div>
                            </form>
                        </div> --}}
                        <div class="sidebar-widget categories-widget">
                            <div class="widget-title">
                                <h3>Shop by Categories</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="categories-list clearfix">
                                    @foreach ($categories as $category)
                                    <li>
                                        <a href="#">{{ $category->category}} ({{ $category->products }})</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget price-filter">
                            <div class="widget-title">
                                <h3>Shop by Price</h3>
                            </div>
                            <div class="range-slider clearfix">
                                <div class="price-range-slider"></div>
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <a href="#" class="theme-btn-two filter-btn">Filter</a>
                                    </div>
                                    <div class="pull-right">
                                        <p>Price:</p>
                                        <div class="title"></div>
                                        <div class="input"><input type="text" class="property-amount" name="field-name"
                                                readonly=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="sidebar-widget size-widget">
                            <div class="widget-title">
                                <h3>Shop by Size</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="size-list clearfix">
                                    <li><a href="shop-2.html">L Large</a></li>
                                    <li><a href="shop-2.html">XL Extra Large</a></li>
                                    <li><a href="shop-2.html">M Medium</a></li>
                                    <li><a href="shop-2.html">S Small</a></li>
                                    <li><a href="shop-2.html">XS Extra Small</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget color-widget">
                            <div class="widget-title">
                                <h3>Shop by Price</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="color-list list-item clearfix">
                                    <li><span class="black"></span><a href="shop-2.html">Black (3)</a></li>
                                    <li><span class="blue"></span><a href="shop-2.html">Blue (6)</a></li>
                                    <li><span class="orange"></span><a href="shop-2.html">Orange (9)</a></li>
                                    <li><span class="green"></span><a href="shop-2.html">Green (5)</a></li>
                                    <li><span class="purple"></span><a href="shop-2.html">Purple (3)</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 content-side">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="sidebar-content">
                        <div class="item-shorting clearfix">
                            <div class="left-column pull-left clearfix">
                                <div class="text">
                                    Showing {{ $product->firstItem() }}–{{ $product->lastItem() }} of
                                    {{ $product->total() }} Results
                                </div>
                            </div>
                            {{-- <div class="right-column pull-right clearfix">
                                <div class="short-box clearfix">
                                    <p>Short by</p>
                                    <div class="select-box">
                                        <select class="wide">
                                            <option data-display="Popularity">Popularity</option>
                                            <option value="1">New Collection</option>
                                            <option value="2">Top Sell</option>
                                            <option value="4">Top Ratted</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="menu-box">
                                    <a href="{{ route('shop') }}"><i class="flaticon-menu"></i></a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="our-shop">
                            <div class="row clearfix">
                                @foreach ($product as $item)
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
                                    <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
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
                                    <hr>
                                @endforeach
                            </div>
                        </div>

                        {{-- {{ $product->links('web.pagination') }} --}}
                        {{ $product->appends(request()->query())->links('web.pagination') }}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-page-section end -->
@endsection
