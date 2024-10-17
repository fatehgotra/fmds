@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>8. CONTINUING PROFESSIONAL DEVELOPMENT –</h3><h5> List all CPD activities in the last 12 months. Use separate page if required providing documentary evidence</h5>
<small class="text-danger"><b>(Minimum: 25 hours for Medical Practitioners and 10 hours for Dental Practitioners per annum)</b></small>

<form method="post" action="{{ route('user.arr.professional-development') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
            <div class="mb-3">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label class="form-label">Date:</label>
                            <input type="date" name="profesional_date1" value="{{ old('profesional_date1',app_value('profesional_development','profesional_date1')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label">Activity:</label>
                            <input type="text" name="profesional_activity1" value="{{ old('profesional_activity1',app_value('profesional_development','profesional_activity1')) }}" class="form-control" placeholder="Enter Activity">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Hours:</label>
                            <input type="text" name="profesional_hour1" value="{{ old('profesional_hour1',app_value('profesional_development','profesional_hour1')) }}" class="form-control" placeholder="Enter Hours">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-2">
                          
                            <input type="date" name="profesional_date2" value="{{ old('profesional_date2',app_value('profesional_development','profesional_date2')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                           
                            <input type="text" name="profesional_activity2" value="{{ old('profesional_activity2',app_value('profesional_development','profesional_activity2')) }}" class="form-control" placeholder="Enter Activity">
                        </div>
                        <div class="col-md-6 mb-2">
                           
                            <input type="text" name="profesional_hour2" value="{{ old('profesional_hour2',app_value('profesional_development','profesional_hour2')) }}" class="form-control" placeholder="Enter Hours">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                          
                            <input type="date" name="profesional_date3" value="{{ old('profesional_date3',app_value('profesional_development','profesional_date3')) }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                           
                            <input type="text" name="profesional_activity3" value="{{ old('profesional_activity3',app_value('profesional_development','profesional_activity3')) }}" class="form-control" placeholder="Enter Activity">
                        </div>
                        <div class="col-md-6">
                           
                            <input type="text" name="profesional_hour3" value="{{ old('profesional_hour3',app_value('profesional_development','profesional_hour3')) }}" class="form-control" placeholder="Enter Hours">
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
               
            </div>
        </div>
    </div> <!-- container -->
</form>
<form id="backForm" method="post" action="{{ route('user.arr.disciplinary-enquires') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection