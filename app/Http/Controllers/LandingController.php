<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LandingController extends Controller
{
    /**
     * Handle for the home page
     * 
     * @return View
     */
    public function home()
    {
        return view('pages.landing.home');
    }

    /**
     * Handle for the about page
     * 
     * @return View
     */
    public function about()
    {
        return view('pages.landing.about');
    }

    /**
     * Handle for the faq page
     * 
     * @return View
     */
    public function faq()
    {
        return view('pages.landing.faq');
    }
}
