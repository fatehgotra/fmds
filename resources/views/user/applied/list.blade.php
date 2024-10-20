@extends('layouts.customer')
@section('title', 'Applied Applications')
@section('content')

<div class="container-fluid team_members">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">

            <div class="page-title-box reminderT">
                <div class="page-title-right">
                    {{--<button class="btn btn-dark mt-2 mt-md-0 group-filter-toggle"

                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight">

                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 16 16">
                            <path fill="currentColor" fill-rule="evenodd" d="m8.5 8.379l.44-.44l4.56-4.56V2.5h-11v.879l4.56 4.56l.44.44v4l1-1v-3ZM10 12l-2.5 2.5L6 16V9L1.293 4.293A1 1 0 0 1 1 3.586V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v1.586a1 1 0 0 1-.293.707L10 9v3Z" clip-rule="evenodd" />
                        </svg> Filter
                    </button>--}}

                </div>
                <h4 class="page-title">Applications</h4>
                @if( $applications->total() > 0)
                <span class="text-dark fw-normal">{{$applications->total()}} Applied</span>
                @endif
            </div>
        </div>
    </div>
    <!-- end page title -->

    {{--@include('user.team.filter')
    @include('user.includes.team-top-bar')--}}

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-7 text-start ps-1">
                            <h4 class="text-dark fw-medium mt-1 mb-1">All Applied Applications</h4>
                        </div>
                    </div>

                </div> <!-- end card-body -->
                <div class="Ctable-responsive">
                    @if( count($applications) > 0)
                    <table class="table table-centered w-100 dt-responsive">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <svg id="Layer_1" enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" height="25" width="25">
                                        <g fill="#111740">
                                            <path d="m12 21.8c-5.4 0-9.8-4.4-9.8-9.8s4.4-9.7 9.8-9.7 9.8 4.4 9.8 9.8-4.4 9.7-9.8 9.7zm-5.2-3.4c1.4 1.2 3.2 1.9 5.2 1.9s3.8-.7 5.2-1.9c-.3-2.4-3.7-2.6-5.2-2.6s-4.9.2-5.2 2.6zm5.2-4.1c3.4 0 5.7 1.1 6.4 2.9 1.1-1.4 1.8-3.2 1.8-5.1 0-4.5-3.7-8.3-8.3-8.3s-8.1 3.7-8.1 8.2c0 1.9.7 3.7 1.8 5.1.7-1.8 3-2.8 6.4-2.8zm0-1.5c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.7 3.8-3.7 3.8 1.7 3.8 3.8-1.7 3.7-3.8 3.7zm0-6c-1.2 0-2.3 1-2.3 2.3s1 2.3 2.3 2.3c1.2 0 2.3-1 2.3-2.3s-1.1-2.3-2.3-2.3z" />
                                        </g>
                                    </svg>
                                    Applicant Name
                                </th>
                                <th>
                                    Applied For
                                </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach( $applications as $application )
                            <tr>
                                <td>
                                    {{ $application['applicant'] }}
                                </td>
                                <td>
                                    <p class="m-0 d-inline-block align-middle">{{ $application['name'] }}</p>
                                    <br>
                                    <span class="badge bg-dark p-1 m-1">Applied on : {{ \Carbon\Carbon::parse($application['created_at'])->format('d M, Y h:i') }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-success p-1">{{ $application['status'] }}</span>
                                </td>
                              

                                <td class="table-action align-middle">

                                    <div class="dropdown">
                                        <a href="javascript:void(0);"
                                            class="dropdown-toggle arrow-none card-drop action-icon"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('assets/images/company/icons/more.png') }}"
                                                alt="smile" class="img-fluid" width="24"
                                                height="24" />
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="{{ route('user.application.show',$application['uuid']) }}"
                                                class="dropdown-item">View</a>
                                            <!-- item-->
                                            <a href="javascript:void(0)"
                                                class="dropdown-item">Track status</a>
                                            <!-- item-->
                                            <a target="_blank" href="{{ route('user.team.intend-login',$application['uuid']) }}"
                                                class="dropdown-item">Download certificate</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    @else

                    <div class="card-body text-center">
                        No Application applied yet.
                    </div>

                    @endif

                </div>

                <div class="mt-3 pagination-style p-2">
                    {{ $applications->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div> <!-- end card-->
        </div>
    </div>

</div>

@endsection
@push('scripts')

<script>
    $(function() {
        $("#basic-datatable").dataTable({
            paging: !1,
            pageLength: 20,
            lengthChange: !1,
            searching: !1,
            ordering: !1,
            info: !1,
            autoWidth: !1,
            responsive: !0
        })
    });

    function deleteMember(e) {

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this.",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then(t => {
            t.isConfirmed && document.getElementById("deleteMemberForm" + e).submit()
        })
    }
</script>
@endpush