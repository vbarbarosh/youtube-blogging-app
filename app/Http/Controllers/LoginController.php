<?php

namespace App\Http\Controllers;

use App\Helpers\Classes\JavaScriptVars;
use App\Mail\PasswordRecovery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /**
     * GET /login
     */
    public function page_login()
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        return view('welcome');
    }

    /**
     * GET /logout
     */
    public function page_logout()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        return view('welcome');
    }

    /**
     * GET /register
     */
    public function page_register()
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        return view('welcome');
    }

    /**
     * GET /password-recovery
     */
    public function page_password_recovery()
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        return view('welcome');
    }

    /**
     * GET /password-recovery/{token}
     */
    public function page_password_recovery_token($token)
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        /** @var User $user */
        $user = User::query()->where('password_recovery_token', $token)->first();
        if (!$user) {
            return redirect('/password-recovery');
        }
        JavaScriptVars::add([
            'password_recovery_email' => $user->email,
            'password_recovery_token' => $user->password_recovery_token,
        ]);
        return view('welcome');
    }

    /**
     * POST /login
     */
    public function auth_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return null;
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * POST /logout
     */
    public function auth_logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
    }

    /**
     * POST /register
     */
    public function auth_register(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        $form = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ]);
        Auth::login(User::register($form['email'], $form['password']));
        return redirect()->intended('dashboard');
    }

    /**
     * POST /password-recovery
     */
    public function auth_password_recovery(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        $form = $request->validate(['email' => ['required', 'email', 'exists:users']]);
        /** @var User $user */
        $user = User::query()->where('email', $form['email'])->firstOrFail();
        $user->password_recovery_token = cuid2(128);
        $user->save();
        Mail::to($user)->send(new PasswordRecovery($user));
        return null;
    }

    /**
     * POST /password-recovery/{token}
     */
    public function auth_password_recovery_confirm($token, Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        $form = $request->validate([
            'password' => ['required'],
        ]);
        /** @var User $user */
        $user = User::query()->where('password_recovery_token', $token)->firstOrFail();
        $user->password = Hash::make($form['password']);
        $user->password_recovery_token = null;
        $user->save();
        Auth::login($user);
        return null;
    }
}
