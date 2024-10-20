@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>9. Payment</h3>
<form method="post" action="{{ route('user.sar.payment-initiate') }}">
    @csrf
    <div class="card dashboard-bg">
        <div class="section active-section card-body" id="section1">
            <div class="form-group">
            <div class="mb-3">
                    <label class="form-label required">Preferred Method of Payment:</label>
                    <select name="pay_mode" class="form-select" required>
                        <option value="">Select Payment Method</option>
                        <option value="Anz">Transfer Credit on our ANZ Account # 10737532</option>
                        <option value="bsp">Bank of south pacific gateway (BSP)</option>
                    </select>
                </div>
    
                <!-- Fee Schedule Table -->
                <div class="mb-4">
                    <h5>Fee Schedule</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Rate (FJD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Medical Students – Year 1 – 6 (Annual Registration)</td>
                                <td>$10</td>
                            </tr>
                            <tr>
                                <td>Dental Student– Year 1 – 5 (Annual Registration)                                </td>
                                <td>$10</td>
                            </tr>
                        </tbody>
                    </table>
                   
                </div>
    
    
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end" >Next</button>
            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.sar.applicant-declaration') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection