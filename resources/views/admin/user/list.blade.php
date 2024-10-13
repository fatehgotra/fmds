@extends('layouts.admin')
@section('title', 'Users/Applicants')
@section('content')

<div class="container-fluid ACustomer">
    <div class="page-title-box">
        <h4 class="page-title">Users/Applicants</h4>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-6 align-self-center ps-1"><h3 class="text-dark fw-medium mt-1 mb-1">Data</h3></div>
            </div>
        </div>
        <div class="Ctable-responsive">
            <table class="table table-centered w-100 dt-responsive">
                <thead class="table-light">
                    <tr>
                        <th>Added</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th colspan="7">Status</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @if ($customers && count($customers))
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($customer->created_at)) }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                       
                        @if($customer->delete == 1)
                        <td><button class="btn btn-danger btn-sm">Deleted</button></td>
                        @elseif($customer->status == '1')
                        <td><button class="btn btn-primary btn-sm">Active</button></td>
                        @else
                        <td><button class="btn btn-danger btn-sm">Inactive</button></td>
                        @endif

                        <td class="table-action text-end">
                            <div class="dropdown float-end">
                                <a href="{{ route('admin.user.intend-login', $customer->uuid) }}" class="action-icon">
                                    <img src="{{ asset('assets/images/icons/enter.png') }}" alt="Enter" class="img-fluid" width="22" height="22 ">
                                </a>
                                <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/company/icons/more.png') }}" alt="smile" class="img-fluid" width="24" height="24">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('admin.user.edit', $customer->id) }}" class="dropdown-item">Edit</a>
                                    <a href="javascript:void(0);" onclick="confirmDelete({{ $customer->id }})" class="dropdown-item">Delete</a>
                                </div>

                            <form id="delete-form{{ $customer->id }}"
                                action="{{ route('admin.user.destroy', $customer->id) }}"
                                method='POST'>
                                <input type='hidden' name='_token'
                                    value='{{ csrf_token() }}'>
                                <input type='hidden' name='_method' value='DELETE'>
                            </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7">
                            <div class="no-data">
                                <img src="{{ asset('assets/images/icons/no-data.png') }}" alt="No data available" class="img-fluid">
                                <h3>No data available</h3>
                                <p>Sorry, The data which you are searching for <br/>is not available at the moment</p>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div style="margin-left: 15px; margin-right: 49px;">
            {{ $customers->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
           function confirmDelete(e) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Delete it!"
            }).then(t => {
                t.isConfirmed && document.getElementById("delete-form" + e).submit()
            })
        }
    </script>
@endpush
