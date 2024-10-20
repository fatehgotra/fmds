@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>4. OTHER ACHIEVEMENTS & SKILLS (IN ANY FIELD)</h3>
<form method="post" action="{{ route('user.sar.other-acheivement') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
                <div class="mb-4">
                    <textarea class="form-control" name="other_acheivement" value="{{ old('other_acheivement',app_value('other_acheivement','other_acheivement'))  }}" rows="3" placeholder="Provide details here">{{ old('other_acheivement',app_value('other_acheivement','other_acheivement'))  }}</textarea>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.sar.registration') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection