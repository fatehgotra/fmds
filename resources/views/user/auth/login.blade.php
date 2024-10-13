<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>Login | Customer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="shortcut icon" href="favicon.png"> --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/cp_favicon.ico') }}">
    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

</head>

<body class="bg-white">

    <div class="container customer-auth">
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="main">
                    <img src="{{ asset('assets/images/company/icons/rectangle.png') }}" class="img-fluid rectangle">
                    <img src="{{ asset('assets/images/company/icons/circle.png') }}" class="img-fluid circle">
                    <img src="{{ asset('assets/images/company/icons/circle-2.png') }}" class="img-fluid circle2">
                    <div class="auth-fluid-form-box pb-4 px-3 loginform">
                        <div class="align-items-center">
                            <div class="card-body">

                                <!-- Logo -->
                                <div class="logoB text-center">
                                    <a href="/" class="logo-light">
                                        <span><img src="{{ asset('assets/images/logo.png') }}" class="img-fluid"></span>
                                    </a>
                                </div>

                                <!-- title-->
                                <!-- <h5>Login with</h5>
                                <div class="sociallogin">
                                    <a class="loginBtn loginBtn--facebook" href="{{ route('facebook.login') }}">
                                        <i class="fa-brands fa-facebook-f"></i> Facebook
                                    </a>

                                    <a class="loginBtn loginBtn--google" href="{{ route('google.login') }}">
                                        <i class="fa-brands fa-google"></i> Google
                                    </a>
                                </div>

                                <h6>or using your email address</h6> -->

                                <!-- form -->
                                <form method="POST" action="{{ route('user.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email"
                                            class="form-control form-lg @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" placeholder="Enter your email address" autofocus>
                                        @error('email')
                                        <code id="email-error" class="text-danger">{{ $message }}</code>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input id="password" type="password"
                                            class="form-control form-lg @error('password') is-invalid @enderror" name="password"
                                            autocomplete="current-password" placeholder="Enter your password">
                                        @error('password')
                                        <code id="password-error" class="text-danger">{{ $message }}</code>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 col-6">
                                            <div class="form-check remember_me">
                                                <input type="checkbox" name="remember"
                                                    {{ old('remember') ? 'checked' : '' }} class="form-check-input"
                                                    id="checkbox-signin">
                                                <label class="form-check-label ms-1" for="checkbox-signin">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <div class="forgot">
                                                <p class="mb-0 float-end">Forgot
                                                    your <a href="{{ route('user.password.request') }}"
                                                        class=""> password?</a></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid mb-3 text-center">
                                        <button class="btn btn-primary btn-userlogin" type="submit">Log In
                                        </button>
                                    </div>
                                </form>
                                <div class="donthaveaccount text-center">
                                    <p>Don't have an account yet ? <a href="{{ route('user.register') }}">Sign
                                            up</a>
                                    </p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="error-modal" class="modal TopupM errorM fade" tabindex="-1" role="dialog"
        aria-labelledby="error-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-start align-items-start pb-0">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-form pt-0 p-2">
                        <div class="cus-header d-flex justify-content-start">
                            <img src="{{ asset('assets/images/company/icons/warning.png') }}" height="48"
                                class="me-2" alt="Canned" />
                            <div class="m_title">
                                <h4 class="modal-title text-white">Error</h4>
                                <p class="text-white fw-light font-15">We encountered an error...</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div id="success-modal" class="modal TopupM fade" tabindex="-1" role="dialog"
        aria-labelledby="success-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-start align-items-start pb-0">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-form pt-0 p-2">
                        <div class="cus-header d-flex justify-content-start">
                            <img src="{{ asset('assets/images/company/icons/info.png') }}" height="48" class="me-2"
                                alt="Canned" />
                            <div class="m_title">
                                <h4 class="modal-title text-white">Success</h4>
                                <p class="text-white fw-light font-15">Your WhatsApp has been configured !</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    @if ($message = Session::get('success'))
    <script>
        var msg = '{{$message}}';
        jQuery(document).ready(function($) {
            $('#success-modal').find('.fw-light').html(msg);
            $('#success-modal').modal('show');
        });
    </script>
    @endif

    @if ($message = Session::get('error'))
    <script>
        var msg = '{{$message}}';
        jQuery(document).ready(function($) {
            $('#error-modal').find('.fw-light').html(msg);
            $('#error-modal').modal('show');
        });
    </script>
    @endif

</body>

</html>