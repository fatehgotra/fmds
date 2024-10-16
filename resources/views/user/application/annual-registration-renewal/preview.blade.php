@php $preview = get_preview($key); @endphp
<th class="text-center preview cursor"
    type="{{ count($preview) > 0 ?  $preview['type'] : '' }}"
    source="{{ count($preview) > 0 ?  $preview['file'] : '' }}">
    <span>Preview</span><br>

    @if( count($preview) > 0 )
    @if( $preview['type'] == 'image' )
    <img src="{{ count($preview) > 0 ?  $preview['file'] : '' }}" width="50%" height="50%">
    @else
    <img src="{{ asset('assets/images/pdf-icon.png') }}" width="25%" height="25%">
    @endif
    @endif

</th>
