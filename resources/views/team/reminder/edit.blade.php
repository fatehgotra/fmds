@extends('layouts.customer')
@section('title', 'Edit Reminder')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Reminder</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="mb-3">
        <div class="row text-end">
            <div class="col-xl-12 col-12">
                <a href="{{ route('team.global-reminder') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
    </div>

    <div class="dashboard-bg">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                <div class="card">
                    <div class="card-body">

                        <form class="ps-3 pe-3" method="POST" action="{{ route('team.reminder.update',$reminder->uuid) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="title" value="{{ old('title',$reminder->title) }}" id="title" placeholder="Enter Title">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                  
                            <div class="mb-3">
                                <label for="date" name="date" class="form-label">Date <span class="text-danger">*</span> </label>
                                <input class="form-control" type="text" placeholder="Choose date" name="date" id="datetimepicker" value="{{ old('date',$reminder->date) }}" data-date-autoclose="true">
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="report" class="form-label">Report <span class="text-danger">*</span> </label>
                                <select name="report" class="form-select">
                                    <option value="">--select--</option>
                                    <option value="every-month" @if(old("report",$reminder->report)=="every-month" ) selected @endif>Every Month</option>
                                    <option value="every-week" @if(old("report",$reminder->report)=="every-week" ) selected @endif>Every Week</option>
                                </select>
                                @error('report')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select">
                                    <option value="1" @if(old("status",$reminder->status)=="1" ) selected @endif>Active</option>
                                    <option value="0" @if(old("status",$reminder->status)=="0" ) selected @endif>Inactive</option>
                                </select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 text-center">
                                <button class="btn btn-primary" type="submit">Save Reminder</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script>
        jQuery(document).ready(function($) {
            flatpickr("#datetimepicker", {
                enableTime: true,
                dateFormat: "d-m-Y H:i",
            });
        });
    </script>
    @endpush