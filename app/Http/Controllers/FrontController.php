<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function homePage()
    {
        return view('frontend.homepage');
    }

    public function trackingPage()
    {
       return view('frontend.tracking');
    }

    public function contactPage()
    {
        return view('frontend.contact');
    }

    public function aboutPage()
    {
        return view('frontend.about');
    }
}
