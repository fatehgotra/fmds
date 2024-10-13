@extends('layouts.admin')
@section('title', 'Add Whatsapp number')
@section('content')

<div class="container-fluid">
    <div class="page-title-box">
        <h4 class="page-title">Whatsapp Numbers</h4>
    </div>
    <div class="pricing_create">
        <div class="card">
            <div class="card-body">
                <form method="POST" id="customerForm" action="{{ route('admin.whatsapp-number.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-12">

                            <div class="mb-3">
                                <label class="control-label">Country</label>
                                @include('countries-select',['required'=>'yes'])
                            </div>

                            <div class="mb-3">
                                <select id="select_number" class="form-select form-lg" name="number">
                                    <option value="">Please select a Number</option>
                                </select>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#country').change(function() {
            var country_id = $(this).val();
            if(country_id) {
                $.ajax({
                    url: '/admin/tylnex-numbers/' + country_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#select_number').empty();
                        $('#select_number').append('<option value="">Please select a Number</option>');

                            $.each(data, function(key, value) {
                                $('#select_number').append('<option value="' + value.number + '">' + value.number + '</option>');
                            });                       
                    },
                    error: function() {
                        $('#select_number').empty();
                        $('#select_number').append('<option value="">No states available</option>');
                    }
                });
            } else {
                $('#select_number').empty();
                $('#select_number').append('<option value="">Select State</option>');
            }
        });
    });
</script>

@endpush