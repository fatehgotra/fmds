@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Application Forms</h4>
                </div>
            </div>
        </div>

        <div class="dashboard-bg">

            <div class="row">

            @if( count($applications) > 0 )
            @foreach($applications as $application)

                <div class="col-xl-6 col-lg-6">
                    <div class="card card-h-100">
                        <div class="card-body dashboard-user">
                            <div class="userD">
                                <h3 class="cta-box-title text-dark">{{ $application->name }}</h3>
                                <p> Application <b>Status :</b></p>
                            </div>
                            <div class="Trial mb-2">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                        viewBox="0 0 15 15">
                                        <path fill="#95adea" fill-rule="evenodd"
                                            d="M7.5.877a6.623 6.623 0 1 0 0 13.246A6.623 6.623 0 0 0 7.5.877ZM1.827 7.5a5.673 5.673 0 1 1 11.346 0a5.673 5.673 0 0 1-11.346 0ZM8 4.5a.5.5 0 0 0-1 0v3a.5.5 0 0 0 .146.354l2 2a.5.5 0 0 0 .708-.708L8 7.293V4.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="trial-detail">
                                    <span class="mt-1 badge bg-success font-16">Open </span>
                                    <p>we are receiving applications.</p>
                                </div>

                            </div>
                            <div class="SButton">
                            <form method="post" action="{{ route('user.initiate-application') }}">
                                @csrf
                                <input type="hidden" name="application_id" value="{{ $application->id }}">
                                <button type="submit" class="btn btn-primary w-100">Apply</button>
                             </form>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                </div> <!-- end col -->

                @endforeach
                @else
                <div class="card">
                    <div class="card-body text-center">
                      No Application Found.
                    </div>
                </div>
                @endif

             
            </div>
           
        </div>

    </div> <!-- container -->

  


@endsection


