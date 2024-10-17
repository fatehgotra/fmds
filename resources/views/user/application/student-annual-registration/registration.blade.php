@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>2. Registration</h3>
<form method="post" action="{{ route('user.sar.registration') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label required"><b>Reason for seeking student registration:</b> (Give Name of perspective institution/ course enrolled for / sponsoring agency / place of study/ details of project / any other reason.:</label>
                        <textarea name="reason" value="{{ old('reason',app_value('registration','reason')) }}" class="form-control" placeholder="Enter Reason" required>{{ old('reason',app_value('registration','reason')) }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label required">Institute:</label>
                        <input type="text" name="institute" value="{{ old('institute',app_value('registration','institute')) }}" class="form-control" placeholder="Enter Institute Name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Program:</label>
                        <input type="text" name="program" value="{{ old('program',app_value('registration','program')) }}" class="form-control" placeholder="Enter Program" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">Year:</label>
                        <input type="text" name="year" value="{{ old('year',app_value('registration','year')) }}" class="form-control" placeholder="Enter Year" required>
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