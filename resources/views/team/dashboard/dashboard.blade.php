@extends('layouts.team')
@section('title', 'Dashboard')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">My Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="dashboard-bg">

            <div class="row">

                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Insights</h4>
                            <ul class="nav InsightsG d-lg-flex">
                                <li class="nav-item">
                                    <a class="nav-link text-muted" href="#">
                                        <p class="text-dark mb-0"><i class="mdi mdi-checkbox-blank-circle text-primary"></i>
                                            Contacts</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-muted" href="#">
                                        <p class="text-dark mb-0"><i class="mdi mdi-checkbox-blank-circle text-success"></i>
                                            Chat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">
                                        <p class="text-dark mb-0"><i class="mdi mdi-checkbox-blank-circle text-light"></i>
                                            Reminders</p>
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
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <div class="float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 15 15">
                                    <path fill="#e1e2e4"
                                        d="M2 12.5v.5h1v-.5H2Zm5 0v.5h1v-.5H7Zm-4 0V12H2v.5h1Zm4-.5v.5h1V12H7Zm-2-2a2 2 0 0 1 2 2h1a3 3 0 0 0-3-3v1Zm-2 2a2 2 0 0 1 2-2V9a3 3 0 0 0-3 3h1Zm2-8a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1V4Zm2 2a2 2 0 0 0-2-2v1a1 1 0 0 1 1 1h1ZM5 8a2 2 0 0 0 2-2H6a1 1 0 0 1-1 1v1Zm0-1a1 1 0 0 1-1-1H3a2 2 0 0 0 2 2V7ZM1.5 3h12V2h-12v1Zm12.5.5v8h1v-8h-1Zm-.5 8.5h-12v1h12v-1ZM1 11.5v-8H0v8h1Zm.5.5a.5.5 0 0 1-.5-.5H0A1.5 1.5 0 0 0 1.5 13v-1Zm12.5-.5a.5.5 0 0 1-.5.5v1a1.5 1.5 0 0 0 1.5-1.5h-1ZM13.5 3a.5.5 0 0 1 .5.5h1A1.5 1.5 0 0 0 13.5 2v1Zm-12-1A1.5 1.5 0 0 0 0 3.5h1a.5.5 0 0 1 .5-.5V2ZM9 6h3V5H9v1Zm0 3h3V8H9v1Zm-9 6h15v-1H0v1ZM3 0v2.5h1V0H3Zm8 0v2.5h1V0h-1Z" />
                                </svg>
                            </div>
                            <h4 class="text-capitalize mt-0 text-dark">Contacts</h4>
                            <h2 class="my-2 text-primary mb-1" id="Contacts">280</h2>

                            <div class="dashBtn">
                                <button type="button" class="btn btn-primary">28 New</button>
                                <button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="17" height="17" viewBox="0 0 432 432">
                                        <path fill="#fff"
                                            d="M364.5 65Q427 127 427 214.5T364.5 364T214 426q-54 0-101-26L0 429l30-109Q2 271 2 214q0-87 62-149T214 3t150.5 62zM214 390q73 0 125-51.5T391 214T339 89.5T214 38T89.5 89.5T38 214q0 51 27 94l4 6l-18 65l67-17l6 3q42 25 90 25zm97-132q9 5 10 7q4 6-3 25q-3 8-15 15.5t-21 9.5q-18 2-33-2q-17-6-30-11q-8-4-15.5-8.5t-14.5-9t-13-9.5t-11.5-10t-10.5-10.5t-8.5-9.5t-7-8.5t-5.5-7t-3.5-5L128 222q-22-29-22-55q0-24 19-44q6-7 14-7q6 0 10 1q8 0 12 9q2 3 6 13l7 17.5l3 8.5q3 5 1 9q-3 7-5 9l-3 3l-3 3.5l-2 2.5q-6 6-3 11q13 22 30 37q13 11 43 26q7 3 11-1q12-15 17-21q4-6 12-3q6 3 36 17z" />
                                    </svg> 200</button>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                    <!--end card-->
                </div>



                <div class="col-xl-3 col-12">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <div class="float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="#e1e2e4" stroke-width="2"
                                        d="M22 3L2 11l18.5 8L22 3ZM10 20.5l3-4.5m2.5-6.5L9 14l.859 6.012c.078.546.216.537.306-.003L11 15l4.5-5.5Z" />
                                </svg>

                            </div>
                            <h4 class="text-capitalize mt-0 text-dark">Messages Sent</h4>
                            <h2 class="my-2 text-primary mb-1" id="Messages">2500</h2>
                            <div class="dashBtn">
                                <button type="button" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="18" height="18" viewBox="0 0 20 20">
                                        <path fill="#fff"
                                            d="M10 0c5.342 0 10 4.41 10 9.5c0 5.004-4.553 8.942-10 8.942a11.01 11.01 0 0 1-3.43-.546c-.464.45-.623.603-1.608 1.553c-.71.536-1.378.718-1.975.38c-.602-.34-.783-1.002-.66-1.874l.4-2.319C.99 14.002 0 11.842 0 9.5C0 4.41 4.657 0 10 0Zm0 1.4c-4.586 0-8.6 3.8-8.6 8.1c0 2.045.912 3.928 2.52 5.33l.02.017l.297.258l-.067.39l-.138.804l-.037.214l-.285 1.658a2.79 2.79 0 0 0-.03.337v.095c0 .005-.001.007-.002.008c.007-.01.143-.053.376-.223l2.17-2.106l.414.156a9.589 9.589 0 0 0 3.362.605c4.716 0 8.6-3.36 8.6-7.543c0-4.299-4.014-8.1-8.6-8.1ZM5.227 7.813a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998Zm4.998 0a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998Zm4.997 0a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998Z" />
                                    </svg> 250</button>
                                <button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="17" height="17" viewBox="0 0 432 432">
                                        <path fill="#fff"
                                            d="M364.5 65Q427 127 427 214.5T364.5 364T214 426q-54 0-101-26L0 429l30-109Q2 271 2 214q0-87 62-149T214 3t150.5 62zM214 390q73 0 125-51.5T391 214T339 89.5T214 38T89.5 89.5T38 214q0 51 27 94l4 6l-18 65l67-17l6 3q42 25 90 25zm97-132q9 5 10 7q4 6-3 25q-3 8-15 15.5t-21 9.5q-18 2-33-2q-17-6-30-11q-8-4-15.5-8.5t-14.5-9t-13-9.5t-11.5-10t-10.5-10.5t-8.5-9.5t-7-8.5t-5.5-7t-3.5-5L128 222q-22-29-22-55q0-24 19-44q6-7 14-7q6 0 10 1q8 0 12 9q2 3 6 13l7 17.5l3 8.5q3 5 1 9q-3 7-5 9l-3 3l-3 3.5l-2 2.5q-6 6-3 11q13 22 30 37q13 11 43 26q7 3 11-1q12-15 17-21q4-6 12-3q6 3 36 17z" />
                                    </svg> 200</button>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <div class="col-xl-3 col-12">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <div class="float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 14 14">
                                    <path fill="none" stroke="#e1e2e4" stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 7V4.37A3.93 3.93 0 0 1 7 .5h0a3.93 3.93 0 0 1 4 3.87V7M1.5 5.5h1A.5.5 0 0 1 3 6v3a.5.5 0 0 1-.5.5h-1a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1Zm11 4h-1A.5.5 0 0 1 11 9V6a.5.5 0 0 1 .5-.5h1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1ZM9 12.25a2 2 0 0 0 2-2h0V8m-2 4.25a1.25 1.25 0 0 1-1.25 1.25h-1.5a1.25 1.25 0 0 1 0-2.5h1.5A1.25 1.25 0 0 1 9 12.25Z" />
                                </svg>
                            </div>
                            <h4 class="text-capitalize mt-0 text-dark">Unread</h4>
                            <h2 class="my-2 text-primary mb-1" id="Templates">1</h2>
                            <p class="mb-0 text-dark">
                                <span class="text-nowrap">20 reminders, 10 messages</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div>
                    <!--end card-->
                </div>

                <div class="col-xl-3 col-12">
                    <div class="card tilebox-one">
                        <div class="card-body">
                            <div class="float-end">

                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 1024 1024">
                                    <path fill="#e1e2e4"
                                        d="M512 0C229.232 0 0 229.232 0 512s229.232 512 512 512s512-229.232 512-512S794.768 0 512 0zm128 82.976c144.224 42.992 257.648 156.8 300.704 301.023H733.136A257.472 257.472 0 0 0 640 290.943zm63.633 429.232c0 105.936-85.792 191.808-191.632 191.808s-191.632-85.872-191.632-191.808s85.808-191.823 191.632-191.823s191.632 85.888 191.632 191.823zM448.001 68.928c20.912-2.992 42.256-4.624 64-4.624c21.727 0 43.088 1.632 64 4.624v195.808c-20.48-5.296-41.856-8.4-64-8.4s-43.504 3.104-64 8.4V68.928zm-64 14.048v207.968c-38.56 22.384-70.72 54.544-93.136 93.056H83.297c43.04-144.224 156.48-258.031 300.704-301.024zM64.305 512.159c0-21.824 1.855-43.169 4.88-64.161h195.392c-5.312 20.512-8.24 41.983-8.24 64.176c0 22.064 2.912 43.425 8.16 63.825H69.137c-2.975-20.88-4.832-42.144-4.832-63.84zM384 941.326C239.664 898.318 126.193 784.35 83.201 639.998h207.472c22.432 38.656 54.655 70.945 93.327 93.393v207.936zm192.001 14.047c-20.912 2.992-42.273 4.624-64 4.624c-21.744 0-43.088-1.648-64-4.624V759.597c20.496 5.296 41.856 8.4 64 8.4s43.52-3.104 64-8.4v195.776zm64-14.048V733.39c38.656-22.448 70.897-54.736 93.313-93.392h207.472c-42.993 144.336-156.464 258.32-300.784 301.328zm119.504-365.327c5.248-20.4 8.16-41.76 8.16-63.825c0-22.193-2.928-43.664-8.256-64.176h195.408c3.008 20.992 4.88 42.336 4.88 64.16c0 21.697-1.84 42.977-4.832 63.841h-195.36z" />
                                </svg>
                            </div>
                            <h4 class="text-capitalize mt-0 text-dark">Support</h4>
                            <h2 class="my-2 text-primary mb-1" id="Support">0</h2>
                            <p class="mb-0 text-dark">
                                <span class="text-nowrap">Open Tickets</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div>
                    <!--end card-->
                </div>
            </div>
        </div>

    </div> <!-- container -->

    <div id="standard-modal" class="modal TopupM fade" tabindex="-1" role="dialog"
        aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-white"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                            height="32" viewBox="0 0 50 50">
                            <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path stroke="#fff"
                                    d="m35.854 18.75l3.73-5.333l-10.23-7.167l-8.77 12.5zM18.938 8.333L11.625 18.75h8.958L25 12.5z" />
                                <path stroke="#fff"
                                    d="M41.667 18.75H8.333c-1.15 0-2.083.933-2.083 2.083v20.834c0 1.15.933 2.083 2.083 2.083h33.334c1.15 0 2.083-.933 2.083-2.083V20.833c0-1.15-.933-2.083-2.083-2.083" />
                                <path stroke="#fff"
                                    d="M33.333 27.083H43.75v8.334H33.333a2.083 2.083 0 0 1-2.083-2.084v-4.166a2.084 2.084 0 0 1 2.083-2.084" />
                            </g>
                        </svg> <span>Topup Account</span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="topup-wallet">
                        <div class="form-group">
                            <label class="form-label">Select Amount</label>
                            <div class="input-group mb-3">
                                <span class="doller">$</span>
                                <select class="form-select">
                                    <option selected>Select Amount</option>
                                    <option value="1">50</option>
                                    <option value="2">100</option>
                                    <option value="3">250</option>
                                    <option value="3">500</option>
                                    <option value="3">1000</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3 text-end">
                            <button type="button" class="btn btn-dark">Topup</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
