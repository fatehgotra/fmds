@extends('layouts.admin')
@section('title', 'Add Company')
@section('content')

<div class="container-fluid CompanyAdd">
    <div class="page-title-box">
        <h4 class="page-title">Company/Company</h4>
    </div>
    <form method="POST" id="customerForm" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-dark fw-medium mt-1 mb-4">Company Information</h4>

                        <div class="mb-3">
                            <label class="control-label">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror form-lg" placeholder="Name">
                            @error('name')
                            <code id="name-error" class="text-danger">{{ $message }}</code>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="control-label">Company Name</label>
                            <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control @error('company_name') is-invalid @enderror form-lg" placeholder="Company Name">
                            @error('company_name')
                            <code id="company_name-error" class="text-danger">{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="control-label">Company Email</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror form-lg" placeholder="Company Email">
                            @error('email')
                            <code id="email-error" class="text-danger">{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="control-label">Company Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror form-lg" placeholder="Company Phone Number">
                            @error('phone')
                            <code id="phone-error" class="text-danger">{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="control-label">Delete Status</label>
                            <select name="delete" class="form-control @error('status') is-invalid @enderror form-lg">
                                <option value="">Please select</option>
                                <option value="1" {{ (old('status') == '1') ? 'selected' : '' }}>Deleted</option>
                                <option value="0" {{ (old('status') == '0') ? 'selected' : '' }}>Reactivate</option>
                            </select>
                            @error('delete')
                            <code id="status-error" class="text-danger">{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="control-label">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror form-lg">
                                <option value="">Please select</option>
                                <option value="1" {{ (old('status') == 1) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ (old('status') == 0) ? 'selected' : '' }}>In-active</option>
                            </select>
                            @error('status')
                            <code id="status-error" class="text-danger">{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
