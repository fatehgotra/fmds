@extends('layouts.admin')
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

    <div class="dashboard-bg">
        <div class="row">
            <div class="col-xl-3 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <div class="float-end">
                            <svg width="32" height="32" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#9db2eb">
                                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M16 7.992C16 3.58 12.416 0 8 0S0 3.58 0 7.992c0 2.43 1.104 4.62 2.832 6.09.016.016.032.016.032.032.144.112.288.224.448.336.08.048.144.111.224.175A7.98 7.98 0 0 0 8.016 16a7.98 7.98 0 0 0 4.48-1.375c.08-.048.144-.111.224-.16.144-.111.304-.223.448-.335.016-.016.032-.016.032-.032 1.696-1.487 2.8-3.676 2.8-6.106zm-8 7.001c-1.504 0-2.88-.48-4.016-1.279.016-.128.048-.255.08-.383a4.17 4.17 0 0 1 .416-.991c.176-.304.384-.576.64-.816.24-.24.528-.463.816-.639.304-.176.624-.304.976-.4A4.15 4.15 0 0 1 8 10.342a4.185 4.185 0 0 1 2.928 1.166c.368.368.656.8.864 1.295.112.288.192.592.24.911A7.03 7.03 0 0 1 8 14.993zm-2.448-7.4a2.49 2.49 0 0 1-.208-1.024c0-.351.064-.703.208-1.023.144-.32.336-.607.576-.847.24-.24.528-.431.848-.575.32-.144.672-.208 1.024-.208.368 0 .704.064 1.024.208.32.144.608.336.848.575.24.24.432.528.576.847.144.32.208.672.208 1.023 0 .368-.064.704-.208 1.023a2.84 2.84 0 0 1-.576.848 2.84 2.84 0 0 1-.848.575 2.715 2.715 0 0 1-2.064 0 2.84 2.84 0 0 1-.848-.575 2.526 2.526 0 0 1-.56-.848zm7.424 5.306c0-.032-.016-.048-.016-.08a5.22 5.22 0 0 0-.688-1.406 4.883 4.883 0 0 0-1.088-1.135 5.207 5.207 0 0 0-1.04-.608 2.82 2.82 0 0 0 .464-.383 4.2 4.2 0 0 0 .624-.784 3.624 3.624 0 0 0 .528-1.934 3.71 3.71 0 0 0-.288-1.47 3.799 3.799 0 0 0-.816-1.199 3.845 3.845 0 0 0-1.2-.8 3.72 3.72 0 0 0-1.472-.287 3.72 3.72 0 0 0-1.472.288 3.631 3.631 0 0 0-1.2.815 3.84 3.84 0 0 0-.8 1.199 3.71 3.71 0 0 0-.288 1.47c0 .352.048.688.144 1.007.096.336.224.64.4.927.16.288.384.544.624.784.144.144.304.271.48.383a5.12 5.12 0 0 0-1.04.624c-.416.32-.784.703-1.088 1.119a4.999 4.999 0 0 0-.688 1.406c-.016.032-.016.064-.016.08C1.776 11.636.992 9.91.992 7.992.992 4.14 4.144.991 8 .991s7.008 3.149 7.008 7.001a6.96 6.96 0 0 1-2.032 4.907z" />
                                </g>
                            </svg>
                        </div>
                        <h4 class="text-capitalize mt-0 text-dark">Users</h4>
                        <h2 class="my-2 text-primary mb-1" id="Contacts">280</h2>
                        <p>8 new this month</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <div class="float-end">
                            <svg fill="#9db2eb" width="32" height="32" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M16.03,18.616l5.294-4.853a1,1,0,0,1,1.352,1.474l-6,5.5a1,1,0,0,1-1.383-.03l-3-3a1,1,0,0,1,1.414-1.414ZM1,20a9.01,9.01,0,0,1,5.623-8.337A4.981,4.981,0,1,1,10,13a7.011,7.011,0,0,0-6.929,6H10a1,1,0,0,1,0,2H2A1,1,0,0,1,1,20ZM7,8a3,3,0,1,0,3-3A3,3,0,0,0,7,8Z" />
                                </g>
                            </svg>
                        </div>
                        <h4 class="text-capitalize mt-0 text-dark">Applications</h4>
                        <h2 class="my-2 text-primary mb-1" id="Contacts">200</h2>
                        <p>10 new this month</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <div class="float-end">
                            <svg fill="#9db2eb" width="32" height="32" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M16.03,18.616l5.294-4.853a1,1,0,0,1,1.352,1.474l-6,5.5a1,1,0,0,1-1.383-.03l-3-3a1,1,0,0,1,1.414-1.414ZM1,20a9.01,9.01,0,0,1,5.623-8.337A4.981,4.981,0,1,1,10,13a7.011,7.011,0,0,0-6.929,6H10a1,1,0,0,1,0,2H2A1,1,0,0,1,1,20ZM7,8a3,3,0,1,0,3-3A3,3,0,0,0,7,8Z" />
                                </g>
                            </svg>
                        </div>
                        <h4 class="text-capitalize mt-0 text-dark">Approved Applications</h4>
                        <h2 class="my-2 text-primary mb-1" id="Contacts">180</h2>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <div class="float-end">
                            <svg fill="#9db2eb" width="32" height="32" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M16.03,18.616l5.294-4.853a1,1,0,0,1,1.352,1.474l-6,5.5a1,1,0,0,1-1.383-.03l-3-3a1,1,0,0,1,1.414-1.414ZM1,20a9.01,9.01,0,0,1,5.623-8.337A4.981,4.981,0,1,1,10,13a7.011,7.011,0,0,0-6.929,6H10a1,1,0,0,1,0,2H2A1,1,0,0,1,1,20ZM7,8a3,3,0,1,0,3-3A3,3,0,0,0,7,8Z" />
                                </g>
                            </svg>
                        </div>
                        <h4 class="text-capitalize mt-0 text-dark">Rejected Applications</h4>
                        <h2 class="my-2 text-primary mb-1" id="Contacts">20</h2>

                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <div class="float-end">
                            <svg fill="none" height="22" viewBox="0 0 40 40" width="22" xmlns="http://www.w3.org/2000/svg">
                                <g clip-rule="evenodd" fill="currentColor" fill-rule="evenodd">
                                    <path d="m6.32764 19.6443c-.05522.0552-.07764.1185-.07764.1724v5.5c0 .9596.79035 1.75 1.74998 1.75h2.16662c.143 0 .2501-.1071.2501-.25v-7c0-.1353-.1161-.25-.2501-.25h-3.66656c-.05392 0-.11719.0224-.1724.0776zm-2.57764.1724c0-1.5071 1.24307-2.75 2.75004-2.75h3.66656c1.5327 0 2.7501 1.2519 2.7501 2.75v7c0 1.5237-1.2264 2.75-2.7501 2.75h-2.16662c-2.34037 0-4.24998-1.9097-4.24998-4.25z"></path>
                                    <path d="m20 6.23334c-5.7596 0-10.41667 4.65706-10.41667 10.41666v1.6833c0 .6904-.55964 1.25-1.25 1.25-.69035 0-1.25-.5596-1.25-1.25v-1.6833c0-7.14035 5.77627-12.91666 12.91667-12.91666s12.9167 5.77631 12.9167 12.91666v1.6667c0 .6903-.5597 1.25-1.25 1.25-.6904 0-1.25-.5597-1.25-1.25v-1.6667c0-5.7596-4.6571-10.41666-10.4167-10.41666z"></path>
                                    <path d="m31.7462 27.0912c.6769.1359 1.1153.7948.9794 1.4716-.8817 4.3892-4.7521 7.6872-9.3923 7.6872h-1.6666c-.6904 0-1.25-.5596-1.25-1.25s.5596-1.25 1.25-1.25h1.6666c3.4265 0 6.2896-2.4354 6.9412-5.6795.136-.6768.7949-1.1153 1.4717-.9793z"></path>
                                    <path d="m29.661 19.6443c-.0552.0552-.0777.1185-.0777.1724v7c0 .1353.1161.25.2501.25h2.0833c1.0096 0 1.8333-.8237 1.8333-1.8334v-5.4166c0-.1353-.116-.25-.25-.25h-3.6666c-.0539 0-.1172.0224-.1724.0776zm-2.5777.1724c0-1.5071 1.2431-2.75 2.7501-2.75h3.6666c1.5326 0 2.75 1.2519 2.75 2.75v5.4166c0 2.3904-1.9429 4.3334-4.3333 4.3334h-2.0833c-1.5327 0-2.7501-1.252-2.7501-2.75z"></path>
                                </g>
                            </svg>
                        </div>
                        <h4 class="text-capitalize mt-0 text-dark">Departments</h4>
                        <h2 class="my-2 text-primary mb-1" id="Contacts">5</h2>

                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <div class="float-end">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" width="32" height="32" fill="#9db2eb">
                                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                <g id="SVGRepo_iconCarrier">
                                    <line style="fill:none;stroke:#9db2eb;stroke-width:2;stroke-miterlimit:10;" x1="16" y1="4" x2="16" y2="28" />
                                    <path style="fill:none;stroke:#9db2eb;stroke-width:2;stroke-miterlimit:10;" d="M10,19v1.639C10,23.048,11.952,25,14.361,25h3.279 C20.048,25,22,23.048,22,20.639v0c0-2.107-1.507-3.913-3.581-4.29l-3.839-0.698C12.507,15.274,11,13.468,11,11.361v0 C11,8.952,12.952,7,15.361,7h1.279C19.048,7,21,8.952,21,11.361V13" />
                                </g>
                            </svg>
                        </div>
                        <h4 class="text-capitalize mt-0 text-dark">Payments</h4>
                        <h2 class="my-2 text-primary mb-1" id="Contacts">$30000</h2>

                    </div>
                </div>
            </div>



            <div class="col-xl-3 col-12">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <div class="float-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024">
                                <path fill="#9db2eb" d="M512 0C229.232 0 0 229.232 0 512s229.232 512 512 512s512-229.232 512-512S794.768 0 512 0zm128 82.976c144.224 42.992 257.648 156.8 300.704 301.023H733.136A257.472 257.472 0 0 0 640 290.943zm63.633 429.232c0 105.936-85.792 191.808-191.632 191.808s-191.632-85.872-191.632-191.808s85.808-191.823 191.632-191.823s191.632 85.888 191.632 191.823zM448.001 68.928c20.912-2.992 42.256-4.624 64-4.624c21.727 0 43.088 1.632 64 4.624v195.808c-20.48-5.296-41.856-8.4-64-8.4s-43.504 3.104-64 8.4V68.928zm-64 14.048v207.968c-38.56 22.384-70.72 54.544-93.136 93.056H83.297c43.04-144.224 156.48-258.031 300.704-301.024zM64.305 512.159c0-21.824 1.855-43.169 4.88-64.161h195.392c-5.312 20.512-8.24 41.983-8.24 64.176c0 22.064 2.912 43.425 8.16 63.825H69.137c-2.975-20.88-4.832-42.144-4.832-63.84zM384 941.326C239.664 898.318 126.193 784.35 83.201 639.998h207.472c22.432 38.656 54.655 70.945 93.327 93.393v207.936zm192.001 14.047c-20.912 2.992-42.273 4.624-64 4.624c-21.744 0-43.088-1.648-64-4.624V759.597c20.496 5.296 41.856 8.4 64 8.4s43.52-3.104 64-8.4v195.776zm64-14.048V733.39c38.656-22.448 70.897-54.736 93.313-93.392h207.472c-42.993 144.336-156.464 258.32-300.784 301.328zm119.504-365.327c5.248-20.4 8.16-41.76 8.16-63.825c0-22.193-2.928-43.664-8.256-64.176h195.408c3.008 20.992 4.88 42.336 4.88 64.16c0 21.697-1.84 42.977-4.832 63.841h-195.36z"></path>
                            </svg>
                        </div>
                        <h4 class="text-capitalize mt-0 text-dark">Tickets</h4>
                        <h2 class="my-2 text-primary mb-1" id="Contacts">0</h2>
                        <p>Open Tickets</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4 dashboardClient">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-6 align-self-center ps-1">
                    <h3 class="text-dark fw-medium mt-1 mb-1">New Applications</h3>
                </div>
            </div>
        </div>
        <div class="Ctable-responsive">
            <table class="table table-centered w-100 dt-responsive">
                <thead class="table-light">
                    <tr>
                        <th>Added</th>
                        <th>Form</th>
                        <th>Applicant</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>29/06/2024</td>
                        <td>Application for Registration & Practice License (Internship)</td>
                        <td>Lara suez</td>
                        <td>$200.00</td>
                        <td class="text-center"><button class="btn btn-primary btn-sm">In review</button></td>
                        <td class="table-action text-end">

                            <div class="dropdown float-end">
                                <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/company/icons/more.png') }}" alt="smile" class="img-fluid" width="24" height="24">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">View</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Forward</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Approve</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Reject</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div> <!-- container -->
@endsection