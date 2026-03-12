<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $managers = User::latest()->paginate(5);


        $totalManagers = 0;
        $totalEvents = 0; 
        $upcomingEvents = 0;
        $ongoingEvents = 0;

        return view('dashboard', compact(
            'managers', 
            'totalManagers', 
            'totalEvents', 
            'upcomingEvents', 
            'ongoingEvents'
        ));
    }
}