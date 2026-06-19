<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::get('/users', function () {
    return view('users', ['users' => User::all()]);
})->name('users.index');

Route::get('/users/create', function () {
    return view('add_user');
})->name('users.create');

Route::post('/users', function () {
    User::create([
        'name' => request('first_name') . ' ' . request('last_name'),
        'email' => request('email'),
        'password' => Hash::make('password'),
        'avatar' => 'default.png',
        'role' => request('role'),
        'team' => request('team'),
        'phone' => request('phone'),
        'status' => 'Active',
    ]);
    return redirect()->route('users.index')->with('success', 'User created successfully!');
})->name('users.store');

Route::get('/users/{id}', function ($id) {
    $user = User::findOrFail($id);
    return view('user_details', ['user' => $user]);
})->name('users.show');

Route::get('/users/{id}/edit', function ($id) {
    $user = User::findOrFail($id);
    return view('edit_user', ['user' => $user]);
})->name('users.edit');

Route::post('/users/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->name = request('first_name') . ' ' . request('last_name');
    $user->email = request('email');
    $user->phone = request('phone');
    $user->role = request('role');
    $user->team = request('team');
    $user->save();
    return redirect()->route('users.show', $user->id)->with('success', 'User updated successfully!');
})->name('users.update');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/charts', function () {
    return view('charts');
})->name('charts');

Route::get('/tables', function () {
    return view('tables');
})->name('tables');

Route::get('/forms', function () {
    return view('forms');
})->name('forms');

Route::get('/components', function () {
    return view('components');
})->name('components');

Route::get('/alerts', function () {
    return view('alerts');
})->name('alerts');

Route::get('/modals', function () {
    return view('modals');
})->name('modals');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    $credentials = request()->only('email', 'password');
    $remember = request()->boolean('remember');

    if (Auth::attempt($credentials, $remember)) {
        request()->session()->regenerate();
        return redirect()->route('dashboard');
    }

    return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput();
})->name('login.store');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function () {
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
})->name('register.store');

Route::get('/forgot-password', function () {
    return view('forgot_password');
})->name('password.request');

Route::get('/create-agent', function () {
    return view('create_agent');
})->name('create-agent');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/500', function () {
    return view('500');
})->name('500');

Route::post('/logout', function () {
    return redirect()->route('dashboard');
})->name('logout');
