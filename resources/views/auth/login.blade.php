<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Login</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/favicon-16x16.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
        crossorigin="anonymous"></script>

</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="{{ route('login') }}">
                    <img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="" />
                </a>
            </div>
            <div class="login-menu">

            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('vendors/images/login-page-img.png') }}" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To DeskApp</h2>
                        </div>
                        <form action="{{ route('login.save') }}" method="POST">
                            @csrf
                            {{-- Show error  --}}
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif


                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Email"
                                    name="email" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password"
                                    placeholder="**********" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                        <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">

                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                                        OR
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block"
                                            href="{{ route('register') }}">Register To Create Account</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="{{ asset('vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>

    <!-- End Google Tag Manager (noscript) -->
</body>

</html>
