@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>10. Supporting Documents required</h3>
<form method="post" action="">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
            <div class="mb-4">
                    <h5>Supporting Documents Required:</h5>
                    <ul>
                        <li>Certified copy of basic medical qualification</li>
                        <li>Certified copies of academic transcripts</li>
                        <li>Copy of Passport Photo (A month Old)</li>
                        <li>Certified copy of letter of completion from University where study has been undertaken (in any place of graduate certificate)</li>
                        <li>Certified Copy of Any Valid ID</li>
                        <li>Certified Copy of Passport (if any)</li>
                        <li>Certified Copy of Birth Certificate</li>
                        <li>Work Permit – Non Fiji Citizen</li>
                    </ul>
                </div>
    
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.rpli.declare-intrest-business') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection