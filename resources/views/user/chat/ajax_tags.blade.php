<div class="card-body">
    @if( count(listTags()) > 0 )
    <div class="reminder tags">

        @foreach(listTags() as $k => $tag)
        <div class="reminder-list">
            <div class="form-check">
                <input class="form-check-input ctag" type="checkbox" value="{{$tag->uuid}}" contact_id="{{ $contact->uuid }}" id="flexCheckDefault{{$k+1}}"
                    @if( count($tags) )
                @foreach($tags as $stag)
                @if($tag->id == $stag->tag_id)
                checked
                @endif
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
    <button
        type="button"
        onclick="{ $('#newTagContact').val('{{ $contact->uuid }}') }"
        data-bs-toggle="modal"
        data-bs-target="#new-tag"
        class="btn btn-light w-100">New Tag</button>

    @else
    <div class="text-center text-white">No Tag Available</div>
    @endif
</div>