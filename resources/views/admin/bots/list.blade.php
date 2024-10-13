@extends('layouts.admin')
@section('title', 'AI Bots')
@section('content')

<div class="container-fluid ai-bots">
    <div class="page-title-box">
        <h4 class="page-title">AI Bots</h4>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-6 align-self-center ps-1"><h3 class="text-dark fw-medium mt-1 mb-1">Management</h3></div>
                <div class="col-lg-6 col-6 text-end pe-1"><a href="{{ route('admin.bots.create') }}" class="btn btn-primary">New</a></div>
            </div>
        </div>
        <div class="Ctable-responsive">
            <table class="table table-centered w-100 dt-responsive">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th class="text-end">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Support Box</td>
                        <td class="table-action text-end">
                            <div class="dropdown float-end">
                                <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/company/icons/more.png') }}" alt="smile" class="img-fluid" width="24" height="24">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('admin.bots.edit', '1') }}" class="dropdown-item">Edit</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
