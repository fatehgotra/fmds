@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>4. Registration </h3>
<form method="post" action="{{ route('user.practitioner.registration') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label required">Category[s] of Registration sought:</label>
                        <!-- <textarea name="registration_categories" value="{{ old('registration_categories',app_value('registration','registration_categories')) }}" class="form-control" placeholder="Enter Categorie[s]/ Licence sought" required>{{ old('registration_categories',app_value('registration','registration_categories')) }}</textarea> -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 d-flex">

                        <div class="form-check col-md-3 m-2">
                            <label class="form-check-label" for="conditional">
                                Conditional
                            </label>
                            <input class="form-check-input" type="checkbox" name="conditional" @if(old('conditional',app_value('registration','conditional'))=='conditional' ) checked @endif value="conditional" id="conditional">
                        </div>
                        <div class="form-check col-md-3 m-2">
                            <label class="form-check-label" for="provisional">
                                Provisional
                            </label>
                            <input class="form-check-input" type="checkbox" name="provisional" @if(old('provisional',app_value('registration','provisional'))=='provisional' ) checked @endif value="provisional" id="provisional">
                        </div>
                        <div class="form-check col-md-3 m-2">
                            <label class="form-check-label" for="general-practice">
                                General Practise
                            </label>
                            <input class="form-check-input" type="checkbox" name="reg_general" @if(old('reg_general',app_value('registration','reg_general'))=='general' ) checked @endif value="general" id="general">
                        </div>
                      

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12 d-flex">

                        <div class="form-check  m-2">
                            <label class="form-check-label" for="vocational_reg">
                                Vocational Registration in the field of: &nbsp;&nbsp; <input type="text" name="vocational_text" value="{{ old('vocational_text',app_value('registration','vocational_text')) }}" class="form-control w-50 d-inline" />
                            </label>
                            <input class="form-check-input" type="checkbox" name="vocational_reg" @if(old('vocational_reg',app_value('registration','vocational_reg'))=='vocational' ) checked @endif value="vocational" id="vocational">
                        </div>

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12 d-flex">

                        <div class="form-check m-2">
                            <label class="form-check-label" for="temporary">
                            Temporary from &nbsp;&nbsp; <input type="date" name="temporary_from" value="{{ old('temporary_from',app_value('registration','temporary_from')) }}" class="form-control w-25 d-inline" /> &nbsp; Until &nbsp;&nbsp; <input type="date" name="temporary_to" value="{{ old('temporary_to',app_value('registration','temporary_to')) }}" class="form-control w-25 d-inline" /><br><br> <small>(Relevant to specific projects, duration less than 3months)</small>
                            </label>
                            <input class="form-check-input" type="checkbox" name="temporary" @if(old('temporary',app_value('registration','temporary'))=='temporary' ) checked @endif value="temporary" id="temporary">
                        </div>

                    </div>
                </div>


                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button class="btn btn-primary mt-4 float-end" type="submit">Next</button>

            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.practitioner.medical-dental-registration') }}">
    @csrf
    <input type="hidden" name="back" value="1">
</form>
@endsection