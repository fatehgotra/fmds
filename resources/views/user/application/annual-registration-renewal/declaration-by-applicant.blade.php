@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>9. Declaration by Applicant</h3>
<form method="post" action="{{ route('user.rpli.declaration-by-applicant') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
            <div class="mb-4">
                    <p>I undertake to:</p>
                    <ul>
                        <li>Display my Annual Practice Certificate in the public area of my practice;</li>
                        <li>Comply with all relevant legislation and Council guidelines, regulations, codes & standards;</li>
                        <li>Provide the Council/Secretariat with police clearance reports from all jurisdictions if requested;</li>
                        <li>Provide the Council/Secretariat with Dental reports or any report pertaining to the practice if requested;</li>
                        <li>Inform the Council within 30 days of any changes to the details stated on this form;</li>
                        <li>Cooperate with the Council/Secretariat in all matters pertaining to complaints and disciplinary proceedings;</li>
                        <li>Consent to the Secretariat divulging relevant practice details as per the Medical & Dental Practitioner Act 2010;</li>
                        <li>Declare that I am fit to practise in the vocation I am applying for;</li>
                        <li>Make this declaration in the knowledge that a false statement may amount to perjury and revoke my Practising Certificate;</li>
                        <li>Solemnly declare to the best of my knowledge that all information provided is true and correct;</li>
                        <li>Uphold the Medical/Dental profession in the highest esteem.</li>
                    </ul>
                </div>
             
                <div class="mb-4">
                    <p>PLACING YOUR NAME BELOW CONSTITUTES YOUR ELECTRONIC SIGNATURE.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Name:</label>
                            <input type="text" name="declare_name" value="{{ old('declare_name',app_value('applicant_declaration','declare_name')) }}" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Place:</label>
                            <input type="text" name="declare_place" value="{{ old('declare_place',app_value('applicant_declaration','declare_place')) }}" class="form-control" placeholder="Enter Place">
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
            </div>
        </div>
    </div> <!-- container -->
</form>
<form id="backForm" method="post" action="{{ route('user.rpli.criminal-convictions') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection