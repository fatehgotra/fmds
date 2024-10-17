@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>11. Declare Interest in Relevant Business</h3>
<form method="post" action="{{ route('user.arr.declare-intrest-business') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
                <div class="mb-4">
                    <p>Section 93 of the Medical & Dental Practitioner Act 2010 requires a registered person or close relative to declare interest in a relevant business. Please provide details:</p>
                    <textarea class="form-control" name="business_interest" value="{{ old('business_interest',app_value('declare_business_interest','business_interest'))  }}" rows="3" placeholder="Enter business interests here">{{ old('business_interest',app_value('declare_business_interest','business_interest'))  }}</textarea>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
            </div>
        </div>
    </div> <!-- container -->
</form>


<form id="backForm" method="post" action="{{ route('user.arr.profesional-indeminity') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>

@endsection