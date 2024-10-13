@extends('layouts.customer')
@section('title', 'Edit Team')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        {{-- <button type="submit" class="btn btn-success" form="accountForm"><i class="mdi mdi-note"></i>
                            Save</button> --}}
                        <a href="{{ route('user.team.index') }}" class="btn btn-dark" form="accountForm">Back</a>
                    </div>
                    <h4 class="page-title">Edit Member</h4>
                </div>
            </div>
        </div>
        @include('user.includes.flash-message')
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="accountForm" method="POST" action="{{ route('user.team.update', $team->uuid) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="uuid" value="{{ $team->uuid }}">

                            <div class="mb-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control form-lg" id="name" name="name"
                                    placeholder="Enter Name" value="{{ old('name', $team->name) }}">
                                @error('name')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control form-lg" id="email" name="email"
                                    placeholder="Enter Email Address" value="{{ old('email', $team->email) }}">
                                @error('email')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control form-lg" id="phone" name="phone"
                                    placeholder="Enter Phone Number" value="{{ old('phone', $team->phone) }}">
                                @error('phone')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3 {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password" class="form-label">Password </label>
                                <input type="password" class="form-control form-lg" id="password" name="password"
                                    placeholder="Enter Password" value="{{ old('password') }}">
                                @error('password')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <label for="password_confirmation" class="form-label">Confirm Password </label>
                                <input type="password" class="form-control form-lg" id="password_confirmation"
                                    name="password_confirmation" placeholder="Enter Confim Password"
                                    value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Admin Permission</label>
                                <select name="is_admin" class="form-select form-lg">
                                    <option value="0" @if($team->is_admin == '0') selected @endif>Disable</option>
                                    <option value="1" @if($team->is_admin == '1') selected @endif>Enable</option>
                                </select>
                            </div>

                            <div class="mb-3 {{ $errors->has('status') ? 'has-error' : '' }}">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span> </label>
                                <select name="status" class="form-select form-lg">
                                    <option value="1" @if (old('status', $team->status) == 1) selected @endif>Active
                                    </option>
                                    <option value="0" @if (old('status', $team->status) == 0) selected @endif>Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm-1 col-2">
                                        <img id="preview_img"
                                            src="{{ $team->avatar ?? asset('assets/images/users/avatar.png') }}"
                                            class="mt-1 team-avatar" width="70" height="70" />
                                    </div>
                                    <div class="col-sm-11 col-10">
                                        <label for="avatar" class="form-label">Profile Picture</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control form-control-lg upload-input-font"
                                                id="avatar" name="avatar" onchange="loadPreview(this);">
                                        </div>
                                        @if ($errors->has('avatar'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </form>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" form="accountForm">Save</button>
                            {{-- <a href="{{ route('user.team.index') }}" class="btn btn-dark" form="accountForm"><i
                                    class="mdi mdi-step-backward"></i> Back</a> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- container -->
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
@endpush
