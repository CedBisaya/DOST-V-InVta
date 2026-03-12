<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      
        $users = User::where('id', '<', 0)->paginate(5);

        $totalManagers = 0;
        $totalEvents = 0; 
        $upcomingEvents = 0;
        $ongoingEvents = 0;

        return view('dashboard', compact(
            'users', 
            'totalManagers', 
            'totalEvents', 
            'upcomingEvents', 
            'ongoingEvents'
        ));
    }
}