@extends('layouts.customer')
@section('title', 'Add Ticket')
@section('content')

<div class="container-fluid">
    <div class="page-title-box">
        {{-- <h4 class="page-title ln-title">Create Ticket</h4> --}}
        <h4 class="page-title">Create Ticket</h4>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card">
                <div class="card-body">

                    <form method="POST" action="{{ route('user.ticket.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-sm-4 col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Subject <span class="text-danger">*</span></label>
                                    <input class="form-control form-lg" type="text" name="title" value="{{ old('title') }}" id="title" placeholder="Enter ticket subject">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Department <span class="text-danger">*</span></label>
                                    <select class="form-select form-lg" name="department">
                                        <option value="">Select Department</option>
                                        <option value="Billing">Billing</option>
                                        <option value="Technical">Technical</option>
                                    </select>
                                    @error('department')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4 col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Priority <span class="text-danger">*</span></label>
                                    <select class="form-select form-lg" name="priority">
                                        <option value="">Select Priority</option>
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                    @error('priority')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="mb-3">
                            <label for="date" name="date" class="form-label">Description </label>
                            <textarea name="message" id="editor" class="form-control"></textarea>
                            @error('date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="avatar" class="form-label">Attachment</label>
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
                            {{-- <button class="btn btn-primary" type="submit">Raise Ticket</button> --}}
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

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
