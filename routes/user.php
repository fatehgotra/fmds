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
use App\Http\Controllers\User\Applications\RpliController;
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

        Route::post('initiate-application',[ApplicationsController::class,'initiateApplication'])->name('initiate-application');
        Route::resource('application',ApplicationsController::class);

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

        });
        
        Route::resource('ticket',TicketsController::class);
        Route::resource('integration',IntegrationController::class);
    });

    Route::resource('contact',ContactController::class);

    Route::get('contacts/import',[ContactController::class,'import'])->name('import');
    Route::post('contacts/import-contacts',[ContactController::class,'importContacts'])->name('import-contacts');
    Route::post('contacts/import-file',[ContactController::class,'importFile'])->name('import-file');
    Route::get('contacts/export',[ContactController::class,'export'])->name('export');
    Route::post('contacts/export-contacts',[ContactController::class,'exportContacts'])->name('export-contacts');


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
