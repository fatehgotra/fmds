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