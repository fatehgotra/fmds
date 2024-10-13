@extends('layouts.customer')
@section('title', 'Reminder')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Reminders</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="tabPages mb-3">
        <div class="row">
            <div class="col-xl-6 col-6">
                <ul class="list-unstyled d-flex justify-content-between">
                    <li class="{{ Request::is('team/reminder') ? 'active' : '' }}">
                        <a href="{{ route('team.reminder.index') }}" class="btn btn-primary">My Reminders</a>
                    </li>
                    <li class="{{ Request::is('team/global-reminder') ? 'active' : '' }}">
                        <a href="{{ route('team.global-reminder') }}" class="btn btn-primary">Global Reminders</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <div class="dashboard-bg">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                <div class="card">
                    @include('team.reminder.filter')

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive" id="products-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 20px;text-align: end;">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                            </th>
                                            <th class="all">Date</th>
                                            <th>Contact</th>
                                            <th>Contact Number</th>
                                            <th>Reminder</th>
                                            <th>Status</th>
                                            <th>Team Member</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="form-check checkmark">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="customCheck2">
                                                </div>
                                            </td>
                                            <td>
                                                <p class="m-0 d-inline-block align-middle font-15">30 Aug 2024, 10:00 AM
                                                </p>
                                            </td>
                                            <td>
                                                <p class="m-0 d-inline-block align-middle">
                                                    Jhon Doe
                                                </p>
                                            </td>
                                            <td>
                                                <p class="m-0 d-inline-block align-middle">
                                                    +918825073822
                                                </p>
                                            </td>
                                            <td>
                                                <p class="m-0 d-inline-block align-middle">
                                                    Birthday</p>
                                            </td>
                                            <td>Read</td>
                                            <td>Fateh</td>
                                            <td class="table-action text-end">

                                                <div class="dropdown float-end">
                                                    <a href="javascript:void(0);"
                                                        class="dropdown-toggle arrow-none card-drop action-icon"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img src="{{ asset('assets/images/company/icons/more.png') }}"
                                                            alt="smile" class="img-fluid" width="24"
                                                            height="24" />
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Mark as Read</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            {{-- $reminders->appends(request()->query())->links('pagination::bootstrap-5') --}}
                        </div> <!-- end col -->
                    </div>
                </div> <!-- end card-->
            </div>
        </div>

    </div>

</div>

<div id="assign-team-member" class="modal TopupM fade" tabindex="-1" role="dialog"
    aria-labelledby="assign-team-memberLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white"> <svg xmlns="http://www.w3.org/2000/svg" width="30"
                        height="30" viewBox="0 0 14 14">
                        <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7V4.37A3.93 3.93 0 0 1 7 .5h0a3.93 3.93 0 0 1 4 3.87V7M1.5 5.5h1A.5.5 0 0 1 3 6v3a.5.5 0 0 1-.5.5h-1a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1Zm11 4h-1A.5.5 0 0 1 11 9V6a.5.5 0 0 1 .5-.5h1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1ZM9 12.25a2 2 0 0 0 2-2h0V8m-2 4.25a1.25 1.25 0 0 1-1.25 1.25h-1.5a1.25 1.25 0 0 1 0-2.5h1.5A1.25 1.25 0 0 1 9 12.25Z">
                        </path>
                    </svg> <span>Assign to Team Member</span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="modal-form">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="label" class="form-label text-white fw-400">Team Member</label>
                            <select id="team-member" class="form-select" name="team-member" required>
                                <option selected>Select Team Member</option>
                                <option>One</option>
                                <option>Two</option>
                                <option>Three</option>
                            </select>
                        </div>

                    </div>
                    <div class="mt-3 text-end">
                        <button type="button" class="btn btn-dark">Assign</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection