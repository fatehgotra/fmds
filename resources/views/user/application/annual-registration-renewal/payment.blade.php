@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')

<h3>13. Payment</h3>
<form method="post" action="{{ route('user.arr.payment-initiate') }}">
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
                    <small class="text-muted">Note: For a complete application, the applicable fee for registration/license must be paid and attached with this renewal form.</small>
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
                                <td>Application fee Registration – resident</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>Application fee Registration – non-resident                                </td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>Medical / Dental Practitioners in Government Services (Practice License Fee)</td>
                                <td>200</td>
                            </tr>
                            <tr>
                                <td>Medical / Dental Practitioners in Private Practice (Practice License Fee)</td>
                                <td>200</td>
                            </tr>
                            <tr>
                                <td>Vocational Registration – Medical / Dental Practitioners (Practice License Fee)</td>
                                <td>300</td>
                            </tr>
                            <tr>
                                <td>Dental Therapist/ Dental Hygienist/ Dental Technician (Practice License Fee)</td>
                                <td>50</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-muted">
                        Definition: RELEVANT BUSINESS [in relation to Section 11 of the MDP Act 2010] – healthcare or other business in relation to the diagnosis, treatment, therapeutic services, prevention of disease, illness, injury, and other physical and mental impairments in humans. Practice in medicine, chiropractic, dentistry, nursing, pharmacy, allied health, and other care providers. It refers to the work done in providing primary care, secondary care, and tertiary care as well as in public health in private, public, and voluntary organizations. It also includes medical equipment and pharmaceutical manufacturers, health insurance firms, and educational institutions.
                    </p>
                </div>
    
    
                <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
                <button type="submit" class="btn btn-primary mt-4 float-end" >Next</button>
            </div>
        </div>
    </div> <!-- container -->
</form>

<form id="backForm" method="post" action="{{ route('user.arr.declaration-by-applicant') }}">
@csrf
<input type="hidden" name="back" value="1">
</form>
@endsection