@extends('layouts.customer')
@section('title', 'Chat')
@section('content')
<link href="{{ asset('assets/css/custom2.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css" />

<style type="text/css">
    .border-green {
        border: 1px solid #23cd61;
    }

    .border-black {
        border: 1px solid #d6d6d6;
    }

    .invalid-feedback {
        display: none;
    }

    .emojionearea-inline {
        margin-top: -44px !important;
        margin-left: 61px !important;
        height: 44px !important;
        min-height: 15px !important;
    }
</style>

<div id="chatList" class="container-fluid mt-4">
    <div class="row">
        <div class="col-xl-9 col-12 p-0">
            <div class="dashboard-bg">
                <div class="row">
                    <div class="col-lg-4 col-12 pe-0 m_left">
                        <div class="mb-0 mb-lg-0">
                            <div class="p-0 d-flex flex-column">

                                <div class="card mb-0 chatcardleft">
                                    <div class="card-body p-0">

                                        <div class="tab-content">
                                            <div class="tab-pane show active p-0" id="newpost">
                                                <div class="create-new">
                                                    <a href="{{ route('user.chat.create') }}">
                                                        <div class="icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 16 16">
                                                                <path fill="#3949b8" fill-rule="evenodd"
                                                                    d="M8 1.75a.75.75 0 0 1 .75.75v4.75h4.75a.75.75 0 0 1 0 1.5H8.75v4.75a.75.75 0 0 1-1.5 0V8.75H2.5a.75.75 0 0 1 0-1.5h4.75V2.5A.75.75 0 0 1 8 1.75"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </div>


                                                        <h4 class="text-primary">Create New</h4>

                                                    </a>
                                                </div>
                                                <div class="title-chat">
                                                    <h4 class="page-title">Chat</h4>


                                                <ul role="tablist" class="notify-btn nav nav-pills nav-justified">
                                                    <li role="presentation" class="nav-item">
                                                        <a role="tab" href="javascript:void(0);"
                                                            class="btn btn-primary me-1 show-all-chats">
                                                            All <span class="counter">{{ $all_messages }}</span></a>
                                                    </li>
                                                    @if( !checkAccess('Show only assigned contacts'))
                                                    <li role="presentation" class="nav-item">
                                                        <a role="tab" href="javascript:void(0);" class="btn btn-light me-1">
                                                            Mine <span
                                                                class="counter">{{ $mine_messages }}</span></a>
                                                    </li>
                                                    @endif
                                                    <li role="presentation" class="nav-item">
                                                        <a role="tab" href="javascript:void(0);" class="btn btn-light show-new-chats"> New <span class="counter"> {{ $new_messages }} </span></a>
                                                    </li>
                                                </ul>

                                            </div>

                                            <!-- start search box -->
                                            <div class="app-search">
                                                <form>
                                                    <div class="mb-2 position-relative">
                                                        <input type="text" class="form-control" id="chat-search"
                                                            placeholder="Search Name" />
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end search box -->

                                            <!-- users -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="chat-listing">

                                                        @if ($chats && count($chats))
                                                        @foreach ($chats as $chat)
                                                        <a href="javascript:void(0);"
                                                            class="text-body chat-users-list"
                                                            data-from="{{ $chat->from }}"
                                                            data-to="{{ $chat->to }}"
                                                            data-id="{{ $chat->id }}"
                                                            id="chat-users-list-{{ $chat->id }}"
                                                            >
                                                            <div
                                                                class="d-flex align-items-start @if ($id == $chat->id) bg-light-active @endif p-2">
                                                                <div class="user_img">
                                                                    <img src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                                                        class="me-2 rounded-circle @if ($chat->chat_type == 'whatsapp') border-green @else border-black @endif"
                                                                        height="48" alt="John James" />
                                                                        <img src="{{ asset('assets/images/flags/'. (isset($chat->contact->countryData) && isset($chat->contact->countryData->iso2) ? strtolower($chat->contact->countryData->iso2) : 'za') .'.png') }}"
                                                                        alt="Flag" class="flag"
                                                                        width="22" height="22" />

                                                                </div>
                                                                <div class="w-100 overflow-hidden">
                                                                    <h5 class="mt-0 mb-0 font-14 text-dark">
                                                                        {{ @$chat->contact->name }}
                                                                    </h5>
                                                                    <p class="pt-1 mb-0 text-muted font-13">

                                                                        <span class="w-25 float-end text-end user-status">
                                                                        @if ($chat->unreadMessages->count() > 0)
                                                                            <span class="user-online"></span>
                                                                        @else
                                                                            <span class="user-offline"></span>
                                                                        @endif
                                                                        </span>



                                                                        <span
                                                                            class="w-75">{{ $chat->updated_at->setTimezone(getTimezone())->diffForHumans() }}</span>
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
                    </div>
                </div>
                <div id="chatAndTools" class="col-lg-8 col-12 m_right" style="">
                    <div class="chat-user mb-3">
                        <div class="row">
                            <div class="col-sm-10 col-9">
                                <div class="row align-items-center">
                                    <div class="col-auto pe-1 m_userC">
                                        <a href="javascript:void(0)" class="backChat">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 1024 1024">
                                                <path fill="currentColor" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z" />
                                                <path fill="currentColor" d="m237.248 512l265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z" />
                                            </svg>
                                        </a>
                                        <div class="avatar-md">
                                            <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                                alt="shreyu" class="avatar-md rounded-circle  chat-user-profile @if ($box->chat_type == 'whatsapp') border-green @else border-black @endif " />
                                                <img id="user-flag-class" src="{{ asset('assets/images/flags/'.( $country ?? 'za') .'.png') }}"
                                                alt="Flag" class="flag"
                                                width="22" height="22" />

                                        </div>
                                    </div>
                                    <div class="col M_P_L M_P_R">
                                        <div>
                                            <div class="user-left-sec">
                                                <h4 class="text-dark font-16 mt-0 chat-user-name">{{ @$box->contact->name }}
                                                </h4>
                                                @if(@$last_chat_type == 'whatsapp')
                                                <button class="btn btn-success font-12 btn-sm mt-0 update-message" @if($hoursLeft == 0 || $hoursLeft < 0) style="background: #ed3833; border-color: #ed3833;" @endif>
                                                @if($hoursLeft == 0 || $hoursLeft < 0) You can reply only with a template @else
                                                {{ $hoursLeft }} hours left to reply  @endif
                                                </button>
                                                @endif
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-sm-2 col-3 align-self-end">
                                {{-- <div class="dropdown float-end mb-2">
                                            <a class="btn btn-primary font-12 btn-sm dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Not assigned
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Company
                                                        Owner</a></li>
                                            </ul>
                                        </div> --}}
                                <div class="text-center text-sm-end">

                                    <div class="user-right-icon">
                                        @if($list_type == 'plan')
                                        <a href="{{ route('user.integration.index') }}">
                                            <img src="{{ asset('assets/images/icon-2.png') }}" alt=""
                                                class="img-fluid" />
                                        </a>
                                        @elseif($list_type == 'rock')
                                        <a href="{{ route('user.integration.index') }}">
                                            <img src="{{ asset('assets/images/icon-1.png') }}" alt=""
                                                class="img-fluid" />
                                        </a>
                                        @else
                                        <a href="{{ route('user.integration.index') }}">
                                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt=""
                                                class="img-fluid" />
                                        </a>
                                        @endif

                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>
                    </div>
                    <div class="theChatHolder" id="theChatHolder">

                        <div id="chatMessages" class="scrollable-div">
                            <div class="card cartchat">
                                <div class="card-body pb-0 pe-0">
                                    <div class="whatsApp-chat">
                                        <ul id="conversation-list" class="conversation-list"
                                            style="padding: 0;padding-right: 5px;">

                                            @if ($messages && count($messages))
                                            @foreach ($messages as $message)
                                            <p class="chatDate">
                                                {{ date('l d F, Y', strtotime($message->created_at->setTimezone(getTimezone()))) }}
                                            </p>
                                            @if ($message->send_by == 'to')
                                            <li class="clearfix">
                                                <div class="conversation-text @if($message->is_template) template_msg @endif  @if ($message->chat_type == 'whatsapp') whatsapp-message @else sms-message @endif @if($message->header_type == 'audio') whatsapp-audio @endif">
                                                    <div class="ctext-wrap download">

                                                        @if (isset($message->header) && !empty($message->header))
                                                        <p>{{ $message->header }}</p>
                                                        @endif

                                                        @if ($message->header_type == 'image' && isset($message->image))
                                                        <div id="card-header-image">
                                                            <img class="img-fluid" id="imgPreview"
                                                                src="{{ get_media('/uploads/customer/' . auth()->user()->id . '/chats/' . $message->image) }}"
                                                                alt="pic" />
                                                        </div>
                                                        @endif

                                                        @if ($message->header_type == 'audio')
                                                        <audio controls muted>
                                                            <source src="{{ get_media('/uploads/customer/' . auth()->user()->id . '/chats/' .$message->audio) }}" type="audio/mp3">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                        @endif

                                                        @if (str_contains($message->media_url, '.webm'))
                                                        <audio controls src="{{ asset('/'.$message->media_url) }}" preload="metadata" muted id="audio-test-player-{{ $message->id }}" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                        @endif

                                                        @if ($message->header_type == 'video' && isset($message->video))
                                                        <div id="card-header-video">
                                                            <video width="200" controls>
                                                                <source
                                                                    src="{{ get_media('/uploads/customer/' . auth()->user()->id . '/chats/' . $message->video) }}"
                                                                    id="video_here">
                                                                Your browser does not support HTML5
                                                                video.
                                                            </video>
                                                        </div>
                                                        @endif

                                                        @if ($message->header_type == 'pdf' && isset($message->pdf))
                                                        <div id="card-header-pdf">
                                                            <a href="{{ get_media('/uploads/customer/' . auth()->user()->id . '/chats/' . $message->pdf) }}"
                                                                download><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="20" height="20"
                                                                    viewBox="0 0 16 16">
                                                                    <path fill="#555"
                                                                        d="m9 9.114l1.85-1.943a.52.52 0 0 1 .77 0c.214.228.214.6 0 .829l-1.95 2.05a1.552 1.552 0 0 1-2.31 0L5.41 8a.617.617 0 0 1 0-.829a.52.52 0 0 1 .77 0L8 9.082V.556C8 .249 8.224 0 8.5 0s.5.249.5.556z" />
                                                                    <path fill="#555"
                                                                        d="M16 13.006V10h-1v3.006a.995.995 0 0 1-.994.994H3.01a.995.995 0 0 1-.994-.994V10h-1v3.006c0 1.1.892 1.994 1.994 1.994h10.996c1.1 0 1.994-.893 1.994-1.994" />
                                                                </svg>
                                                                {{ $message->pdf }} </a>
                                                        </div>
                                                        @endif

                                                        <p>
                                                            {!! nl2br(e($message->message)) !!}
                                                        </p>

                                                        @if (isset($message->footer) && !empty($message->footer))
                                                        <p>{{ $message->footer }}</p>
                                                        @endif

                                                        @if (json_decode($message->reply_buttons) && count(json_decode($message->reply_buttons)))
                                                        @foreach (json_decode($message->reply_buttons) as $reply_button)
                                                        <div class="ctext-option">
                                                            <p>
                                                                {{ $reply_button }}
                                                            </p>
                                                        </div>
                                                        @endforeach
                                                        @endif

                                                        @if (isset($message->visit_website_name_1) && !empty($message->visit_website_name_1))
                                                        <a
                                                            href="{{ $message->visit_website_name_1 }}">
                                                            {{ $message->visit_website_name_1 }}</a>
                                                        @endif

                                                        @if (isset($message->visit_website_name_2) && !empty($message->visit_website_name_2))
                                                        <a
                                                            href="{{ $message->visit_website_name_2 }}">
                                                            {{ $message->visit_website_name_2 }}</a>
                                                        @endif

                                                        @if (isset($message->offer_code) && !empty($message->offer_code))
                                                        <p>Offer Code : {{ $message->offer_code }}
                                                        </p>
                                                        @endif

                                                        @if ($message->media_url && !$message->is_template && !str_contains($message->media_url, '.webm'))
                                                        <a href="{{ get_media('/uploads/chats/files/' . $message->chat->id . '/' . $message->media_url) }}"
                                                            download><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                width="20" height="20"
                                                                viewBox="0 0 16 16">
                                                                <path fill="#555"
                                                                    d="m9 9.114l1.85-1.943a.52.52 0 0 1 .77 0c.214.228.214.6 0 .829l-1.95 2.05a1.552 1.552 0 0 1-2.31 0L5.41 8a.617.617 0 0 1 0-.829a.52.52 0 0 1 .77 0L8 9.082V.556C8 .249 8.224 0 8.5 0s.5.249.5.556z" />
                                                                <path fill="#555"
                                                                    d="M16 13.006V10h-1v3.006a.995.995 0 0 1-.994.994H3.01a.995.995 0 0 1-.994-.994V10h-1v3.006c0 1.1.892 1.994 1.994 1.994h10.996c1.1 0 1.994-.893 1.994-1.994" />
                                                            </svg>
                                                            {{ $message->media_url }} </a>
                                                        @endif
                                                    </div>
                                                    <div class="time">
                                                        <i class="fa-solid fa-check"></i>
                                                        {{ date('H:i', strtotime($message->created_at->setTimezone(getTimezone()))) }}
                                                        -
                                                        {{ $message->team_id ? 'Team Member' : 'Company Owner' }}
                                                    </div>
                                                </div>

                                            </li>
                                            @else
                                            <li class="clearfix odd">

                                                <div class="conversation-text @if($message->is_template) template_msg @endif @if ($message->chat_type == 'whatsapp') whatsapp-message  @else sms-message @endif @if($message->header_type == 'audio') whatsapp-audio @endif">
                                                    <div class="ctext-wrap">
                                                        @if (isset($message->header) && !empty($message->header))
                                                        <p>{{ $message->header }}</p>
                                                        @endif

                                                        @if ($message->header_type == 'image' && isset($message->image))
                                                        <div id="card-header-image">
                                                            <img class="img-fluid" id="imgPreview"
                                                                src="{{ get_media('/uploads/customer/' . auth()->user()->id . '/chats/' . $message->image) }}"
                                                                alt="pic" />
                                                        </div>
                                                        @endif

                                                        @if ($message->header_type == 'audio')
                                                        <audio controls muted>
                                                            <source src="{{ get_media('/uploads/customer/' . auth()->user()->id . '/chats/'.$message->audio) }}" type="audio/mp3">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                        @endif

                                                        @if (str_contains($message->media_url, '.webm'))
                                                        <audio controls muted>
                                                            <source src="{{ get_media('/'.$message->media_url) }}" type="audio/webm">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                        @endif

                                                        @if ($message->header_type == 'video' && isset($message->video))
                                                        <div id="card-header-video">
                                                            <video width="200" controls>
                                                                <source
                                                                    src="{{ get_media('/uploads/customer/' . auth()->user()->id . '/chats/' . $message->video) }}"
                                                                    id="video_here">
                                                                Your browser does not support HTML5
                                                                video.
                                                            </video>
                                                        </div>
                                                        @endif

                                                        @if ($message->header_type == 'pdf' && isset($message->pdf))
                                                        <div id="card-header-pdf">
                                                            <a style="color: white;"
                                                                href="{{ get_media('/uploads/customer/' . auth()->user()->id . '/chats/' . $message->pdf) }}"
                                                                download><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="20" height="20"
                                                                    viewBox="0 0 16 16">
                                                                    <path fill="#555"
                                                                        d="m9 9.114l1.85-1.943a.52.52 0 0 1 .77 0c.214.228.214.6 0 .829l-1.95 2.05a1.552 1.552 0 0 1-2.31 0L5.41 8a.617.617 0 0 1 0-.829a.52.52 0 0 1 .77 0L8 9.082V.556C8 .249 8.224 0 8.5 0s.5.249.5.556z" />
                                                                    <path fill="#555"
                                                                        d="M16 13.006V10h-1v3.006a.995.995 0 0 1-.994.994H3.01a.995.995 0 0 1-.994-.994V10h-1v3.006c0 1.1.892 1.994 1.994 1.994h10.996c1.1 0 1.994-.893 1.994-1.994" />
                                                                </svg>
                                                                {{ $message->pdf }} </a>
                                                        </div>
                                                        @endif

                                                        <div class="temp-body">
                                                            <p>
                                                                {!! nl2br(e($message->message)) !!}
                                                            </p>

                                                            @if (isset($message->footer) && !empty($message->footer))
                                                            <p>{{ $message->footer }}</p>
                                                            @endif
                                                        </div>
                                                        @if (json_decode($message->reply_buttons) && count(json_decode($message->reply_buttons)))
                                                        @foreach (json_decode($message->reply_buttons) as $reply_button)
                                                        <div class="ctext-option">
                                                            <p>
                                                                {{ $reply_button }}
                                                            </p>
                                                        </div>
                                                        @endforeach
                                                        @endif

                                                        @if (isset($message->visit_website_name_1) && !empty($message->visit_website_name_1))
                                                        <a
                                                            href="{{ $message->visit_website_name_1 }}">
                                                            {{ $message->visit_website_name_1 }}</a>
                                                        @endif

                                                        @if (isset($message->visit_website_name_2) && !empty($message->visit_website_name_2))
                                                        <a
                                                            href="{{ $message->visit_website_name_2 }}">
                                                            {{ $message->visit_website_name_2 }}</a>
                                                        @endif

                                                        @if (isset($message->offer_code) && !empty($message->offer_code))
                                                        <p>Offer Code : {{ $message->offer_code }}
                                                        </p>
                                                        @endif

                                                        @if ($message->media_url && !$message->is_template && !str_contains($message->media_url, '.webm'))
                                                        <a href="{{ get_media('uploads/chats/files/' . $message->chat->id . '/' . $message->media_url) }}"
                                                            download><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                width="20" height="20"
                                                                viewBox="0 0 16 16">
                                                                <path fill="#555"
                                                                    d="m9 9.114l1.85-1.943a.52.52 0 0 1 .77 0c.214.228.214.6 0 .829l-1.95 2.05a1.552 1.552 0 0 1-2.31 0L5.41 8a.617.617 0 0 1 0-.829a.52.52 0 0 1 .77 0L8 9.082V.556C8 .249 8.224 0 8.5 0s.5.249.5.556z" />
                                                                <path fill="#555"
                                                                    d="M16 13.006V10h-1v3.006a.995.995 0 0 1-.994.994H3.01a.995.995 0 0 1-.994-.994V10h-1v3.006c0 1.1.892 1.994 1.994 1.994h10.996c1.1 0 1.994-.893 1.994-1.994" />
                                                            </svg>
                                                            {{ $message->media_url }}</a>
                                                        @endif
                                                    </div>
                                                    <div class="time">
                                                        <i class="fa-solid fa-check"></i>


                                                        {{ date('H:i', strtotime($message->created_at->setTimezone(getTimezone()))) }}
                                                        -
                                                        {{ $message->team_id ? 'Team Member' : 'Company Owner' }}
                                                    </div>
                                                </div>

                                            </li>
                                            @endif
                                            @endforeach
                                            @endif

                                        </ul>
                                    </div>

                                    <!-- end row -->
                                </div> <!-- end card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="message_type p-0 border-0">
                        <div class="row">
                            <div class="col-sm-2 col-3 padding-right ps-1">
                                <div class="btn-group groupBtn" role="group">
                                    <a href="javascript:void(0)" class="chat-drop @if($chat_type == 'whatsapp') active @else inactive @endif" id="SmsBtn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 432 432">
                                            <path fill="#ffffff"
                                                d="M364.5 65Q427 127 427 214.5T364.5 364T214 426q-54 0-101-26L0 429l30-109Q2 271 2 214q0-87 62-149T214 3t150.5 62zM214 390q73 0 125-51.5T391 214T339 89.5T214 38T89.5 89.5T38 214q0 51 27 94l4 6l-18 65l67-17l6 3q42 25 90 25zm97-132q9 5 10 7q4 6-3 25q-3 8-15 15.5t-21 9.5q-18 2-33-2q-17-6-30-11q-8-4-15.5-8.5t-14.5-9t-13-9.5t-11.5-10t-10.5-10.5t-8.5-9.5t-7-8.5t-5.5-7t-3.5-5L128 222q-22-29-22-55q0-24 19-44q6-7 14-7q6 0 10 1q8 0 12 9q2 3 6 13l7 17.5l3 8.5q3 5 1 9q-3 7-5 9l-3 3l-3 3.5l-2 2.5q-6 6-3 11q13 22 30 37q13 11 43 26q7 3 11-1q12-15 17-21q4-6 12-3q6 3 36 17z" />
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0)" class="chat-drop-right @if($chat_type == 'sms') active @else inactive @endif" id="whatsappBtn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 20 20">
                                            <path fill="#ffffff" d="M10 0c5.342 0 10 4.41 10 9.5c0 5.004-4.553 8.942-10 8.942a11.01 11.01 0 0 1-3.43-.546c-.464.45-.623.603-1.608 1.553c-.71.536-1.378.718-1.975.38c-.602-.34-.783-1.002-.66-1.874l.4-2.319C.99 14.002 0 11.842 0 9.5C0 4.41 4.657 0 10 0Zm0 1.4c-4.586 0-8.6 3.8-8.6 8.1c0 2.045.912 3.928 2.52 5.33l.02.017l.297.258l-.067.39l-.138.804l-.037.214l-.285 1.658a2.79 2.79 0 0 0-.03.337v.095c0 .005-.001.007-.002.008c.007-.01.143-.053.376-.223l2.17-2.106l.414.156a9.589 9.589 0 0 0 3.362.605c4.716 0 8.6-3.36 8.6-7.543c0-4.299-4.014-8.1-8.6-8.1ZM5.227 7.813a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998Zm4.998 0a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998Zm4.997 0a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998Z"></path>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-10 col-9 pedding-left ps-1">

                                <div class="bg-white whatsApp whatsapp-message-box" @if((($last_chat_type ?? $box->chat_type) == 'whatsapp') && $hoursLeft > 0) style="display: block;" @else style="display: none;" @endif>
                                    <form class="needs-validation" novalidate="" name="chat-form"
                                        id="chat-form" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col col-7-m p-0">
                                                <div class="input-group" @if($hoursLeft == 0 || $hoursLeft < 0) readonly @endif>

                                                    <input type="hidden" name="sender_id" class="sender_id"
                                                        value="{{ @$box->from }}">
                                                    <input type="hidden" name="chat_box_id" class="chat_box_id"
                                                        value="{{ @$box->id }}">
                                                    <input type="hidden" name="receiver_id" class="receiver_id"
                                                        value="{{ @$box->to }}">
                                                    <input type="text" name="message"
                                                        class="form-control border-0 mytextarea message-box"
                                                        placeholder="Type Message" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter your messsage
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="col-sm-auto col-md-auto col-lg-auto col-xl-auto col-5-m ps-0 text-end">
                                                <div class="btn-group">

                                                    <a href="#" class="btn btn-link smile">
                                                        <img src="{{ asset('assets/images/company/icons/smile.png') }}"
                                                            alt="mic" class="img-fluid" width="18"
                                                            height="18" />
                                                    </a>
                                                    <a href="#" class="btn btn-link">
                                                        <label for="file-select"> <img
                                                                src="{{ asset('assets/images/company/icons/attach-paperclip.png') }}"
                                                                alt="attach-paperclip" for="file-select"
                                                                class="img-fluid" width="15"
                                                                height="17" /></label>
                                                        <input id="file-select" type="file"
                                                            name="fileWhatsapp" style="display: none;" />
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-link">
                                                        <img src="{{ asset('assets/images/company/icons/mic.png') }}"
                                                            alt="mic" class="img-fluid show-audio-recording" width="18"
                                                            height="18" />
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-link">
                                                        <img src="{{ asset('assets/images/company/icons/video-camera.png') }}"
                                                            alt="video camera" class="img-fluid open-video-recorder" width="18"
                                                            height="18" />
                                                    </a>
                                                    <a href="#" class="btn btn-link">
                                                        <img src="{{ asset('assets/images/company/icons/ai-technology.png') }}"
                                                            alt="ai technology" class="img-fluid" width="18"
                                                            height="18" />
                                                    </a>
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-link chat-send"
                                                            id="submitMessageWhatsapp">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                                height="22" viewBox="0 0 24 24">
                                                                <path fill="#23cd61" fill-rule="evenodd"
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


                                <div class="bg-white whatsApp sms-message-box"
                                    @if(($last_chat_type ?? $box->chat_type) == 'sms') style="display: block;" @else style="display: none;" @endif>
                                    <form class="needs-validation" novalidate="" name="chat-form"
                                        id="chat-form" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col col-7-m p-0">
                                                <div class="input-group">
                                                    <input type="hidden" name="sender_id" class="sender_id"
                                                        value="{{ @$box->from }}">
                                                    <input type="hidden" name="chat_box_id" class="chat_box_id"
                                                        value="{{ @$box->id }}">
                                                    <input type="hidden" name="receiver_id" class="receiver_id"
                                                        value="{{ @$box->to }}">
                                                    <input type="text" name="messagesms"
                                                        class="form-control border-0 mytextarea message-box"
                                                        placeholder="Type Message" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter your messsage
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="col-sm-auto col-md-auto col-lg-auto col-xl-auto col-5-m ps-0 text-end">
                                                <div class="btn-group">

                                                    <a href="#" class="btn btn-link smile">
                                                        <img src="{{ asset('assets/images/company/icons/smile.png') }}"
                                                            alt="mic" class="img-fluid" width="18"
                                                            height="18" />
                                                    </a>
                                                    <a href="#" class="btn btn-link">
                                                        <label for="file-select"> <img
                                                                src="{{ asset('assets/images/company/icons/attach-paperclip.png') }}"
                                                                alt="attach-paperclip" for="file-select"
                                                                class="img-fluid" width="15"
                                                                height="17" /></label>
                                                        <input id="file-select" type="file" name="file"
                                                            style="display: none;" />
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-link">
                                                        <img src="{{ asset('assets/images/company/icons/mic.png') }}"
                                                            alt="mic" class="img-fluid show-audio-recording" width="18"
                                                            height="18" />
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-link">
                                                        <img src="{{ asset('assets/images/company/icons/video-camera.png') }}"
                                                            alt="video camera" class="img-fluid open-video-recorder" width="18"
                                                            height="18" />
                                                    </a>
                                                    <a href="#" class="btn btn-link">
                                                        <img src="{{ asset('assets/images/company/icons/ai-technology.png') }}"
                                                            alt="ai technology" class="img-fluid" width="18"
                                                            height="18" />
                                                    </a>
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-link chat-send"
                                                            id="submitMessage">
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

                                <div class="show-hide-chat-template">

                                    <input type="hidden" id="show-template-box" value="{{ ($last_chat_type == 'whatsapp' && $hoursLeft == 0) ? 1 : 0 }}">

                                    <div class="whatsApp chat-send-template show-temp"  @if($last_chat_type == 'whatsapp' && $hoursLeft == 0) style="display: block;" @else style="display: none;" @endif >
                                        <div class="row">
                                            <div class="col col-7-m p-0">
                                               <div class="input-group" readonly>
                                                  <input type="text" name="send-template" class="form-control border-0" placeholder="To continue this conversation please select a template" readonly>
                                               </div>
                                            </div>
                                            <div class="col-sm-auto col-md-auto col-lg-auto col-xl-auto col-5-m ps-0 text-end">
                                               <div class="btn-group">
                                                  <div class="d-grid">
                                                     <button type="submit" class="btn btn-link chat-send">
                                                        <svg fill="none" height="22" viewBox="0 0 64 64" width="22" xmlns="http://www.w3.org/2000/svg">
                                                            <g fill="#ffffff">
                                                                <path d="m27 54c1.1046 0 2-.8954 2-2s-.8954-2-2-2h-8c-1.1046 0-2 .8954-2 2s.8954 2 2 2z"></path>
                                                                <path d="m38 28c1.1046 0 2-.8954 2-2s-.8954-2-2-2-2 .8954-2 2 .8954 2 2 2z"></path>
                                                                <path d="m44 28c1.1046 0 2-.8954 2-2s-.8954-2-2-2-2 .8954-2 2 .8954 2 2 2z"></path>
                                                                <path d="m52 26c0 1.1046-.8954 2-2 2s-2-.8954-2-2 .8954-2 2-2 2 .8954 2 2z"></path>
                                                                <path clip-rule="evenodd" d="m2 10c0-4.41828 3.58172-8 8-8h26c4.4183 0 8 3.58172 8 8h10c4.4183 0 8 3.5817 8 8v15.2593c0 4.4183-3.5817 8-8 8h-10v12.7407c0 4.4183-3.5817 8-8 8h-26c-4.41828 0-8-3.5817-8-8zm38 31.2593h-.9384l-3.8944 4.1154c-.563.5948-1.4317.7864-2.1925.4834-.7609-.3029-1.2602-1.0391-1.2602-1.8581v-3.0722c-3.3051-.9836-5.7145-4.0443-5.7145-7.6685v-15.2593c0-4.4183 3.5817-8 8-8h6c0-2.20914-1.7909-4-4-4h-26c-2.20914 0-4 1.79086-4 4v44c0 2.2091 1.79086 4 4 4h26c2.2091 0 4-1.7909 4-4zm-10-23.2593c0-2.2091 1.7909-4 4-4h20c2.2091 0 4 1.7909 4 4v15.2593c0 2.2091-1.7909 4-4 4h-15.7993c-.5496 0-1.0749.2261-1.4526.6253l-1.0502 1.1097c-.1224-.9484-.9102-1.6936-1.8898-1.7395-2.1192-.0993-3.8081-1.8507-3.8081-3.9955z" fill-rule="evenodd"></path>
                                                            </g>
                                                        </svg>
                                                     </button>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                    </div>

                                    <div class="show-template-list" style="display: none;">
                                        <div class="template-head">
                                            <h5>Templates</h5>
                                            <button class="btn btn-danger btn-sm close-temp"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>

                                        <div class="template-list">
                                            @if ($templates && count($templates))
                                            @foreach ($templates as $template)
                                            <div class="reminder-list">
                                                <p class="open-model" data-id="{{ $template->id }}">
                                                    {{ $template->name }}
                                                </p>

                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('user.template.edit', $template->id) }}"
                                                            class="dropdown-item">Edit</a>
                                                        <a href="javascript:void(0);"
                                                            onclick="deleteTemplate('{{ $template->id }}')"
                                                            class="dropdown-item">Delete</a>
                                                    </div>
                                                    <form id="deleteTemplateForm{{ $template->id }}"
                                                        method="post"
                                                        action="{{ route('user.template.destroy', $template->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif                                        
                                        </div>
                                    </div>

                                </div>


                                <div class="open-ai" style="display: none;">
                                    <h1>Get AI Suggestion</h1>
                                    <textarea id="user-prompt" placeholder="Enter your prompt"></textarea>
                                    <button id="get-suggestion">Get Suggestion</button>
                                    <div id="suggestion-result"></div>
                                </div>

                                <div class="show-video-recorder" style="display: none;">
                                    <input type="hidden" name="chat_type" class="chat_type" value="{{ @$chat->chat_type }}">

                                    <video id="video-preview" width="100%" height="220" autoplay controls></video>
                                    <div class="show-video-btn">
                                        <div>
                                            <button id="close-recorder" title="Close Video Recorder" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                        <div>
                                            <button id="start-recording" title="Start Recording" class="btn btn-play"><i class="fa fa-microphone" aria-hidden="true"></i></button>

                                            <button id="stop-recording" title="Stop Recording" class="btn btn-stop" disabled><i class="fa fa-stop" aria-hidden="true"></i></button>

                                        </div>
                                        <div>
                                            <input type="hidden" id="video_path">
                                            <button disabled id="stop-recording-send" class="btn btn-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                    height="22" viewBox="0 0 24 24">
                                                    <path fill="#fff" fill-rule="evenodd"
                                                        d="M2.345 2.245a1 1 0 0 1 1.102-.14l18 9a1 1 0 0 1 0 1.79l-18 9a1 1 0 0 1-1.396-1.211L4.613 13H10a1 1 0 1 0 0-2H4.613L2.05 3.316a1 1 0 0 1 .294-1.071z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="audio-messages" style="display: none;">
                                    <input type="hidden" name="chat_type" class="chat_type" value="{{ @$chat->chat_type }}">

                                    <div>
                                        <button id="close-audio-recorder" title="Close Audio Recorder" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>

                                        <button id="start" class="btn btn-play"><i class="fa fa-play" aria-hidden="true"></i></button>

                                        <input type="hidden" id="audio_path">

                                        <button id="stop" title="Stop Recording" class="btn btn-stop" disabled><i class="fa fa-stop" aria-hidden="true"></i></button>
                                    </div>

                                    <div>
                                        <audio id="audioPlayback" controls></audio>
                                    </div>

                                    <div>
                                        <button disabled id="stop-send" class="btn btn-primary btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                height="22" viewBox="0 0 24 24">
                                                <path fill="#fff" fill-rule="evenodd"
                                                    d="M2.345 2.245a1 1 0 0 1 1.102-.14l18 9a1 1 0 0 1 0 1.79l-18 9a1 1 0 0 1-1.396-1.211L4.613 13H10a1 1 0 1 0 0-2H4.613L2.05 3.316a1 1 0 0 1 .294-1.071z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>

                                </div>


                            </div> <!-- end col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-12 pe-0">
        <div class="card chatcardright">
            <div class="card-body">
                <div class="accordion custom-accordion" id="custom-accordion-one">
                    @if( is_customer() )
                    <div class="card Company-Owner mb-2">
                        <div class="card-header" id="headingFour">
                            <div class="userPlace">CO</div>
                            <h5 class="m-0">
                                <a class="custom-accordion-title d-block" data-bs-toggle="collapse"
                                    href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Company Owner
                                    <svg id="Layer_1" enable-background="new 0 0 128 128" height="17" viewBox="0 0 128 128" width="17" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="#2e3746">
                                            <path id="Down_Arrow_9_" d="m64 104c-1.023 0-2.047-.391-2.828-1.172l-40-40c-1.563-1.563-1.563-4.094 0-5.656s4.094-1.563 5.656 0l37.172 37.172 37.172-37.172c1.563-1.563 4.094-1.563 5.656 0s1.563 4.094 0 5.656l-40 40c-.781.781-1.805 1.172-2.828 1.172zm2.828-33.172 40-40c1.563-1.563 1.563-4.094 0-5.656s-4.094-1.563-5.656 0l-37.172 37.172-37.172-37.172c-1.563-1.563-4.094-1.563-5.656 0s-1.563 4.094 0 5.656l40 40c.781.781 1.805 1.172 2.828 1.172s2.047-.391 2.828-1.172z" />
                                        </g>
                                    </svg>

                                </a>
                            </h5>
                        </div>

                        <div id="collapseFour" class="collapse companyowner" aria-labelledby="headingFour"
                            data-bs-parent="#custom-accordion-one">
                            <div class="card-body">
                                @if(!is_team())
                                <div class="mb-2 mt-2 col-sm-12">
                                    <div class="form-group">
                                        @if($box->assign_teams && count($box->assign_teams))
                                        @else
                                        <p id="company-owner-name">{{ getCustomer()->name }}</p>
                                        @endif
                                    </div>
                                    @if(checkAccess('Enable Team Members'))
                                    <form  method="post" action="{{ route('user.chat.save-member', $box->id) }}">
                                    @csrf

                                        <div class="form-group mb-2">
                                            <label for="status" class="form-label">Team Member</label>
                                            <select id="team_member" name="assign_teams[]" class="form-select form-lg selec2" data-toggle="select2" multiplex>
                                                <option value="">Please Select</option>
                                                @if($teams && count($teams))
                                                @foreach($teams as $team)
                                            
                                                <option
                                                 {{-- @if( $box->assign_teams && in_array($team->id, $box->assign_teams)) selected @endif--}} 
                                                @if($contact->team_id == $team->id) selected @endif
                                                 value="{{ $team->id }}"
                                                 >{{ $team->name }}
                                                 </option>

                                                @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="card mb-2">
                        <div class="card-header" id="headingFive">
                            <div class="ac-icon">
                                <img src="{{ asset('assets/images/company/icons/Contact-W.png') }}"
                                    height="20" alt="Contact" />
                            </div>
                            <h5 class="m-0">
                                <a class="custom-accordion-title collapsed d-block py-1" data-bs-toggle="collapse"
                                    href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    Contact Information
                                    {{-- <i class="mdi mdi-plus accordion-arrow"></i> --}}
                                </a>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse show" aria-labelledby="headingFive"
                            data-bs-parent="#custom-accordion-one">
                            <div class="card-body">
                                <input type="hidden" class="current_contact_id" value="{{ $contact->uuid}}" />
                                <div class="information">
                                    <div class="form-group">
                                        <label for="label" class="form-label">Name</label>
                                        <p id="contact-name">{{ isset($contact->name) ? $contact->name : '' }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="label" class="form-label">Contact Number</label>
                                        <p id="contact-phone">{{ isset($contact->phone) ? $contact->phone : '' }}</p>
                                    </div>
                                    <div class="form-group em @if( !isset($contact->email) ) hidden @endif">
                                        <label for="label" class="form-label">Email Address</label>
                                        <p id="contact-email">{{ isset($contact->email) ? $contact->email : '' }}</p>
                                    </div>
                                    <div class="form-group bd @if( !isset($contact->birthdate) ) hidden @endif">
                                        <label for="label" class="form-label">Birthdate</label>
                                        <p id="contact-birthdate">{{ isset($contact->birthdate) ? $contact->birthdate : '' }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <a id="edit-info-btn" href="{{ route('user.contact.edit', isset($contact->uuid) ? $contact->uuid : 1) }}"
                                            class="btn btn-light w-100">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" id="headingSix">
                            <div class="ac-icon">
                                <img src="{{ asset('assets/images/company/icons/Reminders-W.png') }}"
                                    height="20" alt="Reminders" />
                            </div>
                            <h5 class="m-0">
                                <a class="custom-accordion-title collapsed d-block py-1" data-bs-toggle="collapse"
                                    href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Reminders
                                </a>
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                            data-bs-parent="#custom-accordion-one">
                            <div class="card-body">
                                <div class="reminder reminder-res">
                                    @if (isset($reminders) && count($reminders))
                                    @foreach ($reminders as $reminder)

                                    <div class="reminder-list">
                                        <p>{{ $reminder->title }}</p>

                                        @if( loginUser()->id == $reminder->creator_id || is_admin())
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);"
                                                    data="{{$reminder}}"
                                                    class="dropdown-item open-reminder-edit-model">Edit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);"
                                                    onclick="deleteReminder('{{ $reminder->uuid }}')"
                                                    class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 16 16">
                                            <path fill="#ffffff"
                                                d="M4 5v-.8C4 1.88 5.79 0 8 0s4 1.88 4 4.2V5h1.143c.473 0 .857.448.857 1v9c0 .552-.384 1-.857 1H2.857C2.384 16 2 15.552 2 15V6c0-.552.384-1 .857-1zM3 15h10V6H3zm5.998-3.706L9.5 12.5h-3l.502-1.206A1.644 1.644 0 0 1 6.5 10.1c0-.883.672-1.6 1.5-1.6s1.5.717 1.5 1.6c0 .475-.194.901-.502 1.194M11 4.36C11 2.504 9.657 1 8 1S5 2.504 5 4.36V5h6z" />
                                        </svg>
                                        @endif

                                    </div>

                                    @endforeach
                                    @endif

                                </div>
                                <div class="mb-2">
                                    <button type="button"  class="btn btn-light w-100 open-reminder-add-model">Add
                                        Reminder</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" id="headingSeven">
                            <div class="ac-icon">
                                <img src="{{ asset('assets/images/company/icons/Canned-w.png') }}" height="20"
                                    alt="Canned" />
                            </div>
                            <h5 class="m-0">
                                <a class="custom-accordion-title collapsed d-block py-1" data-bs-toggle="collapse"
                                    href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Canned Responses
                                </a>
                            </h5>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#custom-accordion-one">
                            <div class="card-body">
                                <div class="reminder canned">
                                    @if ($canned_responses && count($canned_responses))
                                    @foreach ($canned_responses as $canned_response)
                                    <div class="reminder-list">
                                        <p class="canned-response-click"
                                            data-message="{{ $canned_response->message }}">
                                            {{ $canned_response->title }}
                                        </p>
                                        @if( loginUser()->id !== $canned_response->creator_id && !is_admin() )
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 16 16">
                                            <path fill="#ffffff"
                                                d="M4 5v-.8C4 1.88 5.79 0 8 0s4 1.88 4 4.2V5h1.143c.473 0 .857.448.857 1v9c0 .552-.384 1-.857 1H2.857C2.384 16 2 15.552 2 15V6c0-.552.384-1 .857-1zM3 15h10V6H3zm5.998-3.706L9.5 12.5h-3l.502-1.206A1.644 1.644 0 0 1 6.5 10.1c0-.883.672-1.6 1.5-1.6s1.5.717 1.5 1.6c0 .475-.194.901-.502 1.194M11 4.36C11 2.504 9.657 1 8 1S5 2.504 5 4.36V5h6z" />
                                        </svg>
                                        @else

                                        <div class="dropdown float-end">
                                            <a href="#"
                                                class="dropdown-toggle arrow-none card-drop"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0)"
                                                    id="{{ $canned_response->id }}"
                                                    field-data="{{ $canned_response }}"
                                                    class="dropdown-item editField">Edit</a>
                                                <!-- item-->

                                                <button
                                                    onclick="deleteConfirm('{{ $canned_response->uuid }}')"
                                                    class="dropdown-item">Delete</button>

                                                <form id="deleteForm{{ $canned_response->uuid }}"
                                                    method="post"
                                                    action="{{ route('user.canned-responses.destroy', $canned_response->uuid) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                                <div class="mb-2">
                                    <button type="button" class="btn btn-light w-100" data-bs-toggle="modal"
                                        data-bs-target="#add-canned">Add
                                        Response</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <div class="card-header" id="headingEight">
                            <div class="ac-icon">
                                <img src="{{ asset('assets/images/company/icons/Templates-W.png') }}"
                                    height="20" alt="Templates" />
                            </div>
                            <h5 class="m-0">
                                <a class="custom-accordion-title collapsed d-block py-1" data-bs-toggle="collapse"
                                    href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Templates
                                </a>
                            </h5>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                            data-bs-parent="#custom-accordion-one">
                            <div class="card-body">
                                <div class="reminder templates">
                                    @if ($templates && count($templates))
                                    @foreach ($templates as $template)
                                    <div class="reminder-list" style="display: none;">
                                        <p>Hello</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 16 16">
                                            <path fill="#ffffff"
                                                d="M4 5v-.8C4 1.88 5.79 0 8 0s4 1.88 4 4.2V5h1.143c.473 0 .857.448.857 1v9c0 .552-.384 1-.857 1H2.857C2.384 16 2 15.552 2 15V6c0-.552.384-1 .857-1zM3 15h10V6H3zm5.998-3.706L9.5 12.5h-3l.502-1.206A1.644 1.644 0 0 1 6.5 10.1c0-.883.672-1.6 1.5-1.6s1.5.717 1.5 1.6c0 .475-.194.901-.502 1.194M11 4.36C11 2.504 9.657 1 8 1S5 2.504 5 4.36V5h6z" />
                                        </svg>
                                    </div>
                                    <div class="reminder-list">
                                        <p class="open-model" data-id="{{ $template->id }}">
                                            {{ $template->name }}
                                        </p>
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="{{ route('user.template.edit', $template->id) }}"
                                                    class="dropdown-item">Edit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);"
                                                    onclick="deleteTemplate('{{ $template->id }}')"
                                                    class="dropdown-item">Delete</a>
                                            </div>
                                            <form id="deleteTemplateForm{{ $template->id }}"
                                                method="post"
                                                action="{{ route('user.template.destroy', $template->id) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <a class="btn btn-light w-100"
                                        href="{{ route('user.template.create') }}"> Add Template</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" id="headingNine">
                            <div class="ac-icon">
                                <img src="{{ asset('assets/images/company/icons/Tags-W.png') }}" height="20"
                                    alt="Tags" />
                            </div>
                            <h5 class="m-0">
                                <a class="custom-accordion-title collapsed d-block py-1" data-bs-toggle="collapse"
                                    href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    Tags
                                </a>
                            </h5>
                        </div>
                        <div id="collapseNine" class="collapse dytags" aria-labelledby="headingNine"
                            data-bs-parent="#custom-accordion-one">
                            <div class="card-body">
                                @if (count(listTags()) > 0)
                                <div class="reminder tags">

                                    @foreach (listTags() as $k => $tag)
                                    <div class="reminder-list">
                                        <div class="form-check">
                                            <input class="form-check-input ctag" type="checkbox"
                                                value="{{ $tag->uuid }}"
                                                contact_id="{{ $contact->uuid }}"
                                                id="flexCheckDefault{{ $k + 1 }}"
                                                @if (count($contact->tags)) @foreach ($contact->tags as $stag)
                                            @if ($tag->id == $stag->tag_id)
                                            checked @endif
                                            @endforeach
                                            @endif
                                            >
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $tag->name }}
                                            </label>
                                        </div>

                                    </div>
                                    @endforeach

                                </div>
                                <div class="mb-2">
                                    <button type="button" onclick="{ $('#newTagContact').val('{{ $contact->uuid }}') }"
                                        data-bs-toggle="modal" data-bs-target="#new-tag" class="btn btn-light w-100">New
                                        Tag</button>
                                </div>
                                @else
                                <div class="text-center text-white">No Tag Available</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" id="headingTen">
                            <div class="ac-icon">
                                <img src="{{ asset('assets/images/company/icons/Notes-w.png') }}" height="20"
                                    alt="Notes" />
                            </div>
                            <h5 class="m-0">
                                <a class="custom-accordion-title collapsed d-block py-1" data-bs-toggle="collapse"
                                    href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    Notes
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTen" class="collapse dnote" aria-labelledby="headingTen"
                            data-bs-parent="#custom-accordion-one">

                            <div class="card-body">
                                <div class="Notes add-note">

                                    @if (count($notes) > 0)
                                    @foreach ($notes as $note)

                                    <div class="Note-list" id="note_div{{ $note->uuid }}">

                                        <p id="note{{ $note->uuid }}">{{ $note->note }}</p>
                                        @if ($note->creator == 'customer' && loginUser()->getTable() == 'teams')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 16 16">
                                            <path fill="#111111"
                                                d="M4 5v-.8C4 1.88 5.79 0 8 0s4 1.88 4 4.2V5h1.143c.473 0 .857.448.857 1v9c0 .552-.384 1-.857 1H2.857C2.384 16 2 15.552 2 15V6c0-.552.384-1 .857-1zM3 15h10V6H3zm5.998-3.706L9.5 12.5h-3l.502-1.206A1.644 1.644 0 0 1 6.5 10.1c0-.883.672-1.6 1.5-1.6s1.5.717 1.5 1.6c0 .475-.194.901-.502 1.194M11 4.36C11 2.504 9.657 1 8 1S5 2.504 5 4.36V5h6z" />
                                        </svg>
                                        @else
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a class="dropdown-item cursor edit-note"
                                                    ndata="{{ $note }}">Edit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item"
                                                    onclick="deleteNote('{{ $note->uuid }}')">Delete</a>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                                <div class="mb-2">
                                    <button type="button"
                                        onclick="{ $('#Add-notes_contact_id').val('{{ isset($contact->uuid) ? $contact->uuid : 1 }}') }"
                                        data-bs-toggle="modal" data-bs-target="#Add-notes"
                                        class="btn btn-light w-100">New Note</button>
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

