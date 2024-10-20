@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>5. Medical Fitness to Practise</h3>
<form method="post" action="{{ route('user.sar.medical-fitness') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
                <div class="mb-3">
                    <p>Have you previously suffered or currently suffer from an injury, illness, or condition(s) which may place you or your patients at an increased risk or harm?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="medical_fitness" @if(old('medical_fitness',app_value('medical_fitness','medical_fitness')) == 'Yes') checked @endif id="medicalYes" value="Yes" required>
                        <label class="form-check-label" for="medicalYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="medical_fitness"  @if(old('medical_fitness',app_value('medical_fitness','medical_fitness')) == 'No') checked @endif id="medicalNo" value="No" required>
                        <label class="form-check-label" for="medicalNo">No</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">If YES, please detail conditions (include date of injury/illness/medication taken):</label>
                    <textarea class="form-control" rows="3" name="medical_details"  value="{{ old('medical_details',app_value('medical_fitness','medical_details'))  }}" placeholder="Provide details here">{{ old('medical_details',app_value('medical_fitness','medical_details'))  }}</textarea>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>

            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.sar.education') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection