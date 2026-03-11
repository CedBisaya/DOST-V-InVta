<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller 
{
public function index()
{
    $users = collect([]); 
    
    $users = User::where('id', 0)->paginate(10); 

    return view('reports.index', compact('users'));
}

public function create()
{
    return view('reports.create'); 
}

public function edit(User $user)
{
    return view('reports.edit', compact('user'));
}

// public function store(Request $request)
// {
//     $request->validate([
//         'first_name' => 'required|string|max:255',
//         'last_name' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email',
//         'event_role' => 'required|in:external,internal',
//     ]);

//     User::create([
//         'name' => $request->first_name . ' ' . $request->last_name,
//         'email' => $request->email,
//         'password' => bcrypt('password123'), 
//         'role' => $request->event_role,
//     ]);

//     return redirect()->route('users.index')->with('success', 'User created successfully!');
// }

// public function deactivate(User $user)
// {
//     // Palitan ang status sa inactive
//     $user->update(['status' => 'inactive']);

//     return redirect()->route('users.index')->with('success', 'Account has been deactivated.');
// }
}