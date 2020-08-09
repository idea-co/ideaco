<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetStartedController extends Controller
{
    /**
     * Handle page navigation for get 
     * started page
     * 
     * @return Illuminate\View
     */
    public function start()
    {
        return view('pages.onboarding.get-started');
    }
}
