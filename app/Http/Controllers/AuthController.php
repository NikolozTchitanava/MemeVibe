<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showSignupForm(): View
    {
        return view('auth.signup');
    }

    public function signup(Request $request): RedirectResponse
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
            ]);

            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);

            // Log the user in immediately
            Auth::login($user);

            return redirect()->route('home')->with('success', 'Account created and logged in!');
        } catch (\Exception $e) {
            Log::error('Signup failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred during registration: ' . $e->getMessage()]);
        }
    }
}
