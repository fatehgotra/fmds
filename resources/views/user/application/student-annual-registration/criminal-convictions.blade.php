@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>6. Criminal/Other Convictions</h3>
<form method="post" action="{{ route('user.sar.criminal-convictions') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
                <div class="mb-3">
                    <p>Are you facing any criminal, drug, or alcohol-related charges?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="criminal_conviction" @if(old('criminal_conviction',app_value('criminal_convictions','criminal_conviction')) == 'Yes') checked @endif id="criminalYes" value="Yes" required>
                        <label class="form-check-label" for="criminalYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="criminal_conviction" @if(old('criminal_conviction',app_value('criminal_convictions','criminal_conviction')) == 'No') checked @endif id="criminalNo" value="No" required>
                        <label class="form-check-label" for="criminalNo">No</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">If YES, please provide details:</label>
                    <textarea class="form-control" name="criminal_details" value="{{ old('criminal_details',app_value('criminal_convictions','criminal_details'))  }}" rows="3" placeholder="Provide details here">{{ old('criminal_details',app_value('criminal_convictions','criminal_details'))  }}</textarea>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.sar.other-acheivement') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection