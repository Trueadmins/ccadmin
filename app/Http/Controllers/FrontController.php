<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function homePage()
    {
        return view('frontend.homepage', [
            'pageTitle' => 'Fast Shipping Solutions from UK to Worldwide | Courier City Ltd.',
            'pageDescription' => 'Reliable international shipping with instant quotes and tracking. Courier City provides parcel services from the UK to Europe, Canada, USA, and India. Secure, fast, and professional delivery for businesses and individuals',
            'ogImage' => asset('images/hero1.jpg'), // 1200x630px recommended
        ]);
    }

    public function trackingPage()
    {
       return view('frontend.tracking',[
           'pageTitle' => 'Track Shipment | UK to Worldwide | Courier City Ltd.',
           'pageDescription' => 'Track Shipment Reliable international shipping with instant quotes and tracking. Courier City provides parcel services from the UK to Europe, Canada, USA, and India. Secure, fast, and professional delivery for businesses and individuals',
       ]);
    }

    public function contactPage()
    {
        return view('frontend.contact',[
        'pageTitle' => 'Contact us | UK to Worldwide | Courier City Ltd.',
           'pageDescription' => 'Contact Reliable international shipping with instant quotes and tracking. Courier City provides parcel services from the UK to Europe, Canada, USA, and India. Secure, fast, and professional delivery for businesses and individuals',
       ]);
    }

    public function aboutPage()
    {
        return view('frontend.about',[
            'pageTitle' => 'About us | UK to Worldwide | Courier City Ltd.',
            'pageDescription' => 'About Reliable international shipping with instant quotes and tracking. Courier City provides parcel services from the UK to Europe, Canada, USA, and India. Secure, fast, and professional delivery for businesses and individuals',
        ]);
    }
}
