<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Domains\Auth\Models\User;
use Illuminate\Http\Request;
use Auth;

/**
 * Class VerificationController.
 */
class VerificationController
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $view = Auth::user()->isType(User::TYPE_OWNER) ? 'owner.auth.verify' : 'frontend.auth.verify';

        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view($view);
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showOwner(Request $request)
    {
        $view = Auth::user()->isType(User::TYPE_OWNER) ? 'owner.auth.verify' : 'frontend.auth.verify';

        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view($view);
    }
}
