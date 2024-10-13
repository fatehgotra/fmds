<?php

use App\Http\Controllers\Customer\ContactController;
use App\Http\Controllers\Customer\Auth\ChangePasswordController;
use App\Http\Controllers\Customer\Auth\ForgotPasswordController;
use App\Http\Controllers\Customer\Auth\GettingStartedController;
use App\Http\Controllers\Customer\Auth\LoginController;
use App\Http\Controllers\Customer\Auth\MyAccountController;
use App\Http\Controllers\Customer\Auth\RegisterController;
use App\Http\Controllers\Customer\Auth\ResetPasswordController;
use App\Http\Controllers\Customer\AutomationController;
use App\Http\Controllers\Customer\BotController;
use App\Http\Controllers\Customer\CampaignController;
use App\Http\Controllers\Customer\ChatController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\CannedResponseController;
use App\Http\Controllers\Customer\GeneralSettingsController;
use App\Http\Controllers\Customer\GroupController;
use App\Http\Controllers\Customer\IntegrationController;
use App\Http\Controllers\Customer\ReminderController;
use App\Http\Controllers\Customer\TeamController;
use App\Http\Controllers\Customer\TemplateController;
use App\Http\Controllers\Customer\TicketsController;
use App\Http\Controllers\Customer\WhatsappWidgetController;
use App\Models\Integration;
// use App\Http\Controllers\Customer\ChatNoteController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::group(['prefix' => 'customer', 'as' => 'user.'], function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes | LOGIN | REGISTER
    |--------------------------------------------------------------------------
    */

    Route::get('intend-login/{uuid}',[DashboardController::class,'teamIntendLogin'])->name('team.intend-login');

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/update', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');

    Route::post('register', [RegisterController::class, 'register'])->name('register');


    /*
    |--------------------------------------------------------------------------
    | Dashboard Route
    |--------------------------------------------------------------------------
    */

    Route::get('integration-rock', [IntegrationController::class, 'rockadd'])->name('integration.rock-add');

    Route::group(['middleware' => ['profile.check', 'package.check']], function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('contacts', [ContactController::class, 'index'])->name('contacts');

        Route::get('chat', [ChatController::class, 'index'])->name('chat');

        Route::resource('reminder',ReminderController::class);

        Route::resource('team',TeamController::class);

        Route::resource('ticket',TicketsController::class);

        Route::resource('web-widget',WhatsappWidgetController::class);

        Route::resource('integration',IntegrationController::class);
    });

    Route::resource('contact',ContactController::class);

    Route::get('contacts/add-new', [ContactController::class, 'add'])->name('add-new');
    Route::get('contacts/edit/{id}', [ContactController::class, 'edit'])->name('edit');
    Route::get('contacts/lists', [ContactController::class, 'list'])->name('lists');
    Route::get('contacts/fields', [ContactController::class, 'field'])->name('fields');
    Route::get('contacts/tags', [ContactController::class, 'tag'])->name('tags');

    Route::post('contact/note-add',[ContactController::class,'noteAdd'])->name('note.add');
    Route::post('contact/note-update',[ContactController::class,'noteUpdate'])->name('note.update');
    Route::post('contact/note-delete',[ContactController::class,'noteDelete'])->name('note.delete');

    //bulks
    Route::post('contact/bulk-delete',[ContactController::class,'bulkDestroy'])->name('bulk.delete');
    Route::post('contact/bulk-assign',[ContactController::class,'bulkAssign'])->name('bulk.assign');

    //Fields
    Route::post('customer/field-store',[ContactController::class,'customerFieldStore'])->name('field-store');
    Route::post('customer/field-update/{uuid}',[ContactController::class,'fieldUpdate'])->name('field-update');
    Route::post('customer/field-delete/{uuid}',[ContactController::class,'fieldDelete'])->name('field-delete');

    //Tags
    Route::post('customer/tag-store',[ContactController::class,'customerTagStore'])->name('tag-store');
    Route::post('customer/tag-update/{uuid}',[ContactController::class,'tagUpdate'])->name('tag-update');
    Route::post('customer/tag-delete/{uuid}',[ContactController::class,'tagDelete'])->name('tag-delete');
    Route::post('customer/tag-switch',[ContactController::class,'switchTag'])->name('switch-tag');

    Route::post('chat', [ChatController::class, 'store'])->name('chat.store');
    Route::get('chat/create', [ChatController::class, 'create'])->name('chat.create');
    Route::get('chat/create-chat', [ChatController::class, 'createChat'])->name('chat.create-chat');
    Route::get('chat/{id}', [ChatController::class, 'show'])->name('chat.show');
    Route::get('chat/get-message', [ChatController::class, 'index'])->name('chat.get-message');

    /*
    |--------------------------------------------------------------------------
    | Template Route
    |--------------------------------------------------------------------------
    */

    Route::post('template/change-status',[TemplateController::class,'changeStatus'])->name('template.change-status');
    Route::post('template/bulk-delete',[TemplateController::class,'bulkDestroy'])->name('template.bulk.delete');
    Route::resource('template', TemplateController::class);

    /*
    |--------------------------------------------------------------------------
    | Campaign Route
    |--------------------------------------------------------------------------
    */


    Route::post('campaign/save', [CampaignController::class, 'saveCampaign'])->name('campaign.save');
    Route::resource('campaign', CampaignController::class);

    /*
    |--------------------------------------------------------------------------
    | Automation Route
    |--------------------------------------------------------------------------
    */

    Route::get('automation/list', [AutomationController::class, 'index'])->name('automation.list');

    Route::get('automation/create', [AutomationController::class, 'add'])->name('automation.create');


    /*
    |--------------------------------------------------------------------------
    | Settings Route
    |--------------------------------------------------------------------------
    */

    Route::get('general/setting', [GeneralSettingsController::class, 'index'])->name('general-settings.setting');

    Route::get('general/setting/whatsApp-profile', [GeneralSettingsController::class, 'whatsappProfile'])->name('general-settings.whatsApp-profile');

    Route::get('general/setting/team-permission', [GeneralSettingsController::class, 'teamPermission'])->name('general-settings.team-permission');

    Route::get('general/setting/translation', [GeneralSettingsController::class, 'translation'])->name('general-settings.translation');

    Route::get('general/setting/waysms', [GeneralSettingsController::class, 'waysms'])->name('general-settings.waysms');


    /*
    |--------------------------------------------------------------------------
    | Bots Route
    |--------------------------------------------------------------------------
    */

    Route::get('bot/list', [BotController::class, 'index'])->name('bot.list');

    Route::get('bot/create', [BotController::class, 'add'])->name('bot.create');

    Route::get('bot/edit', [BotController::class, 'edit'])->name('bot.edit');


    /*
    |--------------------------------------------------------------------------
    | Settings > My Account Route
    |--------------------------------------------------------------------------
    */
    Route::resource('my-account', MyAccountController::class);

    /*
    |--------------------------------------------------------------------------
    | Canned Response
    |--------------------------------------------------------------------------
    */
    Route::resource('canned-responses', CannedResponseController::class);


    /*
    |--------------------------------------------------------------------------
    | Canned Response
    |--------------------------------------------------------------------------
    */
    // Route::resource('chat-notes', ChatNoteController::class);


    /*
    |--------------------------------------------------------------------------
    | Settings > Getting Started Route
    |--------------------------------------------------------------------------
    */
    // Route::get('getting-started', [GettingStartedController::class, 'index'])->name('getting-started');


    Route::group(['prefix' => 'getting-started', 'as' => 'getting-started.'], function () {

        Route::get('/', [GettingStartedController::class, 'index'])->name('profile');
        Route::post('/', [GettingStartedController::class, 'saveCompanyDetail'])->name('profile');

        Route::get('package', [GettingStartedController::class, 'packages'])->name('package');
        Route::post('package', [GettingStartedController::class, 'savePackage'])->name('package');

        Route::any('package/success', [GettingStartedController::class, 'stripeSuccessPackage'])->name('package.success');

        Route::get('setting', [GettingStartedController::class, 'settings'])->name('setting');
        Route::post('setting/chat', [GettingStartedController::class, 'saveChatSetting'])->name('setting.chat');
        Route::post('setting/permission', [GettingStartedController::class, 'saveTeamPermission'])->name('setting.permission');

        Route::get('wallet', [GettingStartedController::class, 'wallet'])->name('wallet');
        Route::post('wallet', [GettingStartedController::class, 'addBalanceToWallet'])->name('wallet');

        Route::any('wallet/success', [GettingStartedController::class, 'stripeSuccessWallet'])->name('wallet.success');

        Route::get('whatsapp', [GettingStartedController::class, 'whatsapp'])->name('whatsapp');
        Route::post('whatsapp', [GettingStartedController::class, 'saveWhatsapp'])->name('whatsapp');
        Route::post('whatsapp/profile', [GettingStartedController::class, 'saveWhatsappProfile'])->name('whatsapp.profile');

        Route::get('waysms', [GettingStartedController::class, 'waysms'])->name('waysms');
        Route::post('waysms', [GettingStartedController::class, 'saveWaysms'])->name('waysms');
    });

    /*
    |--------------------------------------------------------------------------
    | Settings > Change Password Route
    |--------------------------------------------------------------------------
    */
    Route::get('change-password', [ChangePasswordController::class, 'changePasswordForm'])->name('password.form');

    Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');


    /*
    |--------------------------------------------------------------------------
    | Team
    |--------------------------------------------------------------------------
    */

    Route::get('group-team/{id}',[TeamController::class,'index'])->name('group-team');
    Route::get('add-member/{id}',[TeamController::class,'create'])->name('group-team.create');
    Route::get('team/insight', [TeamController::class, 'insights'])->name('team.insight');

    Route::post('team/change-status',[TeamController::class,'changeStatus'])->name('team.change-status');

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

    Route::group(['middleware' => 'profile.check', 'middleware' => 'package.check'], function () {

    });

    Route::get('global-reminder',[ReminderController::class,'globalReminder'])->name('global-reminder');
    Route::post('reminder-update',[ReminderController::class,'changeStatusReminder'])->name('reminder-change');


    Route::post('get-integration-list',[IntegrationController::class,'getIntegrationList'])->name('integration-list');
    Route::post('add-integration-list',[IntegrationController::class,'addList'])->name('integration.add-list');

    Route::post('create-integration-list',[IntegrationController::class,'createList'])->name('integration.create-list');
    Route::post('list-import-people',[IntegrationController::class,'listImportPeople'])->name('list-import-people');

    Route::get('integration-check/{uuid}/{integration_name}/{action}',[IntegrationController::class,'checkIntegration'])->name('integration.check');

});
