<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    
    use AuthorizesRequests;

    public function createEvent(){

        $categories = Category::activeCategory();

        return view('organizer.create-event', compact('categories'));
    }

    public function myEvents(){
        $user = Auth::user();
        $events = $user->event()->with('media')->paginate(20);

        return view('organizer.my-events', compact('events'));
    }

    public function editEvent(Event $event){
        $this->authorize('update', $event);
        // $event->with(['schedule', 'ticket', 'faq']);
        $event->load(['schedule']);
        $categories = Category::activeCategory();
        return view('organizer.edit-event', compact('event', 'categories'));
    }




}
