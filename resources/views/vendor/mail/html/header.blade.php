@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
<img src="{{ asset('assets/images/logo.png') }}" class="logo" width="275" height="44" alt="Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
