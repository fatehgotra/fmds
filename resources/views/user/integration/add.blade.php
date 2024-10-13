@extends('layouts.customer')
@section('title', 'Add Integration')
@section('content')

<div class="container-fluid integration-add">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                        <h4 class="page-title">Add Integrations</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <video id="my-video" class="video-js" controls preload="auto" poster="{{ asset('assets/images/company/video-bg.png') }}" data-setup='' loop>
                        <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type='video/mp4'>
                        </video> --}}
                <ul class="list-unstyled mb-0 w-100 integration-tab">
                    <li class="mb-2">
                        <a href="{{ route('user.integration.create') }}" class="btn btn-primary">
                            <img src="{{ asset('assets/images/company/icons/planning-text.png') }}" class="img-fluid">
                        </a>
                    </li>
                    <li class="mb-0">
                        <a href="{{ route('user.integration.rock-add') }}" class="btn btn-reminder bg-reminder">
                            <img src="{{ asset('assets/images/company/icons/rock-text.png') }}" class="img-fluid">
                        </a>
                    </li>
                </ul>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
        <div class="col-xl-8 col-lg-8 col-12">
            <div class="card">
                <div class="card-body">
                    <form id="integrationAddForm" method="POST" action="{{ route('user.integration.store') }}" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="integration" value="Planning Center">
                        {{-- <h4 class="text-dark fw-600 font-20 mt-0 mb-4">Api Credentials</h4> --}}
                        <div class="icon mb-3">
                            <img src="{{ asset('assets/images/company/icons/list-icon-1.png') }}" width="50" height="50">
                        </div>
                        <p class="text-dark fw-normal">Please enter your planning center API credentials. If you need some help please view
                            the <a href="javascript:void(0)" data-bs-target="#instruction-modal" data-bs-toggle="modal">instructions</a>.</p>

                        <div class="mb-2">
                            {{-- <label for="label" class="form-label">Name/Identifier <span class="text-danger">*</span></label> --}}
                            <input type="text" class="form-control form-lg" name="name" placeholder="Name/Identifier" value="{{ old('name') }}"
                             required>
                             @error('app_id')
                             <span id="app_id-error" class="error invalid-feedback">{{ $message }}</span>
                             @enderror
                        </div>

                        <div class="mb-2">
                            {{-- <label for="label" class="form-label">Application Id <span class="text-danger">*</span></label> --}}
                            <input type="text" class="form-control form-lg" placeholder="Application ID" name="app_id" value="{{ old('app_id') }}"
                             required>
                             @error('app_id')
                             <span id="app_id-error" class="error invalid-feedback">{{ $message }}</span>
                             @enderror
                        </div>

                        <div class="mb-3">
                            {{-- <label for="label" class="form-label">Application Secret <span class="text-danger">*</span></label> --}}
                            <div class="input-group">

                                <input required type="text" name="secret" placeholder="Secret" value="{{ old('secret') }}" class="form-control form-lg">
                                @error('secret')
                                <span id="secret-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 Trigger">
                        <div class="form-check form-switch custom-switch mb-1">
                            <input class="form-check-input mt-0" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            <input type="hidden" name="two_way_sync" value="0" id="sync">
                            <label class="form-check-label text-dark font-13 fw-normal ms-2 mb-0" for="flexSwitchCheckChecked">Two Way Syncronization</label>
                        </div>
                        <i class="fa-solid fa-circle-question text-dark font-13" data-bs-toggle="tooltip" data-placement="right" title="Enable Two Way Synchronisation to update the
contacts when you make changes here."></i>

                    </div>

                        <ul class="list-inline wizard mb-0">
                            <li class="next list-inline-item float-end">
                                <button type="submit" class="btn btn-primary" id="completeintegrationAddForm"> Complete Setup </button>
                            </li>
                        </ul>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </div>

</div>


<div id="instruction-modal" class="modal TopupM fade" tabindex="-1" role="dialog"
        aria-labelledby="instruction-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-start align-items-start pb-0">
                    <div class="cus-header d-flex justify-content-start">
                        <img src="{{ asset('assets/images/company/icons/info.png') }}" height="48" class="me-2" alt="Canned" />
                        <div class="m_title">
                            <h4 class="modal-title text-white">Instructions</h4>
                            <p class="text-white fw-normal font-15">Connecting to Planning Centre</p>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-form">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/FsrMPexJkI4?si=5-oy1DLO2WFAtZXb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('scripts')
<script>
    $(function(){
        $('#flexSwitchCheckChecked').on('change',function(e){
            if($(this).prop('checked')){
                $('#sync').val(1);
            } else{
                $('#sync').val(0);
            }
        });
    });
</script>
@endpush
