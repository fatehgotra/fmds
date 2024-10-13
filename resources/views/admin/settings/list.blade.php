@extends('layouts.admin')
@section('title', 'Site Settings')
@section('content')

<div class="container-fluid site_settings">
    <div class="page-title-box">
        <h4 class="page-title">Site Settings</h4>
    </div>
    {{-- <ul class="nav-justified site_settings_tab md-navs nav nav-pills mb-3 mt-3">
        <li class="nav-item">
            <a href="#setup" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                <span>Setup</span>
            </a>
        </li>
        <li class="nav-item ms-3">
            <a href="#finances" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <span>Finances</span>
            </a>
        </li>
        <li class="nav-item ms-3">
            <a href="#localisation" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <span>Localisation</span>
            </a>
        </li>
        <li class="nav-item ms-3">
            <a href="#apps" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <span>Apps & Plugins</span>
            </a>
        </li>
        <li class="nav-item ms-3">
            <a href="#smtp" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <span>SMTP</span>
            </a>
        </li>
        <li class="nav-item ms-3">
            <a href="#media" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <span>Media</span>
            </a>
        </li>
        <li class="nav-item ms-3">
            <a href="#cssjs" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <span>CSS/JS</span>
            </a>
        </li>
    </ul> --}}
    <ul class="site_settings_tab md-navs nav nav-pills mb-3 mt-3">
        <li class="nav-item">
            <a href="#setup" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                <span>Setup</span>
            </a>
        </li>
        <li class="nav-item ms-3">
            <a href="#media" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                <span>Media</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane show active" id="setup">
            <form action="">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-dark fw-medium mt-0 mb-4">System</h4>
                                <div class="form-group mb-2">
                                    <label class="control-label">Project Name</label>
                                    <input type="text" class="form-control form-lg" placeholder="Project Name">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="control-label">Site Link</label>
                                    <input type="text" class="form-control form-lg" placeholder="Site Link">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="control-label">Subdomains</label>
                                    <input type="text" class="form-control form-lg" placeholder="Subdomains">
                                </div>
                                <div class="form-group mb-2">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="customSwitch1">
                                        <label class="form-check-label" for="customSwitch1">App Debugging</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="customSwitch2">
                                        <label class="form-check-label" for="customSwitch2">Disable Landing Page</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="customSwitch3">
                                        <label class="form-check-label" for="customSwitch3">Wildcard Domain</label>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="control-label">Pagination Count</label>
                                    <select name="" id="" class="form-select form-lg">
                                        <option value="">Select Language</option>
                                        <option value="">English</option>
                                        <option value="">Chinese</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-dark fw-medium mt-0 mb-4">Storage</h4>
                                <div class="form-group mb-2">
                                    <label class="control-label">Select Storage</label>
                                    <select name="" id="" class="form-select form-lg">
                                        <option value="">Select Language</option>
                                        <option value="">Test 1</option>
                                        <option value="">Test 2</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="control-label">S3 AWS Access Key</label>
                                    <input type="text" class="form-control form-lg">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="control-label">S3 AWS Secret Access Key</label>
                                    <input type="text" class="form-control form-lg">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="control-label">S3 AWS Default Region</label>
                                    <input type="text" class="form-control form-lg">
                                </div>
                                <div class="form-group mb-2">
                                    <label class="control-label">S3 AWS Bucket</label>
                                    <input type="text" class="form-control form-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="float-end">
                            <div class="btn-group">
                                <a href="{{ route('admin.settings.index') }}" class="btn btn-primary">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- <div class="tab-pane" id="finances">
        </div>
        <div class="tab-pane" id="localisation">
        </div>
        <div class="tab-pane" id="apps">
        </div>
        <div class="tab-pane" id="smtp">
        </div> --}}
        <div class="tab-pane" id="media">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-7 text-start ps-1">
                                    <h4 class="text-dark fw-medium mt-1 mb-1">Media</h4>
                                </div>
                                <div class="col-lg-6 col-5 text-end pe-1">
                                    <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
                                        New</a>
                                </div>
                            </div>
                        </div>
                        <div class="Ctable-responsive">

                            @if( count($medias) > 0 )
                            <table class="table table-centered w-100 dt-responsive">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 170px;">Name</th>
                                        <th style="width: 200px;">Name of the Page</th>
                                        <th colspan="4">Video</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $medias as $media)
                                    <tr>
                                        <td>{{ $media->name }}</td>
                                        <td>{{ $media->page }}</td>
                                        <td><a href="{{media_video($media->page)}}" class="text-primary">{{ media_video($media->page) }}</a></td>
                                        <td class="table-action text-end">
                                            <div class="dropdown float-end">
                                                <a href="javascript:void(0);"
                                                    class="dropdown-toggle arrow-none card-drop action-icon"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="{{ asset('assets/images/company/icons/more.png') }}"
                                                        alt="smile" width="24"
                                                        height="24" />
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="{{ route('admin.settings.edit', $media->id) }}"
                                                        class="dropdown-item">Edit</a>
                                                    <!-- item-->
                                                    <a class="dropdown-item cursor" onclick="confirmDelete('{{$media->id}}')">Delete</a>

                                                </div>
                                            </div>
                                            <form id="delete-form{{$media->id}}" action="{{ route('admin.settings.destroy',$media->id) }}" method="post"> @csrf @method('DELETE')</form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @else
                            <div class="text-center m-3">
                                <span>No Media found.</span>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="tab-pane" id="cssjs">
        </div> --}}
    </div>
</div>

@endsection

@push('scripts')
   
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
