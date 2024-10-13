<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>Two Factor Auth | Customer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="favicon.png"> --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/cp_favicon.ico') }}">
    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

</head>

<body class="loading bg-white"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <div class="account-pages customer-auth pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="main forgotform">
                        <img src="{{ asset('assets/images/company/icons/rectangle.png') }}" class="img-fluid rectangle">
                        <img src="{{ asset('assets/images/company/icons/circle.png') }}" class="img-fluid fCircle">
                        <img src="{{ asset('assets/images/company/icons/circle-2.png') }}" class="img-fluid fCircle2">
                        <div class="loginform two-factor-auth">
                            <div class="logoB pt-1 pb-1 text-center">
                                <a href="{{ route('user.login') }}">
                                    <span><img src="{{ asset('assets/images/logo.png') }}" class="img-fluid"></span>
                                </a>
                            </div>
                            {{-- <div class="card-header">{{ __('Two factor challenge') }}</div> --}}

                            <div class="card-body">
                                <div class="text-center">
                                    <h5 class="mb-2">Two factor challenge</h5>

                                    <p class="mb-3 mt-3">Please enter your authentication code or recovery code to login.</p>
                                </div>

                                <form method="POST" action="{{ route('user.two-factor-verify.store') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="code"
                                            class="form-label text-md-end">Authentication/Recovery code</label>
                                            <input id="code" type="code"
                                            class="form-control @error('code') is-invalid @enderror form-lg" name="code"
                                            required placeholder="Please enter recovery code">

                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-grid mb-0 text-center">
                                        <button type="submit" class="btn btn-primary btn-userlogin">
                                            Confirm Code
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bundle -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>
