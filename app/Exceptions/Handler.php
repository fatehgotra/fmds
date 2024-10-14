<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;
use Illuminate\Http\Exceptions\PostTooLargeException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest(route('admin.login'));
        }

        if ($request->is('user') || $request->is('user/*')) {
            return redirect()->guest(route('user.login'));
        }

        return redirect()->guest(route('login'));
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof PostTooLargeException) {
       
           return redirect()->back()->with('error', 'Please upload less than 10 mb file.');
        }

        return parent::render($request, $exception);
    }
}
