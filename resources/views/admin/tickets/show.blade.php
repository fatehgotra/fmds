@extends('layouts.admin')
@section('title', 'View Ticket')
@section('content')

<div class="container-fluid TicketView">
    <div class="page-title-box">
        <div class="page-title-right">

            @if($ticket->status == 1)
            <button class="btn btn-danger btn-sm">Open</button>
            @else
            <button class="btn btn-primary btn-sm">Resolved</button>
            @endif

        </div>
        <h4 class="page-title">Ticket: {{ $ticket->title }}</h4>
    </div>

    @if( isset($ticket->messages) )
    @foreach($ticket->messages as $msg)

    <div class="card mt-2">
        <div class="card-body">
            <div class="d-flex TicketDetail" style="align-items:center">
                <div class="tiki-img">

                    @if( $msg->by == 'customer')
                    <img src="{{ asset('assets/images/users/avatar.png') }}" alt="user-image" class="rounded-circle img-thumbnail" height="68" width="68">
                    @else
                    <img src="{{ asset('assets/images/users/avatar-icon.png') }}" alt="user-image" class="rounded-circle img-thumbnail" height="68" width="68">
                    @endif

                </div>
                <div class="tiki-title ms-2">
                    <p style="line-height: 24px">{!! $msg->message !!}</p>
                    @if( isset($msg->attachment) )
                    <img src="{{ asset('storage/uploads/ticket/'.$msg->attachment) }}" alt="" style="max-width: 300px;max-height: 250px;">
                    @endif
                </div>
            </div>
            <div class="text-end TicketDate">
                <p class="mb-0 text-dark">{{ ($msg->by == 'customer' ) ? $ticket->customer?->name : 'Support Team' }} @ {{ \Carbon\Carbon::parse($msg->created_at)->format('d M, Y h:i A') }}</p>
            </div>
        </div>
    </div>

    @endforeach
    @else

    <div class="card mt-2">
        <div class="card-body">
            <div class="d-flex" style="align-items:center">
                <div class="tiki-title ms-2">
                    <p class="text-center text-dark fw-normal font-15" style="line-height: 24px">No Message found.</p>
                </div>
            </div>

        </div>
    </div>

    @endif

    @if($ticket->status == 1)
    <div class="reply-textarea">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.tickets.update',$ticket->uuid) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="date" name="date" class="form-label">Reply</label>
                        <textarea name="message" id="editor" class="form-control"></textarea>
                        @error('message')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="avatar">Attachment</label>
                        <div class="input-group">
                            <input type="file" class="form-control form-control-lg upload-input-font" id="avatar" name="attachment"
                                onchange="loadPreview(this);">
                        </div>
                        @if ($errors->has('attachment'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('attachment') }}</strong>
                        </span>
                        @endif
                        <img id="preview_img" class="mt-2" width="100"
                            height="100" />
                    </div>


                    <div class="mt-3 text-end">
                        <button class="btn btn-primary" type="submit">Send Reply</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @endif
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
