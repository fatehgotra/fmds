@extends('layouts.customer')
@section('title', 'Chat')
@section('content')
<link href="{{ asset('assets/css/custom2.css') }}" rel="stylesheet" />
<style type="text/css">
    .border-green {
        border: 1px solid green;
    }

    .border-black {
        border: 1px solid black;
    }

</style>


<div id="chatList" class="container-fluid mt-4 create_new_c">
    <div class="row">
        <div class="col-xl-9 col-12 p-0">
            <div class="dashboard-bg create chat-bg" style="background-image: url('{{ asset('assets/images/company/chatBG.png') }}')">
                <div class="row">
                    <div class="col-lg-4 col-12 pe-0 m_left">
                        <div class="mb-0 mb-lg-0">
                            <div class="p-0 d-flex flex-column">
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
                                                <h4 >Create New</h4>
                                            </a>
                                        </div>
                                        <div class="title-chat">
                                            <h4 class="page-title">Chat</h4>
                                            {{-- <div class="notify-btn">
                                                <button type="button" class="btn btn-primary">All <span
                                                        class="counter">{{ $all_messages }}</span></button>
                                                <button type="button" class="btn btn-light">Mine <span
                                                        class="counter">{{ $mine_messages }}</span></button>
                                                <button type="button" class="btn btn-light">New <span
                                                        class="counter"> {{ $new_messages }} </span></button>
                                            </div> --}}


                                            <ul role="tablist" class="notify-btn nav nav-pills nav-justified">
                                                <li role="presentation" class="nav-item">
                                                    <a role="tab" href="#"
                                                        class="btn btn-primary me-1">
                                                        All <span class="counter">0</span></a>
                                                </li>
                                                @if( !checkAccess('Show only assigned contacts') )
                                                <li role="presentation" class="nav-item">
                                                    <a role="tab" href="#" class="btn btn-light me-1">
                                                        Mine <span
                                                            class="counter">0</span></a>
                                                </li>
                                                @endif
                                                <li role="presentation" class="nav-item"><a role="tab"
                                                        href="#" class="btn btn-light">
                                                        New <span class="counter">0 </span></a>
                                                </li>
                                            </ul>
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
                                                <div class="chat-listing">

                                                    @if($contacts && count($contacts))
                                                    @foreach($contacts as $contact)

                                                    <a href="javascript:void(0)" class="text-body">
                                                        <div class="d-flex align-items-start p-2">
                                                            <div class="w-100 overflow-hidden ms-1">
                                                                <h5 class="mt-0 mb-0 font-14 text-dark select-contact" data-contact-number="{{ $contact->id }}" >
                                                                    {{ $contact->name }}
                                                                </h5>
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
                        </div>
                    </div>
                    <div id="chatAndTools" class="col-lg-8 col-12 m_right" style="">
                        <div class="chat-user mb-3">

                        </div>
                        <div class="theChatHolder" id="theChatHolder">

                            <div id="chatMessages" class="scrollable-div">
                                <div class="whatsApp-chat mt-5">
                                    <div class="mb-1 start-chat-icon mb-2">
                                        <img src="{{ asset('assets/images/company/icons/chat.png') }}" class="icon" width="24" height="24">
                                    </div>
                                    <h4 class="start-chat-text">Please select contact to start chat</h4>
                                    {{-- <ul class="conversation-list" data-simplebar style="max-height: 637px;padding: 0;padding-right: 5px;">
                                        <li class="clearfix">
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <p>
                                                    Please select contact to start chat
                                                    </p>
                                                </div>
                                                <div class="time">
                                                </div>
                                            </div>
                                        </li>
                                    </ul> --}}
                                </div>
                                <div class="Sms-chat" style="display: none">
                                    <ul class="conversation-list" data-simplebar style="max-height: 637px;padding: 0;padding-right: 5px;">
                                        <p class="chatDate">Wednesday 14 Aug, 2024</p>
                                        <li class="clearfix sms">
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">

                                                    <p>
                                                        This is a SMS from the contact
                                                    </p>
                                                </div>
                                                <div class="time">
                                                    <i class="fa-solid fa-check"></i> 15:22
                                                </div>
                                            </div>

                                        </li>
                                        <li class="clearfix sms">
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">

                                                    <p>
                                                        This is a SMS response with options
                                                    </p>

                                                    <p>
                                                        Option 1
                                                    </p>
                                                    <p>
                                                        Option 2
                                                    </p>
                                                </div>
                                                <div class="time">
                                                    <i class="fa-solid fa-check"></i> 15:22 - Company Owner
                                                </div>
                                            </div>

                                        </li>
                                        <li class="clearfix odd">

                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <p>
                                                        Hi, How are you? What about our next meeting?
                                                    </p>
                                                </div>
                                                <div class="time">
                                                    <i class="fa-solid fa-check"></i> 15:22
                                                </div>
                                            </div>

                                        </li>
                                        <li class="clearfix sms">

                                            <div class="conversation-text">
                                                <div class="ctext-wrap">

                                                    <p>
                                                        Yeah everything is fine
                                                    </p>
                                                </div>
                                                <div class="time">
                                                    <i class="fa-solid fa-check"></i> 10:02
                                                </div>
                                            </div>

                                        </li>
                                        <li class="clearfix odd">

                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <p>
                                                        Wow that's great
                                                    </p>
                                                </div>
                                                <div class="time">
                                                    <i class="fa-solid fa-check"></i> 10:02
                                                </div>
                                            </div>

                                        </li>
                                        <li class="clearfix sms">

                                            <div class="conversation-text">
                                                <div class="ctext-wrap">

                                                    <p>
                                                        Let's have it today if you are free
                                                    </p>
                                                </div>
                                                <div class="time">
                                                    <i class="fa-solid fa-check"></i> 10:02
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                    <div class="row">
                                        <div class="col">
                                            <div class="bg-white whatsApp">
                                                <form class="needs-validation" novalidate="" name="chat-form"
                                                    id="chat-form">
                                                    <div class="row">
                                                        <div class="col p-0">
                                                            <div class="input-group">
                                                                <div class="dropdown float-end chat-drop"
                                                                    style="background-color: #000109;">
                                                                    <a href="#"
                                                                        class="dropdown-toggle arrow-none card-drop "
                                                                        data-bs-toggle="dropdown" aria-expanded="false">

                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                                            height="22" viewBox="0 0 20 20">
                                                                            <path fill="#ffffff"
                                                                                d="M10 0c5.342 0 10 4.41 10 9.5c0 5.004-4.553 8.942-10 8.942a11.01 11.01 0 0 1-3.43-.546c-.464.45-.623.603-1.608 1.553c-.71.536-1.378.718-1.975.38c-.602-.34-.783-1.002-.66-1.874l.4-2.319C.99 14.002 0 11.842 0 9.5C0 4.41 4.657 0 10 0Zm0 1.4c-4.586 0-8.6 3.8-8.6 8.1c0 2.045.912 3.928 2.52 5.33l.02.017l.297.258l-.067.39l-.138.804l-.037.214l-.285 1.658a2.79 2.79 0 0 0-.03.337v.095c0 .005-.001.007-.002.008c.007-.01.143-.053.376-.223l2.17-2.106l.414.156a9.589 9.589 0 0 0 3.362.605c4.716 0 8.6-3.36 8.6-7.543c0-4.299-4.014-8.1-8.6-8.1ZM5.227 7.813a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998Zm4.998 0a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998Zm4.997 0a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998Z" />
                                                                        </svg>
                                                                        <i class="fa-solid fa-angle-down"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <!-- item-->
                                                                        <a href="javascript:void(0);" class="dropdown-item"
                                                                            id="SmsBtn">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 432 432">
                                                                                <path fill="#23cd61"
                                                                                    d="M364.5 65Q427 127 427 214.5T364.5 364T214 426q-54 0-101-26L0 429l30-109Q2 271 2 214q0-87 62-149T214 3t150.5 62zM214 390q73 0 125-51.5T391 214T339 89.5T214 38T89.5 89.5T38 214q0 51 27 94l4 6l-18 65l67-17l6 3q42 25 90 25zm97-132q9 5 10 7q4 6-3 25q-3 8-15 15.5t-21 9.5q-18 2-33-2q-17-6-30-11q-8-4-15.5-8.5t-14.5-9t-13-9.5t-11.5-10t-10.5-10.5t-8.5-9.5t-7-8.5t-5.5-7t-3.5-5L128 222q-22-29-22-55q0-24 19-44q6-7 14-7q6 0 10 1q8 0 12 9q2 3 6 13l7 17.5l3 8.5q3 5 1 9q-3 7-5 9l-3 3l-3 3.5l-2 2.5q-6 6-3 11q13 22 30 37q13 11 43 26q7 3 11-1q12-15 17-21q4-6 12-3q6 3 36 17z" />
                                                                            </svg>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control border-0"
                                                                    placeholder="Type Message" required="">

                                                            </div>


                                                        </div>
                                                        <div class="col-sm-auto ps-0">
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
                                                                <div class="d-grid">
                                                                    <button type="submit" class="btn btn-link chat-send">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                                            height="22" viewBox="0 0 24 24">
                                                                            <path fill="#000109" fill-rule="evenodd"
                                                                                d="M2.345 2.245a1 1 0 0 1 1.102-.14l18 9a1 1 0 0 1 0 1.79l-18 9a1 1 0 0 1-1.396-1.211L4.613 13H10a1 1 0 1 0 0-2H4.613L2.05 3.316a1 1 0 0 1 .294-1.071z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row-->
                                                </form>
                                            </div>
                                        </div> <!-- end col-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- end chat users-->

                </div>
            </div>
            <div class="col-xl-3 col-12 pe-0">
                <div class="card chatcardright">
                    <div class="card-body">

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

@endsection
@push('scripts')
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

        $(".select-contact").on("click", function(e) {
            e.preventDefault();
            location = "{{ route('user.chat.create-chat') }}?contact="+$(this).data('contact-number')
        });

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
