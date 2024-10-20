<?php

namespace App\Http\Controllers\User\Applications;

use App\Http\Controllers\Controller;
use App\Models\ApplicantApplications;
use App\Models\applicationDocs;
use App\Models\ApplicationStatus;
use App\Models\PractitionerApplication;
use App\Models\SarApplication;
use Exception;
use Illuminate\Http\Request;

class PractitionerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function personalInfo(Request $request)
    {

        $inputs = $request->except('_token');

        if (!isset($request->back) && isset($inputs))
            session()->put('personal_info', $inputs);
        return view('user.application.practitioner.md-registration');
    }

    public function MdRegistration(Request $request)
    {
        $inputs = $request->except('_token');

        if (!isset($request->back) && isset($inputs))
            session()->put('md_registration', $inputs);
        return view('user.application.practitioner.qualification');
    }

    public function Qualification(Request $request)
    {
        $inputs = $request->except('_token');

        if (!isset($request->back) && isset($inputs))
            session()->put('qualification', $inputs);
        return view('user.application.practitioner.registration');
    }

    public function Registration(Request $request)
    {
        $inputs = $request->except('_token');

        if (!isset($request->back) && isset($inputs))
            session()->put('registration', $inputs);
        return view('user.application.practitioner.professional-indemnity');
    }



    public function profesionalIndemnity(Request $request)
    {
        $inputs = $request->except('_token');
        if (!isset($request->back) && isset($inputs)) {
            session()->put('profesional_indemnity', $inputs);
        }
        return view('user.application.practitioner.criminal-convictions');
    }

    public function criminalConvictions(Request $request)
    {
        $inputs = $request->except('_token');

        if (!isset($request->back) && isset($inputs)) {
            session()->put('criminal_convictions', $inputs);
        }
        return view('user.application.practitioner.declare-intrest-business');
    }

    public function declareIntrestBusiness(Request $request)
    {
        $inputs = $request->except('_token');
        if (!isset($request->back) && isset($inputs)) {
            session()->put('declare_business_interest', $inputs);
        }
        return view('user.application.practitioner.declaration-by-applicant');
    }

    public function applicantDeclaration(Request $request)
    {
        $inputs = $request->except('_token');
        if (!isset($request->back) && isset($inputs)) {
            session()->put('applicant_declaration', $inputs);
        }
        return view('user.application.practitioner.supporting-documents');
    }

    public function supportingDocument()
    {
        return view('user.application.practitioner.supporting-documents');
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
                $size  =  number_format($file->getSize() / 1048576, 2);

                if (!str_contains($mime, 'image') && !str_contains($mime, 'pdf')) {
                    return redirect()->back()->with('error', 'Only images and pdf are allowed.');
                }
                if ($size > 10) {
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

    public function payment()
    {
        $count_docs = applicationDocs::where([
            'user_id' => auth()->user()->id,
            'application_id' => session()->get('application_id')
        ])->count();
        if ($count_docs < 5) {
            return redirect()->back()->with('error', 'Please upload all required docs.');
        }
        return view('user.application.practitioner.payment');
    }

    public function paymentInitiate(Request $request)
    {

        $user_id = auth()->user()->id;
        $application_id = session()->get('application_id');

        $user_app = [
            'user_id' => $user_id,
            'application_id' => $application_id,
        ];

        $application_data = array_merge(
            $user_app,
            session()->get('personal_info'),
            session()->get('md_registration'),
            session()->get('qualification'),
            session()->get('registration'),
            session()->get('profesional_indemnity'),
            session()->get('criminal_convictions'),
            session()->get('declare_business_interest'),
            session()->get('applicant_declaration'),
        );

       $applied =  PractitionerApplication::create($application_data);
        $apply = ApplicantApplications::create([
            'user_id'       => $user_id,
            'application_id' => $application_id,
            'applied_id' => $applied->id,
            'pay_mode' => $request->pay_mode,
            'amount'   => 200,
          ]);
          
          ApplicationStatus::create([
            'applicant_application_id' => $apply->id,
            'status' => 'submitted',
            'actioned_by' => 'user',
            'actioner_id' => $user_id
          ]);

        updateApplicationCount($application_id);

        session()->forget('application_id');
        session()->forget('application');
        session()->forget('personal_info');
        session()->forget('md_registration');
        session()->forget('qualification');
        session()->forget('registration');
        session()->forget('profesional_indemnity');
        session()->forget('criminal_convictions');
        session()->forget('declare_business_interest');
        session()->forget('applicant_declaration');

        return redirect()->route('user.application.index')->with('success', 'Application submited successfully,Please check your email for application and transaction details.');
    }
}
