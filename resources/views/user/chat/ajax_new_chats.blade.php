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
        class="d-flex align-items-start p-2">
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