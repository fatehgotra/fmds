@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>9. Professional Indemnity</h3>
<form method="post" action="{{ route('user.arr.profesional-indeminity') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
                <div class="mb-3">
                    <p>Do you have Professional Indemnity Insurance?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="indemnity" @if(old('indemnity',app_value('profesional_indemnity','indemnity')) == 'Yes') checked @endif id="indemnityYes" value="Yes" required>
                        <label class="form-check-label" for="indemnityYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="indemnity" @if(old('indemnity',app_value('profesional_indemnity','indemnity')) == 'No') checked @endif id="indemnityNo" value="No" required>
                        <label class="form-check-label" for="indemnityNo">No</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Please provide the details and evidence:</label>
                    <textarea class="form-control" name="indemnity_details" value="{{ old('indemnity_details',app_value('profesional_indemnity','indemnity_details'))  }}" rows="3" placeholder="Provide details here">{{ old('indemnity_details',app_value('profesional_indemnity','indemnity_details'))  }}</textarea>
                    <small class="text-danger"><b>Note: It is unlawful to practise without Professional Indemnity (Insurance).<b></small>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.arr.medical-fitness') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection