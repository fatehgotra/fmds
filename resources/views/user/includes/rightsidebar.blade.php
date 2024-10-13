<div class="end-bar">

    <div class="rightbar-title">
        <a href="javascript:void(0);" class="end-bar-toggle float-end">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h3 class="m-0 text-dark">Notifications</h3>
    </div>

    <div class="rightbar-title2">
        <div class="unread">
            <button type="button" class="btn btn-primary unreadb mactive">Unread <span class="counter">{{ unreadNotifications()['count'] }}</span></button>
        </div>
        <div class="unreadMark">
            <input class="form-check-input mcheck" type="checkbox" value="" id="flexCheckDefault">

            <div class="dropdown float-end">
                <a href="#" class="dropdown-toggle arrow-none card-drop"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 20 24">
                        <path fill="none" stroke="#313a46" stroke-linecap="round" stroke-width="3"
                            d="M12 6h0m0 6h0m0 6h0" />
                    </svg>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item cursor read_notify">Mark as Read</a>
                    <!-- item-->
                    <a class="dropdown-item cursor unread_notify">Mark as Unread</a>
                    <!-- item-->
                    <a class="dropdown-item cursor delete_notify">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="rightbar-content h-100" data-simplebar>

        <div class="notification-list">
            <!-- item-->
            @if( count( sidebarNotifications() ) > 0 )
            @foreach( sidebarNotifications() as $notice )

            <a href="{{ $notice->data['link'] }}" class="nc{{$notice->id}} dropdown-item notify-item reminder @if($notice->read_at == null) unread-notice @endif @if($notice->data['type'] == 'mention') mnotice @endif">
                <div class="notify-style">
                    <div class="notify-left">


                        @if( $notice->data['type'] == 'warning' )
                        <div class="notify-icon bg-warningc">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="M12 6v8m.05 4v.1h-.1V18h.1Z" />
                            </svg>
                        </div>
                        @elseif( $notice->data['type'] == 'mention' )
                        <div class="notify-icon bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20">
                                <path fill="currentColor"
                                    d="M14.608 12.172c0 .84.239 1.175.864 1.175c1.393 0 2.28-1.775 2.28-4.727c0-4.512-3.288-6.672-7.393-6.672c-4.223 0-8.064 2.832-8.064 8.184c0 5.112 3.36 7.896 8.52 7.896c1.752 0 2.928-.192 4.727-.792l.386 1.607c-1.776.577-3.674.744-5.137.744c-6.768 0-10.393-3.72-10.393-9.456c0-5.784 4.201-9.72 9.985-9.72c6.024 0 9.215 3.6 9.215 8.016c0 3.744-1.175 6.6-4.871 6.6c-1.681 0-2.784-.672-2.928-2.161c-.432 1.656-1.584 2.161-3.145 2.161c-2.088 0-3.84-1.609-3.84-4.848c0-3.264 1.537-5.28 4.297-5.28c1.464 0 2.376.576 2.782 1.488l.697-1.272h2.016v7.057h.002zm-2.951-3.168c0-1.319-.985-1.872-1.801-1.872c-.888 0-1.871.719-1.871 2.832c0 1.68.744 2.616 1.871 2.616c.792 0 1.801-.504 1.801-1.896v-1.68z" />
                            </svg>
                        </div>
                        @else
                        <div class="notify-icon bg-reminder">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3.23 9.827q0-1.923.767-3.578q.766-1.655 2.084-2.857l.675.735q-1.173 1.061-1.85 2.525q-.675 1.463-.675 3.175h-1Zm16.54 0q0-1.712-.677-3.185q-.676-1.473-1.849-2.534l.675-.716q1.318 1.202 2.084 2.857q.766 1.655.766 3.578h-1ZM5 18.769v-1h1.615V9.846q0-1.96 1.24-3.447Q9.097 4.912 11 4.546V4q0-.413.293-.707Q11.587 3 12 3t.707.293Q13 3.587 13 4v.546q1.904.366 3.144 1.853q1.24 1.488 1.24 3.447v7.923H19v1H5Zm7-7.154Zm0 9.77q-.671 0-1.143-.473q-.472-.472-.472-1.143h3.23q0 .671-.472 1.144q-.472.472-1.143.472Zm-4.385-3.616h8.77V9.846q0-1.823-1.281-3.104q-1.28-1.28-3.104-1.28t-3.104 1.28q-1.28 1.281-1.28 3.104v7.923Z" />
                            </svg>
                        </div>
                        @endif


                        <p class="notify-details">{{ $notice->data['title'] }}
                            <small class="text-muted">{{ \Carbon\Carbon::parse($notice->created_at)->format('l, d F Y') }}</small>
                        </p>
                    </div>
                    <div class="notify-right">
                        <input class="form-check-input ncheck" type="checkbox" value="{{$notice->id}}" id="flexCheckDefault">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 20 24">
                        <path fill="none" stroke="#313a46" stroke-linecap="round" stroke-width="3"
                            d="M12 6h0m0 6h0m0 6h0" />
                    </svg> --}}
                    </div>
                </div>
            </a>

            @endforeach
            @else
            <div class="text-center">
                <span>No new notification.</span>
            </div>
            @endif

        </div>

    </div>
</div>


<div id="standard-modal" class="modal TopupM fade" tabindex="-1" role="dialog"
    aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                        height="32" viewBox="0 0 50 50">
                        <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path stroke="#fff"
                                d="m35.854 18.75l3.73-5.333l-10.23-7.167l-8.77 12.5zM18.938 8.333L11.625 18.75h8.958L25 12.5z" />
                            <path stroke="#fff"
                                d="M41.667 18.75H8.333c-1.15 0-2.083.933-2.083 2.083v20.834c0 1.15.933 2.083 2.083 2.083h33.334c1.15 0 2.083-.933 2.083-2.083V20.833c0-1.15-.933-2.083-2.083-2.083" />
                            <path stroke="#fff"
                                d="M33.333 27.083H43.75v8.334H33.333a2.083 2.083 0 0 1-2.083-2.084v-4.166a2.084 2.084 0 0 1 2.083-2.084" />
                        </g>
                    </svg> <span>Topup Account</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body">
                <form id="walletForm" method="POST" action="" class="form-horizontal wallet">
                    @csrf
                    <div class="topup-wallet">
                        <input type="hidden" value="{{ Request::url() }}" name="redirect">
                        <div class="form-group">
                            <label class="form-label">Select Amount</label>
                            <div class="input-group mb-3">
                                <span class="doller text-white">$</span>
                                <select class="form-select" required name="amount">
                                    <option value="">Select Amount</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-dark">Topup</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<form id="notifyActionForm" method="post" action="{{ route('user.notify.form-actions') }}">
    @csrf
    <input type="hidden" name="notify_action" id="notify_action" value="">
</form>
@push('scripts')
<script>
    jQuery(document).ready(function($) {

        function renderNoticeIds(trigger = null) {

            $('.noid').remove();
            $('.ncheck').each(function(i, el) {
                if ($(el).prop('checked')) {
                    let ip = document.createElement('input');
                    ip.setAttribute('type', 'hidden');
                    ip.setAttribute('name', 'ids[]');
                    ip.classList.add('noid');
                    ip.setAttribute('value', el.value);
                    $('#notifyActionForm').append(ip);
                }
            });

            if( trigger == 'alert')
            deleteNotices();
            else
            $('#notifyActionForm').submit();
            

        }

        $('.read_notify').on('click', function(e) {
            $('#notify_action').val('read');
            renderNoticeIds();
        });

        $('.unread_notify').on('click', function(e) {
            $('#notify_action').val('unread');
            renderNoticeIds();
        });

        $('.delete_notify').on('click', function(e) {
            $('#notify_action').val('delete');
            renderNoticeIds('alert');
        });


    });

    function deleteNotices(e) {

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this.",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then(t => {
            document.getElementById('notifyActionForm').submit();
        })
    }
</script>
@endpush