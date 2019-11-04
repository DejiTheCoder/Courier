<?php

namespace App\Http\Controllers;

use App\User;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;



class SitemapController extends Controller
{
    public function welcome()
    {
        return view('sitemaps.welcome');
    }

    public function Er404()
    {
        return view('sitemaps.404');
    }

    public function aboutUs()
    {
        return view('sitemaps.about');
    }

    public function allshipments()
    {
        return view('sitemaps.all');
    }

    public function contactus()
    {
        return view('sitemaps.contactus');
    }

    public function getaquote()
    {
        return view('sitemaps.quote');
    }


    

    
    
}
