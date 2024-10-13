@extends('layouts.customer')
@section('title', 'Team')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">

            <div class="page-title-box reminderT mb-3 mt-3">
                <h4 class="page-title">Insights</h4>
                <span class="font-16 text-dark fw-400">Overview</span>
            </div>
        </div>
    </div>
    <!-- end page title -->

    @include('user.includes.team-top-bar')

    <div class="row">

        <div class="col-xl-6 col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Contact Allocation</h4>
                    <div id="sessions-browser" class="apex-charts" data-colors="#727cf5"></div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-xl-6 col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Chart</h4>

                    <div dir="ltr">
                        <div id="country-chart" class="apex-charts" data-colors="#727cf5"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Messages (Total)</h4>

                    <div dir="ltr">
                        <div id="sessions-overview" class="apex-charts mt-3" data-colors="#0acf97"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>

</div>


@endsection
