@extends('layouts.customer')
@section('title', 'Getting Started')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                {{-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> --}}
                <h4 class="page-title">Getting Started</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="dashboard-bg">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                <div id="rootwizard">
                    <ul class="nav nav-pills contactstab mb-3">
                        <li class="nav-item" data-target-form="#profileForm">
                            <a href="#profile" data-bs-toggle="tab" data-toggle="tab" class="nav-link pt-2 pb-2">
                                <span class="d-none d-sm-inline">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#packagesForm">
                            <a href="#packages" data-bs-toggle="tab" data-toggle="tab"  class="nav-link pt-2 pb-2">
                                <span class="d-none d-sm-inline">Packages</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#chatSettingForm">
                            <a href="#chatSetting" data-bs-toggle="tab" data-toggle="tab" class="nav-link pt-2 pb-2">
                                <span class="d-none d-sm-inline">Settings</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#walletForm">
                            <a href="#wallet" data-bs-toggle="tab" data-toggle="tab" class="nav-link pt-2 pb-2">
                                <span class="d-none d-sm-inline">Wallet</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#whatsappForm">
                            <a href="#whatsapp" data-bs-toggle="tab" data-toggle="tab" class="nav-link pt-2 pb-2">
                                <span class="d-none d-sm-inline">WhatsApp</span>
                            </a>
                        </li>
                        <li class="nav-item" data-target-form="#smsForm">
                            <a href="#sms" data-bs-toggle="tab" data-toggle="tab" class="nav-link pt-2 pb-2">
                                <span class="d-none d-sm-inline">2Way SMS</span>
                            </a>
                        </li>
                    </ul>


                    <div class="tab-content mb-0 b-0">

                        <div class="tab-pane" id="profile">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <video id="my-video" class="video-js" controls preload="auto" poster="{{ asset('assets/images/company/video-bg.png') }}" data-setup='' loop>
                                                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type='video/mp4'>
                                                </video>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                                <div class="col-xl-8 col-lg-8 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="profileForm" method="POST" action="{{ route('user.canned-responses.store') }}" class="form-horizontal">
                                                @csrf
                                                <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Company Information</h4>

                                                <div class="mb-3">
                                                    <label for="label" class="form-label">Company Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-lg" name="company_name" value="{{ old('company_name', $user->company_name) }}" 
                                                     required>
                                                     @error('company_name')
                                                     <span id="company_name-error" class="error invalid-feedback">{{ $message }}</span>
                                                     @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="label" class="form-label">Address <span class="text-danger">*</span></label>
                                                    <div class="input-group address">
                                                        <span class="input-group-text" id="basic-addon1"><img src="{{ asset('assets/images/company/icons/address-search.png') }}" width="22" height="22" /></span>
                                                        <input required type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control form-lg">
                                                        @error('address')
                                                        <span id="address-error" class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <ul class="list-inline wizard mb-0">
                                                    <li class="next list-inline-item float-end"><a href="#" class="btn btn-primary">Next</a></li>
                                                </ul>
                                            </form>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="packages">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <video id="my-video" class="video-js" controls preload="auto" poster="{{ asset('assets/images/company/package-video-bg.jpg') }}" data-setup='' loop>
                                                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type='video/mp4'>
                                                </video>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-dark">The Free trial uses a shared number
                                                for testing purposes. Messages are
                                                charged for seperately and requires
                                                fundsin your wallet.</p>

                                                <p class="text-dark">Your wallet can be topped up at
                                                    anytime and helps manage your
                                                    costs. For rates please view our
                                                    rates.</p>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                                <div class="col-xl-8 col-lg-8 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="packageForm" method="post" action="#" class="form-horizontal">
                                                <div class="row">
                                                    @if($packages && count($packages))
                                                    @foreach($packages as $package)
                                                    <div class="col-lg-6 col-12">
                                                        <div class="card text-center">
                                                            <div class="card-body">
                                                                <h4 class="text-dark fw-600 font-22 mt-0 mb-2">{{ $package->name }}</h4>
                                                                <h1 class="text-primary fw-300">${{ $package->price }}</h1>
                                                                <h5 class="text-dark fw-400 font-18 mt-0 mb-2">Per {{ $package->billing_cycle }}</h5>

                                                                <div class="planlist">
                                                                    <ul class="list-unstyled text-start">
                                                                        <li>@if($package->is_unlimited_contacts) <i class="fa-solid fa-check"></i> @else <i class="fa-solid fa-check"></i> @endif Unlimited Contacts</li>
                                                                        <li>@if($package->is_unlimited_contacts) <i class="fa-solid fa-check"></i> @else <i class="fa-solid fa-check"></i> @endif Includes Number</li>
                                                                        <li><span class="number">{{ $package->no_of_contacts }}</span> Contact Lists</li>
                                                                        <li><span class="number">{{ $package->no_of_contact_lists }}</span> Contact Lists</li>
                                                                        <li><span class="number">{{ $package->no_of_message_templates }}</span> Message Templates</li>
                                                                        <li><span class="number">{{ $package->no_of_campaign }}</span> Campaigns</li>
                                                                        <li><span class="number">{{ $package->no_of_team_agent }}</span> Team Members</li>
                                                                        <li><span class="number">{{ $package->no_of_automations }}</span> Automations</li>
                                                                    </ul>
                                                                </div>

                                                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                                                data-bs-target="#confirm-package">Select</button>
                                                            </div> <!-- end card-body -->
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    <div class="col-lg-6 col-12">
                                                        <div class="card text-center">
                                                            <div class="card-body">
                                                                <h4 class="text-dark fw-600 font-22 mt-0 mb-2">Advanced Plan</h4>
                                                                <h1 class="text-primary fw-300">$49</h1>
                                                                <h5 class="text-dark fw-400 font-18 mt-0 mb-2">Per Month</h5>

                                                                <div class="planlist">
                                                                    <ul class="list-unstyled text-start">
                                                                        <li><i class="fa-solid fa-check"></i> Unlimited Contacts</li>
                                                                        <li><i class="fa-solid fa-check"></i> Includes Number</li>
                                                                        <li><span class="number">3</span> Contact Lists</li>
                                                                        <li><span class="number">10</span> Message Templates</li>
                                                                        <li><span class="number">5</span> Campaigns</li>
                                                                        <li><span class="number">3</span> Team Members</li>
                                                                        <li><span class="number">5</span> Automations</li>
                                                                    </ul>
                                                                </div>

                                                                <button type="button" class="btn btn-primary w-100">Select</button>
                                                            </div> <!-- end card-body -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                                <ul class="list-inline wizard mb-0">
                                                    <li class="next list-inline-item float-end"><a href="#" class="btn btn-primary">Next</a></li>
                                                </ul>
                                            </form>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="chatSetting">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <video id="my-video" class="video-js" controls preload="auto" poster="{{ asset('assets/images/company/setting-video-bg.jpg') }}" data-setup='' loop>
                                                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type='video/mp4'>
                                                </video>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-pills settingtab">
                                                <li class="nav-item mb-2" data-target-form="#settingsForm">
                                                    <a href="#settings" data-bs-toggle="tab" data-toggle="tab" class="nav-link pt-2 pb-2 active">
                                                        <span class="d-none d-sm-inline">Chat Settings</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item" data-target-form="#teamPermissionForm">
                                                    <a href="#teamPermission" data-bs-toggle="tab" data-toggle="tab"  class="nav-link pt-2 pb-2">
                                                        <span class="d-none d-sm-inline">Team Permissions</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                                <div class="col-xl-8 col-lg-8 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content mb-0 b-0">
                                                <div class="tab-pane active" id="settings">
                                                    <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Chat Settings</h4>
                                                            <form id="settingsForm" method="post" action="#" class="form-horizontal">
                                                                <div class="mb-3">
                                                                    <p class="text-dark fw-400 font-16 mt-0 mb-1">Unsubscribe Trigger</p>
                                                                    <p class="text-dark fw-400 font-14">Whenever a button or a message receives this response the contact will be unsubscribed from
                                                                    future campaigns.</p>
                                                                    <input type="text" class="form-control form-lg" name="stop_promotions" placeholder="Stop Promotions"
                                                                         required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <p class="text-dark fw-400 font-16 mt-0 mb-1">Team Handover Trigger</p>
                                                                    <p class="text-dark fw-400 font-14">During any time in a conversation the user can use this phrase to exit the chatbot and connect to a
                                                                        agent.</p>
                                                                    <input type="text" class="form-control form-lg" name="human" placeholder="Human"
                                                                         required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <p class="text-dark fw-400 font-16 mt-0 mb-1">Team Handover Message</p>
                                                                    <p class="text-dark fw-400 font-14">The message that the contact will recieve when being connected to an agent.</p>
                                                                    <input type="text" class="form-control form-lg" name="team" placeholder="Connecting you to a team member"
                                                                         required>
                                                                </div>
                                                                <ul class="list-inline wizard mb-0">
                                                                    <li class="next list-inline-item float-end"><a href="#" class="btn btn-primary">Save Settings</a></li>
                                                                </ul>
                                                            </form>

                                                </div>

                                                <div class="tab-pane fade" id="teamPermission">
                                                    <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Team Permissions</h4>
                                                            <p class="text-dark fw-400 font-15 mb-1">Configure the access that team members have. If you have team members that
                                                                require more access you can grant them admin rights on the Team page</p>
                                                            <form id="teamPermissionForm" method="post" action="#" class="form-horizontal">
                                                                <div class="mb-3">
                                                                    <label for="label" class="form-label">General</label>
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                                        <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked">Enable Team Members</label>
                                                                    </div>
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1">
                                                                        <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked1">Show only assigned contacts </label>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="label" class="form-label">Contacts</label>
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked2">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked2">Add Contacts</label>
                                                                            </div>
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked3">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked3">Add Lists</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked4">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked4">Edit Contacts</label>
                                                                            </div>
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked5">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked5">Import Contacts</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked6">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked6">Delete Contacts</label>
                                                                            </div>
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked7">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked7">Export Contacts</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="label" class="form-label">Templates</label>
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked8">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked8">Add Templates</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked9">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked9">Edit Templates</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked10">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked10">Delete Templates</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="label" class="form-label">Campaigns</label>
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked11">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked11">Add Campaigns</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked12">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked12">Edit Campaigns</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked13">
                                                                                <label class="form-check-label text-dark fw-300 font-14 " for="flexSwitchCheckChecked13">Delete Campaigns</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <ul class="list-inline wizard mb-0">
                                                                    <li class="next list-inline-item float-end"><a href="#" class="btn btn-primary">Save Settings</a></li>
                                                                </ul>
                                                            </form>

                                                </div>
                                            </div>

                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="wallet">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <video id="my-video" class="video-js" controls preload="auto" poster="{{ asset('assets/images/company/topup-video-bg.jpg') }}" data-setup='' loop>
                                                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type='video/mp4'>
                                                </video>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                                <div class="col-xl-8 col-lg-8 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="walletForm" method="post" action="#" class="form-horizontal wallet">
                                                <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Topup Account</h4>
                                                <p class="text-dark fw-400 font-15">To send messages you need some credit, if you are not yet familiar with how this
                                                    works please check out our <a href="#" class="text-primary">rate card</a>.</p>
                                                <div class="row">
                                                    <div class="col-lg-7 col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Select Amount</label>
                                                            <div class="input-group mb-3">
                                                                <span class="doller">$</span>
                                                                <select class="form-select form-lg">
                                                                    <option selected>Select Amount</option>
                                                                    <option value="1">50</option>
                                                                    <option value="2">100</option>
                                                                    <option value="3">250</option>
                                                                    <option value="3">500</option>
                                                                    <option value="3">1000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-12">
                                                        <button type="button" class="btn btn-primary w-100">Topup Account</button>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </form>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="whatsapp">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <video id="my-video" class="video-js" controls preload="auto" poster="{{ asset('assets/images/company/whatsapp-video-bg.jpg') }}" data-setup='' loop>
                                                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type='video/mp4'>
                                                </video>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-pills settingtab">
                                                <li class="nav-item mb-2" data-target-form="#connectWhatsappForm">
                                                    <a href="#connectWhatsapp" data-bs-toggle="tab" data-toggle="tab" class="nav-link pt-2 pb-2 active">
                                                        <span class="d-none d-sm-inline">Connect to WhatsApp</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item" data-target-form="#completeProfileForm">
                                                    <a href="#completeProfile" data-bs-toggle="tab" data-toggle="tab"  class="nav-link pt-2 pb-2">
                                                        <span class="d-none d-sm-inline">Complete Profile</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                                <div class="col-xl-8 col-lg-8 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content mb-0 b-0">
                                                <div class="tab-pane active" id="connectWhatsapp">
                                                    <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Connect to WhatsApp</h4>
                                                            <form id="connectWhatsappForm" method="post" action="#" class="form-horizontal">
                                                                <div class="mb-2">
                                                                    <p class="text-dark fw-400 font-15">Using the WhatsApp Business API requires a connected number. Please select one of the
                                                                        options below.</p>
                                                                        <select id="connect_whatsApp" class="form-select form-lg" name="connect_to_whatsApp">
                                                                            <option selected>I need a new number to connect to WhatsApp</option>
                                                                            <option value="">one</option>
                                                                            <option value="">Two</option>
                                                                        </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <select id="select_number" class="form-select form-lg" name="select_number">
                                                                        <option selected>Please select a Number</option>
                                                                        <option value="+27791220049">+27791220049</option>
                                                                        <option value="+27791220049">+27791220049</option>
                                                                    </select>
                                                                </div>
                                                                <ul class="list-inline wizard mb-0">
                                                                    <li class="next list-inline-item float-end"><a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                                        data-bs-target="#one-time-otp">WhatsApp Setup</a></li>
                                                                </ul>
                                                            </form>

                                                </div>

                                                <div class="tab-pane fade" id="completeProfile">
                                                    <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Complete WhatsApp Profile</h4>
                                                            <p class="text-dark fw-400 font-15 mb-3">Let’s complete your WhatsApp Profile. This is the information that your contacts will see
                                                                in your conversations</p>
                                                            <form id="completeProfileForm" method="post" action="#" class="form-horizontal">
                                                                <div class="mb-3 Profile_Image">
                                                                    <label for="label" class="form-label">Profile Image</label>
                                                                    <div class="row">
                                                                        <div class="col-lg-2 col-3 pe-0">
                                                                            <div class="avatar-image" id="preview_img" width="60"
                                                                    height="60">CO</div>
                                                                        </div>
                                                                        <div class="col-lg-10 col-9 ps-0">
                                                                            <div class="choose_file">
                                                                                <div class="upload-icon">
                                                                                    <img src="{{ asset('assets/images/company/icons/upload.png') }}" alt="upload" class="me-1" width="28" height="25" />
                                                                                </div>
                                                                                <input type="file" class="form-control form-lg" id="avatar" name="avatar"
                                                                        onchange="loadPreview(this);">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="label" class="form-label">Email <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control form-lg" name="email" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="label" class="form-label">Website <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control form-lg" name="website" required>
                                                                </div>

                                                                <ul class="list-inline wizard mb-0">
                                                                    <li class="next list-inline-item float-end"><a href="#" class="btn btn-primary">Next</a></li>
                                                                </ul>
                                                            </form>

                                                </div>
                                            </div>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="sms">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <video id="my-video" class="video-js" controls preload="auto" poster="{{ asset('assets/images/company/2waysms-video-bg.jpg') }}" data-setup='' loop>
                                                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type='video/mp4'>
                                                </video>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                                <div class="col-xl-8 col-lg-8 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-dark fw-600 font-20 mt-0 mb-4">2Way SMS</h4>
                                            <p class="text-dark fw-400 font-15">Paid accounts allow sending SMS using our Shared number. For two way SMS you will
                                                require a dedicated SMS number.</p>
                                            <form id="smsForm" method="post" action="#" class="form-horizontal">
                                                <div class="mb-2">
                                                    <label for="label" class="form-label">Country</label>
                                                    <select id="select_country" class="form-select form-lg" name="select_country">
                                                        <option selected>Country</option>
                                                        <option value="United States">United States</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antartica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="East Timor">East Timor</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="France Metropolitan">France, Metropolitan</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                                        <option value="Korea">Korea, Republic of</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao">Lao People's Democratic Republic</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macau">Macau</option>
                                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                                        <option value="Moldova">Moldova, Republic of</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands">Netherlands</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russia">Russian Federation</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint LUCIA</option>
                                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                                        <option value="Span">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="St. Helena">St. Helena</option>
                                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syria">Syrian Arab Republic</option>
                                                        <option value="Taiwan">Taiwan, Province of China</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vietnam">Viet Nam</option>
                                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Serbia">Serbia</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <select id="select_number" class="form-select form-lg" name="select_number">
                                                        <option selected>Please select a Number</option>
                                                        <option value="+27791220049">+27791220049</option>
                                                        <option value="+27791220049">+27791220049</option>
                                                    </select>
                                                </div>
                                                <ul class="list-inline wizard mb-0">
                                                    <li class="next list-inline-item float-end"><a href="#" class="btn btn-primary">Skip This Step</a></li>
                                                </ul>
                                            </form>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div>
                            </div>

                        </div>



                    </div> <!-- tab-content -->




                </div>
            </div>

        </div>
    </div>

</div>

<div id="one-time-otp" class="modal TopupM fade" tabindex="-1" role="dialog"
    aria-labelledby="one-time-otpLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"><span>One Time Pin</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="label" class="form-label text-white fw-400">To validate your selected number with WhatsApp you will
                                    need a OTP.</label>
                                <input type="text" class="form-control" name="otp" id="otp"
                                    placeholder="Waiting ..." required>
                            </div>

                        </div>

                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-dark">Refresh</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div id="confirm-package" class="modal TopupM fade" tabindex="-1" role="dialog"
    aria-labelledby="confirm-packageLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"><img src="{{ asset('assets/images/company/icons/info-w.png') }}"
                    alt="Confirm Package" class="me-1" width="34"
                    height="34" /> <span>Confirm Package</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="mb-3">
                            <p class="text-white fw-400 font-15">Please note that the Trial Package doer not include all available functionality. Using this package will limit your account to only using our shared WhatsApp account.</p>
                        </div>

                        <div class="mb-3">
                            <p class="text-white fw-400 font-15">Additional limitations include:</p>
                        </div>

                        <div class="mb-3">
                            <p class="text-white fw-400 font-15 mb-1">1. One Contact List</p>
                            <p class="text-white fw-400 font-15 mb-1">2. One WhatsApp Template</p>
                            <p class="text-white fw-400 font-15 mb-1">3. One Campaign using the Template</p>
                            <p class="text-white fw-400 font-15 mb-1">4. One Automation</p>
                            <p class="text-white fw-400 font-15 mb-1">5. Total of 10 Messages</p>
                        </div>

                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-light">Confirm</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id)
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
