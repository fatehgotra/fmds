@extends('layouts.customer')
@section('title', 'Integrations')
@section('content')

<div class="container-fluid integration">
    <div class="page-title-box">
        <h4 class="page-title">Integrations</h4>

    </div>
    <div class="mt-3">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-6 text-start ps-1">
                                <h5 class="text-dark fw-medium mt-1 mb-1">Integrations</h5>
                            </div>
                            <div class="col-lg-6 col-6 text-end pe-1">
                                <a href="{{ route('user.integration.create') }}" class="btn btn-primary" >Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="Ctable-responsive">
                        @if( count($integrations) > 0 )
                        <table class="table table-centered w-100 dt-responsive">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center"><img src="{{ asset('assets/images/company/icons/connect.png') }}" width="22" height="22"></th>
                                    <th>Identifier</th>
                                    <th>ID / User / Key</th>
                                    <th>Contacts</th>
                                    <th colspan="6">Lists</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($integrations as $integration)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('assets/images/company/icons/list-icon-1.png') }}"
                                            alt="" width="44" height="45" />
                                    </td>
                                    <td>{{ $integration->name }}</td>
                                    <td>{{ substr($integration->app_id,0,20).'...' }}</td>
                                    <td>{{ $integration->contacts }}</td>
                                    <td>{{ $integration->lists }}</td>

                                    {{-- <td class="table-action float-end">

                                        @if($integration->status == 0)
                                        <button class="btn btn-danger btn-sm me-2">Error</button>
                                        @else
                                        <button class="btn btn-primary btn-sm me-2">Connected</button>
                                        @endif

                                    </td> --}}

                                    <td class="table-action text-end">
                                        @if($integration->status == 0)
                                        <button class="btn btn-danger btn-sm me-2">Error</button>
                                        @else
                                        <button class="btn btn-primary btn-sm me-2">Connected</button>
                                        @endif

                                    <a href="javascript:void(0);" class="action-icon hidden process{{$integration->uuid}}">
                                            <img src="{{ asset('assets/images/icons/icon-refresh.gif') }}"
                                                alt="reload" width="28" height="28" />
                                        </a>

                                        <a href="javascript:void(0);"  class="action-icon reloadIcon"
                                           in_id="{{ $integration->uuid }}"
                                           in_name="{{ $integration->integration }}"
                                        >
                                            <img src="{{ asset('assets/images/company/icons/reload.png') }}"
                                                alt="reload" width="28" height="28" />
                                        </a>

                                        <div class="dropdown float-end">
                                            <a href="javascript:void(0);"
                                                class="dropdown-toggle arrow-none card-drop action-icon"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('assets/images/company/icons/more.png') }}"
                                                    alt="more" class="img-fluid" width="24"
                                                    height="24" />
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ route('user.integration.show', $integration->uuid) }}" class="dropdown-item">View</a>
                                                <a class="dropdown-item cursor" onclick="deleteTicket('{{ $integration->uuid }}')">Delete</a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @else
                        <p class="text-center text-dark fw-normal font-15">No integration found.</p>
                        @endif
                    </div>
                </div>
                {{ $integrations->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    $(function(){

        $('.reloadIcon').on('click',function(e){

        e.preventDefault();
        $(this).addClass('hidden');
        $(this).prev().removeClass('hidden');

        let id   = $(this).attr('in_id');
        let name = $(this).attr('in_name');
        let url  = "{{ route('user.integration.check',['uuid'=>':id','integration_name'=>':name','action'=>'xhr']) }}";
        url = url.replace(':id',id).replace(':name',name);

        $.ajax({
            url,
            success:function(res){
               if(res.status_code == 200){
                toastr.info(res.message);

                setTimeout(() => {
                window.location.reload(true);
                },2000);

               } else{
                toastr.error(res.message);
               }
               $('.process'+res.id).addClass('hidden');
               $('.process'+res.id).next().removeClass('hidden');
1            }
        });

       });

    });
</script>
@endpush