<!-- open template model -->
@include('user.chat.template.create')
<!-- end open model -->


<div id="add-canned" class="modal TopupM fade" tabindex="-1" role="dialog" aria-labelledby="add-cannedLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"> <img
                        src="{{ asset('assets/images/company/icons/Canned-w.png') }}" class="me-1" height="34" width="37"
                        alt="Canned" /> <span>Add Canned Response</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="post" action="{{ route('user.canned-responses.store') }}">
                @csrf
                <input type="hidden" name="chat_id" value="{{ $id }}">
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="mb-3">
                            <input type="text" class="form-control form-lg" name="title" required
                                placeholder="Title" required>
                        </div>
                        <div class="mb-3">
                            <div class="message">
                                <textarea class="form-control" rows="4" required name="message" placeholder="Message"></textarea>
                                <div class="btn-group">

                                    <!-- <a href="#" class="btn btn-link">
                                            <img src="{{ asset('assets/images/company/icons/smile.png') }}" alt="smile"
                                                class="img-fluid" width="18" height="18" />
                                        </a>
                                        <a href="#" class="btn btn-link">
                                            <img src="{{ asset('assets/images/company/icons/image.png') }}" alt="image"
                                                class="img-fluid" width="18" height="18" />
                                        </a>
                                        <a href="#" class="btn btn-link">
                                            <img src="{{ asset('assets/images/company/icons/attach-paperclip.png') }}"
                                                alt="attach-paperclip" class="img-fluid" width="17"
                                                height="17" />
                                        </a>
                                        <a href="#" class="btn btn-link">
                                            <img src="{{ asset('assets/images/company/icons/mic.png') }}" alt="mic"
                                                class="img-fluid" width="18" height="18" />
                                        </a>
                                        <a href="#" class="btn btn-link">
                                            <img src="{{ asset('assets/images/company/icons/video-camera.png') }}"
                                                alt="video camera" class="img-fluid" width="18" height="18" />
                                        </a>
                                        <a href="#" class="btn btn-link">
                                            <img src="{{ asset('assets/images/company/icons/ai-technology.png') }}"
                                                alt="ai technology" class="img-fluid" width="18" height="18" />
                                        </a> -->

                                </div>

                            </div>

                        </div>
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-dark">Add</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div id="edit-canned" class="modal TopupM fade" tabindex="-1" role="dialog" aria-labelledby="edit-cannedLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"> <img
                        src="{{ asset('assets/images/company/icons/Canned-w.png') }}" class="me-1" height="34" width="37"
                        alt="Canned" /> <span>Edit Canned Response</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="post" action="" id="updateFieldForm">
                @csrf
                @method('PUT')
                <input type="hidden" name="chat_id" value="{{ $id }}">
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="mb-3">
                            <input type="text" class="form-control form-lg" name="title" id="title"
                                placeholder="Title" required>
                        </div>
                        <div class="mb-3">
                            <div class="message">
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-dark">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<div id="add-reminder" class="modal TopupM fade" tabindex="-1" role="dialog" aria-labelledby="add-reminderLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"><img
                        src="{{ asset('assets/images/company/icons/add-bell-w.png') }}" alt="Add Reminder"
                        class="me-1" width="30" height="30" /> <span>Add Reminder</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="post" id="addReminderForm" action="{{ route('user.reminder.store') }}">
                @csrf
                <input type="hidden" name="source" value="chat">
                <input type="hidden" name="contact_id" id="reminder-contact-id" value="{{ $contact->id }}">
                <div class="modal-body">
                   <div class="modal-form">
                        <div class="mb-3">
                            <input type="text" class="form-control form-lg" name="title" id="reminder"
                                placeholder="Reminder" required>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-12 mb-3">
                                <div class="input-group date" data-provide="datepicker">
                                    <span class="input-group-addon">
                                        <img src="{{ asset('assets/images/company/icons/calendar.png') }}"
                                            alt="smile" class="img-fluid" width="24" height="24" /></span>
                                    <input type="text" required class="form-control form-lg customdate" name="date" placeholder="Start Date">

                                </div>
                            </div>
                            <div class="col-sm-6 col-12 mb-3">
                                <div class='input-group timeP' id='datetimepicker2'>
                                    <input type='time' required class="form-control form-lg customdate" name="time" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-12 mb-3">
                                <div class="Trigger">
                                    <div class="form-check form-switch white-switch">
                                        <input class="form-check-input hide-on" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked" onchange="{
                                                if($(this).prop('checked')) {

                                                $('.hideme').show();
                                                $(this).addClass('hide-off');
                                                $(this).removeClass('hide-on');
                                                $('.is_repeat').val(1);
                                                $('#rem_report').attr('required',true);
                                                $('#rem_repeat_date').attr('required',true);

                                                } else{

                                                $('.hideme').hide();
                                                $(this).removeClass('hide-off');
                                                $(this).addClass('hide-on');
                                                $('.is_repeat').val(0);
                                                $('#rem_report').removeAttr('required');
                                                $('#rem_repeat_date').val('');
                                                $('#rem_report').val('');
                                                $('#rem_repeat_date').removeAttr('required',true);

                                               }}">
                                        <input type="hidden" name="is_repeat" class="is_repeat" value="0">
                                        <label class="form-check-label text-white fw-normal font-13"
                                            for="flexSwitchCheckChecked">Repeat this reminder</label>
                                    </div>


                                </div>
                            </div>
                            <div class="col-sm-6 col-12 mb-3">
                                <div class="Trigger">
                                    <div class="form-check form-switch white-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked1" onchange="{ $(this).prop('checked') ? $('.is_global').val(1) : $('.is_global').val(0); }">
                                        <input type="hidden" name="is_global" class="is_global" value="0">
                                        <label class="form-check-label text-white fw-normal font-13"
                                            for="flexSwitchCheckChecked1">Global Reminder </label>
                                    </div>
                                    <i class="fa-solid fa-circle-question text-white font-13" data-bs-toggle="tooltip"
                                        data-placement="right"
                                        title="Global reminders are applied to all contacts"></i>

                                </div>
                            </div>
                        </div>
                        <div class="row hideme" style="display: none">
                            <div class="col-sm-6 col-12 mb-3">
                                <select id="rem_report" class="form-select form-lg" name="report" >
                                    <option value="">Select Report</option>
                                    <option value="once">Once</option>
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
                                            alt="smile" class="img-fluid" width="24" height="24" /></span>
                                    <input type="text" class="form-control form-lg customdate" placeholder="Repeat Date"  id="rem_repeat_date" name="repeat_date">

                                </div>
                            </div>


                            <div class="col-sm-6 col-12 mb-3 optionfielddays" id="weekly" style="display: none">
                                <select id="days" class="form-select form-lg"  >
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                    <option value="sunday">Sunday</option>
                                </select>
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


<div id="edit-reminder" class="modal TopupM fade" tabindex="-1" role="dialog"
    aria-labelledby="edit-reminderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"><img
                        src="{{ asset('assets/images/company/icons/add-bell-w.png') }}" alt="Edit Reminder"
                        class="me-1" width="30" height="30" /> <span>Edit Reminder</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="post" id="editReminderForm" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="source" value="chat">

                <div class="modal-body">
                    <div class="modal-form">
                        <div class="mb-3">
                            <input type="text" class="form-control form-lg" name="title" id="e-reminder"
                                placeholder="Reminder" required>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-12 mb-3">
                                <div class="input-group date" data-provide="datepicker">
                                    <span class="input-group-addon">
                                        <img src="{{ asset('assets/images/company/icons/calendar.png') }}"
                                            alt="smile" class="img-fluid" width="24" height="24" /></span>
                                    <input type="text"  class="form-control form-lg customdate" name="date" placeholder="Start Date" id="e-reminder-date">

                                </div>
                            </div>
                            <div class="col-sm-6 col-12 mb-3">
                                <div class='input-group timeP' id='datetimepicker2'>
                                    <input type='time'  class="form-control form-lg customdate" name="time" id="e-reminder-time" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-12 mb-3">
                                <div class="Trigger">
                                    <div class="form-check form-switch white-switch">
                                        <input class="form-check-input hide-on" type="checkbox" role="switch"

                                                id="flexSwitchCheckChecked2" onchange="{
                                                if($(this).prop('checked')) {

                                                $('.e-rem-div').show();
                                                $(this).addClass('hide-off');
                                                $(this).removeClass('hide-on');
                                                $('.e-is_repeat').val(1);
                                                $('#e-rem_report').attr('required',true);
                                                $('#e-rem_repeat_date').attr('required',true);

                                                } else{

                                                $('.e-rem-div').hide();
                                                $(this).removeClass('hide-off');
                                                $(this).addClass('hide-on');
                                                $('.e-is_repeat').val(0);
                                                $('#e-rem_report').removeAttr('required');
                                                $('#e-rem_repeat_date').val('');
                                                $('#e-rem_report').val('');
                                                $('#e-rem_repeat_date').removeAttr('required',true);

                                               }}">
                                               >
                                        <input type="hidden" name="is_repeat" class="e-is_repeat" value="0">
                                        <label class="form-check-label text-white fw-normal font-13"
                                            for="flexSwitchCheckChecked2">Repeat this reminder</label>
                                    </div>


                                </div>
                            </div>
                            <div class="col-sm-6 col-12 mb-3">
                                <div class="Trigger">
                                    <div class="form-check form-switch white-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked3" onchange="{ $(this).prop('checked') ? $('.e-is_global').val(1) : $('.e-is_global').val(0); }">
                                        <input type="hidden" name="is_global" class="e-is_global" value="1">
                                        <label class="form-check-label text-white fw-normal font-13"
                                            for="flexSwitchCheckChecked3">Global Reminder </label>
                                    </div>
                                    <i class="fa-solid fa-circle-question text-white font-13" data-bs-toggle="tooltip"
                                        data-placement="right"
                                        title="Global reminders are applied to all contacts"></i>


                                </div>
                            </div>
                        </div>

                        <div class="row hideme e-rem-div" style="display: none">
                            <div class="col-sm-6 col-12 mb-3">
                                <select id="e-rem_report" class="form-select form-lg" name="report" >
                                    <option value="">Select Report</option>
                                    <option value="once">Once</option>
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
                                            alt="smile" class="img-fluid" width="24" height="24" /></span>
                                    <input type="text" class="form-control form-lg customdate" placeholder="Repeat Date"  id="e-rem_repeat_date" name="repeat_date">

                                </div>
                            </div>


                            <div class="col-sm-6 col-12 mb-3 optionfielddays" id="e-weekly" style="display: none">
                                <select id="e-days" class="form-select form-lg"  >
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                    <option value="sunday">Sunday</option>
                                </select>
                            </div>

                    </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-dark">Update</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div id="new-tag" class="modal TopupM fade" tabindex="-1" role="dialog" aria-labelledby="new-tagLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"><img
                        src="{{ asset('assets/images/company/icons/Tags-W.png') }}" alt="more"
                        class="me-1" width="37" height="34" /> <span>New Tag</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="post" action="{{ route('user.tag-store') }}">
                @csrf
                <input type="hidden" name="contact_id" id="newTagContact" />
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="label" class="form-label text-white fw-400">Type</label>
                                <input type="text" class="form-control form-lg" name="name"
                                    placeholder="Type in your new tag" required>
                            </div>

                        </div>
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-dark">Add</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<div id="Add-notes" class="modal TopupM fade" tabindex="-1" role="dialog" aria-labelledby="Add-notesLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"><img
                        src="{{ asset('assets/images/company/icons/Notes-w.png') }}" alt="more"
                        class="me-1" width="34" height="34" /> <span>Add Note</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="post" action="{{ route('user.note.add') }}">
                @csrf
                <input type="hidden" name="contact_id" id="Add-notes_contact_id">
                <input type="hidden" name="route" value="chat">
                <div class="modal-body">
                    <div class="modal-form suggestion">
                        <div class="mb-3">
                            <select id="showOp" multiple class="hidden cursor w-100" ></select>
                            <div class="message">
                                <textarea class="form-control" rows="4" name="note" id="action-addnote" @if( enableTeam() ) onkeyup="myFunction();" @endif></textarea>
                            </div>

                        </div>

                        <div class="mt-3 text-end">
                            <button type="sumbit" class="btn btn-dark">Add</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div id="editNoteModal" class="modal TopupM fade" tabindex="-1" role="dialog"
    aria-labelledby="editNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"><img
                        src="{{ asset('assets/images/company/icons/Notes-w.png') }}" alt="more"
                        class="me-1" width="34" height="34" /> <span>Edit Note</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                <div class="modal-form">
                    <div class="mb-3">

                        <div class="form-group">
                            <label for="label" class="form-label text-white fw-400">Note</label>
                            <input type="hidden" name="note_id" id="note_id" />
                            <textarea class="form-control" rows="4" name="name" id="e-note"></textarea>
                        </div>

                    </div>

                    <div class="mt-3 text-end">
                        <button type="button" class="btn btn-dark update-note">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script type="text/javascript">
    setTimeout(function() {
        $('#theChatHolder').scrollTop($('#theChatHolder')[0].scrollHeight);
    }, 1000);


    $(document).ready(function() {
        $("body").attr("data-leftbar-compact-mode", "condensed");
        $("body").attr("data-leftbar-theme", "dark");
        $("body").addClass("show sidebar-enable");
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"
    integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA=="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(".mytextarea").emojioneArea();
    });
