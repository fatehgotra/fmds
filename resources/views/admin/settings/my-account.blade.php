@extends('layouts.admin')
@section('title', 'My Profile')
@section('content')

    <div class="container-fluid company-owner">
        <div class="page-title-box">
            {{-- <h4 class="page-title">Customer/Companies</h4> --}}
            <h4 class="page-title">Administrator</h4>
        </div>
        <div class="row mt-3">
            <div class="col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-dark fw-medium mt-0 mb-4">Profile Information</h4>
                        <form id="accountForm" method="POST"
                            action="{{ route('admin.my-account.update', Auth::guard('administrator')->id()) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control form-lg" id="name" name="name"
                                    placeholder="Enter First Name" value="{{ old('name', $admin->name) }}">
                                @error('name')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control form-lg" id="email" name="email"
                                    placeholder="Enter Email Address" value="{{ old('email', $admin->email) }}">
                                @error('email')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-0 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="phone" class="form-label">Mobile Number</label>
                                {{-- <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        <img src="{{ asset('assets/images/icons/sa-flag.avif') }}" alt="Flag" class="img-fluid" width="30" height="30">
                                    </span>
                                    <input type="tel" class="form-control form-lg" id="phone" name="phone"
                                    placeholder="Enter Phone Number" value="{{ old('phone', $admin->phone) }}">
                                </div> --}}
                                <input type="tel" class="form-control form-lg" id="phone" name="phone"
                                    placeholder="Enter Phone Number" value="{{ old('phone', $admin->phone) }}">
                                @error('phone')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for="avatar" class="form-label">Profile Picture</label>
                                <div class="row">
                                    <div class="col-lg-2 col-3 pe-0">
                                        <img id="preview_img" src="{{ $admin->avatar }}" class="mt-0 my-profile" width="50"
                                        height="50" />
                                    </div>
                                    <div class="col-lg-10 col-9 ps-0">
                                        <div class="choose_file choose_file_2">
                                            <div class="upload-icon">
                                                <img src="{{ asset('assets/images/company/icons/upload.png') }}"
                                                    alt="upload" class="me-1" width="25" height="22" />
                                            </div>
                                            <input type="file" class="form-control form-lg" id="avatar" name="avatar"
                                            onchange="loadPreview(this);">
                                        </div>
                                        @if ($errors->has('avatar'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                            </div> --}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-xl-8 col-8">
                                <h5 class="fw-medium text-dark mt-0 mb-0">Two Factor Authentication</h5>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-4 text-end">
                                <button type="button" class="btn btn-primary">Enable</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-dark fw-medium mt-0 mb-4">Update Password</h4>
                        <form id="accountForm" method="POST" action="{{ route('admin.change-password') }}">
                            @csrf
                            <div class="mb-3 {{ $errors->has('current_password') ? 'has-error' : '' }}">
                                <label for="current_password" class="form-label">Current password *</label>
                                <input type="password" id="current_password" name="current_password" class="form-control form-lg">
                                @error('current_password')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 {{ $errors->has('new_password') ? 'has-error' : '' }}">
                                <label for="new_password" class="form-label">New password *</label>
                                <input type="password" id="new_password" name="new_password" class="form-control form-lg">
                                @error('new_password')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-0 {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                                <label for="new_password_confirmation" class="form-label">New password confirmation *</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                    class="form-control form-lg">
                                @error('new_password_confirmation')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
                <div class="uhbs text-end">
                    <button type="submit" class="btn btn-primary" form="accountForm">Save</button>
                </div>
            </div>
            {{-- <div class="col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4">Localisation</h4>
                            <div class="form-group mb-2">
                                <label class="form-label">Currency</label>
                                <select name="currency" id="" class="form-control form-lg">
                                    <option value="">Please select</option>
                                    <option value="usd" @if($admin->currency == 'usd') selected @endif >USD</option>
                                    <option value="gbp" @if($admin->currency == 'gbp') selected @endif >GBP</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Currency</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="money_conversion" @if($admin->money_conversion == 1) checked @endif value="1" class="form-check-input" id="customSwitch1">
                                    <label class="form-check-label" for="customSwitch1">Money Conversion</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="uhbs">
                    <button type="submit" class="btn btn-primary" form="accountForm">Save</button>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id)
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "ZA",
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>
@endpush
