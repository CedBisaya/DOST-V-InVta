<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Gawin nating empty collection muna para hindi niya hilaing yung record mo (mike)
        // At para hindi rin mag-error sa SQL 'role' not found
        $managers = User::latest()->paginate(5);

        // Gawin nating static 0 muna ang count
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