<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the dashboard rendering
     * 
     * @return View
     */
    public function app() 
    {
        return view('pages.dashboard.app');
    }
}
