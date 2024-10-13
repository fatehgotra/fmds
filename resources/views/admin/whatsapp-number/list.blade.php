@extends('layouts.admin')
@section('title', 'Whatsapp Numbers')
@section('content')

<div class="container-fluid">
    <div class="page-title-box">
        <h4 class="page-title">Whatsapp Numbers</h4>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="float-end">
                <a href="{{ route('admin.whatsapp-number.create') }}" class="btn btn-primary">New</a>
            </div>
        </div>
        <div class="Ctable-responsive">
            <table class="table table-centered w-100 dt-responsive">
                <thead class="table-light">
                    <tr>
                        <th>Number</th>
                        <th>Status</th>
                        <th class="text-end">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($numbers && count($numbers))
                    @foreach ($numbers as $number)
                    <tr>
                        <td>{{ $number->number }}</td>
                        <td> {{ ucfirst($number->status) }}</td>
                        <td class="table-action text-end">
                            <div class="dropdown float-end">
                                <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/company/icons/more.png') }}" alt="smile" class="img-fluid" width="24" height="24">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('admin.whatsapp-number.edit', $number->id) }}" class="dropdown-item">Edit</a>
                                    <a href="javascript:void(0);" onclick="confirmDelete({{ $number->id }})" class="dropdown-item">Delete</a>
                                </div>
                                <form id="delete-form{{ $number->id }}"
                                action="{{ route('admin.whatsapp-number.destroy', $number->id) }}"
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
            {{ $numbers->appends(request()->query())->links('pagination::bootstrap-5') }}
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
