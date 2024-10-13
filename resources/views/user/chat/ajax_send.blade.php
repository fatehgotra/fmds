<li class="clearfix odd">

<div class="conversation-text template_msg @if ($message->chat_type == 'whatsapp') whatsapp-message  @else sms-message @endif @if($message->header_type == 'audio') whatsapp-audio @endif">
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