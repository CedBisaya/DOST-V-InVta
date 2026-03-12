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

}