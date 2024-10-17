@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>1. Personal Information</h3>
<form method="post" action="{{ route('user.sar.personal-info') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label required">Surname:</label>
                        <input type="text" name="surname" value="{{ old('surname',app_value('personal_info','surname')) }}" class="form-control" placeholder="Enter surname" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label required">Forenames:</label>
                        <input type="text" name="forename" value="{{ old('forename',app_value('personal_info','forename')) }}" class="form-control" placeholder="Enter forenames" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Other Names:</label>
                        <input type="text" name="othername" value="{{ old('othername',app_value('personal_info','othername')) }}" class="form-control" placeholder="Enter other names">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Student Number:</label>
                        <input type="text" class="form-control" name="student_number" value="{{ old('student_number',app_value('personal_info','student_number')) }}" placeholder="Enter Student Number">
                    </div>
                    <div class="col-md-6 d-flex">
                  
                        <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox"  name="profession" @if(old('profession',app_value('personal_info','profession'))=='Medical' ) checked @endif value="Medical" id="professionMedical">
                            <label class="form-check-label" for="professionMedical">
                                Medical
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox" name="profession" @if(old('profession',app_value('personal_info','profession'))=='Dental' ) checked @endif value="Dental" id="professionDental">
                            <label class="form-check-label" for="professionDental">
                                Dental
                            </label>
                        </div>
                    </div>
                </div>



                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="form-label">Residential Address:</label>
                        <input type="text" name="residential_address" value="{{ old('residential_address',app_value('personal_info','residential_address')) }}" class="form-control" placeholder="Enter Residential Address">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Postal Address:</label>
                        <input type="text" name="postal_address" value="{{ old('postal_address',app_value('personal_info','postal_address')) }}" class="form-control" placeholder="Enter Postal Address">
                    </div>

                </div>


                <div class="row mb-3">
                <div class="col-md-4">
                        <label class="form-label">Telephone:</label>
                        <input type="tel" name="telephone" value="{{ old('telephone',app_value('personal_info','telephone')) }}" class="form-control" placeholder="Enter Telephone Number">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Mobile:</label>
                        <input type="tel" name="mobile" value="{{ old('mobile',app_value('personal_info','mobile')) }}" class="form-control" placeholder="Enter Mobile Number">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" value="{{ old('email',app_value('personal_info','email')) }}" class="form-control" placeholder="Enter Email Address">
                    </div>
                </div>
                <hr>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Next of Kin:</label>
                        <input type="text" name="next_of_kin" value="{{ old('next_of_kin',app_value('personal_info','next_of_kin')) }}" class="form-control" placeholder="Enter Next of Kin">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Relationship:</label>
                        <input type="text" name="kin_relationship" value="{{ old('kin_relationship',app_value('personal_info','kin_relationship')) }}" class="form-control" placeholder="Enter Relationship">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Address:</label>
                        <input type="text" name="kin_address" value="{{ old('kin_address',app_value('personal_info','kin_address')) }}" class="form-control" placeholder="Enter Address">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Phone:</label>
                        <input type="tel" name="kin_phone" value="{{ old('kin_phone',app_value('personal_info','kin_phone')) }}" class="form-control" placeholder="Enter Phone Number">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="kin_email" value="{{ old('kin_email',app_value('personal_info','kin_email')) }}" class="form-control" placeholder="Enter Email Address">
                    </div>
                </div>
                <div class="row float-end">
                    <button class="btn btn-primary mt-4" onclick="nextSection()">Next</button>
                </div>
            </div>
        </div>
    </div> <!-- container -->
</form>

@endsection