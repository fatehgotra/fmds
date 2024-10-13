<div class="card-body">
    <div class="Notes add-note">

        @if( count($notes) > 0 )
        @foreach( $notes as $note)

        <div class="Note-list" id="note_div{{$note->uuid}}">

            <p id="note{{$note->uuid}}">{{ $note->note }}</p>
            @if( $note->creator == 'customer' && loginUser()->getTable() == 'teams')
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                <path fill="#111111" d="M4 5v-.8C4 1.88 5.79 0 8 0s4 1.88 4 4.2V5h1.143c.473 0 .857.448.857 1v9c0 .552-.384 1-.857 1H2.857C2.384 16 2 15.552 2 15V6c0-.552.384-1 .857-1zM3 15h10V6H3zm5.998-3.706L9.5 12.5h-3l.502-1.206A1.644 1.644 0 0 1 6.5 10.1c0-.883.672-1.6 1.5-1.6s1.5.717 1.5 1.6c0 .475-.194.901-.502 1.194M11 4.36C11 2.504 9.657 1 8 1S5 2.504 5 4.36V5h6z" />
            </svg>
            @else
            <div class="dropdown float-end">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item cursor edit-note" ndata="{{$note}}">Edit</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item" onclick="deleteNote('{{$note->uuid}}')">Delete</a>
                </div>
            </div>
            @endif

        </div>
        @endforeach
        @endif

    </div>
    <div class="mb-2">
        <button type="button"
            onclick="{ $('#Add-notes_contact_id').val('{{$contact->uuid}}') }"
            data-bs-toggle="modal"
            data-bs-target="#Add-notes"
            class="btn btn-light w-100">New Note</button>
    </div>
</div>