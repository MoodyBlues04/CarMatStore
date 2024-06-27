<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerifyController extends Controller
{
    /**
     * Instantiate a new VerificationController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Display an email verification notice.
     *
     * @param Request $request
     * @return RedirectResponse|View
     */
    public function notice(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->route('user.profile.index')
            : view('auth.verify_email_notice');
    }

    /**
     * User's email verificaiton.
     *
     * @param EmailVerificationRequest $request
     * @return RedirectResponse
     */
    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        return redirect()->route('user.profile.index');
    }

    /**
     * Resent verification email to user.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function resend(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();
        return redirect()->back()
            ->with('success', 'A fresh verification link has been sent to your email address.');
    }
}
