<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function loginForm()
    {
        return view('login');
    }

    /**
     * Handle login request.
     */
    public function login()
    {
        $credentials = request()->only('email', 'password');
        $remember = request()->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput();
    }

    /**
     * Show the registration form.
     */
    public function registerForm()
    {
        return view('register');
    }

    /**
     * Handle registration request.
     */
    public function register()
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'avatar' => 'default.png',
            'role' => 'User',
            'team' => null,
            'status' => 'Active',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    /**
     * Handle logout request.
     */
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
