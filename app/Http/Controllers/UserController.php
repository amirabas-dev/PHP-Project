<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of all users.
     */
    public function index()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('add_user');
    }

    /**
     * Store a newly created user in the database.
     */
    public function store()
    {
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
    }

    /**
     * Display the specified user.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user_details', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit_user', ['user' => $user]);
    }

    /**
     * Update the specified user in the database.
     */
    public function update($id)
    {
        $user = User::findOrFail($id);
        $user->name = request('first_name') . ' ' . request('last_name');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->role = request('role');
        $user->team = request('team');
        $user->save();

        return redirect()->route('users.show', $user->id)->with('success', 'User updated successfully!');
    }
}
