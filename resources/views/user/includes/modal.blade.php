

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

@if ($message = Session::get('success'))
<script>
    var msg = '{{$message}}';
    jQuery(document).ready(function($){
        $('#success-modal').find('.fw-light').html(msg);
        $('#success-modal').modal('show');
    });
</script>
@endif

@if ($message = Session::get('error'))
<script>
    var msg = '{{$message}}';
    jQuery(document).ready(function($){
        $('#error-modal').find('.fw-light').html(msg);
        $('#error-modal').modal('show');
    });
</script>
@endif

