<input type="hidden" id="show-template-box" value="{{ ($box->chat_type == 'whatsapp' && $hoursLeft == 0) ? 1 : 0 }}">

<div class="whatsApp chat-send-template show-temp"  @if($box->chat_type == 'whatsapp' && $hoursLeft == 0) style="display: block;" @else style="display: none;" @endif >
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