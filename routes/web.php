<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\Customer\WebHookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.auth.login');
});

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');
 
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('user/dashboard');
// })->middleware(['auth', 'signed'])->name('verification.verify');
 
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//facebook login
Route::get('/auth/facebook', [LoginController::class,'redirectToFacebook'])->name('facebook.login');
Route::get('/auth/facebook/callback', [LoginController::class,'handleFacebookCallback'])->name('google.callback');

//Google login
Route::get('/auth/google', [LoginController::class,'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [LoginController::class,'handleGoogleCallback'])->name('google.callback');


Route::get('check',function(){
    \Artisan::call('app:whatsapp-check');
});

Auth::routes();

Route::get('login', function(){
    return redirect()->route('user.dashboard');
})->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('command',function(Request $request){
  
    Artisan::call($request->cmd);
    dd($request->cmd);
   
} )->name('cmd');