</script>

<script>
    $(document).ready(function() {
        $("#whatsappBtn").click(function() {
            $(this).addClass('active');
            $(this).removeClass('inactive');
            $("#SmsBtn").removeClass('active');
            $("#SmsBtn").addClass('inactive');
            $(".sms-message-box").css("display", "block");
            $(".chat-send-template").css("display", "none");
            $(".whatsapp-message-box").css("display", "none");
        });

        $("#SmsBtn").click(function() {
            $(this).addClass('active');
            $(this).removeClass('inactive');
            $("#whatsappBtn").removeClass('active');
            $("#whatsappBtn").addClass('inactive');

            if($("#show-template-box").val() == 1){
                $(".whatsapp-message-box").css("display", "none");
                $(".chat-send-template").css("display", "block");
            }else{
                $(".chat-send-template").css("display", "none");
                $(".whatsapp-message-box").css("display", "block");
            }

            $(".sms-message-box").css("display", "none");
        });

        $(document).on('click', ".canned-response-click", function() {
            $(".emojionearea-editor").text($(this).data('message'));
            $(".message-box").trigger('keyup');
        });


        $('body').delegate('.ctag', 'change', function(e) {

            let contact_id = $(this).attr('contact_id');
            let tag_id = $(this).attr('value');

            $.ajax({
                url: "{{ route('user.switch-tag') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    contact_id,
                    tag_id,
                    action: $(this).prop('checked') ? 'add' : 'remove'
                },
                success: function(res) {
                    if (res.status_code == 500) {
                        toastr.error(res.message);
                    } else {
                        toastr.info(res.message);
                    }
                }
            });

        });

        $('body').delegate('.edit-note', 'click', function(e) {
            e.preventDefault();
            let data = JSON.parse($(this).attr('ndata'));
            $('#e-note').val(data.note);
            $('#note_id').val(data.uuid);
            $('#editNoteModal').modal('show');
        });

        $('body').delegate('.update-note', 'click', function(e) {
            e.preventDefault();
            let value = $('#e-note').val();
            if (!value) {
                toastr.error('Please enter note');
                return;
            }

            $.ajax({
                url: "{{ route('user.note.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    note: $('#e-note').val(),
                    id: $('#note_id').val(),
                    route:'chat'
                },
                success: function(res) {
                    if (res.status_code == 500) {
                        toastr.error(res.message);
                    } else {
                        $('#note' + res.id).html(res.note);
                        toastr.info(res.message);
                        $('#editNoteModal').modal('hide');
                    }
                }
            });
        });

    });
