<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    
    public function createEvent(){

        $categories = Category::latest()->get();

        return view('organizer.create-event', compact('categories'));
    }


}
