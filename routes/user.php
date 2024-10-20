<?php

use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\Auth\ChangePasswordController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\User\Auth\GettingStartedController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\MyAccountController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\AutomationController;
use App\Http\Controllers\User\BotController;
use App\Http\Controllers\User\CampaignController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\CannedResponseController;
use App\Http\Controllers\User\GeneralSettingsController;
use App\Http\Controllers\User\GroupController;
use App\Http\Controllers\User\AiSuggestionController;
use App\Http\Controllers\User\ApplicantApplicationsController;
use App\Http\Controllers\User\Applications\ArrController;
use App\Http\Controllers\User\Applications\PractitionerController;
use App\Http\Controllers\User\Applications\RpliController;
use App\Http\Controllers\User\Applications\SarController;
use App\Http\Controllers\User\ApplicationsController;
use App\Http\Controllers\User\IntegrationController;
use App\Http\Controllers\User\ReminderController;
use App\Http\Controllers\User\TeamController;
use App\Http\Controllers\User\TemplateController;
use App\Http\Controllers\User\TicketsController;
use App\Http\Controllers\User\TwoFactorAuthController;
use App\Http\Controllers\User\WalletController;
use App\Http\Controllers\User\WhatsappWidgetController;
use App\Models\Integration;
use Illuminate\Console\Application;
// use App\Http\Controllers\User\ChatNoteController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');


Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes | LOGIN | REGISTER
    |--------------------------------------------------------------------------
    */

    Route::get('intend-login/{uuid}',[DashboardController::class,'teamIntendLogin'])->name('team.intend-login');

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('verify-email', [LoginController::class, 'showverifyForm'])->name('verify-email');
    Route::post('verify-otp', [LoginController::class, 'verifyOtp'])->name('verify-email-otp');
    Route::post('resend-code', [LoginController::class, 'resendCode'])->name('resend-code');

    Route::post('verify-two-factor', [LoginController::class, 'VerifyTwoFactor'])->name('verify-two-factor');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/update', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');

    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('delete-account',[MyAccountController::class,'deleteAccount'])->name('delete-account');
    
    /*
    |--------------------------------------------------------------------------
    | Dashboard Route
    |--------------------------------------------------------------------------
    */

    Route::get('integration-rock', [IntegrationController::class, 'rockadd'])->name('integration.rock-add');

    Route::get('integration-rock-edit', [IntegrationController::class, 'rockedit'])->name('integration.rock-edit');

    Route::post('notify-form-actions',[DashboardController::class,'notifyFormActions'])->name('notify.form-actions');


    Route::group(['middleware' => ['profile.check']], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('ticket',TicketsController::class);
        Route::resource('integration',IntegrationController::class);

        Route::post('initiate-application',[ApplicationsController::class,'initiateApplication'])->name('initiate-application');
        Route::resource('form',ApplicationsController::class);
        Route::resource('application',ApplicantApplicationsController::class);

        //Registration Practice Licence Internship

        Route::group(['prefix' => 'rpli', 'as' => 'rpli.'], function () {

            Route::post('process-primary-qualification',[RpliController::class,'personalInfo'])->name('personal-info');
            Route::post('process-other-qualification',[RpliController::class,'primaryQualification'])->name('primary-qualification');
            Route::post('disciplinary-enquires',[RpliController::class,'otherQualifications'])->name('other-qualifications');
            Route::post('medical-fitness',[RpliController::class,'disciplinaryEnquiries'])->name('disciplinary-enquires');
            Route::post('professional-indemnity',[RpliController::class,'medicalFitness'])->name('medical-fitness');
            Route::post('criminal-convictions',[RpliController::class,'ProfesionalIndemnity'])->name('profesional-indeminity');
            Route::post('declare-intrest-business',[RpliController::class,'criminalConvictions'])->name('criminal-convictions'); 
            Route::post('declaration-by-applicant',[RpliController::class,'declareIntrestBusiness'])->name('declare-intrest-business');
            Route::post('documents',[RpliController::class,'applicantDeclaration'])->name('declaration-by-applicant');
            Route::get('documents',[RpliController::class,'supportingDocument'])->name('supporting-documents');
            Route::post('process_doc',[RpliController::class,'processDoc'])->name('process_doc');
            Route::get('payment',[RpliController::class,'payment'])->name('payment');
            Route::post('payment-initiate',[RpliController::class,'paymentInitiate'])->name('payment-initiate');

        });

        //Annual Registration Renewal

        Route::group(['prefix' => 'arr', 'as' => 'arr.'], function () {

            Route::post('process-employment-practice',[ArrController::class,'personalInfo'])->name('personal-info');
            Route::post('employment-practice',[ArrController::class,'employmentPractice'])->name('employment-practice');
            Route::post('previous-years-practice',[ArrController::class,'renewalIn'])->name('renewal-in');
            Route::post('other-qualifications',[ArrController::class,'previousPractices'])->name('previous-years-practice');
            Route::post('disciplinary-enquires',[ArrController::class,'otherQualifications'])->name('other-qualifications');
            Route::post('disciplinary-enquires',[ArrController::class,'otherQualifications'])->name('other-qualifications');
            Route::post('medical-fitness',[ArrController::class,'disciplinaryEnquiries'])->name('disciplinary-enquires');
            Route::post('professional-development',[ArrController::class,'medicalFitness'])->name('medical-fitness');
            Route::post('professional-indemnity',[ArrController::class,'professionalDevelopment'])->name('professional-development');
           
            Route::post('criminal-convictions',[ArrController::class,'ProfesionalIndemnity'])->name('profesional-indeminity');
            Route::post('declare-intrest-business',[ArrController::class,'criminalConvictions'])->name('criminal-convictions'); 
            Route::post('declaration-by-applicant',[ArrController::class,'declareIntrestBusiness'])->name('declare-intrest-business');
            Route::get('documents',[ArrController::class,'supportingDocument'])->name('supporting-documents');
            Route::post('documents',[ArrController::class,'applicantDeclaration'])->name('declaration-by-applicant');
            Route::post('process_doc',[ArrController::class,'processDoc'])->name('process_doc');

            Route::get('payment',[ArrController::class,'payment'])->name('payment');
            Route::post('payment-initiate',[ArrController::class,'paymentInitiate'])->name('payment-initiate');

        });

        //Student Annual Registration
      
        Route::group(['prefix' => 'sar', 'as' => 'sar.'], function () {
            Route::post('registration',[SarController::class,'personalInfo'])->name('personal-info');
            Route::post('education',[SarController::class,'Registration'])->name('registration');
            Route::post('other-acheivement',[SarController::class,'Education'])->name('education');
            Route::post('medical-fitness',[SarController::class,'otherAcheivement'])->name('other-acheivement');
            Route::post('criminal-convictions',[SarController::class,'medicalFitness'])->name('medical-fitness');
            Route::post('applicant-declaration',[SarController::class,'criminalConvictions'])->name('criminal-convictions');
            Route::post('documents',[SarController::class,'applicantDeclaration'])->name('applicant-declaration');
            Route::get('documents',[SarController::class,'supportingDocument'])->name('supporting-documents');
            Route::post('process_doc',[SarController::class,'processDoc'])->name('process_doc');

            Route::get('payment',[SarController::class,'payment'])->name('payment');
            Route::post('payment-initiate',[SarController::class,'paymentInitiate'])->name('payment-initiate');
        });

        //Practitioner

        Route::group(['prefix' => 'practitioner', 'as' => 'practitioner.'], function () {
            Route::post('medical-dental-registration',[PractitionerController::class,'personalInfo'])->name('personal-info');
            Route::post('qualification',[PractitionerController::class,'MdRegistration'])->name('medical-dental-registration');
            Route::post('registration',[PractitionerController::class,'Qualification'])->name('qualification');
            Route::post('professional-indemnity',[PractitionerController::class,'Registration'])->name('registration');
           
            Route::post('criminal-convictions',[PractitionerController::class,'ProfesionalIndemnity'])->name('profesional-indeminity');
            Route::post('declare-intrest-business',[PractitionerController::class,'criminalConvictions'])->name('criminal-convictions'); 
            Route::post('declaration-by-applicant',[PractitionerController::class,'declareIntrestBusiness'])->name('declare-intrest-business');
            Route::post('documents',[PractitionerController::class,'applicantDeclaration'])->name('declaration-by-applicant');
            Route::get('documents',[PractitionerController::class,'supportingDocument'])->name('supporting-documents');
            Route::post('process_doc',[PractitionerController::class,'processDoc'])->name('process_doc');

            Route::get('payment',[PractitionerController::class,'payment'])->name('payment');
            Route::post('payment-initiate',[PractitionerController::class,'paymentInitiate'])->name('payment-initiate');

        });

        
       
    });

    /*
    |--------------------------------------------------------------------------
    | Settings Route
    |--------------------------------------------------------------------------
    */

    Route::get('general/setting', [GeneralSettingsController::class, 'index'])->name('general-settings.setting');

    Route::get('general/setting/whatsApp-profile', [GeneralSettingsController::class, 'whatsappProfile'])->name('general-settings.whatsApp-profile');

    Route::get('telnyx/get-otp', [GeneralSettingsController::class, 'telnyxGetOtp'])->name('telnyx.get-otp');

    Route::get('general/setting/team-permission', [GeneralSettingsController::class, 'teamPermission'])->name('general-settings.team-permission');

    Route::get('general/setting/translation', [GeneralSettingsController::class, 'translation'])->name('general-settings.translation');

    Route::get('general/setting/waysms', [GeneralSettingsController::class, 'waysms'])->name('general-settings.waysms');

    Route::get('general/setting/media', [GeneralSettingsController::class, 'media'])->name('general-settings.media');

    Route::get('general/setting/media-add', [GeneralSettingsController::class, 'mediaAdd'])->name('general-settings.media-add');

    Route::get('general/setting/media-edit', [GeneralSettingsController::class, 'mediaEdit'])->name('general-settings.media-edit');


    /*
    |--------------------------------------------------------------------------
    | Settings > My Account Route
    |--------------------------------------------------------------------------
    */
    Route::resource('my-account', MyAccountController::class);


    /*
    |--------------------------------------------------------------------------
    | Settings > Getting Started Route
    |--------------------------------------------------------------------------
    */
    // Route::get('getting-started', [GettingStartedController::class, 'index'])->name('getting-started');




    /*
    |--------------------------------------------------------------------------
    | Settings > Change Password Route
    |--------------------------------------------------------------------------
    */
    Route::get('change-password', [ChangePasswordController::class, 'changePasswordForm'])->name('password.form');

    Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');


      /*
    |--------------------------------------------------------------------------
    | Tickets
    |--------------------------------------------------------------------------
    */

    Route::resource('ticket',TicketsController::class);

    /*
    |--------------------------------------------------------------------------
    | Reminders
    |--------------------------------------------------------------------------
    */


    Route::post('get-integration-list',[IntegrationController::class,'getIntegrationList'])->name('integration-list');
    Route::post('add-integration-list',[IntegrationController::class,'addList'])->name('integration.add-list');
    Route::post('create-integration-list',[IntegrationController::class,'createList'])->name('integration.create-list');
    Route::post('list-import-people',[IntegrationController::class,'listImportPeople'])->name('list-import-people');

    Route::get('integration-check/{uuid}/{integration_name}/{action}',[IntegrationController::class,'checkIntegration'])->name('integration.check');


});
