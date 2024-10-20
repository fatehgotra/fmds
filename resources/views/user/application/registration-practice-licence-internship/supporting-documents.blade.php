@extends('layouts.customer')
@section('title', 'Applications')
@section('content')

@include('user.application.header')


<div class="card dashboard-bg">
<h3>10. Supporting Documents Required:</h3>
    <div class="section active-section card-body" id="section1">
        <div class="form-group">

            <div class="mb-4">
                <b class="text-danger"> Note: Documents accepted only images and pdfs would be not more than 10 mb</b>
                <table class="table table-bordered">

                    <tbody>
                        <tr>
                            <td class="w-33">Certified copy of basic medical qualification</td>
                            <th class="w-33">
                                <form method="post" action="{{ route('user.rpli.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="basic_medical_qualification" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'basic_medical_qualification'])
                        </tr>
                        <tr>
                            <td>Certified copies of academic transcripts</td>
                            <th>
                                <form method="post" action="{{ route('user.rpli.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="academic_transcripts" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'academic_transcripts'])
                        </tr>
                        <tr>
                            <td>Copy of Passport Photo (A month Old)</td>
                            <th>
                                <form method="post" action="{{ route('user.rpli.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="passport_photo" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'passport_photo'])
                        </tr>
                        <tr>
                            <td>Certified copy of letter of completion from University where study has been undertaken (in any place of graduate certificate)</td>
                            <th>
                                <form method="post" action="{{ route('user.rpli.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="letter_of_completion" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'letter_of_completion'])
                        </tr>
                        <tr>
                            <td>Certified Copy of Any Valid ID</td>
                            <th>
                                <form method="post" action="{{ route('user.rpli.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="valid_id" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'valid_id'])
                        </tr>
                        <tr>
                            <td>Certified Copy of Passport (if any)</td>
                            <th>
                                <form method="post" action="{{ route('user.rpli.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="passport" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'passport'])
                        </tr>
                        <tr>
                            <td>Certified Copy of Birth Certificate</td>
                            <th>
                                <form method="post" action="{{ route('user.rpli.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="birth_certificate" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'birth_certificate'])
                        </tr>
                        <tr>
                            <td>Work Permit – Non Fiji Citizen</td>
                            <th>
                                <form method="post" action="{{ route('user.rpli.process_doc') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="work_permit" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </th>
                            @include('user.application.registration-practice-licence-internship.preview',['key' => 'work_permit'])
                        </tr>
                    </tbody>
                </table>
                <p class="text-muted">
                    Definition: RELEVANT BUSINESS [in relation to Section 11 of the MDP Act 2010] – healthcare or other business in relation to the diagnosis, treatment, therapeutic services, prevention of disease, illness, injury, and other physical and mental impairments in humans. Practice in medicine, chiropractic, dentistry, nursing, pharmacy, allied health, and other care providers. It refers to the work done in providing primary care, secondary care, and tertiary care as well as in public health in private, public, and voluntary organizations. It also includes medical equipment and pharmaceutical manufacturers, health insurance firms, and educational institutions.
                </p>
            </div>


            <button class="btn btn-dark mt-4" type="button" onclick="{ $('#backForm').submit() }">Back</button>
            <form action="{{ route('user.rpli.payment') }}">
            <button type="submit" class="btn btn-primary mt-4 float-end">Next</button>
            </form>
        </div>
    </div>
</div> <!-- container -->


<form id="backForm" method="post" action="{{ route('user.rpli.declare-intrest-business') }}">
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