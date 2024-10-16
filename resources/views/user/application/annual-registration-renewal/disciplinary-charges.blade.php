@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>6. Disciplinary Enquiries & Charges</h3>
<form method="post" action="{{ route('user.rpli.disciplinary-enquires') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
            <div class="mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Date:</label>
                            <input type="date" name="disciplinary_date" value="{{ old('disciplinary_date',app_value('disciplinary_enquiries','disciplinary_date')) }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Country:</label>
                            <input type="text" name="disciplinary_country" value="{{ old('disciplinary_country',app_value('disciplinary_enquiries','disciplinary_country')) }}" class="form-control" placeholder="Enter Country">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Details & Outcome:</label>
                            <input type="text" name="disciplinary_outcome" value="{{ old('disciplinary_outcome',app_value('disciplinary_enquiries','disciplinary_outcome')) }}" class="form-control" placeholder="Enter Details & Outcome">
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
               
            </div>
        </div>
    </div> <!-- container -->
</form>
<form id="backForm" method="post" action="{{ route('user.arr.previous-years-practice') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection