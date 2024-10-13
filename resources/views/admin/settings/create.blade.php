@extends('layouts.admin')
@section('title', 'Site Settings')
@section('content')

<div class="container-fluid site_settings">

    <div class="page-title-box">
        <h4 class="page-title">Site Settings</h4>
    </div>


    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-7 text-start">
                            <h4 class="text-dark fw-medium mt-1 mb-1">Add Media</h4>
                        </div>
                        <div class="col-lg-6 col-5 text-end">
                            <a href="{{ route('admin.settings.index') }}" class="btn btn-dark">
                                Back</a>
                        </div>
                    </div>

                    <div class="add-media mt-3">
                        <form action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="label" class="form-label">Name</label>
                                <input type="text" class="form-control form-lg" id="name" name="name"
                                    placeholder="Enter Name" value="{{ old('name') }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="label" class="form-label">Name of the Page</label>
                                <select id="selectpage" name="page" class="form-select form-lg">
                                    <option value="">Select Page</option>
                                    <option value="getting-started" @if(old('page') == 'getting-started') selected @endif>Getting Started</option>
                                    <option value="package" @if(old('page') == 'package') selected @endif>Package</option>
                                    <option value="setting" @if(old('page') == 'setting') selected @endif>Setting</option>
                                </select>
                                @error('page')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Video Type</label>
                                <select id="videotype" name="type" class="form-select form-lg">
                                    <option value="">Select Video Type</option>
                                    <option value="youtube" @if(old('type') == 'youtube') selected @endif>Youtube</option>
                                    <option value="upload_files" @if(old('type') == 'upload_files') selected @endif>Upload From Files</option>
                                    <option value="vimeo" @if(old('type') == 'vimeo') selected @endif>Vimeo</option>
                                </select>
                                @error('type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 optionfield" id="youtube" style="display: @if(old('youtube')) block @else none @endif">
                                <div class="form-group">
                                    <label for="label" class="form-label">Youtube</label>
                                    <input type="text" class="form-control form-lg" name="youtube"
                                        placeholder="Enter Youtube Link" value="{{ old('youtube') }}">
                                </div>
                            </div>

                            <div class="mb-3 optionfield" id="upload_files" style="display: @if(old('file')) block @else none @endif">
                                <label for="label" class="form-label">Upload File</label>
                                <input type="file" class="form-control form-control-lg upload-input-font" name="file" >
                            </div>

                            <div class="mb-3 optionfield" id="vimeo" style="display: @if(old('vimeo')) block @else none @endif">
                                <label for="label" class="form-label">Vimeo</label>
                                <input type="text" class="form-control form-lg" name="vimeo" placeholder="Enter Vimeo Link"
                                    >
                            </div>
                            @error('file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-select form-lg">
                                    <option value="1" @if(old('status') == '1') selected @endif>Active</option>
                                    <option value="0" @if(old('status') == '0') selected @endif>Inactive</option>
                                </select>
                            </div>

                            <ul class="list-inline wizard mb-0">
                                <li class="next list-inline-item float-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    $(function() {
        $('#videotype').change(function() {
            $('.optionfield').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>
@endpush