</script>

<script type="text/javascript">
    $('#submitMessage').click(function(e) {
        var obj = $(this);
        $(this).attr('disabled', true);
        $(".invalid-feedback").hide();
        e.preventDefault();
        var message = $('[name="messagesms"]').val();
        var message_text = $('.emojionearea-editor').text();
        if (message == '' && message_text == '') {
            $(".invalid-feedback").show().html('Please enter message');
            $(this).attr('disabled', false);
            return false;
        }

        if (message === '') {
            message = message_text;
        }
        var receiver_id = $('[name="receiver_id"]').val();
        var chat_box_id = $('[name="chat_box_id"]').val();
        var sender_id = $('[name="sender_id"]').val();
        formdata = new FormData();
        formdata.append("_token", "{{ csrf_token() }}");
        if ($('[name="file"]').prop('files').length > 0) {
            var file = $('[name="file"]').prop('files')[0];
            formdata.append("file", file);
        }
        if ($('[name="fileWhatsapp"]').prop('files').length > 0) {
            var file = $('[name="fileWhatsapp"]').prop('files')[0];
            formdata.append("file", file);
        }
        formdata.append("message", message);
        formdata.append("receiver_id", receiver_id);
        formdata.append("sender_id", sender_id);
        formdata.append("chat_type", 'sms');
        formdata.append("chat_box_id", chat_box_id);

        jQuery.ajax({
            url: "{{ route('user.chat.store') }}",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(result) {
                obj.attr('disabled', false);
                $(".mytextarea ").val('');
                $(".emojionearea-editor").html('');
                $(".conversation-list").append(result);
                $('#theChatHolder').scrollTop($('#theChatHolder')[0].scrollHeight);
            }
        });
    });

    $('#submitMessageWhatsapp').click(function(e) {
        $(".invalid-feedback").hide();
        var obj = $(this);
        $(this).attr('disabled', true);
        e.preventDefault();
        var message = $('[name="message"]').val();
        var message_text = $('.emojionearea-editor').text();
        if (message == '' && message_text == '') {
            $(".invalid-feedback").show().html('Please enter message');
            $(this).attr('disabled', false);
            return false;
        }

        if (message === '') {
            message = message_text;
        }

        var receiver_id = $('[name="receiver_id"]').val();
        var chat_box_id = $('[name="chat_box_id"]').val();
        var sender_id = $('[name="sender_id"]').val();
        formdata = new FormData();
        formdata.append("_token", "{{ csrf_token() }}");
        if ($('[name="file"]').prop('files').length > 0) {
            var file = $('[name="file"]').prop('files')[0];
            formdata.append("file", file);
        }
        if ($('[name="fileWhatsapp"]').prop('files').length > 0) {
            var file = $('[name="fileWhatsapp"]').prop('files')[0];
            formdata.append("file", file);
        }

        formdata.append("message", message);
        formdata.append("receiver_id", receiver_id);
        formdata.append("sender_id", sender_id);
        formdata.append("chat_type", 'whatsapp');
        formdata.append("chat_box_id", chat_box_id);

        jQuery.ajax({
            url: "{{ route('user.chat.store') }}",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(result) {
                obj.attr('disabled', false);
                $(".mytextarea ").val('');
                $(".emojionearea-editor").html('');
                $(".conversation-list").append(result);
                $('#theChatHolder').scrollTop($('#theChatHolder')[0].scrollHeight);
            }
        });
    });
