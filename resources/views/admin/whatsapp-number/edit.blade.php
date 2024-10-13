@extends('layouts.admin')
@section('title', 'Edit Whatsapp number')
@section('content')

<div class="container-fluid">
    <div class="page-title-box">
        <h4 class="page-title">Whatsapp Numbers</h4>
    </div>
    <div class="pricing_create">
        <div class="card">
            <div class="card-body">
                <form method="POST" id="customerForm" action="{{ route('admin.whatsapp-number.update', $number->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Number(with country code)</label>
                        <input type="text" name="number" value="{{ old('number', $number->number) }}" placeholder="Please enter number with country code" class="form-control form-lg">
                        @error('number')
                        <code id="number-error" class="text-danger">{{ $message }}</code>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control form-lg form-select">
                            <option value="">Please select</option>
                            <option value="inactive" @if(old('status', $number->status) == 'inactive') selected @endif >In-active</option>
                            <option value="active" @if(old('status', $number->status) == 'active') selected @endif >Active</option>
                            <option value="available" @if(old('status', $number->status) == 'available') selected @endif >Available</option>
                            <option value="assigned" @if(old('status', $number->status) == 'assigned') selected @endif >Assigned</option>
                            <option value="expired" @if(old('status', $number->status) == 'expired') selected @endif >Expired</option>
                        </select>
                        @error('status')
                        <code id="status-error" class="text-danger">{{ $message }}</code>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
