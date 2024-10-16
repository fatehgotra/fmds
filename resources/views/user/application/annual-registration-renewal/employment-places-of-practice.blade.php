@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>2. EMPLOYMENT & PLACE[S] OF PRACTISE (Current Year)</h3>
<form method="post" action="{{ route('user.arr.employment-practice') }}">
    @csrf
<div class="card dashboard-bg">
    <div class="section active-section card-body" id="section1">
        <div class="form-group">
            <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Employer’s/ Practice Name[s]:</label>
                        <textarea name="practice_names" value="{{ old('practice_names',app_value('employment_practice','practice_names')) }}" class="form-control" placeholder="Practice Names" required>{{ old('practice_names',app_value('employment_practice','practice_names')) }}</textarea>
                    </div>
                    <div class="col-md-6 d-flex">
                       
                        <div class="form-check m-2">
                        <label class="form-check-label" for="govt-public">
                                Government / Public
                            </label>
                            <input class="form-check-input" type="checkbox" @if(old('employment_type',app_value('employment_practice','employment_type'))=='govt-public' ) checked @endif name="employment_type" value="govt-public" id="govt-public"
                            onchange="{ $('#private').prop('checked',false) }"
                            >
                           
                        </div>
                        <div class="form-check m-2">
                        <label class="form-check-label" for="private">
                                Private
                            </label>
                            <input class="form-check-input" type="checkbox" name="employment_type" @if(old('employment_type',app_value('employment_practice','employment_type'))=='private' ) checked @endif value="private" id="private"
                               onchange="{ $('#govt-public').prop('checked',false) }"
                            >
                          
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Your Position[s]:</label>
                        <textarea name="employment_positions" value="{{ old('employment_positions',app_value('employment_practice','employment_positions')) }}" class="form-control" placeholder="Enter your positions" required>{{ old('employment_positions',app_value('employment_practice','employment_positions')) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">Address/ Place[s] of Practice:</label>
                        <textarea name="employment_address" value="{{ old('employment_address',app_value('employment_practice','employment_address')) }}" class="form-control" placeholder="Enter your positions" required>{{ old('employment_address',app_value('employment_practice','employment_address')) }}</textarea>
                    </div>
                  
                </div>

                <div class="row mb-3">
                <div class="col-md-6">
                        <label class="form-label required">Years of service: </label>
                        <input type="text" name="years_of_service" value="{{ old('years_of_service',app_value('employment_practice','years_of_service')) }}" class="form-control" placeholder="Enter Country" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">EDP # (if applicable): </label>
                        <input type="text" name="edp" value="{{ old('edp',app_value('employment_practice','edp')) }}" class="form-control" placeholder="Enter Country" >
                    </div>
                </div>
          
            <button class="btn btn-dark mt-4" type="button" onclick="{ $('#initiateForm').submit() }">Back</button>
            <button class="btn btn-primary mt-4 float-end" type="submit">Next</button>

        </div>
    </div>
</div> <!-- container -->
</form>

<form id="initiateForm" method="post" action="{{ route('user.initiate-application') }}">
@csrf
<input type="hidden" name="application_id" value="{{ session()->get('application_id') }}">
</form>
@endsection