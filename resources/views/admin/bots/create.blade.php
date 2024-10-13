@extends('layouts.admin')
@section('title', 'AI Bots')
@section('content')

<div class="container-fluid ai-bots">
    <div class="page-title-box">
        <h4 class="page-title">AI Bots</h4>
    </div>
    <div class="Bots_Create">
        <form action="">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-dark fw-medium mt-1 mb-4">Bot Information</h4>
                            <div class="mb-2">
                                <label class="control-label">Bot Name</label>
                                <input type="text" class="form-control form-lg" placeholder="Support Bot">
                            </div>
                            <div class="mb-2">
                                <label class="control-label">Description</label>
                                <textarea rows="8" id="" class="form-control font-13" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-dark fw-medium mt-1 mb-4">Configuration</h4>
                            <div class="mb-2">
                                <label class="control-label">URL</label>
                                <input type="text" class="form-control form-lg">
                            </div>
                            <div class="mb-2">
                                <label class="control-label">Documentation URL</label>
                                <input type="text" class="form-control form-lg">
                            </div>
                            <div class="mb-2">
                                <label class="control-label">Configuration on the Bot</label>
                                <input type="text" class="form-control form-lg">
                            </div>
                            <p class="Comma">Comma separated list of values, that need to be overwritten</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="float-end">
                        <a href="{{ route('admin.bots.index') }}" class="btn btn-primary">Back</a>
                        <a href="{{ route('admin.bots.index') }}" class="btn btn-primary ms-2">Update</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection
