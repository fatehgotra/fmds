    @if ($message = Session::get('primary'))
        <div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><i class="dripicons-information me-2"></i> </strong>{{ $message }}
        </div>
    @endif
    @if ($message = Session::get('secondary'))
        <div class="alert alert-secondary alert-dismissible bg-secondary text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><i class="dripicons-information me-2"></i> </strong>{{ $message }}
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><i class="dripicons-checkmark me-2"></i> </strong>{{ $message }}
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><i class="dripicons-wrong me-2"></i> </strong>{{ $message }}
        </div>
    @endif
    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><i class="dripicons-warning me-2"></i> </strong>{{ $message }}
        </div>
    @endif
    @if ($message = Session::get('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><i class="dripicons-information me-2"></i> </strong>{{ $message }}
        </div>
    @endif
    @if ($message = Session::get('light'))
        <div class="alert alert-light alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><i class="dripicons-information me-2"></i> </strong>{{ $message }}
        </div>
    @endif
    @if ($message = Session::get('dark'))
        <div class="alert alert-dark alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><i class="dripicons-information"></i> </strong>{{ $message }}
        </div>
    @endif

    <!---------Modals here-------------->

    <div id="error-modal" class="modal TopupM errorM fade" tabindex="-1" role="dialog"
    aria-labelledby="error-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-start align-items-start pb-0">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="modal-form pt-0 p-2">
                    <div class="cus-header d-flex justify-content-start">
                        <img src="{{ asset('assets/images/company/icons/warning.png') }}" height="48"
                            class="me-2" alt="Canned" />
                        <div class="m_title">
                            <h4 class="modal-title text-white">Error</h4>
                            <p class="text-white fw-light font-15">We encountered an error...</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div id="success-modal" class="modal TopupM fade" tabindex="-1" role="dialog"
    aria-labelledby="success-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-start align-items-start pb-0">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="modal-form pt-0 p-2">
                    <div class="cus-header d-flex justify-content-start">
                        <img src="{{ asset('assets/images/company/icons/info.png') }}" height="48" class="me-2"
                            alt="Canned" />
                        <div class="m_title">
                            <h4 class="modal-title text-white">Success</h4>
                            <p class="text-white fw-light font-15">Your WhatsApp has been configured !</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
