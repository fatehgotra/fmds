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

                    <div class="card-body">
                        <div class="filter">
                            <div class="row">
                                <div class="col-6">
                                    <div class="justify-content-start mt-2">
                                        <b>Global Reminders</b>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="d-flex justify-content-end filterBtn mt-2">
                                        <a href="{{ route('team.reminder.create') }}" class="btn btn-primary" >New</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div> <!-- end card-body -->

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">

                            @if( isset($reminders) )
                                <table class="table table-centered w-100 dt-responsive" id="products-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 20px;text-align: end;">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                            </th>
                                            <th>Title</th>
                                            <th class="all">Date</th>
                                            <th>Report</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach( $reminders as $reminder)
                                        <tr>
                                            <td>
                                                <div class="form-check checkmark">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="customCheck{{$reminder->uuid}}" id="{{ $reminder->uuid }}">
                                                </div>
                                            </td>
                                            <td>
                                                <p class="m-0 d-inline-block align-middle">
                                                    {{ $reminder->title }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="m-0 d-inline-block align-middle font-15">{{ $reminder->date }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="m-0 d-inline-block align-middle">
                                                {{ ucwords( Str::replace('-',' ',$reminder->report)) }}    
                                            </p>
                                            </td>
                                            <td>{{ $reminder->status == 1 ? 'Active' : 'Inactive' }}</td>
                                
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
                                                        <a href="{{ route('team.reminder.show',$reminder->uuid) }}" class="dropdown-item">Edit</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item" onclick="deleteReminder('{{ $reminder->uuid }}')">Delete</a>
                                                        <a href="javascript:void(0);" class="dropdown-item changeStatus" id="{{ $reminder->uuid }}" val="{{ $reminder->status == 1 ? 0 : 1 }}">{{ $reminder->status == 1 ? 'Decactivate' : 'Activate' }}</a>
                                                        <!-- item-->
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <form id="update-status{{ $reminder->uuid }}" method="post" action="{{ route('team.reminder-change') }}">
                                              @csrf
                                              <input type="hidden" name="uuid" value="{{ $reminder->uuid }}"/>
                                              <input type="hidden" name="status" id="upstat{{$reminder->uuid}}"/>
                                            </form>

                                            <form id="deleteReminder{{ $reminder->uuid }}" method="post" action="{{ route('team.reminder.destroy',$reminder->uuid) }}">
                                              @csrf
                                              @method('DELETE')
                                            </form>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                 
                                @else
                                <div class="text-center p-1"> No Reminder Found</div>
                                @endif

                            </div>
                        </div> <!-- end col -->
                    </div>
                </div> <!-- end card-->
                {{ $reminders->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>
  
</div>


@endsection
@push('scripts')
<script>
    jQuery('document').ready(function($){
        $('.changeStatus').on('click',function(e){  
            e.preventDefault();
        
            let id = $(this).attr('id');
            let val = $(this).attr('val');
            console.log(id,' - ',val);
            $('#upstat'+id).val(val);
            $('#update-status'+id).submit();
        });
    });

    function deleteReminder(e) {
      
      Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this.",
          icon: "warning",
          showCancelButton: !0,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, Delete it!"
      }).then(t => {
          t.isConfirmed && document.getElementById("deleteReminder" + e).submit()
      })
  }
</script>
@endpush