@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>3. RENEWAL IN </h3>
<form method="post" action="{{ route('user.arr.renewal-in') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label required">Category[s] of Registration / Licence sought:</label>
                        <!-- <textarea name="registration_categories" value="{{ old('registration_categories',app_value('renewal_in','registration_categories')) }}" class="form-control" placeholder="Enter Categorie[s]/ Licence sought" required>{{ old('registration_categories',app_value('renewal_in','registration_categories')) }}</textarea> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="form-label text-danger font-weight-bold"><b>Medical Practitioner: </b></label>
                    <div class="col-md-12 d-flex">

                        <div class="form-check m-2">
                            <label class="form-check-label" for="govt-public">
                                General Registration
                            </label>
                            <input class="form-check-input" type="checkbox"  name="medical_practitioner" @if(old('medical_practitioner',app_value('renewal_in','medical_practitioner'))=='general' ) checked @endif value="general" id="general"
                               >

                        </div>
                        <div class="form-check m-2">
                            <label class="form-check-label" for="private">
                                Vocational Registration in the field of: &nbsp;&nbsp; <input type="text" name="vocational_medical_text" value="{{ old('vocational_medical_text',app_value('renewal_in','vocational_medical_text')) }}" class="form-control w-50 d-inline" />
                            </label>
                            <input class="form-check-input" type="checkbox" name="medical_practitioner" @if(old('medical_practitioner',app_value('renewal_in','medical_practitioner'))=='vocational' ) checked @endif value="vocational" id="vocational"
                                >

                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="form-label text-danger font-weight-bold"><b>Dental Practitioner:  </b></label>
                    <div class="col-md-12 d-flex">

                        <div class="form-check col-md-3 m-2">
                            <label class="form-check-label" for="govt-public">
                            Dentist
                            </label>
                            <input class="form-check-input" type="checkbox" @if(old('dental_practitioner',app_value('renewal_in','dental_practitioner'))=='dentist' ) checked @endif name="dental_practitioner" value="dentist" id="dental">

                        </div>

                        <div class="form-check col-md-3 m-2">
                            <label class="form-check-label" for="govt-public">
                            Dental Therapist
                            </label>
                            <input class="form-check-input" type="checkbox" @if(old('dental_practitioner',app_value('renewal_in','dental_practitioner'))=='dental_therapist' ) checked @endif name="dental_practitioner" value="dental_therapist" id="dental_therapist">

                        </div>

                        <div class="form-check col-md-3 m-2">
                            <label class="form-check-label" for="govt-public">
                            Dental Hygienist
                            </label>
                            <input class="form-check-input" type="checkbox" @if(old('dental_practitioner',app_value('renewal_in','dental_practitioner'))=='dental_hygienist' ) checked @endif name="dental_practitioner" value="dental_hygienist" id="dental_hygienist">

                        </div>

                        <div class="form-check col-md-3 m-2">
                            <label class="form-check-label" for="govt-public">
                            Dental Technician
                            </label>
                            <input class="form-check-input" type="checkbox" @if(old('dental_practitioner',app_value('renewal_in','dental_practitioner'))=='dental_technician' ) checked @endif name="dental_practitioner" value="dental_technician" id="dental_technician">

                        </div>
                    
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12 d-flex">
                    <div class="form-check m-2">
                            <label class="form-check-label" for="private">
                                Vocational Registration in the field of: &nbsp;&nbsp; <input type="text" name="vocational_dental_text" value="{{ old('vocational_dental_text',app_value('renewal_in','vocational_dental_text')) }}" class="form-control w-50 d-inline" />
                            </label>
                            <input class="form-check-input" type="checkbox" name="dental_practitioner" @if(old('dental_practitioner',app_value('renewal_in','dental_practitioner'))=='vocational' ) checked @endif value="private" id="private"
                                onchange="{ $('#govt-public').prop('checked',false) }">

                        </div>
                    </div>
                </div>

                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button class="btn btn-primary mt-4 float-end" type="submit">Next</button>

            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.arr.personal-info') }}">
    @csrf
    <input type="hidden" name="back" value="1">
</form>
@endsection