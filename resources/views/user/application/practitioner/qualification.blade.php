@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>3. Primary Qualification</h3>
<form method="post" action="{{ route('user.practitioner.qualification') }}">
    @csrf
<div class="card dashboard-bg">
    <div class="section active-section card-body" id="section1">
        <div class="form-group">
            <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Qualification Gained:</label>
                        <input type="text" name="qualification_gained" value="{{ old('qualification_gained',app_value('qualification','qualification_gained')) }}" class="form-control" placeholder="Enter Qualification" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">Institute:</label>
                        <input type="text" name="institute" value="{{ old('institute',app_value('qualification','institute')) }}" class="form-control" placeholder="Enter Institute Name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label required">Years & Length of program:</label>
                        <input type="text" name="year_length_program" value="{{ old('year_length_program',app_value('qualification','year_length_program')) }}" class="form-control" placeholder="Enter year & length of program">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Clinical instruction received at:</label>
                        <input type="text" name="clinical_instruction" value="{{ old('clinical_instruction',app_value('qualification','clinical_instruction')) }}" class="form-control" placeholder="Enter clinical instruction">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Language of instruction of course:</label>
                        <input type="text" name="language_of_course" value="{{ old('language_of_course',app_value('qualification','language_of_course')) }}" class="form-control" placeholder="Enter language">
                    </div>
                </div>
          
            <button class="btn btn-dark mt-4" type="button" onclick="{ $('#initiateForm').submit() }">Back</button>
            <button class="btn btn-primary mt-4 float-end" type="submit">Next</button>

        </div>
    </div>
</div> <!-- container -->
</form>

<form id="initiateForm" method="post" action="{{ route('user.practitioner.personal-info') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection