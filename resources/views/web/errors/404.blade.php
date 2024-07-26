@extends('web.layout.app')
@section('title')
    SYNCVOGUE - 404 Not Found
@endsection
@section('content')
    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/background/page-title.jpg')}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Page Not Found</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{route('home')}}">Home</a></li>
                    <li>404</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- error-section -->
    <section class="error-section centred sec-pad">
        <div class="auto-container">
            <div class="inner-box">
                <h1>404</h1>
                <h2>Oops! Page Not Found!</h2>
                <p>Please go back to <a href="{{route('home')}}">Back homepage</a></p>
                <div class="btn-box">
                    <a href="{{route('home')}}" class="theme-btn-two">Go Back To Home<i class="flaticon-right-1"></i></a>
                    <a href="{{route('shop')}}" class="theme-btn-one">Continue Shopping<i class="flaticon-right-1"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- error-section end -->
@endsection
