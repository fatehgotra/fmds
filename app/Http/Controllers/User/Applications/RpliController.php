<?php

namespace App\Http\Controllers\User\Applications;

use App\Models\Applications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\applicationDocs;
use Exception;

class RpliController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function personalInfo(Request $request)
  {
    $inputs = $request->except('_token');

    if (!isset($request->back) && isset($inputs))
      session()->put('personal_info', $inputs);
    return view('user.application.registration-practice-licence-internship.primary-qualification');
  }

  public function primaryQualification(Request $request)
  {
    $inputs = $request->except('_token');
    if (!isset($request->back) && isset($inputs))
      session()->put('primary_qualification', $inputs);
    return view('user.application.registration-practice-licence-internship.degree-and-qualification');
  }

  public function otherQualifications(Request $request)
  {

    $inputs = $request->except('_token');
    if (!isset($request->back) && isset($inputs)) {
      session()->put('other_qualifications', $inputs);
    }
    return view('user.application.registration-practice-licence-internship.disciplinary-charges');
  }

  public function disciplinaryEnquiries(Request $request)
  {
    $inputs = $request->except('_token');
    if (!isset($request->back) && isset($inputs)) {
      session()->put('disciplinary_enquiries', $inputs);
    }
    return view('user.application.registration-practice-licence-internship.medical-fitnes');
  }

  public function medicalFitness(Request $request)
  {
    $inputs = $request->except('_token');
    if (!isset($request->back) && isset($inputs)) {
      session()->put('medical_fitness', $inputs);
    }
    return view('user.application.registration-practice-licence-internship.professional-indemnity');
  }

  public function profesionalIndemnity(Request $request)
  {
    $inputs = $request->except('_token');
    if (!isset($request->back) && isset($inputs)) {
      session()->put('profesional_indemnity', $inputs);
    }
    return view('user.application.registration-practice-licence-internship.criminal-convictions');
  }

  public function criminalConvictions(Request $request)
  {
    $inputs = $request->except('_token');

    if (!isset($request->back) && isset($inputs)) {
      session()->put('criminal_convictions', $inputs);
    }
    return view('user.application.registration-practice-licence-internship.declare-intrest-business');
  }

  public function declareIntrestBusiness(Request $request)
  {
    $inputs = $request->except('_token');
    if (!isset($request->back) && isset($inputs)) {
      session()->put('declare_business_interest', $inputs);
    }
    return view('user.application.registration-practice-licence-internship.declaration-by-applicant');
  }

  public function applicantDeclaration(Request $request)
  {
    $inputs = $request->except('_token');
    if (!isset($request->back) && isset($inputs)) {
      session()->put('applicant_declaration', $inputs);
    }
    return view('user.application.registration-practice-licence-internship.supporting-documents');
  }
  public function supportingDocument()
  {
    return view('user.application.registration-practice-licence-internship.supporting-documents');
  }

  public function processDoc(Request $request)
  {
    if (empty($request->allFiles())) {
      return redirect()->back()->with('error', 'Please upload file.');
    }

    foreach ($request->except('_token') as $key => $part) {

      try {
      

        $file = $request->file($key);
        $mime  = $file->getClientMimeType();
        $size  =  number_format( $file->getSize() / 1048576,2);
       
        if (!str_contains($mime, 'image') && !str_contains($mime, 'pdf')) {
          return redirect()->back()->with('error', 'Only images and pdf are allowed.');
        }
        if($size > 10 ){
          return redirect()->back()->with('error', 'Please upload less than 10 mb file.');
        }

        $type = (str_contains($mime, 'image')) ? 'image' : 'pdf';
        $ext = $file->getClientOriginalExtension();
        $name = time() . '.' . $ext;
        $file->storeAs('uploads/applications/docs', $name, 'public');
       
        applicationDocs::updateOrCreate(
          [
            'user_id' => auth()->user()->id,
            'application_id' => session()->get('application_id'),
            'doc' => $key
          ],
          [
            'user_id' => auth()->user()->id,
            'application_id' => session()->get('application_id'),
            'doc' => $key,
            'file' => $name,
            'type' => $type
          ]
        );

        return redirect()->back()->with('success', 'Processed successfully');
      } catch (Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong with your file.');
      }
    }
  }
}
