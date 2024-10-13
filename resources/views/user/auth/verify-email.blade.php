<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>Email Verification</title>
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

                            <div class="card-body">
                                <div class="text-center">
                                    <h5 class="mb-2">Email Verification</h5>

                                    <p class="mb-3 mt-3">Please enter one time password which received on {{ auth()->user()->email}}</p>
                                </div>

                                <form method="POST" action="{{ route('user.verify-email-otp') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="code"
                                            class="form-label text-md-end">Enter 6 digits OTP :</label>
                                        <input id="code" type="number"
                                            class="form-control @error('code') is-invalid @enderror form-lg" name="code"
                                            required placeholder="Please enter otp">

                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="d-grid mb-0 text-center">
                                        <button type="submit" class="mb-2 btn btn-primary btn-userlogin">
                                            Confirm Code
                                        </button>

                                    </div>
                                </form>
                                <form method="post" action="{{ route('user.resend-code') }}">
                                    <div class="d-grid mb-0 text-center">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-userlogin">
                                            Resend Code
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