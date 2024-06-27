<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct(private readonly AuthService $authService) {
        $this->middleware('guest')->except(['logout', 'home']);
        $this->middleware('auth')->only(['logout', 'home']);
        $this->middleware('verified')->only('home');
    }

    public function registerPage(): View
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        try {
            $this->authService->register($request);

            return redirect()->route('verification.notice');
        } catch (\Exception $e) {
//            TODO handle errors
            dd($e);
        }
    }

    public function loginPage(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (!$this->authService->login($request)) {
            return redirect()->back()->with('error', 'Login fail');
        }
        return redirect()->route('user.profile.index');

    }

    public function logout(Request $request): RedirectResponse
    {
        $this->authService->logout($request);

        return redirect()->route('auth.login')
            ->with('success', 'You have logged out successfully!');
    }
}
