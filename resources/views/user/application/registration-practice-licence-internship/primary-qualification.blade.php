@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>2. Primary Qualification</h3>
<form method="post" action="{{ route('user.rpli.primary-qualification') }}">
    @csrf
<div class="card dashboard-bg">
    <div class="section active-section card-body" id="section1">
        <div class="form-group">
            <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Qualification Gained:</label>
                        <input type="text" name="qualification_gained" value="{{ old('qualification_gained',app_value('primary_qualification','qualification_gained')) }}" class="form-control" placeholder="Enter Qualification" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">Institute:</label>
                        <input type="text" name="institute" value="{{ old('institute',app_value('primary_qualification','institute')) }}" class="form-control" placeholder="Enter Institute Name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Country:</label>
                        <input type="text" name="country" value="{{ old('country',app_value('primary_qualification','country')) }}" class="form-control" placeholder="Enter Country" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label required">Date Commenced Program:</label>
                        <input type="date" name="date_commenced_program" value="{{ old('date_commenced_program',app_value('primary_qualification','date_commenced_program')) }}" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label required">Date Completed Program:</label>
                        <input type="date" name="date_completed_program" value="{{ old('date_completed_program',app_value('primary_qualification','date_completed_program')) }}" class="form-control" required>
                    </div>
                </div>
          
            <button class="btn btn-dark mt-4" type="button" onclick="{ $('#initiateForm').submit() }">Back</button>
            <button class="btn btn-primary mt-4 float-end" type="submit">Next</button>

        </div>
    </div>
</div> <!-- container -->
</form>

<form id="initiateForm" method="post" action="{{ route('user.initiate-application') }}">
@csrf
<input type="hidden" name="application_id" value="{{ session()->get('application_id') }}">
</form>
@endsection