</script>

<script type="text/javascript">
    $("#chat-search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log('value', value);
        if (value != "") {
            $(".chat-listing a").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        } else {
            $(".simplebar-content a").show();
        }
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.open-model', function() {
        $('#chat-id-' + $(this).data('id')).val($(".chat_box_id").val());
        $('#send-template-' + $(this).data('id')).modal('show');
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.editField', function() {
        let id = $(this).attr('id');
        let data = JSON.parse($(this).attr('field-data'));

        $('#title').val(data.title);
        $('#message').val(data.message);
        let url = "{{ route('user.canned-responses.update', ':id') }}";
        url = url.replace(':id', id);
        $('#updateFieldForm').attr('action', url);
        $('#edit-canned').modal('show');


    });
</script>

<script type="text/javascript">
    $(document).on("click", ".chat-users-list", function() {

        $(this).siblings('a').find("div:first-child").removeClass('bg-light-active')

        $(this).find("div:eq(0)").addClass('bg-light-active');
        $(this).find(".user-status").empty().html('<span class="user-offline"></span>');

        let chat_id = $(this).data('id');
        let from = $(this).data('from');
        let to = $(this).data('to');

        $(".sender_id").val(from);
        $(".chat_box_id").val(chat_id);
        $(".receiver_id").val(to);

        $('.conversation-list').empty();
        $('.templates').empty();
        $('.canned').empty();

        $('.reminder-res').empty();
        $('.dnote').empty();
        $('.dytags').empty();

        getChat(chat_id);

    });

    function getChat(chat_id) {

        $.ajax({
            url: "{{ url('/customer/chat') }}" + '/' + chat_id + '/messages',
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {

                if(response.contact?.team_id){
                    $('#team_member').select2().val(response.contact?.team_id).trigger('change');
                } else{
                    $('#team_member').select2().val('').trigger('change');
                }

                (response.contact?.email) ?
                $(".em").removeClass('hidden'): $(".em").addClass('hidden');

                (response.contact?.birthdate) ?
                $(".bd").removeClass('hidden'): $(".bd").addClass('hidden');
                if(response.contact && response.contact.uuid){
                    $('.current_contact_id').val(response.contact.uuid);
                }
                $("#contact-name").html(response.contact.name);
                $(".chat-user-profile").removeClass('border-green')
                $(".chat-user-profile").removeClass('border-black')

                if(response.chatType == 'sms'){
                    $("#whatsappBtn").addClass('active');
                    $("#whatsappBtn").removeClass('inactive');
                    $("#SmsBtn").removeClass('active');
                    $("#SmsBtn").addClass('inactive');
                    $(".sms-message-box").css("display", "block");
                    $(".whatsapp-message-box").css("display", "none");
                }else{
                    $("#whatsappBtn").addClass('inactive');
                    $("#whatsappBtn").removeClass('active');
                    $("#SmsBtn").removeClass('inactive');
                    $("#SmsBtn").addClass('active');
                    $(".sms-message-box").css("display", "none");
                    $(".whatsapp-message-box").css("display", "block");
                }

                $(".user-right-icon").empty().html(response.contact_origin);

                $(".user-left-sec").find('button').remove();
                $(".user-left-sec").append(response.hoursLeft);
                $("#user-flag-class").attr('src', response.flag_src);

                

                $(".chat-user-name").html(response.contact.name);
                $("#contact-email").html(response.contact.email);
                $("#contact-phone").html(response.contact.phone);
                $("#contact-birthdate").html(response.contact.birthdate);
                $href = "{{ route('user.contact.edit', ':cuid') }}";
                $href = $href.replace(':cuid', response.contact.uuid);
                $('#edit-info-btn').attr('href', $href);
                // $('.companyowner').html(response.company_owner);

                $('.conversation-list').append(response.messages);
                $('.templates').append(response.templates);
                $('.template').append(response.template);

                $('.show-hide-chat-template').empty().append(response.template);
                if(response.left == 0 && response.chatType != 'sms'){
                    $(".whatsapp-message-box").css("display", "none");
                    $(".show-hide-chat-template").css('display', 'block');
                    $(".chat-send-template").css('display', 'block');
                    $("#show-template-box").val(1);
                }else{
                    $("#show-template-box").val(0);
                }


                $('.canned').append(response.canned_responses);

                $('.dytags').html(response.tags ?? '');
                $('.reminder-res').html(response.reminders);
                $('.dnote').append(response.notes);
                $('#theChatHolder').scrollTop($('#theChatHolder')[0].scrollHeight);

            }
        });
    }
