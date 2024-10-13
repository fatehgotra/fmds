@extends('layouts.customer')
@section('title', 'My Account')
@section('content')

    <div class="container-fluid company-owner">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    {{-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                <li class="breadcrumb-item active">My Account</li>
                </ol>
            </div> --}}
                    <h4 class="page-title">
                       My Account
                    </h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-xl-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-dark fw-medium mt-0 mb-4">Profile information</h4>
                        <form id="accountForm" method="POST"
                            action="{{ route('user.my-account.update', loginUser()->uuid) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="label" class="form-label">Profile Image </label>
                                <div class="row">
                                    <div class="col-lg-2 col-3 pe-0">
                                        <img id="preview_img" src="{{ $admin->avatar }}" class="mt-0 my-profile"
                                            width="50" height="50" />
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
                                    </div>
                                </div>
                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control form-lg" id="name" name="name"
                                    placeholder="Company Owner" value="{{ old('name', $admin->name) }}">
                                @error('name')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" readonly class="form-control form-lg" id="email"
                                    placeholder="Enter Email Address" value="{{ old('email', $admin->email) }}">
                                @error('email')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control form-lg" id="phone" name="phone"
                                    placeholder="Enter Phone Number" value="{{ old('phone', $admin->phone) }}">
                                @error('phone')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                          
                                <div class="mb-3">
                                    <label for="name" class="form-label">Date of birth</label>
                                    <input type="text" class="form-control form-lg datepicker" id="dob" name="dob"
                                        value="{{ old('dob', $admin->dob) }}" placeholder="dob">

                                </div>
                                <div class="mb-3">
                                    <label for="label" class="form-label">Address</label>
                                    <div class="input-group address">
                                        <span class="input-group-text" id="basic-addon1">
                                            <img src="{{ asset('assets/images/company/icons/address-search.png') }}"
                                                width="22" height="22">
                                        </span>
                                        <input type="text" name="address" class="form-control form-lg"
                                            id="autocomplete" value="{{ old('address', $admin->address) }}">
                                    </div>
                                </div>

                              
                          

                        </form>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" form="accountForm">Save</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-xl-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-dark fw-medium mt-0 mb-4">Update Password</h4>
                        <form id="changePassword" method="POST" action="{{ route('user.change-password') }}">
                            @csrf
                            <div class="mb-3 {{ $errors->has('current_password') ? 'has-error' : '' }}">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" id="current_password" name="current_password"
                                    class="form-control form-lg">
                                @error('current_password')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 {{ $errors->has('new_password') ? 'has-error' : '' }}">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" id="new_password" name="new_password"
                                    class="form-control form-lg">
                                @error('new_password')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                                <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                    class="form-control form-lg">
                                @error('new_password_confirmation')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" form="changePassword">Save</button>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-xl-8 col-8">
                                <h5 class="fw-medium text-dark mt-0 mb-0">Delete Account</h5>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-4 text-end">
                                <button type="button" onclick="deleteAccount()" class="btn btn-danger font-13"
                                    style="min-width: 130px;">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>



        </div>
    </div>


    <form id="deleteAccount" method="post" action="{{ route('user.delete-account') }}">@csrf</form>
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


        function deleteAccount() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this.",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Delete it!"
            }).then(t => {
                if (t.isConfirmed) {
                    $('#deleteAccount').submit();
                }
            })

        }
    </script>

    <script>
        // const phoneInputField = document.querySelector("#phone");
        // const phoneInput = window.intlTelInput(phoneInputField, {
        //     initialCountry: "ZA",
        //     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        // });
    </script>
@endpush
