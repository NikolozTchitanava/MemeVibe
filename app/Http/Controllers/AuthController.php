<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
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
            // Validate the request data
            $data = $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed', // Add confirmed rule to require password_confirmation
            ]);

            // Hash the password
            $data['password'] = bcrypt($data['password']);

            // Explicitly set is_admin to false for new users
            $data['is_admin'] = false;

            // Create the user (Laravel will automatically set created_at and updated_at)
            $user = User::create($data);

            // Log the user in
            Auth::login($user);

            // Redirect to the home route with a success message
            return redirect()->route('home')->with('success', 'Account created and logged in successfully!');
        } catch (\Exception $e) {
            // Log the detailed error for debugging
            Log::error('Signup failed: ' . $e->getMessage());

            // Return a generic error message to the user
            return back()->withErrors(['error' => 'An error occurred during registration. Please try again.']);
        }
    }
}