</script>

<script type="text/javascript">
    function deleteConfirm(e) {
        
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this.",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then(t => {
            t.isConfirmed && document.getElementById("deleteForm" + e).submit()
        })
    }

    function deleteTemplate(e) {

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this.",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then(t => {
            t.isConfirmed && document.getElementById("deleteTemplateForm" + e).submit()
        })
    }

    function deleteReminder(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this.",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then(t => {

            $.ajax({
                url: "{{ route('user.delete.chat-reminder') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id
                },
                success: function(res) {
                    popModal('success', res.message);
                    getChat($('.chat_box_id').val());
                }
            })
        })
    }
</script>


<script type="text/javascript">
    $(document).on('click', '.open-tag-add-model', function() {
        $('#tag-chat-id').val($(".chat_box_id").val());
        $('#new-tags').modal('show');
    });


    $(document).on('click', '.open-note-add-model', function() {
        $('#note-chat-id').val($(".chat_box_id").val());
        $('#Add-notes').modal('show');
    });

    $(document).on('click', '.open-reminder-add-model', function() {
        $('.hideme').hide();

        $('#reminder-contact-id').val($(".current_contact_id").val());
        $('#add-reminder').modal('show');
    });

    $(document).on('submit', '#addReminderForm', function(e) {
        e.preventDefault();
        let report = $('#rem_report').val();

        if( report == 'weekly'){
            $('#rem_repeat_date').val($('#days :selected').val());
        }
        let form = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: form,
            success: function(res) {
                $('#add-reminder').modal('hide');
                popModal('success', res.message);
                getChat($('.chat_box_id').val());
            }
        });

        $('.is_repeat').prop('checked',false);
        $('.is_global').prop('checked',false);

        $('#rem_repeat_date').removeAttr('required');
        $('#rem_repeat_date').val('');


        $('#rem_report').removeAttr('required');
        $('#rem_report').val('');

        $('#days').removeAttr('required');
        $('#rem_repeat_date').val('');

        $('#addReminderForm')[0].reset();
    });


    $(document).on('click', '.open-tag-edit-model', function() {
        $('#tag-chat-id').val($(".chat_box_id").val());
        $('#edit-tag').modal('show');
    });


    $(document).on('click', '.open-note-edit-model', function() {
        $('#note-chat-id').val($(".chat_box_id").val());
        $('#edit-notes').modal('show');
    });

    $(document).on('click', '.open-reminder-edit-model', function() {
        $('#reminder-contact-id').val($(".current_contact_id").val());
        let d = JSON.parse($(this).attr('data'));

        $('#e-reminder').val(d.title);
        $('#e-reminder-date').val(d.date);
        $('#e-reminder-time').val(d.time);
        $('#e-rem_report').val(d.report);
        $('#e-rem_repeat_date').val(d.repeat_date);
        if (d.is_repeat == 1) {
            $('.e-is_repeat').val(1);
            $('.e-is_repeat').prev().prop('checked', true);
            $('.e-rem-div').removeClass('hideme').show();

            if( d.report == 'weekly'){

                $('#e-rem_repeat_date').parent().parent().hide();
                $('#e-days').parent().show();
                $('#e-days').val(d.repeat_date);

            } else if(d.report == 'daily') {

                $('#e-rem_repeat_date').parent().parent().hide();
                $('#e-days').parent().hide();

            } else{

                $('#e-rem_repeat_date').parent().parent().show()
                $('#e-rem_repeat_date').val(d.repeat_date);
                $('#e-days').parent().hide();
            }

        } else {
            $('.e-is_repeat').val(0);
            $('#e-rem_report').removeAttr('required');
            $('#e-rem_repeat_date').removeAttr('required');
            $('.e-is_repeat').prev().removeAttr('checked');
            $('.e-rem-div').addClass('hideme').hide();
        }
        if (d.is_global == 1) {
            $('.e-is_global').val(1);
            $('.e-is_global').prev().prop('checked', true);
        } else {
            $('.e-is_global').val(0);
            $('.e-is_global').prev().prop('checked', false);
        }
        let ehref = "{{ route('user.reminder.update',':id') }}";
        ehref = ehref.replace(':id', d.uuid);
        $('#editReminderForm').attr('action', ehref);
        $('#edit-reminder').modal('show');
    });

    $(document).on('submit', '#editReminderForm', function(e) {
        e.preventDefault();
        let form = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: form,
            success: function(res) {
                $('#edit-reminder').modal('hide');
                popModal('success', res.message);
                getChat($('.chat_box_id').val());
            }
        });
    });
</script>

<script>
    if ($(window).width() <= 767) {
        $('.chat-users-list').on('click', function() {
            $('.m_right').css("display", "block");
            $('.m_left').css("display", "none");
        })
        $('.backChat').on('click', function() {
            $('.m_right').css("display", "none");
            $('.m_left').css("display", "block");
        })
    }
</script>


<script type="text/javascript">
    $(document).on('click', '.open-video-recorder', function(e) {
        e.preventDefault();
        $('.audio-messages').hide();
        $(".show-video-recorder").show();
    })


    $(document).on('click', '.show-audio-recording', function(e) {
        e.preventDefault();
        $(".show-video-recorder").hide();
        $('.audio-messages').show();
    });

    $(document).on('click', '#close-audio-recorder', function() {
        $(".audio-messages").hide();
    });
</script>


<script>
    let mediaRecorder;
    let audioChunks = [];
    let startTime;
    let timerInterval;

    document.getElementById('start').addEventListener('click', async () => {
        const stream = await navigator.mediaDevices.getUserMedia({
            audio: true
        });
        mediaRecorder = new MediaRecorder(stream);

        mediaRecorder.ondataavailable = event => {
            audioChunks.push(event.data);
        };

        mediaRecorder.onstart = () => {
            startTime = Date.now();
            document.getElementById('start').disabled = true;
            document.getElementById('stop').disabled = false;
            document.getElementById('stop-send').disabled = true;
        };

        mediaRecorder.onstop = async () => {
            clearInterval(timerInterval);
            const audioBlob = new Blob(audioChunks, {
                type: 'audio/ogg; codecs=opus'
            });
            const audioUrl = URL.createObjectURL(audioBlob);

            document.getElementById('audioPlayback').src = audioUrl;

             console.log('Blob size:', audioBlob.size);

            // Send the audio file to the server
            const formData = new FormData();
            formData.append('audio', audioBlob, 'recording.ogg');
            formData.append('chat_id', $(".chat_box_id").val());
            formData.append('chat_type', $(".chat_type").val());
            formData.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('user.chat.save-recording') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: response => {
                    $("#audio_path").val(response.path);
                },
                error: error => {
                    alert('Error uploading audio');
                }
            });

            audioChunks = [];
            document.getElementById('start').disabled = false;
            document.getElementById('stop').disabled = true;
            document.getElementById('stop-send').disabled = false;
        };

        mediaRecorder.start();
    });

    document.getElementById('stop').addEventListener('click', () => {
        mediaRecorder.stop();
    });
