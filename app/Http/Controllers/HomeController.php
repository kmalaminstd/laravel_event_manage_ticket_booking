<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    use AuthorizesRequests;

    public function index(){
        $categories = Category::activeCategory();
        return view('pages.home', compact('categories'));
    }

    public function events(){
        return view('pages.events');
    }

    public function eventDetails(Event $event){
        
        $schedules = $event->schedule()->get();
        $faqs = $event->faq()->get();
        $tickets = $event->ticket()->get();
        return view('pages.event-details', compact('event', 'schedules', 'faqs', 'tickets'));
    }

}
