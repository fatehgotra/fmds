@extends('layouts.customer')
@section('title', 'Dashboard')
@section('content')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="tabPages mb-3">
            <div class="row">
                <div class="col-xl-12 col-12">
                    <ul class="list-unstyled d-flex justify-content-between mb-0">
                        <li>
                            <a href="" class="btn btn-primary">Applications</a>
                        </li>
                        <li>
                            <a href="" class="btn btn-primary">Tickets</a>
                        </li>
                        <li>
                            <a href="{{ route('user.my-account.edit', auth()->user()->uuid) }}" class="btn btn-primary">My Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="dashboard-bg">

            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card card-h-100">
                        <div class="card-body dashboard-user">
                            <div class="userD">
                                <h3 class="cta-box-title text-primary">Hello {{ loginUser()->name }}</h3>
                                <p>Applied Application <b>Status :</b></p>
                            </div>
                            <div class="Trial">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                        viewBox="0 0 15 15">
                                        <path fill="#95adea" fill-rule="evenodd"
                                            d="M7.5.877a6.623 6.623 0 1 0 0 13.246A6.623 6.623 0 0 0 7.5.877ZM1.827 7.5a5.673 5.673 0 1 1 11.346 0a5.673 5.673 0 0 1-11.346 0ZM8 4.5a.5.5 0 0 0-1 0v3a.5.5 0 0 0 .146.354l2 2a.5.5 0 0 0 .708-.708L8 7.293V4.5Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="trial-detail">
                                    <h4 class="mt-1">In Review </h4>
                                    <p>your application is under review.</p>
                                </div>

                            </div>
                            <div class="SButton">
                                <a type="button" class="btn btn-primary w-100" href="">View Application</a>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                </div> <!-- end col -->

                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Insights</h4>
                            <ul class="nav InsightsG d-lg-flex">
                            <li class="nav-item">
                                    <a class="nav-link text-muted" href="#">
                                        <p class="text-dark mb-0"><i class="mdi mdi-checkbox-blank-circle text-primary"></i>
                                            Applied Applications</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-muted" href="#">
                                        <p class="text-dark mb-0"><i class="mdi mdi-checkbox-blank-circle text-success"></i>
                                            Approved Applications</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">
                                        <p class="text-dark mb-0"><i class="mdi mdi-checkbox-blank-circle text-danger"></i>
                                        Rejected Applications</p>
                                    </a>
                                </li>

                            </ul>


                            <div dir="ltr">
                                <div id="sessions-overview" class="apex-charts mt-3" data-colors="#0acf97"></div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>
            <div class="row">
              
                <div class="col-xl-3 col-12">
                    <a href="{{ route('user.integration.index') }}">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <div class="float-end">
                                <svg id="Layer_1" enable-background="new 0 0 512 512" height="30" viewBox="0 0 512 512" width="38" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="#e3e3e6">
                                        <path d="m141.255 228h-106.51c-19.159 0-34.745-15.586-34.745-34.745v-106.51c0-19.159 15.586-34.745 34.745-34.745h106.51c19.159 0 34.745 15.586 34.745 34.745v106.51c0 19.159-15.586 34.745-34.745 34.745zm-106.51-144c-1.514 0-2.745 1.231-2.745 2.745v106.51c0 1.514 1.231 2.745 2.745 2.745h106.51c1.514 0 2.745-1.231 2.745-2.745v-106.51c0-1.514-1.231-2.745-2.745-2.745z"/>
                                        <path d="m141.255 460h-106.51c-19.159 0-34.745-15.586-34.745-34.745v-106.51c0-19.159 15.586-34.745 34.745-34.745h106.51c19.159 0 34.745 15.586 34.745 34.745v106.51c0 19.159-15.586 34.745-34.745 34.745zm-106.51-144c-1.514 0-2.745 1.231-2.745 2.745v106.51c0 1.514 1.231 2.745 2.745 2.745h106.51c1.514 0 2.745-1.231 2.745-2.745v-106.51c0-1.514-1.231-2.745-2.745-2.745z"/>
                                        <path d="m496 132h-256c-8.836 0-16-7.164-16-16s7.164-16 16-16h256c8.836 0 16 7.164 16 16s-7.164 16-16 16z"/>
                                        <path d="m408 192h-168c-8.836 0-16-7.164-16-16s7.164-16 16-16h168c8.836 0 16 7.164 16 16s-7.164 16-16 16z"/>
                                        <path d="m496 360h-256c-8.836 0-16-7.164-16-16s7.164-16 16-16h256c8.836 0 16 7.164 16 16s-7.164 16-16 16z"/>
                                        <path d="m408 424h-168c-8.836 0-16-7.164-16-16s7.164-16 16-16h168c8.836 0 16 7.164 16 16s-7.164 16-16 16z"/>
                                    </g>
                                </svg>

                            </div>
                            <h4 class="text-capitalize mt-0 text-dark">Applied Applications</h4>
                            <h2 class="my-2 text-primary mb-1" id="Templates">0</h2>
                          
                        </div> <!-- end card-body-->
                    </div>
                    </a>
                    <!--end card-->
                </div>
                <div class="col-xl-3 col-12">
                    <a href="">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <div class="float-end">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                    viewBox="0 0 64 64" width="31" height="31">
                                    <g fill="#e3e3e6">
                                        <path
                                            d="M14,20H4a4,4,0,0,0-4,4V34a4,4,0,0,0,4,4H14a4,4,0,0,0,4-4V24A4,4,0,0,0,14,20ZM4,34V24H14V34Z" />
                                        <path
                                            d="M41,34V24a4,4,0,0,0-4-4H27a4,4,0,0,0-4,4V34a4,4,0,0,0,4,4H37A4,4,0,0,0,41,34ZM27,24H37V34H27Z" />
                                        <path
                                            d="M60,20H50a4,4,0,0,0-4,4V34a4,4,0,0,0,4,4H60a4,4,0,0,0,4-4V24A4,4,0,0,0,60,20ZM50,34V24H60V34Z" />
                                        <path
                                            d="M30.33,10.43a2.1,2.1,0,0,0-3.12.68,2,2,0,0,0,.9,2.68l4,2a2,2,0,0,0,2.49-.59l3-4a2,2,0,0,0-.4-2.8,2.09,2.09,0,0,0-3.08.77A14,14,0,0,0,7,14a2,2,0,0,0,4,0,10,10,0,0,1,19.33-3.57Z" />
                                        <path
                                            d="M57.6,42.8a2,2,0,0,0-2.49-.59l-4,2a2,2,0,0,0-.9,2.68,2.1,2.1,0,0,0,3.12.68A10,10,0,0,1,34,44a2,2,0,0,0-4,0,14,14,0,0,0,27.12,4.83,2.09,2.09,0,0,0,3.08.77,2,2,0,0,0,.4-2.8Z" />
                                        <path
                                            d="M52.59,15.41a2,2,0,0,0,2.61.19l8-6a2,2,0,1,0-2.4-3.2l-6.61,5L52.41,9.59a2,2,0,0,0-2.82,2.82Z" />
                                        <path
                                            d="M14.2,45.4l-4-3a2,2,0,0,0-2.4,0l-4,3a2,2,0,0,0-.4,2.8C4.37,49.52,6,49,7,48v6a2,2,0,0,0,4,0V48c1,1,2.63,1.52,3.6.2A2,2,0,0,0,14.2,45.4Z" />
                                        <circle cx="9" cy="62" r="2" />
                                    </g>
                                </svg>

                            </div>
                            <h4 class="text-capitalize mt-0 text-dark">Under Review Applications</h4>
                            <h2 class="my-2 text-primary mb-1" id="Templates">0</h2>
                            <p class="mb-0 text-dark">
                                <span class="text-nowrap">0 Approved</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div>
                    </a>
                    <!--end card-->
                </div>

                <div class="col-xl-3 col-12">
                    <a href="{{ route('user.integration.index') }}">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <div class="float-end">
                                <svg id="Layer_1" enable-background="new 0 0 512 512" height="30" viewBox="0 0 512 512" width="38" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="#e3e3e6">
                                        <path d="m141.255 228h-106.51c-19.159 0-34.745-15.586-34.745-34.745v-106.51c0-19.159 15.586-34.745 34.745-34.745h106.51c19.159 0 34.745 15.586 34.745 34.745v106.51c0 19.159-15.586 34.745-34.745 34.745zm-106.51-144c-1.514 0-2.745 1.231-2.745 2.745v106.51c0 1.514 1.231 2.745 2.745 2.745h106.51c1.514 0 2.745-1.231 2.745-2.745v-106.51c0-1.514-1.231-2.745-2.745-2.745z"/>
                                        <path d="m141.255 460h-106.51c-19.159 0-34.745-15.586-34.745-34.745v-106.51c0-19.159 15.586-34.745 34.745-34.745h106.51c19.159 0 34.745 15.586 34.745 34.745v106.51c0 19.159-15.586 34.745-34.745 34.745zm-106.51-144c-1.514 0-2.745 1.231-2.745 2.745v106.51c0 1.514 1.231 2.745 2.745 2.745h106.51c1.514 0 2.745-1.231 2.745-2.745v-106.51c0-1.514-1.231-2.745-2.745-2.745z"/>
                                        <path d="m496 132h-256c-8.836 0-16-7.164-16-16s7.164-16 16-16h256c8.836 0 16 7.164 16 16s-7.164 16-16 16z"/>
                                        <path d="m408 192h-168c-8.836 0-16-7.164-16-16s7.164-16 16-16h168c8.836 0 16 7.164 16 16s-7.164 16-16 16z"/>
                                        <path d="m496 360h-256c-8.836 0-16-7.164-16-16s7.164-16 16-16h256c8.836 0 16 7.164 16 16s-7.164 16-16 16z"/>
                                        <path d="m408 424h-168c-8.836 0-16-7.164-16-16s7.164-16 16-16h168c8.836 0 16 7.164 16 16s-7.164 16-16 16z"/>
                                    </g>
                                </svg>

                            </div>
                            <h4 class="text-capitalize mt-0 text-dark">Rejected Applications</h4>
                            <h2 class="my-2 text-primary mb-1" id="Templates">0</h2>
                          
                        </div> <!-- end card-body-->
                    </div>
                    </a>
                    <!--end card-->
                </div>

                <div class="col-xl-3 col-12">
                    <a href="">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <div class="float-end">
                                <svg height="32" viewBox="0 0 512 512" width="32" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="#e3e3e6">
                                        <path
                                            d="m457.65 54.783-.441-.441c-14.686-14.656-37.156-16.922-54.325-6.828-43.801-31.121-94.338-47.514-146.884-47.514-52.545 0-103.082 16.393-146.884 47.515-17.168-10.094-39.635-7.83-54.314 6.817l-.46.46c-14.656 14.689-16.92 37.158-6.827 54.325-31.122 43.801-47.515 94.338-47.515 146.883s16.393 103.082 47.515 146.884c-10.093 17.167-7.828 39.637 6.83 54.328l.446.446c14.622 14.59 37.075 16.971 54.326 6.828 43.802 31.121 94.338 47.514 146.883 47.514 52.546 0 103.082-16.393 146.883-47.514 17.272 10.155 39.721 7.745 54.329-6.831l.445-.445c14.657-14.689 16.922-37.158 6.828-54.326 31.121-43.802 47.515-94.339 47.515-146.884s-16.394-103.081-47.515-146.884c10.094-17.168 7.828-39.638-6.835-54.333zm-42.556 20.915c5.798-5.796 15.184-5.849 20.919-.126l.408.409c5.73 5.743 5.678 15.13-.118 20.925l-74.876 74.875c-6.265-7.827-13.382-14.943-21.209-21.209zm-54.094 180.302c0 57.897-47.103 105-105 105s-105-47.103-105-105 47.103-105 105-105 105 47.103 105 105zm-105-226c44.114 0 86.687 13.18 124.112 38.253l-65.939 65.939c-17.625-8.452-37.355-13.192-58.173-13.192s-40.548 4.74-58.174 13.191l-65.938-65.939c37.425-25.072 79.998-38.252 124.112-38.252zm-180.428 45.988.409-.409c5.743-5.73 15.13-5.677 20.926.118l74.875 74.876c-7.827 6.265-14.943 13.382-21.209 21.209l-74.876-74.876c-5.795-5.796-5.848-15.183-.125-20.918zm-45.572 180.012c0-44.113 13.18-86.687 38.253-124.112l65.938 65.939c-8.451 17.625-13.191 37.355-13.191 58.173s4.74 40.548 13.191 58.174l-65.938 65.939c-25.073-37.426-38.253-80-38.253-124.113zm66.906 180.302c-5.796 5.796-15.182 5.849-20.941.103l-.386-.385c-5.73-5.743-5.677-15.13.118-20.926l74.875-74.875c6.265 7.827 13.381 14.943 21.209 21.209zm159.094 45.698c-44.114 0-86.687-13.18-124.112-38.253l65.938-65.939c17.626 8.452 37.356 13.192 58.174 13.192s40.548-4.74 58.174-13.191l65.939 65.939c-37.426 25.072-79.999 38.252-124.113 38.252zm180.423-45.983-.404.404c-5.742 5.73-15.128 5.677-20.925-.119l-74.875-74.875c7.827-6.265 14.943-13.381 21.209-21.209l74.876 74.876c5.795 5.796 5.847 15.183.119 20.923zm45.577-180.017c0 44.113-13.18 86.687-38.253 124.112l-65.938-65.938c8.451-17.626 13.191-37.356 13.191-58.174s-4.74-40.548-13.191-58.174l65.938-65.938c25.073 37.426 38.253 79.999 38.253 124.112z" />
                                    </g>
                                </svg>
                            </div>
                            <h4 class="text-capitalize mt-0 text-dark">Support</h4>
                            <h2 class="my-2 text-primary mb-1" id="Support">0</h2>
                            <p class="mb-0 text-dark">
                                <span class="text-nowrap">Open Tickets</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div>
                    </a>
                    <!--end card-->
                </div>
            </div>
        </div>

    </div> <!-- container -->

  


@endsection


