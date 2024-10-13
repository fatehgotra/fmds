@extends('layouts.admin')
@section('title', 'Tickets')
@section('content')

    <div class="container-fluid tickets adminTicket">
        <div class="page-title-box reminderT">
            <h4 class="page-title">Support</h4>
            <span class="text-dark fw-normal">{{ $open > 0 ? $open : 'No' }} Open Tickets</span>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-12 col-12 text-start ps-1 pe-1">
                                <h3 class="text-dark fw-medium mt-1 mb-1">Tickets</h3>
                            </div>
                        </div>
                        <div class="filter">
                            <form action="">
                                {{-- <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex">
                                        <div class="form-group" style="min-width:200px">
                                            <label class="control-label">User</label>
                                            <input type="text" class="form-control form-lg" name="user"
                                                value="{{ request()->get('user') }}" placeholder="Enter name">
                                        </div>
                                        <div class="form-group" style="min-width:200px;margin-left:20px">
                                            <label class="control-label">Status</label>
                                            <select class="form-control form-lg" name="status"
                                                value="{{ request()->get('status') }}">
                                                <option value="">Select status</option>
                                                <option value="1">Open</option>
                                                <option value="0">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="form-group filterBtn" style="margin-right:20px">
                                            <label class="d-block">&nbsp;</label>
                                            <a href="{{ route('admin.tickets.index') }}"
                                                class="btn btn-link text-muted">Clear Filters</a>
                                        </div>
                                        <div class="form-group">
                                            <label class="d-block">&nbsp;</label>
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-12 mb-2">
                                                <label class="control-label">User</label>
                                                <input type="text" class="form-control form-lg" name="user"
                                                    value="{{ request()->get('user') }}" placeholder="Enter name">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <label class="control-label">Status</label>
                                                <select class="form-select form-lg" name="status"
                                                    value="{{ request()->get('status') }}">
                                                    <option value="">Select status</option>
                                                    <option value="1">Open</option>
                                                    <option value="0">Close</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 text-end">
                                        <div class="row">
                                            <div class="col-sm-8 col-9 filterBtn">
                                                <label class="d-block">&nbsp;</label>
                                                <a href="{{ route('admin.tickets.index') }}"
                                                    class="btn btn-link text-muted">Clear Filters</a>
                                            </div>
                                            <div class="col-sm-4 col-3">
                                                <label class="d-block">&nbsp;</label>
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="Ctable-responsive">
                        @if (count($tickets) > 0)
                            <table class="table table-centered w-100 dt-responsive">
                                <thead class="table-light">
                                    <tr>
                                        <th>Ticket ID</th>
                                        <th>Customer</th>
                                        <th>Title</th>
                                        <th>Department</th>
                                        <th>Priority</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->uuid }}</td>
                                            <td>{{ $ticket->customer?->name }}</td>
                                            <td>{{ $ticket->title }}</td>
                                            <td>{{ $ticket->department }}</td>
                                            <td>{{ $ticket->priority }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d M, Y h:i A') }}
                                            </td>

                                            <td class="table-action">

                                                @if ($ticket->status == 1)
                                                    <button class="btn btn-danger btn-sm">Open</button>
                                                @else
                                                    <button class="btn btn-primary btn-sm">Resolved</button>
                                                @endif

                                            </td>
                                            <td>

                                                <div class="dropdown float-end" style="margin: 5px 0 0 10px">
                                                    <a href="javascript:void(0);"
                                                        class="dropdown-toggle arrow-none card-drop action-icon"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img src="{{ asset('assets/images/company/icons/more.png') }}"
                                                            alt="smile" class="img-fluid" width="24" height="24">
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('admin.tickets.show', $ticket->uuid) }}"
                                                            class="dropdown-item">View</a>
                                                        @if ($ticket->status == 1)
                                                            <a class="dropdown-item cursor"
                                                                onclick="changeStatus('{{ $ticket->uuid }}',0)">Close</a>
                                                        @else
                                                            <a href="javascript:void(0);" class="dropdown-item"
                                                                onclick="changeStatus('{{ $ticket->uuid }}',1)">Reopen</a>
                                                        @endif
                                                        <a class="dropdown-item cursor"
                                                            onclick="deleteTicket('{{ $ticket->uuid }}')">Delete</a>
                                                    </div>
                                                </div>

                                            </td>
                                            <form id="deleteTicketForm{{ $ticket->uuid }}" method="post"
                                                action="{{ route('admin.tickets.destroy', $ticket->uuid) }}">@csrf
                                                @method('DELETE')</form>
                                            <form id="changeStatusForm{{ $ticket->uuid }}" method="post"
                                                action="{{ route('admin.ticket.update-status') }}">@csrf
                                                <input type="hidden" name="uuid" value="{{ $ticket->uuid }}">
                                                <input type="hidden" name="status"
                                                    value="{{ $ticket->status == 0 ? 1 : 0 }}">
                                            </form>
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

@push('scripts')
    <script>
        function changeStatus(id, s) {

            Swal.fire({
                title: "Are you sure?",
                text: (s == 0) ? "You want to close this ticket" : "You want to reopen this ticket",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: (s == 0) ? "Yes, Close it!" : "Yes Reopen this"
            }).then(t => {
                t.isConfirmed && document.getElementById("changeStatusForm" + id).submit()
            })

        }

        function deleteTicket(e) {

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this.",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Delete it!"
            }).then(t => {
                t.isConfirmed && document.getElementById("deleteTicketForm" + e).submit()
            })

        }
    </script>
@endpush
