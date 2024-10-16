@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>5.OTHER QUALIFICATIONS GAINED DURING THE YEAR  <small class="text-danger">(Documentary Evidence is required to Update the Medical and Dental Practitioner Register:</small></h3>
<form method="post" action="{{ route('user.arr.other-qualifications') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
            <div class="mb-3">
                    <label class="form-label">Degrees & Qualifications:</label>
                    <textarea class="form-control" name="other_degree" value="{{ old('other_degree',app_value('other_qualifications','other_degree')) }}" rows="3" placeholder="Enter other degrees or qualifications">{{ old('other_degree',app_value('other_qualifications','other_degree')) }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label">Language of Instruction of Course:</label>
                    <input type="text" class="form-control" name="other_language_course" value="{{ old('other_language_course',app_value('other_qualifications','other_language_course')) }}" placeholder="Enter Language">
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button class="btn btn-primary mt-4 float-end" type="submit" onclick="nextSection()">Next</button>
               
            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.arr.renewal-in') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection