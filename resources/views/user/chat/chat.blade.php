@extends('layouts.customer')
@section('title', 'Chat')
@section('content')
<link href="{{ asset('assets/css/custom2.css') }}" rel="stylesheet" />
<style type="text/css">
    .border-green {
        border: 1px solid #23cd61;
    }

    .border-black {
        border: 1px solid black;
    }

</style>

    <div class="container-fluid mt-3 ChatScreen">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    {{-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div> --}}
                    {{-- <h4 class="page-title">Chat</h4> --}}
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-9 col-12 p-0">
                <div class="dashboard-bg chat-bg" style="background-image: url('{{ asset('assets/images/company/chatBG.png') }}')">
                    <div class="row">
                        <!-- start chat users-->
                        <div class="col-xl-4 col-12 pe-0">
                            <div class="card chatcardleft">
                                <div class="card-body p-0">

                                    <div class="tab-content">
                                        <div class="tab-pane show active p-0" id="newpost">
                                            <div class="create-new">
                                                <a href="{{ route('user.chat.create') }}">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 16 16">
                                                            <path fill="#3949b8" fill-rule="evenodd"
                                                                d="M8 1.75a.75.75 0 0 1 .75.75v4.75h4.75a.75.75 0 0 1 0 1.5H8.75v4.75a.75.75 0 0 1-1.5 0V8.75H2.5a.75.75 0 0 1 0-1.5h4.75V2.5A.75.75 0 0 1 8 1.75"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <h4 >Create New</a></h4>
                                                </a>
                                            </div>
                                            <div class="title-chat">
                                                <h4 class="page-title">Chat</h4>
                                                <div class="notify-btn">
                                                    <button type="button" class="btn btn-primary">All <span
                                                            class="counter">{{ $all_messages }}</span></button>
                                                            @if( !checkAccess('Show only assigned contacts') || loginUser()->getTable() == 'customers' ||  loginUser()->is_admin == '1')
                                                            <button type="button" class="btn btn-light">Mine <span
                                                            class="counter">{{ $mine_messages }}</span></button>
                                                            @endif

                                                    <button type="button" class="btn btn-light">New <span
                                                            class="counter"> {{ $new_messages }} </span></button>
                                                </div>
                                            </div>

                                            <!-- start search box -->
                                            <div class="app-search">
                                                <form>
                                                    <div class="mb-2 position-relative">
                                                        <input type="text" id="chat-search" class="form-control" placeholder="Search Name" />
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end search box -->

                                            <!-- users -->
                                            <div class="row">
                                                <div class="col">
                                                    <div data-simplebar class="chat-listing" style="max-height: 290px">

                                                        @if($chats && count($chats))
                                                        @foreach($chats as $chat)

                                                        <a href="{{ route('user.chat.show', $chat->id) }}" class="text-body">
                                                            <div class="d-flex align-items-start p-2">
                                                                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                                                    class="me-2 rounded-circle @if($chat->chat_type == 'whatsapp') border-green @else border-black @endif" height="48" alt="John James" />
                                                                <div class="w-100 overflow-hidden">
                                                                    <h5 class="mt-0 mb-0 font-14 text-dark">
                                                                        {{ $chat->name }}
                                                                    </h5>
                                                                    <p class="pt-1 mb-0 text-muted font-13">

                                                                        @if($chat->unreadMessages->count() > 0)

                                                                        <span class="w-25 float-end text-end">
                                                                            <span class="user-online"></span>
                                                                        </span>

                                                                        @else

                                                                        <span class="w-25 float-end text-end">
                                                                            <span class="user-offline"></span>
                                                                        </span>

                                                                        @endif

                                                                        <span class="w-75">{{ $chat->updated_at->diffForHumans() }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end chat users-->


                        <div class="col-xl-8 col-12 ps-0">
                            <div class="card cartchat">
                                <div class="card-body pb-0 pe-0">
                                    {{-- <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">View full</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Edit Contact Info</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Remove</a>
                                    </div>
                                </div> --}}
                                    <div class="chat-user mb-3">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-md">
                                                            <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                                                alt="shreyu" class="img-thumbnail avatar-md rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <div class="user-left-sec">
                                                                <h4 class="text-dark">Abraham Jacobs</h4>
                                                                <button class="btn btn-success btn-sm mt-1">12 hours left to
                                                                    reply</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-sm-4 d-flex align-items-end">
                                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                                    <div class="user-right-icon">
                                                        <img src="{{ asset('assets/images/icon-2.png') }}" alt=""
                                                            class="img-fluid" />
                                                        <img src="{{ asset('assets/images/icon-1.png') }}" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                </div>
                                            </div> <!-- end col-->
                                        </div>
                                    </div>



                                    <div class="whatsApp-chat mt-5">
                                        {{-- <p class="chatDate">Wednesday 14 Aug, 2024</p> --}}
                                        <div class="mb-1 start-chat-icon mb-2">
                                            <img src="{{ asset('assets/images/company/icons/chat.png') }}" class="icon" width="24" height="24">
                                        </div>
                                        <h4 class="start-chat-text">Please select user to start chat</h4>
                                        {{-- <ul class="conversation-list" data-simplebar style="max-height: 637px;padding: 0;padding-right: 5px;">
                                            <p class="chatDate">Wednesday 14 Aug, 2024</p>
                                            <li class="clearfix">
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">

                                                        <p>
                                                            Please select user to start chat
                                                        </p>
                                                    </div>
                                                </div>




                                        </ul> --}}
                                    </div>
                                    <!-- end row -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div>



                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="card chatcardright">
                    <div class="card-body">
                        <div class="accordion custom-accordion" id="custom-accordion-one">
                            <div class="card mb-2">
                                <div class="card-header Company-Owner" id="headingFour">
                                    <div class="userPlace">CO</div>
                                    <h5 class="m-0">
                                        <a class="custom-accordion-title d-block"
                                            data-bs-toggle="collapse" href="#collapseFour"
                                            aria-expanded="true" aria-controls="collapseFour">
                                             Company Owner <i
                                                class="mdi mdi-chevron-down"></i>
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseFour" class="collapse"
                                    aria-labelledby="headingFour"
                                    data-bs-parent="#custom-accordion-one">
                                    <div class="card-body">
                                        ...
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" id="headingFive">
                                    <div class="ac-icon">
                                        <img src="{{ asset('assets/images/company/icons/Contact-W.png') }}" height="20" alt="Contact" />
                                    </div>
                                    <h5 class="m-0">
                                        <a class="custom-accordion-title collapsed d-block py-1"
                                            data-bs-toggle="collapse" href="#collapseFive"
                                            aria-expanded="false" aria-controls="collapseFive">
                                            Contact Information
                                            {{-- <i class="mdi mdi-plus accordion-arrow"></i> --}}
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFive" class="collapse"
                                    aria-labelledby="headingFive"
                                    data-bs-parent="#custom-accordion-one">
                                    <div class="card-body">
                                        <div class="information">
                                            <div class="form-group">
                                                <label for="label" class="form-label">Name</label>
                                                <p>Abraham Jacobs</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="label" class="form-label">Contact Number</label>
                                                <p>+27791220049</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="label" class="form-label">Email Address</label>
                                                <p>email@address.com</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="label" class="form-label">Birthdate</label>
                                                <p>1981/08/21</p>
                                            </div>
                                            <div class="mb-2">
                                                <button type="button" class="btn btn-light w-100">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" id="headingSix">
                                    <div class="ac-icon">
                                        <img src="{{ asset('assets/images/company/icons/Reminders-W.png') }}" height="20" alt="Reminders" />
                                    </div>
                                    <h5 class="m-0">
                                        <a class="custom-accordion-title collapsed d-block py-1"
                                            data-bs-toggle="collapse" href="#collapseSix"
                                            aria-expanded="false" aria-controls="collapseSix">
                                            Reminders
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                    data-bs-parent="#custom-accordion-one">
                                    <div class="card-body">
                                        <div class="reminder">
                                            <div class="reminder-list">
                                                <p>Follow Up</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                                    <path fill="#ffffff" d="M4 5v-.8C4 1.88 5.79 0 8 0s4 1.88 4 4.2V5h1.143c.473 0 .857.448.857 1v9c0 .552-.384 1-.857 1H2.857C2.384 16 2 15.552 2 15V6c0-.552.384-1 .857-1zM3 15h10V6H3zm5.998-3.706L9.5 12.5h-3l.502-1.206A1.644 1.644 0 0 1 6.5 10.1c0-.883.672-1.6 1.5-1.6s1.5.717 1.5 1.6c0 .475-.194.901-.502 1.194M11 4.36C11 2.504 9.657 1 8 1S5 2.504 5 4.36V5h6z"/>
                                                </svg>
                                            </div>
                                            <div class="reminder-list">
                                                <p>Wedding Anniversary</p>
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-light w-100" data-bs-toggle="modal"
                                            data-bs-target="#add-reminder">Add Reminder</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" id="headingSeven">
                                    <div class="ac-icon">
                                        <img src="{{ asset('assets/images/company/icons/Canned-w.png') }}" height="20" alt="Canned" />
                                    </div>
                                    <h5 class="m-0">
                                        <a class="custom-accordion-title collapsed d-block py-1"
                                            data-bs-toggle="collapse" href="#collapseSeven"
                                            aria-expanded="false" aria-controls="collapseSeven">
                                            Canned Responses
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseSeven" class="collapse"
                                    aria-labelledby="headingSeven"
                                    data-bs-parent="#custom-accordion-one">
                                    <div class="card-body">
                                        <div class="reminder canned">
                                            <div class="reminder-list">
                                                <p>Church Information</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                                    <path fill="#ffffff" d="M4 5v-.8C4 1.88 5.79 0 8 0s4 1.88 4 4.2V5h1.143c.473 0 .857.448.857 1v9c0 .552-.384 1-.857 1H2.857C2.384 16 2 15.552 2 15V6c0-.552.384-1 .857-1zM3 15h10V6H3zm5.998-3.706L9.5 12.5h-3l.502-1.206A1.644 1.644 0 0 1 6.5 10.1c0-.883.672-1.6 1.5-1.6s1.5.717 1.5 1.6c0 .475-.194.901-.502 1.194M11 4.36C11 2.504 9.657 1 8 1S5 2.504 5 4.36V5h6z"/>
                                                </svg>
                                            </div>
                                            <div class="reminder-list">
                                                <p>Special Prayer</p>
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-light w-100" data-bs-toggle="modal"
                                            data-bs-target="#standard-modal">Add Response</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-2">
                                <div class="card-header" id="headingEight">
                                    <div class="ac-icon">
                                        <img src="{{ asset('assets/images/company/icons/Templates-W.png') }}" height="20" alt="Templates" />
                                    </div>
                                    <h5 class="m-0">
                                        <a class="custom-accordion-title collapsed d-block py-1"
                                            data-bs-toggle="collapse" href="#collapseEight"
                                            aria-expanded="false" aria-controls="collapseEight">
                                            Templates
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseEight" class="collapse"
                                    aria-labelledby="headingEight"
                                    data-bs-parent="#custom-accordion-one">
                                    <div class="card-body">
                                        <div class="reminder templates">
                                            <div class="reminder-list">
                                                <p>Hello</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                                    <path fill="#ffffff" d="M4 5v-.8C4 1.88 5.79 0 8 0s4 1.88 4 4.2V5h1.143c.473 0 .857.448.857 1v9c0 .552-.384 1-.857 1H2.857C2.384 16 2 15.552 2 15V6c0-.552.384-1 .857-1zM3 15h10V6H3zm5.998-3.706L9.5 12.5h-3l.502-1.206A1.644 1.644 0 0 1 6.5 10.1c0-.883.672-1.6 1.5-1.6s1.5.717 1.5 1.6c0 .475-.194.901-.502 1.194M11 4.36C11 2.504 9.657 1 8 1S5 2.504 5 4.36V5h6z"/>
                                                </svg>
                                            </div>
                                            <div class="reminder-list">
                                                <p>Checking In</p>
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-light w-100">Add Template</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" id="headingNine">
                                    <div class="ac-icon">
                                        <img src="{{ asset('assets/images/company/icons/Tags-W.png') }}" height="20" alt="Tags" />
                                    </div>
                                    <h5 class="m-0">
                                        <a class="custom-accordion-title collapsed d-block py-1"
                                            data-bs-toggle="collapse" href="#collapseNine"
                                            aria-expanded="false" aria-controls="collapseNine">
                                            Tags
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseNine" class="collapse"
                                    aria-labelledby="headingNine"
                                    data-bs-parent="#custom-accordion-one">
                                    <div class="card-body">
                                        <div class="reminder tags">
                                            <div class="reminder-list">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Youth
                                                    </label>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                                    <path fill="#ffffff" d="M4 5v-.8C4 1.88 5.79 0 8 0s4 1.88 4 4.2V5h1.143c.473 0 .857.448.857 1v9c0 .552-.384 1-.857 1H2.857C2.384 16 2 15.552 2 15V6c0-.552.384-1 .857-1zM3 15h10V6H3zm5.998-3.706L9.5 12.5h-3l.502-1.206A1.644 1.644 0 0 1 6.5 10.1c0-.883.672-1.6 1.5-1.6s1.5.717 1.5 1.6c0 .475-.194.901-.502 1.194M11 4.36C11 2.504 9.657 1 8 1S5 2.504 5 4.36V5h6z"/>
                                                </svg>
                                            </div>
                                            <div class="reminder-list">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                                    <label class="form-check-label" for="flexCheckDefault1">
                                                        Retired
                                                    </label>
                                                </div>
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-light w-100">Add Tag</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" id="headingTen">
                                    <div class="ac-icon">
                                        <img src="{{ asset('assets/images/company/icons/Notes-w.png') }}" height="20" alt="Notes" />
                                    </div>
                                    <h5 class="m-0">
                                        <a class="custom-accordion-title collapsed d-block py-1"
                                            data-bs-toggle="collapse" href="#collapseTen"
                                            aria-expanded="false" aria-controls="collapseTen">
                                            Notes
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseTen" class="collapse"
                                    aria-labelledby="headingTen"
                                    data-bs-parent="#custom-accordion-one">
                                    <div class="card-body">
                                        <div class="Notes">
                                            <div class="Note-list">
                                                <p>This is a important note created by an admin</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                                    <path fill="#111111" d="M4 5v-.8C4 1.88 5.79 0 8 0s4 1.88 4 4.2V5h1.143c.473 0 .857.448.857 1v9c0 .552-.384 1-.857 1H2.857C2.384 16 2 15.552 2 15V6c0-.552.384-1 .857-1zM3 15h10V6H3zm5.998-3.706L9.5 12.5h-3l.502-1.206A1.644 1.644 0 0 1 6.5 10.1c0-.883.672-1.6 1.5-1.6s1.5.717 1.5 1.6c0 .475-.194.901-.502 1.194M11 4.36C11 2.504 9.657 1 8 1S5 2.504 5 4.36V5h6z"/>
                                                </svg>
                                            </div>
                                            <div class="Note-list">
                                                <p>@Company Owner this is a mention</p>
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-2">
                                            <button type="button" class="btn btn-light w-100">New Note</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div id="standard-modal" class="modal TopupM fade" tabindex="-1" role="dialog"
        aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-white"> <img src="{{ asset('assets/images/company/icons/Canned-w.png') }}" height="38" alt="Canned" /> <span>Add Canned Response</span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Title" required>
                          </div>
                          <div class="mb-3">
                            <div class="message">
                                <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                                <div class="btn-group">

                                    <a href="#" class="btn btn-link">
                                        <img src="{{ asset('assets/images/company/icons/smile.png') }}"
                                            alt="smile" class="img-fluid" width="18"
                                            height="18" />
                                    </a>
                                    <a href="#" class="btn btn-link">
                                        <img src="{{ asset('assets/images/company/icons/image.png') }}"
                                            alt="image" class="img-fluid" width="18"
                                            height="18" />
                                    </a>
                                    <a href="#" class="btn btn-link">
                                        <img src="{{ asset('assets/images/company/icons/attach-paperclip.png') }}"
                                            alt="attach-paperclip" class="img-fluid"
                                            width="17" height="17" />
                                    </a>
                                    <a href="#" class="btn btn-link">
                                        <img src="{{ asset('assets/images/company/icons/mic.png') }}"
                                            alt="mic" class="img-fluid" width="18"
                                            height="18" />
                                    </a>
                                    <a href="#" class="btn btn-link">
                                        <img src="{{ asset('assets/images/company/icons/video-camera.png') }}"
                                            alt="video camera" class="img-fluid" width="18"
                                            height="18" />
                                    </a>
                                    <a href="#" class="btn btn-link">
                                        <img src="{{ asset('assets/images/company/icons/ai-technology.png') }}"
                                            alt="ai technology" class="img-fluid" width="18"
                                            height="18" />
                                    </a>

                                </div>

                            </div>

                          </div>
                        <div class="mt-3 text-end">
                            <button type="button" class="btn btn-dark">Add</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="add-reminder" class="modal TopupM fade" tabindex="-1" role="dialog" aria-labelledby="add-reminderLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-white"><img src="{{ asset('assets/images/company/icons/add-bell-w.png') }}"
                            alt="Add Reminder" class="me-1" width="30" height="30" /> <span>Add Reminder</span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="modal-form">
                            <div class="mb-3">
                                <input type="text" class="form-control form-lg" name="reminder" id="reminder" placeholder="Reminder" required>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-12 mb-3">
                                        <div class="input-group date" data-provide="datepicker">
                                            <span class="input-group-addon">
                                                <img src="{{ asset('assets/images/company/icons/calendar.png') }}"
                                                    alt="smile" class="img-fluid" width="24"
                                                    height="24" /></span>
                                            <input type="text" class="form-control form-lg customdate" name="birthdate">

                                        </div>
                                </div>
                                <div class="col-sm-6 col-12 mb-3">
                                    <div class='input-group timeP' id='datetimepicker2'>
                                        <input type='time' class="form-control form-lg customdate" />
                                      </div>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-12 mb-3">
                                    <div class="Trigger">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                            <input type="hidden" name="automation" value="0">
                                            <label class="form-check-label text-white fw-300 font-14 " for="flexSwitchCheckChecked">Repeat this reminder</label>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 mb-3">
                                    <div class="Trigger">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked>
                                            <input type="hidden" name="automation" value="0">
                                            <label class="form-check-label text-white fw-300 font-14 " for="flexSwitchCheckChecked1">Global Reminder </label>
                                        </div>
                                        <i class="fa-solid fa-circle-question text-white font-16" data-bs-toggle="tooltip" data-placement="right" title="Global reminders are applied to all contacts"></i>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12 mb-3">
                                    <select id="once" class="form-select form-lg" name="once">
                                        <option selected>Once</option>
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="annually">Annually</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12 mb-3">
                                        <div class="input-group date" data-provide="datepicker">
                                            <span class="input-group-addon">
                                                <img src="{{ asset('assets/images/company/icons/calendar.png') }}"
                                                    alt="smile" class="img-fluid" width="24"
                                                    height="24" /></span>
                                            <input type="text" class="form-control form-lg customdate" name="birthdate">

                                        </div>
                                </div>

                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-dark">Add</button>
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
    $(function () {
    $('#datetimepicker2').datetimepicker({
        format: 'HH:mm'
    });
});
</script>
    <script>
        $(document).ready(function() {
            $("#whatsappBtn").click(function() {
                $(".Sms-chat").css("display", "block");
                $(".whatsApp-chat").css("display", "none");
            });
            $("#SmsBtn").click(function() {
                $(".whatsApp-chat").css("display", "block");
                $(".Sms-chat").css("display", "none");
            });
        });

    </script>

    <script type="text/javascript">
        $(".user-chats").scrollTop($(".user-chats > .chats").height());

        $("#chat-search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log('value', value);
            if(value!=""){
                $(".chat-listing a").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            }
            else{
                $(".simplebar-content a").show();
            }
        });
    </script>
@endpush
