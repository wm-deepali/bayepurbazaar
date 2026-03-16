<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function home()
    {
        return view('front-pages.home');
    }

    public function about()
    {
        return view('front-pages.about-us');
    }

    public function contact()
    {
        return view('front-pages.contact-us');
    }

    public function disclaimer()
    {
        return view('front-pages.disclaimer');
    }

    public function faq()
    {
        return view('front-pages.faq');
    }

    public function listing()
    {
        return view('front-pages.listing');
    }

    public function privacy()
    {
        return view('front-pages.privacy-policy');
    }

    public function terms()
    {
        return view('front-pages.terms-and-conditions');
    }

    public function mandalMembers()
    {
        return view('front-pages.mandal-members');
    }

    public function memberEnquiry()
    {
        return view('front-pages.member-enquiry');
    }

    public function whyUs()
    {
        return view('front-pages.why-us');
    }

}