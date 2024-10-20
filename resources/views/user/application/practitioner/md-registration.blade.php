@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>2. MEDICAL AND DENTAL REGISTRATION HELD IN FIJI AND ELSEWHERE</h3>
<form method="post" action="{{ route('user.practitioner.medical-dental-registration') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
            <div class="mb-3">

                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <label class="form-label">Date of Entry:</label>
                            <input type="date" name="date_of_entry1" value="{{ old('date_of_entry1',app_value('md_registration','date_of_entry1')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label">Registering Authority:</label>
                            <input type="text" name="regestering_authority1" value="{{ old('regestering_authority1',app_value('md_registration','regestering_authority1')) }}" class="form-control" placeholder="Enter regestering authority">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label">Name of Nation / State:</label>
                            <input type="text" name="name_of_nation1" value="{{ old('name_of_nation1',app_value('md_registration','name_of_nation1')) }}" class="form-control" placeholder="Enter Nation / state">
                        </div>
                        <div class="col-md-2 mb-2">
                            <label class="form-label">Valid Until:</label>
                            <input type="text" name="valid_until1" value="{{ old('valid_until1',app_value('md_registration','valid_until1')) }}" class="form-control" placeholder="Enter valid untill">
                        </div>
                        <div class="col-md-2 mb-2">
                            <label class="form-label">General / Specialist:</label>
                            <input type="text" name="general_specialist1" value="{{ old('general_specialist1',app_value('md_registration','general_specialist1')) }}" class="form-control" placeholder="Enter general / specialist">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <input type="date" name="date_of_entry2" value="{{ old('date_of_entry2',app_value('md_registration','date_of_entry2')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="regestering_authority2" value="{{ old('regestering_authority2',app_value('md_registration','regestering_authority2')) }}" class="form-control" placeholder="Enter regestering authority">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="name_of_nation2" value="{{ old('name_of_nation2',app_value('md_registration','name_of_nation2')) }}" class="form-control" placeholder="Enter Nation / state">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="text" name="valid_until2" value="{{ old('valid_until2',app_value('md_registration','valid_until2')) }}" class="form-control" placeholder="Enter valid untill">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="text" name="general_specialist2" value="{{ old('general_specialist2',app_value('md_registration','general_specialist2')) }}" class="form-control" placeholder="Enter general / specialist">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <input type="date" name="date_of_entry3" value="{{ old('date_of_entry3',app_value('md_registration','date_of_entry3')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="regestering_authority3" value="{{ old('regestering_authority3',app_value('md_registration','regestering_authority3')) }}" class="form-control" placeholder="Enter regestering authority">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="name_of_nation3" value="{{ old('name_of_nation3',app_value('md_registration','name_of_nation3')) }}" class="form-control" placeholder="Enter Nation / state">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="text" name="valid_until3" value="{{ old('valid_until3',app_value('md_registration','valid_until3')) }}" class="form-control" placeholder="Enter valid untill">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="text" name="general_specialist3" value="{{ old('general_specialist3',app_value('md_registration','general_specialist3')) }}" class="form-control" placeholder="Enter general / specialist">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <input type="date" name="date_of_entry4" value="{{ old('date_of_entry4',app_value('md_registration','date_of_entry4')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="regestering_authority4" value="{{ old('regestering_authority4',app_value('md_registration','regestering_authority4')) }}" class="form-control" placeholder="Enter regestering authority">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="name_of_nation4" value="{{ old('name_of_nation4',app_value('md_registration','name_of_nation4')) }}" class="form-control" placeholder="Enter Nation / state">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="text" name="valid_until4" value="{{ old('valid_until4',app_value('md_registration','valid_until4')) }}" class="form-control" placeholder="Enter valid untill">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="text" name="general_specialist4" value="{{ old('general_specialist4',app_value('md_registration','general_specialist4')) }}" class="form-control" placeholder="Enter general / specialist">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <input type="date" name="date_of_entry5" value="{{ old('date_of_entry5',app_value('md_registration','date_of_entry5')) }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="regestering_authority5" value="{{ old('regestering_authority5',app_value('md_registration','regestering_authority5')) }}" class="form-control" placeholder="Enter regestering authority">
                        </div>
                        <div class="col-md-3 mb-2">
                            <input type="text" name="name_of_nation5" value="{{ old('name_of_nation5',app_value('md_registration','name_of_nation5')) }}" class="form-control" placeholder="Enter Nation / state">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="text" name="valid_until5" value="{{ old('valid_until5',app_value('md_registration','valid_until5')) }}" class="form-control" placeholder="Enter valid untill">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="text" name="general_specialist5" value="{{ old('general_specialist5',app_value('md_registration','general_specialist5')) }}" class="form-control" placeholder="Enter general / specialist">
                        </div>
                    </div>

                </div>
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#initiateForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
               
            </div>
        </div>
    </div> <!-- container -->
</form>
<form id="initiateForm" method="post" action="{{ route('user.initiate-application') }}">
    @csrf
    <input type="hidden" name="application_id" value="{{ session()->get('application_id') }}">
</form>
@endsection