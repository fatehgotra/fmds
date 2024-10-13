<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>Register | Customer</title>
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
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

</head>

<body class="bg-white">

    @section('content')
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

                                <h6>or create a new account using your email</h6> -->
                                <form method="POST" action="{{ route('user.register') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name"
                                            class="form-label">{{ __('Name') }}</label>

                                        <input id="name" type="text"
                                            class="form-control form-lg @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" placeholder="Please enter your name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email"
                                            class="form-label">{{ __('Email') }}</label>

                                        <input id="email" type="email"
                                            class="form-control form-lg @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" placeholder="Please enter your email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email"
                                            class="form-label">{{ __('Mobile Number') }}</label>

                                        <input id="phone" type="tel" name="phone" class="form-control form-lg" placeholder="Enter mobile number"  value="{{ old('phone') }}"/>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password"
                                            class="form-label">{{ __('Password') }}</label>

                                        <input id="password" type="password"
                                            class="form-control form-lg @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="choose strong password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label for="password-confirm"
                                            class="form-label">{{ __('Confirm Password') }}</label>

                                        <input id="password-confirm" type="password" class="form-control form-lg"
                                            name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                    </div>
                                    <div class="form-check mb-2 remember_me">
                                        <input class="form-check-input" type="checkbox" required value="" id="flexCheckDefault">
                                        <label class="form-check-label ms-1" for="flexCheckDefault">
                                            I agree to the <a href="javascript:void(0)" class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#terms-modal">Terms of Service</a> and <a href="javascript:void(0)" class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#privacy-policy-modal">Privacy Policy</a>
                                        </label>
                                    </div>
                                    <div class="d-grid mb-2 text-center">
                                        <button type="submit" class="btn btn-primary btn-userlogin w-100">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>
                                <div class="donthaveaccount text-center">
                                    <p>Already registered ? <a href="{{ route('user.login') }}">Log in</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="terms-modal" class="modal TopupM fade" tabindex="-1" role="dialog"
        aria-labelledby="terms-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-white"><span>Terms of Service</span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="information">
                            <h1>What is Lorem Ipsum?</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <h2>Why do we use it?</h2>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="privacy-policy-modal" class="modal TopupM fade" tabindex="-1" role="dialog"
        aria-labelledby="privacy-policy-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-white"><span>Privacy Policy</span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="information">
                            <h1>What is Lorem Ipsum?</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <h2>Why do we use it?</h2>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        // const phoneInputField = document.querySelector("#phone");
        // const phoneInput = window.intlTelInput(phoneInputField, {
        //     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        // });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    @push('scripts')
    @include('user.includes.modal')
    @endpush

</body>

</html>