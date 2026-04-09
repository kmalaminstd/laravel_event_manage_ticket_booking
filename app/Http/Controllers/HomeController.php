<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\SavePost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    use AuthorizesRequests;

    public function index(){
        $nextWeekStart = now()->addWeek()->startOfWeek()->toDateString();
        $nextWeekEnd = now()->addWeek()->endOfWeek()->toDateString();

        // dd($nextWeekEnd);

        $categories = Category::activeCategory();

        $featuredEvents = Event::where("admin_approved", true)->where("published", true)->where("featured", true)->withMin('ticket', 'price')->withMax('ticket', 'price')->latest()->take(6)->get();

        $nextWeekEvents = Event::where("admin_approved", true)->where("published", true)->whereBetween('start_date' ,[$nextWeekStart, $nextWeekEnd])->withMin('ticket', 'price')->orderBy('start_date')->get();
        

        return view('pages.home', compact(['categories', 'featuredEvents', 'nextWeekEvents']));
    }

    public function events(){
        $events = Event::where("admin_approved", true)->with(['category', 'media'])->paginate(20);
        return view('pages.events', compact('events'));
    }

    public function eventDetails(Event $event){
        $this->authorize('view', $event);

        $isSaveEvent = "";
        if(Auth::user()){
            $user = Auth::user();
    
            $isSaveEvent = SavePost::where("user_id", $user->id)->where("event_id", $event->id)->first();
        }


        $schedules = $event->schedule()->get();
        $faqs = $event->faq()->get();
        $tickets = $event->ticket()->get();
        return view('pages.event-details', compact('event', 'schedules', 'faqs', 'tickets', 'isSaveEvent'));
    }

}
