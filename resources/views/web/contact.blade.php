@extends('web.layout.app')
@section('title')
    SYNCVOGUE - Contact
@endsection
@section('content')

    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url({{asset('assets/images/background/page-title.jpg')}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Contact us</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{route('home')}}">Home</a></li>
                    <li>Contact us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- address-section -->
    <section class="address-section">
        <div class="auto-container">
            <div class="sec-title">
                <h2>Our Addresses</h2>
                <p>Excepteur sint occaecat cupidatat non proident sunt</p>
                <span class="separator" style="background-image: url({{asset('assets/images/icons/separator-1.png')}});"></span>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 address-column">
                    <div class="single-adderss-block">
                        <div class="inner-box">
                            <h3>New York Office</h3>
                            <ul class="info-list clearfix">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    PO Box 16122 Collins Street West Victoria 8007 Canada
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <a href="tel:48564334212234">(+48) 564-334-21-22-34</a>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:info@example.com">info@example.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 address-column">
                    <div class="single-adderss-block">
                        <div class="inner-box">
                            <h3>London Office</h3>
                            <ul class="info-list clearfix">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    PO Box 16122 Collins Street West Victoria 8007 Landon
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <a href="tel:48564334212234">(+48) 564-334-21-22-34</a>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:info@example.com">info@example.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 address-column">
                    <div class="single-adderss-block">
                        <div class="inner-box">
                            <h3>Netherlands Office</h3>
                            <ul class="info-list clearfix">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    PO Box 16122 Collins Street West Victoria 8007 Netherlands
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <a href="tel:48564334212234">(+48) 564-334-21-22-34</a>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:info@example.com">info@example.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- address-section end -->


    <!-- google-map-section -->
    <section class="google-map-section">
        <div class="map-column">
            <div
                class="google-map"
                id="contact-google-map"
                data-map-lat="40.712776"
                data-map-lng="-74.005974"
                data-icon-path="{{asset('assets/images/icons/map-marker.png')}}"
                data-map-title="Brooklyn, New York, United Kingdom"
                data-map-zoom="12"
                data-markers='{
                    "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","{{asset('assets/images/icons/map-marker.png')}}"]
                }'>

            </div>
        </div>
    </section>
    <!-- google-map-section -->


    <!-- contact-section -->
    <section class="contact-section">
        <div class="auto-container">
            <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 big-column">
                <div class="sec-title">
                    <h2>Get In Touch</h2>
                    <p>Excepteur sint occaecat cupidatat non proident sunt</p>
                    <span class="separator" style="background-image: url({{asset('assets/images/icons/separator-1.png')}});"></span>
                </div>
                <div class="form-inner">
                    <form method="post" action="sendemail.php" id="contact-form" class="default-form">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <input type="text" name="username" placeholder="Name" required>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <input type="text" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <input type="text" name="phone" placeholder="Phone" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                <button type="submit" class="theme-btn-two" name="submit-form">Submit Message<i class="flaticon-right-1"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->


@endsection
