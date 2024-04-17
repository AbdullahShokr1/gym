<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        switch (auth()->user()->role){
            case 'member':
                return redirect()->route('dashboard.member');
                break;
            case 'instructor':
                return redirect()->route('dashboard.instructor');
                break;
            case 'admin':
                return redirect()->route('dashboard.admin');
                break;
            default:
                return redirect()->route('login');
                break;
        }
    }
}
