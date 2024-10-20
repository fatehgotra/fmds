@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')


<div class="card dashboard-bg">
    <h3>9. Supporting Documents Required:</h3>
    <div class="section active-section card-body" id="section1">
        <div class="form-group">
            <p>
                <b class="text-danger">WARNING: False / Fraudulent Claims:</b> In the event of any applicant submitting false or incomplete data, and or copies of certificates, which are found to be false, The Dental Registration authority of the applicant will be notified. The application for registration in Fiji will be unsuccessful; or provisional registration, if already given, will not be confirmed, and may be cancelled. Council/Secretariat may require further information before a decision is made.
            </p>
            <p><b class="text-danger">Note 1:</b> The Fiji Medical and Dental Council will determine your eligibility for registration.
                If you are found to be eligible, your registration will be confirmed when you present your original documents, or original notarized copies of the same, to the Registrar, Respective Council, for inspection of the copies you have submitted
            </p>
            <p>
                <b class="text-danger">Note 2:</b> It is normal practice for the doctors coming outside Fiji on first appointment to be granted provisional registration for a period of four months, which will be confirmed subject to satisfactory performance.
            </p>
            <p>
                <b class="text-danger">Note 3:</b> Applications for Temporary Registration, for visit by consultants for specific projects must be accompanied by letters of recommendation from the practitioner, resident in Fiji, who is responsible for the project
            </p>
            <div class="mb-4">

                <p class="text-danger"><b> Note: Documents accepted only images and pdfs would be not more than 10 mb</b></p>
                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <td class="w-33">Recent Coloured Passport Photo</td>
                            <th class="w-33">
                                <form method="post" action="{{ route('user.practitioner.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="recent_photo" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'recent_photo'])
                        </tr>
                        <tr>
                            <td>Certified copy of Basic qualification and other qualification gained.)</td>
                            <th>
                                <form method="post" action="{{ route('user.practitioner.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="basic_qualification" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'basic_qualification'])
                        </tr>
                        <tr>
                            <td>Certificate of ‘good standing’ from the Medical/Dental Registration authority <b>IF</b> you practised outside of Fiji in the previous year; dated not more that 3 months before the date of application.</td>
                            <th>
                                <form method="post" action="{{ route('user.practitioner.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="good_standing" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'good_standing'])
                        </tr>
                        <tr>
                            <td>Copies of Valid Practising License from your country of residence (Only for overseas applicants)</td>
                            <th>
                                <form method="post" action="{{ route('user.practitioner.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="valid_practise_licence" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'valid_practise_licence'])
                        </tr>
                        <tr>
                            <td>Work Permit <b>(Non- Fiji citizen)</b></td>
                            <th>
                                <form method="post" action="{{ route('user.practitioner.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="work_permit" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'work_permit'])
                        </tr>
                        <tr>
                            <td>Evidence of Professional Indemnity;</b></td>
                            <th>
                                <form method="post" action="{{ route('user.practitioner.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="professional_indemnity" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'professional_indemnity'])
                        </tr>
                        <tr>
                            <td>Copies of Provisional Offer of Appointments (Place of Practise)</b></td>
                            <th>
                                <form method="post" action="{{ route('user.practitioner.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="place_of_practise" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'place_of_practise'])
                        </tr>

                    </tbody>
                </table>

            </div>


            <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
            <form action="{{ route('user.practitioner.payment') }}">
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
            </form>
        </div>
    </div>
</div> <!-- container -->


<form id="backForm" method="post" action="{{ route('user.practitioner.declare-intrest-business') }}">
    @csrf
    <input type="hidden" name="back" value="1">
</form>

<!-----attachment show modal------------>
<div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">File Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.preview').on('click', function(event) {
        event.preventDefault();

        var href = $(this).attr('source');
        var fileExtension = href.split('.').pop().toLowerCase();
        var modalBodyContent;

        if (fileExtension === 'pdf') {
            // Show PDF in an iframe
            modalBodyContent = '<iframe src="' + href + '" frameborder="0" style="width:100%; height:700px;"></iframe>';
        } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
            // Show image
            modalBodyContent = '<img src="' + href + '" class="img-fluid" alt="Image">';
        } else {
            // Handle unsupported file types or errors
            modalBodyContent = '<p>File type not supported for preview.</p>';
        }

        $('#fileModal .modal-body').addClass('modal-lg').html(modalBodyContent);
        $('#fileModal').modal('show');
    });
</script>
@endpush