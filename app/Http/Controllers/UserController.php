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
        $user = User::create([
            'name' => request('first_name') . ' ' . request('last_name'),
            'email' => request('email'),
            'password' => Hash::make('password'),
            'avatar' => 'default.png',
            'role' => request('role'),
            'team' => request('team'),
            'phone' => request('phone'),
            'status' => 'Active',
        ]);

        $notifications = session('dashboard_notifications', []);
        $notifications[] = [
            'id' => 'new-user-' . $user->id,
            'title' => 'New user registered',
            'message' => 'New user ' . $user->name . ' has been added to the system.',
            'time' => now()->diffForHumans(),
            'href' => route('users.show', ['id' => $user->id]),
        ];
        session(['dashboard_notifications' => $notifications]);

        return redirect()->route('dashboard')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified user.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user_details', [
            'user' => $user,
            'notifications' => $this->notifications(),
        ]);
    }

    /**
     * Get dashboard notification feed.
     */
    private function notifications()
    {
        $stored = session('dashboard_notifications', []);

        $defaults = [
            [
                'id' => 'new-user',
                'title' => 'New user registered',
                'message' => 'A new user has joined the platform.',
                'time' => '4 minutes ago',
                'href' => route('users.index'),
            ],
            [
                'id' => 'revenue-target',
                'title' => 'Revenue target reached',
                'message' => 'Your monthly revenue target was achieved.',
                'time' => '32 minutes ago',
                'href' => route('charts'),
            ],
            [
                'id' => 'security-review',
                'title' => 'Security review completed',
                'message' => 'The weekly security review is complete.',
                'time' => '1 hour ago',
                'href' => route('settings'),
            ],
        ];

        return array_merge($stored, $defaults);
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
