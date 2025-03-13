<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm(): \Illuminate\View\View
    {
        return view('auth.login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
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

    public function showSignupForm(): \Illuminate\View\View
    {
        return view('auth.signup');
    }

    public function signup(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        // Optionally log the user in immediately
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Account created and logged in!');
    }

}