</script>

<script>
    $(document).ready(function() {
        $('#get-suggestion').click(function() {
            var prompt = $('#user-prompt').val();
            $.ajax({
                url: "{{ route('user.get-suggestion') }}",
                method: 'POST',
                data: {
                    prompt: prompt,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.suggestion) {
                        $('#suggestion-result').text(response.suggestion);
                    } else if (response.error) {
                        $('#suggestion-result').text(response.error);
                    }
                },
                error: function(xhr) {
                    $('#suggestion-result').text('An error occurred.');
                }
            });
        });
    });
</script>


<script>
    let mediaRecorder1;
    let recordedChunks = [];
    let startTime1;

    $(document).ready(function() {
        const video = document.getElementById('video-preview');
        const startButton = document.getElementById('start-recording');
        const stopButton = document.getElementById('stop-recording');
        const stopSendButton = document.getElementById('stop-recording-send');

        startButton.addEventListener('click', async () => {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: true
                });
                video.srcObject = stream;
                video.play();

                mediaRecorder1 = new MediaRecorder(stream);
                startTime1 = Date.now();

                mediaRecorder1.ondataavailable = event => {
                    if (event.data.size > 0) {
                        recordedChunks.push(event.data);
                    }
                };

                mediaRecorder1.onstop = () => {
                    const blob = new Blob(recordedChunks, {
                        type: 'video/mp4'
                    });
                    const formData = new FormData();
                    formData.append('video', blob, 'video.mp4');
                    formData.append('chat_id', $(".chat_box_id").val());
                    formData.append('chat_type', $(".chat_type").val());
                    formData.append('_token', "{{ csrf_token() }}");

                    $.ajax({
                        url: "{{ route('user.chat.save-video-recording') }}",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: response => {
                            $("#video_path").val(response.path);
                            stopSendButton.disabled = false;

                        },
                        error: error => {
                            alert('Error uploading video');
                        }
                    });
                };

                mediaRecorder1.start();

                startButton.disabled = true;
                stopButton.disabled = false;
                stopSendButton.disabled = true;
            } catch (err) {
                console.error('Error accessing media devices.', err);
            }
        });

        stopButton.addEventListener('click', () => {
            mediaRecorder1.stop();
            video.srcObject.getTracks().forEach(track => track.stop());
            startButton.disabled = false;
            stopButton.disabled = true;
            // stopSendButton.disabled = false;
        });
        $('body').on('click',function(e){
            $('#test').addClass('hidden');
        });

    });

    $(document).on('click','#showOp option',function(){
      let val = $(this).val();
      var text = document.getElementById('action-addnote').value;
      var mentionPart = text.split('@').pop();
      let rem = mentionPart.length > 1 ? val.replace(mentionPart) : val;

      document.getElementById('action-addnote').value = ('@'+rem);
      $('#showOp').addClass('hidden');

    });



    $(document).on('click', '#stop-send', function() {
        var audio = $("#audio_path").val();

        const formData = new FormData();
        formData.append('audio', audio);
        formData.append('chat_id', $(".chat_box_id").val());
        formData.append('chat_type', $(".chat_type").val());
        formData.append('_token', "{{ csrf_token() }}");

        $.ajax({
            url: "{{ route('user.chat.save-audio-recording') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: response => {
                $('.audio-messages').hide();
                setTimeout(function() {
                    //location.reload(true);
                }, 1000);
            },
            error: error => {
                alert('Error uploading video');
            }
        });
    });


    $(document).on('click', '#stop-recording-send', function() {
        var video = $("#video_path").val();

        const formData = new FormData();
        formData.append('video', video);
        formData.append('chat_id', $(".chat_box_id").val());
        formData.append('chat_type', $(".chat_type").val());
        formData.append('_token', "{{ csrf_token() }}");

        $.ajax({
            url: "{{ route('user.chat.send-video-recording') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: response => {
                $('.show-video-recorder').hide();
                setTimeout(function () {
                    location.reload(true);
                }, 1000);
            },
            error: error => {
                alert('Error uploading video');
            }
        });
    });

    $(document).on('click', '#close-recorder', function() {
        $(".show-video-recorder").hide();
    });
</script>

<script type="text/javascript">
    /*    setInterval(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var receiver_id = $('[name="receiver_id"]').val();
        var chat_box_id = $('[name="chat_box_id"]').val();
        var sender_id = $('[name="sender_id"]').val();

        $.ajax({
            url: "{{ route('user.chat.get-message') }}",
            method: "get",
            data: {
                receiver_id: receiver_id,
                chat_box_id: chat_box_id,
                sender_id: sender_id
            },
            success: function(data){
                $(".conversation-list").append(result);
                $('#theChatHolder').scrollTop($('#theChatHolder')[0].scrollHeight);
            }
        })
    }, 10000);*/
</script>
<script>
    // $(document).on('click', '.hide-off', function() {
    //     $('.hideme').hide();
    //     $(this).removeClass('hide-off');
    //     $(this).addClass('hide-on');
    // })

    // $(document).on('click', '.hide-on', function() {
    //     $('.hideme').show();
    //     $(this).removeClass('hide-on');
    //     $(this).addClass('hide-off');
    // })


    $(document).on('keyup', '.mytextarea', function(e) {
        var id = e.which;
        if(id == 13)
        {
            var active = $(".message_type").find('a.active').attr('id');
            if(active == 'SmsBtn'){
                $("#submitMessageWhatsapp").trigger('click');
            }else{
                $("#submitMessage").trigger('click');
            }
        }
    });
</script>


<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.2/dist/echo.iife.js"></script>

<script>


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "{{ env('PUSHER_APP_KEY') }}",
    cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
    encrypted: false,
    host: '127.0.0.1',
    scheme: 'http'
});

console.log('echo', window.Echo);


window.Echo.channel('messages')
.listen('.messages.receive', (e) => {
    console.log('e.message', e.message);
    var active_chat = $('.chat_box_id').val();
    if(active_chat == e.message.chat_box_id){

        e.message._token = "{{ csrf_token() }}";

        $.ajax({
            url: "{{ route('user.chat.get-message') }}",
            type: 'POST',
            data: e.message,
            success: function(data) {
                console.log('data', data);
                $(".conversation-list").append(data);
                $('#theChatHolder').scrollTop($('#theChatHolder')[0].scrollHeight);
            },
            error: function() {
            }
        });

    }else{
        $("#chat-users-list-"+e.message.chat_box_id).find(".user-status").html('<span class="user-online"></span>');
    }
    // console.log("I amd here", e.message);
});




$(document).on('click', '.nav-item .show-new-chats', function (e) {
    e.preventDefault();

    $.ajax({
        url: "{{ route('user.chat.get-new-chats') }}",
        type: 'GET',
        data: e.message,
        success: function(data) {
            $(".chat-listing").empty().append(data);
        },
        error: function() {
        }
    });
});

$(document).on('click', '.nav-item .show-all-chats', function (e) {
    e.preventDefault();
    
    $.ajax({
        url: "{{ route('user.chat.get-all-chats') }}",
        type: 'GET',
        data: e.message,
        success: function(data) {
            $(".chat-listing").empty().append(data);
        },
        error: function() {
        }
    });
});

</script>


<script>

var namesArray = [];
@if( !is_null(getCustomer()->teamMembers) &&  count(getCustomer()->teamMembers) )
@foreach( getCustomer()->teamMembers as $member)
namesArray.push('{{"@".$member->name}}');
@endforeach
@endif
   //var namesArray = ["@Alex", "@Anna", "@Eva", "@George", "@Jason", "@John", "@Lisa", "@Mary", "@Michael", "@Nick", "@Vicky"];

    function myFunction() {
    var text = document.getElementById('action-addnote').value;

    var patt1 = new RegExp('^' + text, "i");

    var result = "";

    if (text.length > 0) {

        patt1.test('@') && document.getElementById('showOp').classList.remove('hidden');
        for (i = 0; i < namesArray.length; i++) {
        if (patt1.test(namesArray[i])){
            result += "<option value='"+namesArray[i].substring(1)+"'>"+namesArray[i]+"</option>";
        } else{
            document.getElementById('showOp').classList.remove('remove');
        }
        }
    } else {
        document.getElementById('showOp').classList.add('hidden');
    }

    document.getElementById("showOp").innerHTML = result;
    }

</script>

 <script>
        $(function() {
            $('#rem_report').change(function() {

                if( $('.is_repeat').val() == 1 ){
                $('#rem_repeat_date').val('');

                let val = $(this).val();

                if( val == 'monthly' || val == 'annually' || val == 'once'){

                   $('#rem_repeat_date').attr('required',true);
                   $('#rem_repeat_date').parent().parent().show();
                   $('#days').removeAttr('required');
                   $('#days').parent().hide();

                } else if(val == 'weekly'){

                    $('#rem_repeat_date').removeAttr('required');
                    $('#rem_repeat_date').parent().parent().hide();
                    $('#days').attr('required',true);
                    $('#days').parent().show();
                    $('#rem_repeat_date').val($('#days :selected').val());

                }else{
                    $('#rem_repeat_date').removeAttr('required');
                    $('#rem_repeat_date').parent().parent().hide();
                    $('#days').removeAttr('required');
                    $('#days').parent().hide();
                }
            }

            });

        });

        $(function() {
            $('#e-rem_report').change(function() {

                if( $('.e-is_repeat').val() == 1 ){
                $('#e-rem_repeat_date').val('');

                let val = $(this).val();

                if( val == 'monthly' || val == 'annually' || val == 'once'){

                   $('#e-rem_repeat_date').attr('required',true);
                   $('#e-rem_repeat_date').parent().parent().show();
                   $('#e-days').removeAttr('required');
                   $('#e-days').parent().hide();

                } else if(val == 'weekly'){

                    $('#e-rem_repeat_date').removeAttr('required');
                    $('#e-rem_repeat_date').parent().parent().hide();
                    $('#e-days').attr('required',true);
                    $('#e-days').parent().show();
                    $('#e-rem_repeat_date').val($('#e-days :selected').val());

                }else{
                    $('#e-rem_repeat_date').removeAttr('required');
                    $('#e-rem_repeat_date').parent().parent().hide();
                    $('#e-days').removeAttr('required');
                    $('#e-days').parent().hide();
                }
            }

            });

        });


        var hoursLeft = "{{ $hoursLeft }}";
        var chatType = "{{ $chat_type }}";

      /*  if(hoursLeft == 0 && chatType == 'whatsapp'){
            setTimeout(function () {
                $(".mytextarea").data("emojioneArea").disable();
            }, 500);
        }*/
    </script>

<script>
    $(document).ready(function(){
        $(document).on('click', ".show-temp", function () {
            $(".show-template-list").show();
        });

        $(document).on('click', ".close-temp", function () {
            $(".show-template-list").hide();
        });
    });
    </script>
@endpush
