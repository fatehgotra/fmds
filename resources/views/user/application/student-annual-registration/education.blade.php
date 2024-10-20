@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>3. Education</h3>
<form method="post" action="{{ route('user.sar.education') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
            <div class="mb-3">

                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label class="form-label">Date:</label>
                            <input type="date" name="education_date1" value="{{ old('education_date1',app_value('education','education_date1')) }}" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label">Qualification Gained:</label>
                            <input type="text" name="qualification_gained1" value="{{ old('qualification_gained1',app_value('education','qualification_gained1')) }}" class="form-control" placeholder="Enter Qualification" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Full Name and Location of Institution:</label>
                            <input type="text" name="education_institution1" value="{{ old('education_institution1',app_value('education','education_institution1')) }}" class="form-control" placeholder="Enter Institution & location" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <input type="date" name="education_date2" value="{{ old('education_date2',app_value('education','education_date2')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="qualification_gained2" value="{{ old('qualification_gained2',app_value('education','qualification_gained2')) }}" class="form-control" placeholder="Enter Qualification">
                        </div>
                        <div class="col-md-6 mb-2">
                            <input type="text" name="education_institution2" value="{{ old('education_institution2',app_value('education','education_institution2')) }}" class="form-control" placeholder="Enter Institution & location">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <input type="date" name="education_date3" value="{{ old('education_date3',app_value('education','education_date3')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="qualification_gained3" value="{{ old('qualification_gained3',app_value('education','qualification_gained3')) }}" class="form-control" placeholder="Enter Qualification">
                        </div>
                        <div class="col-md-6 mb-2">
                            <input type="text" name="education_institution3" value="{{ old('education_institution3',app_value('education','education_institution3')) }}" class="form-control" placeholder="Enter Institution & location">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <input type="date" name="education_date4" value="{{ old('education_date4',app_value('education','education_date4')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="qualification_gained4" value="{{ old('qualification_gained4',app_value('education','qualification_gained4')) }}" class="form-control" placeholder="Enter Qualification">
                        </div>
                        <div class="col-md-6 mb-2">
                            <input type="text" name="education_institution4" value="{{ old('education_institution4',app_value('education','education_institution4')) }}" class="form-control" placeholder="Enter Institution & location">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <input type="date" name="education_date5" value="{{ old('education_date5',app_value('education','education_date5')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="qualification_gained5" value="{{ old('qualification_gained5',app_value('education','qualification_gained5')) }}" class="form-control" placeholder="Enter Qualification">
                        </div>
                        <div class="col-md-6 mb-2">
                            <input type="text" name="education_institution5" value="{{ old('education_institution5',app_value('education','education_institution5')) }}" class="form-control" placeholder="Enter Institution & location">
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
               
            </div>
        </div>
    </div> <!-- container -->
</form>
<form id="backForm" method="post" action="{{ route('user.sar.personal-info') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection