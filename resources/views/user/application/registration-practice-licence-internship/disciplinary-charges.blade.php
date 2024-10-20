@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>4. Disciplinary Enquiries & Charges</h3>
<form method="post" action="{{ route('user.rpli.disciplinary-enquires') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
            <div class="mb-3">
                    <div class="row m-2">
                        <div class="col-md-3">
                            <label class="form-label">Date:</label>
                            <input type="date" name="disciplinary_date1" value="{{ old('disciplinary_date1',app_value('disciplinary_enquiries','disciplinary_date1')) }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Country:</label>
                            <input type="text" name="disciplinary_country1" value="{{ old('disciplinary_country1',app_value('disciplinary_enquiries','disciplinary_country1')) }}" class="form-control" placeholder="Enter Country">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Details & Outcome:</label>
                            <input type="text" name="disciplinary_outcome1" value="{{ old('disciplinary_outcome1',app_value('disciplinary_enquiries','disciplinary_outcome1')) }}" class="form-control" placeholder="Enter Details & Outcome">
                        </div>
                    </div>

                    <div class="row m-2">
                        <div class="col-md-3">
                            <input type="date" name="disciplinary_date2" value="{{ old('disciplinary_date2',app_value('disciplinary_enquiries','disciplinary_date2')) }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="disciplinary_country2" value="{{ old('disciplinary_country2',app_value('disciplinary_enquiries','disciplinary_country2')) }}" class="form-control" placeholder="Enter Country">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="disciplinary_outcome2" value="{{ old('disciplinary_outcome2',app_value('disciplinary_enquiries','disciplinary_outcome2')) }}" class="form-control" placeholder="Enter Details & Outcome">
                        </div>
                    </div>

                    <div class="row m-2">
                        <div class="col-md-3">
                            <input type="date" name="disciplinary_date3" value="{{ old('disciplinary_date3',app_value('disciplinary_enquiries','disciplinary_date3')) }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="disciplinary_country3" value="{{ old('disciplinary_country3',app_value('disciplinary_enquiries','disciplinary_country3')) }}" class="form-control" placeholder="Enter Country">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="disciplinary_outcome3" value="{{ old('disciplinary_outcome3',app_value('disciplinary_enquiries','disciplinary_outcome3')) }}" class="form-control" placeholder="Enter Details & Outcome">
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
               
            </div>
        </div>
    </div> <!-- container -->
</form>
<form id="backForm" method="post" action="{{ route('user.rpli.primary-qualification') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection