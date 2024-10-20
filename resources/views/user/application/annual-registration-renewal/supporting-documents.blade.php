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
                <h5>Supporting Documents Required:</h5>
                <p class="text-danger"><b> Note: Documents accepted only images and pdfs would be not more than 10 mb</b></p>
                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <td class="w-33">Certified copy of any new qualification gained;</td>
                            <th class="w-33">
                                <form method="post" action="{{ route('user.arr.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="new_qualification_gained" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'new_qualification_gained'])
                        </tr>
                        <tr>
                            <td>Certificate of ‘good standing’ from the Medical/Dental Registration authority IF you practised outside of Fiji in the previous year;</td>
                            <th>
                                <form method="post" action="{{ route('user.arr.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="good_standing_certificate" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'good_standing_certificate'])
                        </tr>
                        <tr>
                            <td>Copy of Passport Photo (A month Old)</td>
                            <th>
                                <form method="post" action="{{ route('user.arr.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="passport_photo" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'passport_photo'])
                        </tr>
                        <tr>
                            <td>Evidence of Professional Indemnity;</td>
                            <th>
                                <form method="post" action="{{ route('user.arr.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="professional_indemnity_evidence" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'professional_indemnity_evidence'])
                        </tr>
                        <tr>
                            <td>Completed documentation of Continuing Professional Development (‘CPD’) signed by Department Supervisor or Certificates Attained.</td>
                            <th>
                                <form method="post" action="{{ route('user.arr.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="cdp" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'cdp'])
                        </tr>
                       
                    </tbody>
                </table>
                <p class="text-muted">
                    Definition: RELEVANT BUSINESS [in relation to Section 11 of the MDP Act 2010] – healthcare or other business in relation to the diagnosis, treatment, therapeutic services, prevention of disease, illness, injury, and other physical and mental impairments in humans. Practice in medicine, chiropractic, dentistry, nursing, pharmacy, allied health, and other care providers. It refers to the work done in providing primary care, secondary care, and tertiary care as well as in public health in private, public, and voluntary organizations. It also includes medical equipment and pharmaceutical manufacturers, health insurance firms, and educational institutions.
                </p>
            </div>


            <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
            <form action="{{ route('user.arr.payment') }}">
                <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
            </form>
        </div>
    </div>
</div> <!-- container -->


<form id="backForm" method="post" action="{{ route('user.arr.declare-intrest-business') }}">
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