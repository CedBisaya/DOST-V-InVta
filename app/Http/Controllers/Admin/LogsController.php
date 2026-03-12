<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogsController extends Controller 
{
public function index()
{
    $users = collect([]); 
    
    $users = User::where('id', 0)->paginate(10); 

    return view('logs.index', compact('users'));
}

}