<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(){
        $categories = Category::activeCategory();
        return view('pages.home', compact('categories'));
    }

    public function events(){
        return view('pages.events');
    }

    public function eventDetails(){
        return view('pages.event-details');
    }

}
