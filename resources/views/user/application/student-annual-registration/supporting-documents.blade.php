@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')


<div class="card dashboard-bg">
    <div class="section active-section card-body" id="section1">
        <div class="form-group">
            <p>
                <b class="text-danger">WARNING: False / Fraudulent Claims:</b> In the event of any applicant submitting false or incomplete data, and or copies of certificates, which are found to be false, The Dental Registration authority of the applicant will be notified. The application for registration in Fiji will be unsuccessful; or provisional registration, if already given, will not be confirmed, and may be cancelled. Council/Secretariat may require further information before a decision is made.
            </p>
            <div class="mb-4">
                <h5>8. Supporting Documents Required:</h5>
                <p class="text-danger"><b> Note: Documents accepted only images and pdfs would be not more than 10 mb</b></p>
                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <td class="w-33">Recent Coloured Passport Photo</td>
                            <th class="w-33">
                                <form method="post" action="{{ route('user.sar.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="recent_photo" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'recent_photo'])
                        </tr>
                        <tr>
                            <td>Copy of Student Offer Letter (Year 1)</td>
                            <th>
                                <form method="post" action="{{ route('user.sar.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="offer_letter" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'offer_letter'])
                        </tr>
                        <tr>
                            <td>Enrolment Registration (Year 2 – Year 6)</td>
                            <th>
                                <form method="post" action="{{ route('user.sar.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="enrolment_registration" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'enrolment_registration'])
                        </tr>
                        <tr>
                            <td>Copy of Student ID</td>
                            <th>
                                <form method="post" action="{{ route('user.sar.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="student_id" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'student_id'])
                        </tr>
                        <tr>
                            <td>Original / Certified Birth Certificate (Year 1)</td>
                            <th>
                                <form method="post" action="{{ route('user.sar.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="birth_certificate" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'birth_certificate'])
                        </tr>
                       
                    </tbody>
                </table>
            
            </div>


            <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
            <form action="{{ route('user.sar.payment') }}">
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
            </form>
        </div>
    </div>
</div> <!-- container -->


<form id="backForm" method="post" action="{{ route('user.sar.criminal-convictions') }}">
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