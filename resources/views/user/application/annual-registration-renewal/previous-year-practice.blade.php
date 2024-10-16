@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>4. SUMMARY OF PRACTISE IN PREVIOUS YEARS <small class="text-danger">(Please ensure that any gaps in the year of practice is explained with evidence)</small></h3>
<form method="post" action="{{ route('user.arr.previous-years-practice') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label required">Dates: </label>
                        <input type="date" name="py_date1" value="{{ old('py_date1',app_value('previous_year_practise','py_date1')) }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label required">Location: </label>
                        <input type="text" name="py_loc1" value="{{ old('py_loc1',app_value('previous_year_practise','py_loc1')) }}" class="form-control" placeholder="Enter Location">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label required">Position & Scope of Practice: </label>
                        <input type="text" name="py_position1" value="{{ old('py_position1',app_value('previous_year_practise','py_position1')) }}" class="form-control" placeholder="Enter Position">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                     
                        <input type="date" name="py_date2" value="{{ old('py_date2',app_value('previous_year_practise','py_date2')) }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                       
                        <input type="text" name="py_loc2" value="{{ old('py_loc2',app_value('previous_year_practise','py_loc2')) }}" class="form-control" placeholder="Enter Location">
                    </div>
                    <div class="col-md-4">
                       
                        <input type="text" name="py_position2" value="{{ old('py_position2',app_value('previous_year_practise','py_position2')) }}" class="form-control" placeholder="Enter Position">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        
                        <input type="date" name="py_date3" value="{{ old('py_date3',app_value('previous_year_practise','py_date3')) }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                       
                        <input type="text" name="py_loc3" value="{{ old('py_loc3',app_value('previous_year_practise','py_loc3')) }}" class="form-control" placeholder="Enter Location">
                    </div>
                    <div class="col-md-4">
                       
                        <input type="text" name="py_position3" value="{{ old('py_position3',app_value('previous_year_practise','py_position3')) }}" class="form-control" placeholder="Enter Position">
                    </div>
                </div>

                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button class="btn btn-primary mt-4 float-end" type="submit">Next</button>

            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.arr.employment-practice') }}">
    @csrf
    <input type="hidden" name="back" value="1">
</form>
@endsection