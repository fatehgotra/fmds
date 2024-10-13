<div id="send-template" class="modal TopupMW fade" tabindex="-1" role="dialog"
        aria-labelledby="send-templateLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title text-dark"><span>Send Template</span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>

                <div class="p-2 pt-0">
                    <form method="POST" action="{{ route('user.template.store') }}" id="PageForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-xl-4 col-lg-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Template Details</h4>
                                        <div class="mb-3">
                                            <label for="label" class="form-label">Friendly Name</label>
                                            <input type="text" class="form-control form-lg" name="name"
                                                value="{{ old('name') }}" placeholder="Enter Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="label" class="form-label">WhatsApp Slug <i
                                                    class="fa-solid fa-circle-question text-dark font-15 ms-1"
                                                    data-bs-toggle="tooltip" data-placement="right"
                                                    title="It is a long established fact that a reader"></i></label>
                                            <input type="text" class="form-control form-lg" name="slug"
                                                value="{{ old('slug') }}" placeholder="Template Slug">
                                            @error('slug')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="label" class="form-label">Category <i
                                                    class="fa-solid fa-circle-question text-dark font-15 ms-1"
                                                    data-bs-toggle="tooltip" data-placement="right"
                                                    title="It is a long established fact that a reader"></i></label>
                                            <select id="Category" class="form-select form-lg" name="category">
                                                <option value="Marketing"
                                                    @if (old('category') == 'Marketing') selected @endif>Marketing</option>
                                                <option value="Utility"
                                                    @if (old('category') == 'Utility') selected @endif>Utility</option>
                                            </select>
                                            @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="label" class="form-label">Language </label>
                                            <select id="Language" class="form-select form-lg" name="language">
                                                <option value="english"
                                                    @if (old('language') == 'english') selected @endif>English</option>
                                                <option value="french"
                                                    @if (old('language') == 'french') selected @endif>French</option>
                                            </select>
                                            @error('language')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Message</h4>
                                        <div class="mb-3">
                                            <label for="label" class="form-label mb-0">Header Type <span
                                                    class="bg-primary optional text-white">Optional</span></label>
                                            <p class="mb-1 font-13">Add a title or choose which type of media you will use
                                                for this header.</p>
                                            <select id="header_type" class="form-select form-lg" name="header_type">
                                                <option value="none"
                                                    @if (old('header_type') == 'none') selected @endif>None</option>
                                                <option value="text"
                                                    @if (old('header_type') == 'text') selected @endif>Text</option>
                                                <option value="image"
                                                    @if (old('header_type') == 'image') selected @endif>Image</option>
                                                <option value="video"
                                                    @if (old('header_type') == 'video') selected @endif>Video</option>
                                                <option value="pdf">PDF</option>
                                            </select>
                                            @error('header_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 text box" style="display: none;">

                                            <label for="label" class="form-label mb-0">Header Text </label>
                                            <input type="text" id="header" name="header"
                                                value="{{ old('header') }}" class="form-control form-lg">

                                            <div class="text-end mt-2" style="display: none;">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm"><span
                                                        class="btn-inner--icon add-header-variable">Add
                                                        variable</span></a>
                                            </div>

                                            @error('header')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 image box" style="display: none;">

                                            <label for="label" class="form-label mb-0">Header Image </label>
                                            <input type="file" name="image" accept="image/*" id="image"
                                                value="{{ old('image') }}" class="form-control form-control-lg font-13">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="mb-3 video box" style="display: none;">

                                            <label for="label" class="form-label mb-0">Header Video </label>
                                            <input type="file" name="video" accept="video/*" id="video"
                                                value="{{ old('video') }}" class="form-control form-control-lg font-13">
                                            @error('video')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="mb-3 pdf box" style="display: none;">

                                            <label for="label" class="form-label mb-0">Header Pdf </label>
                                            <input type="file" name="pdf" accept="application/pdf"
                                                id="pdf" value="{{ old('pdf') }}"
                                                class="form-control form-control-lg font-13">
                                            @error('pdf')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>


                                        <div class="mb-3">
                                            <label for="label" class="form-label mb-0">Body <span
                                                    class="bg-primary optional text-white">Required</span></label>
                                            <p class="mb-1 font-13">Enter the text for your message in the language you
                                                have
                                                selected.</p>

                                            <textarea class="form-control" placeholder="Body" name="body" id="body" rows="5">{{ old('body') }}</textarea>
                                            @error('body')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="text-end mt-2">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm"><span
                                                        class="btn-inner--icon add-bold-style">B</span></a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm"><span
                                                        class="btn-inner--icon add-italic-style">I</span></a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm"><span
                                                        class="btn-inner--icon add-body-code">&lt;&gt;</span></a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm"><span
                                                        class="btn-inner--icon add-body-variable">Add variable</span></a>
                                            </div>


                                        </div>
                                        <div class="form-group p-2 variable"
                                            style="background-color: rgb(233, 236, 239); display: none;">
                                            <div class="form-group">
                                                <label for="call_phone" class="font-15 mb-2">Samples for body
                                                    content</label>
                                                <p class="mb-1 font-12">To help us review your content, provide examples
                                                    of the variables in the body.</p>
                                                <div class="add-variable-inputs">

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3 templatecardright">
                                        <div class="accordion custom-accordion" id="custom-accordion-one">
                                            <div class="card mb-0">
                                                <div class="card-header Company-Owner" id="headingFour">
                                                    <h5 class="m-0">
                                                        <a class="custom-accordion-title d-block"
                                                            data-bs-toggle="collapse" href="#collapseFour"
                                                            aria-expanded="true" aria-controls="collapseFour">
                                                            Footer <span
                                                                class="bg-primary optional text-white">Optional</span> <i
                                                                class="fa-solid fa-plus"></i>
                                                        </a>
                                                    </h5>
                                                </div>

                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                                    data-bs-parent="#custom-accordion-one">
                                                    <div class="card-body">
                                                        <p class="mb-1 font-13">Enter the text for your footer in the
                                                            language you have selected.</p>
                                                        <input type="text" name="footer" id="footer"
                                                            value="{{ old('footer') }}" class="form-control form-lg"
                                                            placeholder="footer">
                                                        @error('footer')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mb-0">
                                                <div class="card-header" id="headingNine">
                                                    <h5 class="m-0">
                                                        <a class="custom-accordion-title collapsed d-block py-1"
                                                            id="open-quick-reply-area" data-bs-toggle="collapse"
                                                            href="#collapseNine" aria-expanded="false"
                                                            aria-controls="collapseNine">
                                                            Quick Reply Buttons <span
                                                                class="bg-primary optional text-white">Optional</span> <i
                                                                class="fa-solid fa-plus"></i>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                                                    data-bs-parent="#custom-accordion-one">
                                                    <div class="card-body">
                                                        <p class="mb-1 font-13">Create buttons that let customers respond
                                                            to your message
                                                        </p>
                                                        <div class="text-end">
                                                            <button type="button" id="add"
                                                                class="btn btn-primary btn-sm">Add Quick Reply</button>
                                                        </div>

                                                        <div id="dynamic_field" class="mt-3 p-2"
                                                            style="background-color: rgb(233, 236, 239);">

                                                            <div class="form-group">
                                                                <div class="input-groups">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <input type="text"
                                                                                placeholder="Button text"
                                                                                name="buttons[]" data-id="1"
                                                                                class="form-control quick_reply">
                                                                        </div>
                                                                        <div class="col-2 p-0">
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm"
                                                                                style="margin-top: 3px;"><span
                                                                                    class="btn-inner--icon btn_remove"
                                                                                    data-id="1"> X </span></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>



                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card mb-0">
                                                <div class="card-header" id="headingTen">
                                                    <h5 class="m-0">
                                                        <a class="custom-accordion-title collapsed d-block py-1"
                                                            data-bs-toggle="collapse" href="#collapseTen"
                                                            aria-expanded="false" aria-controls="collapseTen">
                                                            Call to Action <span
                                                                class="bg-primary optional text-white">Optional</span> <i
                                                                class="fa-solid fa-plus"></i>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
                                                    data-bs-parent="#custom-accordion-one">
                                                    <div class="card-body">
                                                        <p class="mb-2 font-13">Create buttons that let customers take
                                                            action
                                                        </p>
                                                        <div class="text-right mb-2 Create_buttons">
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm website">Visit website -
                                                                x2</button>
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm call">Call phone
                                                                number</button>
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm offer">Copy offer
                                                                code</button>
                                                        </div>
                                                        <div class="form-group p-2 visit_website mb-2"
                                                            style="background-color: rgb(233, 236, 239);display:none;">
                                                            <div class="form-group">
                                                                <label for="call_phone" class="font-15 mb-2">Visit
                                                                    Website buttons</label>

                                                                <div class="d-flex">
                                                                    <input type="text" name="visit_website_name_1"
                                                                        placeholder="Button text"
                                                                        class="form-control me-1 visit-website-name"
                                                                        data-id="1">
                                                                    <input type="text" name="visit_website_url_1"
                                                                        placeholder="URL" class="form-control me-1">
                                                                </div>

                                                                <div class="d-flex mt-1">
                                                                    <input type="text" name="visit_website_name_2"
                                                                        data-id="2" placeholder="Button text"
                                                                        class="form-control me-1 visit-website-name">
                                                                    <input type="text" name="visit_website_url_2"
                                                                        placeholder="URL" class="form-control me-1">
                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        style="margin-top: 3px; "><span
                                                                            class="btn-inner--icon visit-website-remove">
                                                                            X </span></button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group p-2 phone_number mb-2"
                                                            style="background-color: rgb(233, 236, 239);display:none;">
                                                            <div class="form-group">
                                                                <label for="call_phone" class="font-15 mb-2">Call phone
                                                                    number</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="call_phone_name"
                                                                        id="call_phone_name" placeholder="Button name"
                                                                        value="{{ old('call_phone_name') }}"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="input-group mt-2">
                                                                    <input type="text" name="call_phone_dial_code"
                                                                        id="call_phone_dial_code"
                                                                        placeholder="Dial code"
                                                                        value="{{ old('call_phone_dial_code') }}"
                                                                        class="form-control">
                                                                    <input type="text" name="call_phone_number"
                                                                        id="call_phone_number"
                                                                        placeholder="Phone number"
                                                                        value="{{ old('call_phone_number') }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group p-2 offer_code"
                                                            style="background-color: rgb(233, 236, 239);display:none;">
                                                            <div class="form-group">
                                                                <label for="call_phone" class="font-15 mb-2">Offer code
                                                                    button</label>

                                                                <input type="text" name="offer_code"
                                                                    id="offer-button" placeholder="Offer code sample"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Preview</h4>
                                        <div class="card-body p-2"
                                            style="background-image: url('/assets/images/company/bg.png')">
                                            <div id="previewElement" class="bg-white rounded mb-1">
                                                <div class="card-body p-2">

                                                    <div id="card-header"></div>

                                                    <div id="card-header-image" style="display: none;">
                                                        <img class="img-fluid" id="imgPreview" src="#"
                                                            alt="pic" />
                                                    </div>

                                                    <div id="card-header-video" style="display: none;">
                                                        <video width="200" controls>
                                                            <source src="mov_bbb.mp4" id="video_here">
                                                            Your browser does not support HTML5 video.
                                                        </video>
                                                    </div>

                                                    <div id="card-header-pdf" style="display: none;">
                                                        <img class="img-fluid" id="pdfPreview"
                                                            src="{{ asset('assets/images/pdf.png') }}"
                                                            alt="pic" />
                                                    </div>

                                                    <div id="card-body" class="mt-2">
                                                        <p class="font-13 text-dark"></p>
                                                    </div>
                                                    <div id="card-footer" class="mt-2">
                                                        <p></p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div id="quick_reply_buttons" class="btn btn-light btn-sm w-100 mb-1"
                                                style="display: none;">

                                                <button type="button" class="mb-1 btn btn-light btn-sm">
                                                    <a href="#" class="text-primary"><i
                                                            class="fa-solid fa-reply"></i> <span
                                                            id="quick_reply_1">Quick Reply</span></a>
                                                </button>

                                            </div>

                                            <button type="button" class="btn btn-light btn-sm w-100 mb-1 visit-website"
                                                style="display: none;">
                                                <a href="#" class="text-primary"><i
                                                        class="fa-solid fa-up-right-from-square"></i> <span
                                                        id="visit-website-1"> Visit Website </span></a>
                                                <br>
                                                <a href="#" class="text-primary"><i
                                                        class="fa-solid fa-up-right-from-square"></i> <span
                                                        id="visit-website-2"> Visit Website </span></a>
                                            </button>

                                            <button type="button" class="btn btn-light btn-sm w-100 mb-1 call-phone"
                                                style="display: none;">
                                                <a href="#" class="text-primary"><i
                                                        class="fa-solid fa-up-right-from-square"></i> <span
                                                        id="call-phone-number"> Phone number </span></a>
                                            </button>

                                            <button type="button" class="btn btn-light btn-sm w-100 offer-button"
                                                style="display: none;">
                                                <a href="#" class="text-primary"><i
                                                        class="fa-solid fa-up-right-from-square"></i> <span
                                                        id="offer-button-name"> Copy offer code </span></a>
                                            </button>

                                        </div>
                                        <div class="mt-3 d-flex justify-content-between">
                                            {{-- <button type="submit" id="PageForm" class="btn btn-primary w-100">Save Template</button> --}}
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Send</button>
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
