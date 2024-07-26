@extends('web.layout.app')
@section('title')
    SYNCVOGUE - Checkout
@endsection
@section('content')
    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/background/page-title.jpg') }});">
        </div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Checkout</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('home') }}">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <!-- checkout-section -->
    <section class="checkout-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                    <div class="inner-box">
                        <div class="billing-info">
                            <h4 class="sub-title">Billing Details</h4>
                            <form action="#" method="post" class="billing-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>First Name*</label>
                                        <div class="field-input">
                                            <input type="text" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Last Name*</label>
                                        <div class="field-input">
                                            <input type="text" name="last_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Company Name*</label>
                                        <div class="field-input">
                                            <input type="text" name="company_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Email Address*</label>
                                        <div class="field-input">
                                            <input type="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Phone Number*</label>
                                        <div class="field-input">
                                            <input type="text" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Country*</label>
                                        <div class="select-column select-box">
                                            <select class="selectmenu" id="ui-id-1">
                                                <option selected="selected">Select Option</option>
                                                <option>United State</option>
                                                <option>Australia</option>
                                                <option>Canada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Address*</label>
                                        <div class="field-input">
                                            <input type="text" name="address" class="address">
                                            <input type="text" name="address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Town/City*</label>
                                        <div class="field-input">
                                            <input type="text" name="town_city">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>State*</label>
                                        <div class="select-column select-box">
                                            <select class="selectmenu" id="ui-id-2">
                                                <option selected="selected">Select Option</option>
                                                <option>United State</option>
                                                <option>Australia</option>
                                                <option>Canada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Zip Code*</label>
                                        <div class="field-input">
                                            <input type="text" name="zip">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div class="create-acc">
                                            <div class="custom-controls-stacked">
                                                <label class="custom-control material-checkbox">
                                                    <input type="checkbox" class="material-control-input">
                                                    <span class="material-control-indicator"></span>
                                                    <span class="description">Create an Account?</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="additional-info">
                            <div class="note-book">
                                <label>Order Notes</label>
                                <textarea name="note_box" placeholder="Notes about your order, e.g. special notes for your delivery"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 right-column">
                    <div class="inner-box">
                        <div class="order-info">
                            <h4 class="sub-title">Your Order</h4>
                            @if (!empty(session('cart')))
                                <div class="order-product">
                                    <ul class="order-list clearfix">
                                        <li class="title clearfix">
                                            <p>Product</p>
                                            <span>Total</span>
                                        </li>
                                        @foreach ($products as $product)
                                            <li>
                                                <div class="single-box clearfix">
                                                    <img src="{{ $product['image'] }}" alt="">
                                                    @php
                                                        $description = $product['name'];
                                                        $position = strpos($description, ' -');
                                                        $trimmedDescription =
                                                            $position !== false
                                                                ? substr($description, 0, $position)
                                                                : $description;
                                                    @endphp
                                                    <h6>{{ $trimmedDescription }} - {{ $product['size'] }} x {{ $product['quantity'] }}</h6>
                                                    <span>${{ $product['total'] }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                        <li class="sub-total clearfix">
                                            <h6>Sub Total</h6>
                                            <span>${{ $subtotal }}</span>
                                        </li>
                                        <li class="sub-total clearfix">
                                            <h6>Shipping</h6>
                                            <span>${{ $shippingPrice }}</span>
                                        </li>
                                        <li class="order-total clearfix">
                                            <h6>Order Total</h6>
                                            <span>${{ $orderTotal }}</span>
                                        </li>
                                    </ul>
                                </div>
                            @else
                            <div class="othre-content clearfix p-3">
                                    <p>No Product In Cart</p>
                                    <div class="update-btn pull-right">
                                        <a href="{{ route('shop') }}" class="theme-btn-one">Continue Shopping<i
                                                class="flaticon-right-1"></i></a>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="payment-info">
                            <h4 class="sub-title">Payment Proccess</h4>
                            <div class="payment-inner">
                                <div class="option-block">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Direct bank transfer</span>
                                        </label>
                                    </div>
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                        Store Postcode.</p>
                                </div>
                                <div class="option-block">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="description">Paypal<a href="checkout.html">What is
                                                    paypal?</a></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <button  style="@if (empty(session('cart')))pointer-events:none; opacity:0.8;@endif" class="theme-btn-two">Place Your Order<i
                                            class="flaticon-right-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout-section end -->
@endsection
