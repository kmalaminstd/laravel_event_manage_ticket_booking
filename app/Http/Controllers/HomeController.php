<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(){
        return view('pages.home');
    }

    public function events(){
        return view('pages.events');
    }

    public function eventDetails(){
        return view('pages.event-details');
    }

}
