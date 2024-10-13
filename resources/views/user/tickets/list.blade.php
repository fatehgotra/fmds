@extends('layouts.customer')
@section('title', 'Tickets')
@section('content')

    <div class="container-fluid tickets">
        <div class="page-title-box reminderT ">
            <h4 class="page-title">Support</h4>
            <span class="text-dark fw-normal">{{ $open > 0 ? $open : 'No' }} Open Tickets</span>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-6 text-start ps-1">
                                <h4 class="text-dark fw-medium mt-1 mb-1">Tickets</h4>
                            </div>
                            <div class="col-lg-6 col-6 text-end pe-1">
                                <a href="{{ route('user.ticket.create') }}" class="btn btn-primary">
                                    New
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="Ctable-responsive">
                        @if (count($tickets) > 0)
                            <table class="table table-centered w-100 dt-responsive">
                                <thead class="table-light">
                                    <tr>
                                        <th>Ticket ID</th>
                                        <th>Title</th>
                                        <th>Department</th>
                                        <th>Priority</th>
                                        <th>Created</th>
                                        <th class="text-end">Status</th>
                                        {{-- <th class="text-end">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->uuid }}</td>
                                            <td>{{ $ticket->title }}</td>
                                            <td>{{ $ticket->department }}</td>
                                            <td>{{ $ticket->priority }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d M, Y h:i A') }}
                                            </td>

                                            <td class="table-action float-end">

                                                @if ($ticket->status == 1)
                                                    <button class="btn btn-danger btn-sm me-2">Open</button>
                                                @else
                                                    <button class="btn btn-primary btn-sm me-2">Resolved</button>
                                                @endif

                                                <div class="dropdown float-end">
                                                    <a href="javascript:void(0);"
                                                        class="dropdown-toggle arrow-none arrow-icon"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img src="{{ asset('assets/images/company/icons/more.png') }}"
                                                            alt="smile" class="img-fluid" width="24"
                                                            height="24" />
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="{{ route('user.ticket.show', $ticket->uuid) }}"
                                                            class="dropdown-item">View</a>
                                                    </div>
                                                </div>

                                            </td>
                                            {{-- <td class="text-end">
                                                <a href="{{ route('user.ticket.show', $ticket->uuid) }}" class="course">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 16 16">
                                                        <path fill="#000"
                                                            d="M15.98 7.873c.013.03.02.064.02.098v.06a.24.24 0 0 1-.02.097C15.952 8.188 13.291 14 8 14S.047 8.188.02 8.128A.24.24 0 0 1 0 8.03v-.059c0-.034.007-.068.02-.098C.048 7.813 2.709 2 8 2s7.953 5.813 7.98 5.873m-1.37-.424a12.097 12.097 0 0 0-1.385-1.862C11.739 3.956 9.999 3 8 3c-2 0-3.74.956-5.225 2.587a12.098 12.098 0 0 0-1.701 2.414a12.095 12.095 0 0 0 1.7 2.413C4.26 12.043 6.002 13 8 13s3.74-.956 5.225-2.587A12.097 12.097 0 0 0 14.926 8c-.08-.15-.189-.343-.315-.551M8 4.75A3.253 3.253 0 0 1 11.25 8A3.254 3.254 0 0 1 8 11.25A3.253 3.253 0 0 1 4.75 8A3.252 3.252 0 0 1 8 4.75m0 1C6.76 5.75 5.75 6.76 5.75 8S6.76 10.25 8 10.25S10.25 9.24 10.25 8S9.24 5.75 8 5.75m0 1.5a.75.75 0 1 0 0 1.5a.75.75 0 0 0 0-1.5">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </td> --}}

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <p class="text-center text-dark fw-normal font-15">No tickets generated yet.</p>
                        @endif
                    </div>
                </div>
                {{ $tickets->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@endsection
