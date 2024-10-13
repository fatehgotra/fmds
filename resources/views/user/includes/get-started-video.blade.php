<div class="card">
    <div class="card-body">

        @if( !str_contains( media_video('getting-started'),'yout') && !str_contains( media_video('getting-started'),'vimeo') )
        <video id="my-video" class="video-js" controls preload="auto" poster="{{ asset('assets/images/company/video-bg.png') }}" data-setup='' loop>
            <source src="{{ media_video('getting-started') }}" type='video/mp4'>
        </video>
        @else
        <iframe width="100%" height="200" src="{{ media_video('getting-started') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        @endif

    </div> <!-- end card-body -->
</div> <!-- end card-->