@extends('layouts.admin')
@section('title', 'Pricing')
@section('content')

<div class="container-fluid Pricing Pricing_List">
    <div class="page-title-box">
        <h4 class="page-title">Pricing</h4>
    </div>
    <ul class="lg-navs nav nav-pills mb-3 mt-3">
        <li class="nav-item">
            <a href="#packages" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                <span>Packages</span>
            </a>
        </li>
        <li class="nav-item ms-3">
            <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <span>Messages Cost</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane show active" id="packages">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-6 align-self-center ps-1">
                            <h3 class="text-dark fw-medium mt-1 mb-1">Packages</h3>
                        </div>
                        <div class="col-lg-6 col-6 text-end pe-1"><a href="{{ route('admin.pricing.create') }}" class="btn btn-primary">New</a></div>
                    </div>
                </div>
                <div class="Ctable-responsive">
                    <table class="table table-centered w-100 dt-responsive">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Period</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th class="text-end">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($packages && count($packages))
                            @foreach ($packages as $package)
                            <tr>
                                <td>{{ $package->name }}</td>
                                <td>${{ $package->price }}</td>
                                <td>{{ ucwords($package->billing_cycle) }}</td>
                                <td>{{ $package->status ? 'Active' : 'In-Active' }}</td>
                                <td class="table-action text-end">
                                    <div class="dropdown float-end">
                                        <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('assets/images/company/icons/more.png') }}" alt="smile" class="img-fluid" width="24" height="24">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ route('admin.packages.edit', $package->id) }}" class="dropdown-item">Edit</a>
                                            <a href="javascript:void(0);" onclick="confirmDelete({{ $package->id }})" class="dropdown-item">Delete</a>
                                        </div>

                                        <form id="delete-form{{ $package->id }}"
                                            action="{{ route('admin.packages.destroy', $package->id) }}"
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
                                        <p>Sorry, The data which you are searching for <br />is not available at the moment</p>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="messages">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-6 align-self-center ps-1">
                            <h3 class="text-dark fw-medium mt-1 mb-1">Message Costs</h3>
                        </div>
                        <div class="col-lg-6 col-6 text-end pe-1"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#msgCost">Add</button></div>
                    </div>
                </div>
                <div class="Ctable-responsive">
                    @if( count($costs) > 0 )
                    <table class="table table-centered w-100 dt-responsive">
                        <thead class="table-light">
                            <tr>
                                <th>Country</th>
                                <th>Code</th>
                                <th>Local SMS</th>
                                <th>Global SMS</th>
                                <th>Marketing</th>
                                <th>Service</th>
                                <th>Utility</th>
                                <th>Auth</th>
                                <th class="text-end">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $costs as $cost)
                            <tr>
                                <td>{{ $cost->country }}</td>
                                <td>{{ $cost->code }}</td>
                                <td>${{ $cost->local_sms }}</td>
                                <td>${{ $cost->global_sms }}</td>
                                <td>${{ $cost->marketing }}</td>
                                <td>${{ $cost->service }}</td>
                                <td>${{ $cost->utility }}</td>
                                <td>${{ $cost->auth }}</td>
                                <td class="table-action text-end">
                                    <div class="dropdown float-end">
                                        <a href="javascript:void(0);" class="dropdown-toggle arrow-none card-drop action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('assets/images/company/icons/more.png') }}" alt="smile" class="img-fluid" width="24" height="24">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0)" class="dropdown-item edit_cost" cost="{{ $cost }}" >Edit</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center m-3"><span> No message cost found.</span></div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <style>
        .select2-close-mask1 {
            z-index: 2099;
        }

        .select2-dropdown {
            z-index: 3051;
        }
    </style>
    
    <div id="msgCost" class="modal fade" role="dialog" aria-labelledby="msgCostLabel" aria-hidden="true">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Message Cost</h4>
                    <button type="button" class="btn-link" data-bs-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pricing.store') }}" method="post">
                        @csrf
                        <div class="mb-2">
                            <label class="control-label">Country</label>
                            @include('countries-select',['required'=>'yes'])
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-2">
                                    <label class="form-label">Local SMS</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">$</span>
                                        <input type="text" name="local_sms" class="form-control form-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-2">
                                    <label class="form-label">Global SMS</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">$</span>
                                        <input type="text" name="global_sms" class="form-control form-lg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Whatsapp Marketing</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="marketing" class="form-control form-lg">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Whatsapp Service</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="service" class="form-control form-lg">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Whatsapp Utility</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="utility" class="form-control form-lg">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Whatsapp Authentication</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="auth" class="form-control form-lg">
                            </div>
                        </div>
                    
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary btn-pre">Save</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div id="e-msgCost" class="modal fade" role="dialog" aria-labelledby="e-msgCostLabel" aria-hidden="true">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Message Cost</h4>
                    <button type="button" class="btn-link" data-bs-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body">
                    <form id="updateCostForm" action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label class="control-label">Country</label>
                            @include('countries-select',['id'=>'e-country','required'=>'yes'])
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-2">
                                    <label class="form-label">Local SMS</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">$</span>
                                        <input type="text" name="local_sms" id="e-local_sms" class="form-control form-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-2">
                                    <label class="form-label">Global SMS</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text">$</span>
                                        <input type="text" name="global_sms" id="e-global_sms" class="form-control form-lg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Whatsapp Marketing</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="marketing" id="e-marketing" class="form-control form-lg">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Whatsapp Service</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="service" id="e-service" class="form-control form-lg">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Whatsapp Utility</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="utility" id="e-utility" class="form-control form-lg">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Whatsapp Authentication</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">$</span>
                                <input type="text" name="auth" id="e-auth" class="form-control form-lg">
                            </div>
                        </div>
                    
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary btn-pre">Save</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection


@push('scripts')
<script>
    jQuery(document).ready(function($){
      $('.edit_cost').on('click',function(e){
        let d = JSON.parse($(this).attr('cost'));
        
        $('#e-country').select2().val(d.country_id?.toString()).trigger('change');
        $('#e-local_sms').val(d.local_sms);
        $('#e-global_sms').val(d.global_sms);
        $('#e-marketing').val(d.marketing);
        $('#e-service').val(d.service);
        $('#e-utility').val(d.utility);
        $('#e-auth').val(d.auth);
        $href = "{{ route('admin.pricing.update',':id') }}";
        $href= $href.replace(':id',d.id);
        $('#updateCostForm').attr('action',$href);
        $('#e-msgCost').modal('show');
      });
    });
</script>
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