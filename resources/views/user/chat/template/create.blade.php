@if ($templates && count($templates))
@foreach ($templates as $template)

@php



@endphp

<div id="send-template-{{ $template->id }}" class="modal TopupMW fade" tabindex="-1" role="dialog"  aria-labelledby="send-templateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h4 class="modal-title text-dark"><span>Send Template</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="p-2 pt-0">
                <form method="POST" action="{{ route('user.chat.template.send') }}" id="PageForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="chat_id" id="chat-id-{{ $template->id }}" value="{{ $id }}">
                    <input type="hidden" name="template_id" value="{{ $template->id }}">

                    <div class="row">

                        <div class="col-xl-4 col-lg-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Template Details</h4>

                                    <div class="mb-3">
                                        <label for="label" class="form-label">Type <i
                                                class="fa-solid fa-circle-question text-dark font-15 ms-1"
                                                data-bs-toggle="tooltip" data-placement="right"
                                                title="It is a long established fact that a reader"></i></label>
                                        <select id="Category" class="form-select form-lg" name="type">
                                            <option value="whatsapp">whatsapp</option>
                                            <option value="sms">sms </option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="label" class="form-label">Template</label>
                                        <input type="text" readonly class="form-control form-lg" name="name"
                                            value="{{ old('name', $template->name) }}" placeholder="Enter Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-12">
                            <div class="card">
                                <div class="card-body">

                                          <div class="mb-3 text box" @if(isset($template->header_type) && $template->header_type == 'text') style="display: block;" @else style="display: none;" @endif>

                                            <label for="label" class="form-label mb-0">Header Text </label>
                                            <input type="text" name="header" id="header" readonly value="{{ $template->header }}" class="form-control form-lg">
                                            @error('header')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 image box" @if(isset($template->header_type) && $template->header_type == 'image') style="display: block;" @else style="display: none;" @endif>

                                            <label for="label" class="form-label mb-0">Header Image </label>
                                            <input type="file" name="image" data-id="{{ $template->id }}" accept="image/*" value="{{ old('image', isset($template->image) && $template->image) }}" class="form-control form-control-lg font-13 image" >

                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="mb-3 video box" @if(isset($template->header_type) && $template->header_type == 'video') style="display: block;" @else style="display: none;" @endif>

                                            <label for="label" class="form-label mb-0">Header Video </label>
                                            <input type="file" name="video" id="video" accept="video/*" value="{{ old('video', isset($template->video) && $template->video) }}" class="form-control form-control-lg font-13">
                                            @error('video')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="mb-3 pdf box" @if(isset($template->header_type) && $template->header_type == 'pdf') style="display: block;" @else style="display: none;" @endif>

                                            <label for="label" class="form-label mb-0">Header Pdf </label>
                                            <input type="file" name="pdf" id="pdf" accept="application/pdf" value="{{ old('pdf', isset($template->pdf) && $template->pdf) }}" class="form-control form-control-lg font-13">
                                            @error('pdf')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>


                                        @if(isset($template->variables)) <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Variables</h4> @endif

                                        <div>
                                            @if(isset($template->variables))
                                            @if($template->variables && count($template->variables))
                                            @foreach($template->variables as $key => $variable)

                                            @if($key > 0)
                                            <hr>
                                            @endif

                                            <div class="mb-3">
                                                <p class="mb-1 font-13">Variable {{ $key+1 }}</p>
                                                <input type="text" class="form-control form-lg" readonly name="variables[{{$key}}][name]"
                                                placeholder="Variable" value="{{ $variable }}">
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <p class="mb-1 font-13">Match with a contact field</p>
                                                <select id="contact_field" class="form-select form-lg"  name="variables[{{$key}}][value]">

                                                    <option disabled="disabled" selected="selected" value=""> Select Match with a contact field </option>
                                                    <option selected="selected" value="6">Use manually defined value</option>
                                                    <option value="1">Contact name</option>
                                                    <option value="2">Contact phone</option>
                                                    <option value="5">email</option>
                                                    <input type="text" class="form-control mt-1" name="variables[{{$key}}][text]" >

                                                </select>
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            @endforeach
                                            @endif
                                            @endif

                                        </div>

                                        @if(isset($template->reply_buttons)) <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Buttons</h4> @endif


                                        <div>
                                            @if(isset($template->reply_buttons))
                                            @if($template->reply_buttons && count($template->reply_buttons))
                                            @foreach($template->reply_buttons as $key => $reply_button)

                                            @if($key > 0)
                                            <hr>
                                            @endif

                                            <div class="mb-3">
                                                <p class="mb-1 font-13">Button {{ $key+1 }}</p>
                                                <input type="text" class="form-control form-lg" readonly name="reply_buttons[{{$key}}][name]"
                                                placeholder="Variable" value="{{ $reply_button }}">
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <p class="mb-1 font-13">Match with a contact field</p>
                                                <select id="contact_field" class="form-select form-lg"  name="reply_buttons[{{$key}}][value]">

                                                    <option disabled="disabled" selected="selected" value=""> Select Match with a contact field </option>
                                                    <option selected="selected" value="6">Use manually defined value</option>
                                                    <option value="1">Contact name</option>
                                                    <option value="2">Contact phone</option>
                                                    <option value="5">email</option>

                                                    <input type="text" class="form-control mt-1" name="reply_buttons[{{$key}}][text]" >

                                                </select>
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            @endforeach
                                            @endif
                                            @endif

                                        </div>

                                        @if(isset($template->offer_code))

                                        <hr>

                                        <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Offer Code</h4>

                                        <div >
                                            <div class="mb-3">
                                                <p class="mb-1 font-13">Offer Code</p>
                                                <input type="text" class="form-control form-lg" name="offer_code[name]"
                                                placeholder="Offer Code" value="{{ $template->offer_code }}">
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <p class="mb-1 font-13">Match with a contact field</p>
                                                <select id="contact_field" class="form-select form-lg"  readonly name="offer_code[value]">
                                                    <option disabled="disabled" selected="selected" value=""> Select Match with a contact field </option>
                                                    <option selected="selected" value="6">Use manually defined value</option>
                                                    <option value="1">Contact name</option>
                                                    <option value="2">Contact phone</option>
                                                    <option value="5">email</option>
                                                    <input type="text" class="form-control mt-1" name="offer_code[text]" >
                                                </select>
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @endif


                                        <!-- @if(isset($template->visit_website_name_1))

                                        <hr>

                                        <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Websites</h4>

                                        <div >
                                            <div class="mb-3">
                                                <p class="mb-1 font-13">visit Website Name</p>
                                                <input type="text" class="form-control form-lg" name="visit_website_name_1[name]"
                                                placeholder="Offer Code" value="{{ $template->visit_website_name_1 }}">
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <p class="mb-1 font-13">Match with a contact field</p>
                                                <select id="contact_field" class="form-select form-lg"  readonly name="visit_website_name_1[value]">
                                                    <option disabled="disabled" selected="selected" value=""> Select Match with a contact field </option>
                                                    <option selected="selected" value="6">Use manually defined value</option>
                                                    <option value="1">Contact name</option>
                                                    <option value="2">Contact phone</option>
                                                    <option value="5">email</option>
                                                    <input type="text" class="form-control mt-1" name="visit_website_name_1[text]" >
                                                </select>
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @endif   -->

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Preview</h4>
                                    <div class="card-body p-2" style="background-image: url('/assets/images/company/bg.png')">
                                        <div id="previewElement" class="bg-white rounded mb-1">
                                            <div class="card-body p-2">
                                                <div id="card-header"
                                                    @if ($template->header_type == 'text') style="display: block;" @else style="display: none;" @endif>
                                                    {{ $template->header }}</div>

                                                <div id="card-header-image-{{ $template->id }}"
                                                    @if ($template->header_type == 'image' && isset($template->image)) style="display: block;" @else style="display: none;" @endif>
                                                    <img class="img-fluid" id="imgPreview-{{ $template->id }}"
                                                        src="{{ asset('storage/uploads/customer/' . auth()->user()->id . '/templates/' . $template->image) }}"
                                                        alt="pic" />
                                                </div>

                                                <div id="card-header-video"
                                                    @if ($template->header_type == 'video' && isset($template->video)) style="display: block;" @else style="display: none;" @endif>
                                                    <video width="100%" controls>
                                                        <source
                                                            src="{{ asset('storage/uploads/customer/' . auth()->user()->id . '/templates/' . $template->video) }}"
                                                            id="video_here">
                                                        Your browser does not support HTML5 video.
                                                    </video>
                                                </div>

                                                <div id="card-header-pdf"
                                                    @if ($template->header_type == 'pdf' && isset($template->pdf)) style="display: block;" @else style="display: none;" @endif>
                                                    <img class="img-fluid" id="pdfPreview"
                                                        src="{{ asset('assets/images/pdf.png') }}" alt="pic" />
                                                </div>

                                                <div id="card-body" class="mt-2">
                                                    <p class="font-13 text-dark">{!!  $template->bodyData ?  nl2br(e($template->bodyData))  : nl2br(e($template->body)) !!}
                                                    </p>
                                                </div>
                                                <div id="card-footer" class="mt-2">
                                                    <p>{{ $template->footer }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="quick_reply_buttons" class="btn btn-light btn-sm w-100 mb-1"
                                            @if ($template->reply_buttons && count($template->reply_buttons)) style="display: block;" @else style="display: none;" @endif>

                                            @if ($template->reply_buttons && count($template->reply_buttons))
                                                @foreach ($template->reply_buttons as $key => $reply_button)
                                                    <button type="button" class="mb-1 btn btn-light btn-sm">
                                                        <a href="#" class="text-primary"><i
                                                                class="fa-solid fa-reply"></i> <span
                                                                id="quick_reply_{{ $key + 1 }}">{{ $reply_button }}</span></a>
                                                    </button>
                                                @endforeach
                                            @else
                                                <button type="button" class="mb-1 btn btn-light btn-sm">
                                                    <a href="#" class="text-primary"><i class="fa-solid fa-reply"></i>
                                                        <span id="quick_reply_1">Quick Reply</span></a>
                                                </button>
                                            @endif

                                        </div>

                                        <button type="button" class="btn btn-light btn-sm w-100 mb-1 visit-website" >

                                            <a href="#" class="text-primary" @if ($template->visit_website_name_1) style="display: block;" @else style="display: none;" @endif><i
                                                    class="fa-solid fa-up-right-from-square"></i> <span id="visit-website-1">
                                                    {{ $template->visit_website_name_1 }} </span></a>
                                            <br>
                                            <a href="#" class="text-primary" @if ($template->visit_website_name_2) style="display: block;" @else style="display: none;" @endif><i
                                                    class="fa-solid fa-up-right-from-square"></i> <span id="visit-website-2">
                                                    {{ $template->visit_website_name_2 }} </span></a>

                                        </button>

                                        <button type="button" class="btn btn-light btn-sm w-100 mb-1 call-phone"
                                            @if ($template->call_phone_name) style="display: block;" @else style="display: none;" @endif>
                                            <a href="#" class="text-primary"><i
                                                    class="fa-solid fa-up-right-from-square"></i> <span
                                                    id="call-phone-number"> {{ $template->call_phone_name }} </span></a>
                                        </button>

                                        <button type="button" class="btn btn-light btn-sm w-100 offer-button"
                                            @if ($template->offer_code) style="display: block;" @else style="display: none;" @endif>
                                            <a href="#" class="text-primary"><i
                                                    class="fa-solid fa-up-right-from-square"></i> <span
                                                    id="offer-button-name"> {{ $template->offer_code }} </span></a>
                                        </button>

                                    </div>
                                    <div class="mt-3 d-flex justify-content-between">

                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-hidden="true">Cancel</button>
                                        <button type="submit" id="PageForm" class="btn btn-primary">Send</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endforeach
@endif


@push('scripts')
    <script type="text/javascript">
        let file;

        $(".image").change(function(e) {
            var id = $(this).data('id');
            file = this.files[0];
            if (file) {
                let reader = new FileReader();
                $('#card-header-image-'+id).show();
                reader.onload = function(event) {
                    $("#imgPreview-"+id)
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $(document).on("change", "#pdf", function(evt) {
            $('#card-header-image').hide();
            $('#card-header-video').hide();
            $("#card-header-pdf").show();
        });

        $(document).on("change", "#video", function(evt) {
            $('#card-header-image').hide();
            $("#card-header-pdf").hide();
            var $source = $('#video_here');
            $('#card-header-video').show();
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
        });


        $(document).on('click', ".add-header-variable", function() {
            var bodyText = $("#header").val();

            let nextVariable = bodyText.match(/\{\{[0-9]+\}\}/g);
            if (nextVariable) {
                nextVariable = parseInt(nextVariable.pop().replace(/\{|\}/g, '')) + 1;
            } else {
                nextVariable = 1;
            }

            bodyText += ' \{\{' + nextVariable + '\}\}';
            $("#header").val(bodyText).trigger('keyup');
        });

        $(document).on('click', ".add-body-variable", function() {
            $(".variable").show();
            var bodyText = $("#body").val();

            let nextVariable = bodyText.match(/\{\{[0-9]+\}\}/g);
            if (nextVariable) {
                nextVariable = parseInt(nextVariable.pop().replace(/\{|\}/g, '')) + 1;
            } else {
                nextVariable = 1;
            }

            $(".add-variable-inputs").append(
                '<div class="input-group mt-1"><input type="text" name="variables[]" data-id="' + nextVariable +
                '" placeholder="Enter content for the variable" class="form-control font-12 change-variable"></div>'
                );

            bodyText += ' \{\{' + nextVariable + '\}\} ';
            $("#body").val(bodyText).trigger('keyup');
            $(".change-variable").trigger('blur');
        });

        $(document).on('blur', ".change-variable", function() {
            var id = $(this).data('id');
            var bodyText = $("#card-body").html();
            let result = bodyText.replace('\{\{' + id + '\}\}', $(this).val());
            if ($(this).val() != '') {
                $("#card-body").html(result)
            }
        });


        $(document).on('click', ".add-bold-style", function() {
            var bodyText = $("#body").val();
            bodyText += ' *ENTER_CONTENT_HERE*';
            $("#body").val(bodyText).trigger('keyup');

        });

        $(document).on('click', ".add-italic-style", function() {
            var bodyText = $("#body").val();
            bodyText += ' _ENTER_CONTENT_HERE_';
            $("#body").val(bodyText).trigger('keyup');
        });

        $(document).on('click', ".add-body-code", function() {
            var bodyText = $("#body").val();
            bodyText += ' ```ENTER_CODE_HERE```';
            $("#body").val(bodyText).trigger('keyup');
        });

        $(document).on('keyup', '#header', function() {
            $("#card-header").html($(this).val());
        });

        $(document).on('keyup', '#body', function() {
            $("#card-body").html($(this).val());
        });

        $(document).on('keyup', '#footer', function() {
            $("#card-footer").html($(this).val());
        });
    </script>
    <script type="text/javascript">
        $('#add').click(function() {
            var i = $(this).data('count') + 1;
            $('#dynamic_field').append(
                '<div class="form-group mt-2"><div class="input-groups"><div class="row mt-1"><div class="col-10"><input type="text" data-id="' +
                i +
                '" placeholder="Button text" name="buttons[]" class="form-control mr-4 pr-4 quick_reply"></div><div class="col-2 p-0"><button type="button" class="btn btn-danger btn-sm"><span class="btn-inner--icon btn_remove" data-id="' +
                i + '"> X </span></button></div></div></div></div>');

            $('#quick_reply_buttons').append(
                '<button type="button" class="mb-1 btn btn-light btn-sm" ><a href="#" class="text-primary"><i class="fa-solid fa-reply"></i> <span id="quick_reply_' +
                i + '"> Quick Reply</span></a> </button>')
        });

        $(document).on('click', '.btn_remove', function() {
            var id = $(this).data('id');
            $("#quick_reply_" + id).parent().remove();
            var button_id = $(this).parent().parent().parent().parent().remove();
        });

        $(document).on('keyup', '.quick_reply', function() {
            var text = $(this).val();
            var id = $(this).data('id');
            $("#quick_reply_" + id).html(" " + $(this).val());
        });

        $(document).on('click', '#open-quick-reply-area', function() {
            $("#quick_reply_buttons").show();
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".add_variable").click(function() {
                $(".variable").toggle();
            });

            $(".website").click(function() {
                $(".visit_website").toggle();
            });

            $(".call").click(function() {
                $(".phone_number").toggle();
            });

            $(".offer").click(function() {
                $(".offer_code").toggle();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '.visit-website-remove', function() {
            $("#visit-website-2").parent().remove();
            $(this).parent().parent().remove();
        });

        $(document).on('change', 'select', function() {
            if($(this).val() != 6){
                $(this).parent().find('input').hide();
            }else{
                 $(this).parent().find('input').show();
            }
     });

    </script>
@endpush


