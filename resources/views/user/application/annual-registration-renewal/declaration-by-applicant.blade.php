@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>12. Declaration by Applicant</h3>
<form id="declareForm" method="post" action="{{ route('user.arr.declaration-by-applicant') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
                <div class="mb-4">

                    <ul>
                        <li>I undertake to display my Annual Practice Certificate in the Public area of my Practice;</li>
                        <li>I undertake to Comply with all relevant legislation and Council guidelines, regulations, codes & standards;</li>
                        <li>I undertake to provide the Council/Secretariat police clearance reports from all jurisdictions should the Council seek such documents;</li>
                        <li>I undertake to provide the Council/Secretariat Dental reports or any report pertaining to the practice should the Council seek such documents;</li>
                        <li>I undertake to inform the Council within 30 days should any of the details at any time change than that be stated on this form;</li>
                        <li>I undertake to cooperate with the Council/Secretariat in all matters pertaining to complaints and disciplinary proceedings;</li>
                        <li>I consent to the Secretariat to divulge relevant practice details as per the Medical & Dental Practitioner Act 2010;</li>
                        <li>I declare that I am fit for practise in the vocation I am applying for;</li>
                        <li>I make this declaration in the knowledge that a false statement may amount to perjury and revoke my Practising Certificate;</li>
                        <li>I solemnly declare to the best of my knowledge that all information provided is true and correct;;</li>
                        <li>I undertake to uphold the Medical / Dental profession in the highest esteem.</li>
                    </ul>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 canvas-container">
                        <label class="form-label required">Sign or draw your name below:</label>

                        <img src="" class="ssign">
                        <input type="hidden" name="applicant_signature" id="applicant_signature" value="{{ old('applicant_signature',app_value('applicant_declaration','applicant_signature')) }}" >
                        
                        @if(app_value('applicant_declaration','applicant_signature'))
                        <img src="{{ old('applicant_signature',app_value('applicant_declaration','applicant_signature')) }}" class="ssign">
                        <input type="hidden" name="applicant_signature" id="applicant_signature" value="{{ old('applicant_signature',app_value('applicant_declaration','applicant_signature')) }}" >
                        @else
                        <canvas id="signatureCanvas" width="400" height="200"></canvas>
                        <div class="controls hsign">
                            <button type="button" onclick="clearCanvas()">Clear</button>
                            <button type="button" onclick="saveSignature()">Save Signature</button>
                        </div>
                        @endif

                        
                       
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">Date:</label>
                        <input type="date" class="form-control" name="applicant_declaration_date" value="{{ old('applicant_declaration_date',app_value('applicant_declaration','applicant_declaration_date')) }}" required="">
                    </div>
                </div>

                <div class="mb-4">
                    <p>PLACING YOUR NAME BELOW CONSTITUTES YOUR ELECTRONIC SIGNATURE.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Name:</label>
                            <input type="text" required name="declare_name" value="{{ old('declare_name',app_value('applicant_declaration','declare_name')) }}" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Place:</label>
                            <input type="text" required name="declare_place" value="{{ old('declare_place',app_value('applicant_declaration','declare_place')) }}" class="form-control" placeholder="Enter Place">
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end" id="declareSubmit">Next</button>
            </div>
        </div>
    </div> <!-- container -->
</form>
<style>

    .canvas-container {
      text-align: center;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    canvas {
      border: 2px solid #ccc;
      border-radius: 5px;
    }

    .controls {
      margin-top: 10px;
    }

    .controls button {
      padding: 10px 20px;
      margin: 5px;
      border: none;
      border-radius: 5px;
      background-color: #0070f3;
      color: white;
      cursor: pointer;
      font-size: 14px;
    }

    .controls button:hover {
      background-color: #005bb5;
    }

  </style>
<form id="backForm" method="post" action="{{ route('user.arr.criminal-convictions') }}">
    @csrf
    <input type="hidden" name="back" value="1">
</form>
@endsection

@push('scripts')
<script>
jQuery(document).ready(function($){
    $('#declareForm').on('submit',function(e){
       
        let sign = $('#applicant_signature').val();
   
        if(!sign){
            alert("please sign to proceed.");
        } 
    });
});
</script>
@endpush