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

        $featuredEvents = Event::where("admin_approved", true)->with(['user', 'category', 'media'])->where("published", true)->where("featured", true)->withMin('ticket', 'price')->withMax('ticket', 'price')->latest()->take(6)->get();

        $nextWeekEvents = Event::where("admin_approved", true)->with(['user', 'category', 'media'])->where("published", true)->whereBetween('start_date' ,[$nextWeekStart, $nextWeekEnd])->withMin('ticket', 'price')->orderBy('start_date')->get();
        

        return view('pages.home', compact(['categories', 'featuredEvents', 'nextWeekEvents']));
    }

    public function events(Request $request){

        $categories = Category::all(['slug', 'name']);

        $events = Event::where("admin_approved", true)->where('published', true)->withMin('ticket', 'price')->withMax('ticket', 'price');

        // filter category
        if($request->category){
            $category = Category::where('slug', $request->category)->first();

            $events->where('category_id', $category->id);
        }

        // filter range
        if($request->range){

            $events->whereHas('ticket', function($query) use ($request) {
                $query->where('price' , '<=', $request->range);
            });
        }

        // date filter
        if($request->date){
            $events->where('start_date', $request->date);
        }

        // location filter
        if($request->city){
            $events->where('address', 'LIKE', '%' . $request->city . '%')->orWhere('venue', 'LIKE' , '%' . $request->city . '%');
        }

        // type filter
        if($request->type){
            if ($request->type === 'free') {

                $events->whereHas('ticket', function ($q) {
                    $q->where('price', '<=', 0);
                });

            } elseif ($request->type === 'paid') {

                $events->whereHas('ticket', function ($q) {
                    $q->where('price', '>', 0);
                });
            }
        }

        $events = $events->with(['category', 'media', 'user'])->whereDate('start_date', ">=", now()->toDateString())->paginate(20);

        // dd(now()->toDateString());


        return view('pages.events', compact(['events', 'categories']));
    }

    public function eventDetails(Event $event){
        $this->authorize('view', $event);

        $isSaveEvent = "";
        if(Auth::user()){
            $user = Auth::user();
            
            $isSaveEvent = SavePost::where("user_id", $user->id)->where("event_id", $event->id)->first();
        }

        

        // $remainningTicket = 

        $schedules = $event->schedule()->get();
        $faqs = $event->faq()->get();
        $tickets = $event->ticket()->get();
        return view('pages.event-details', compact('event', 'schedules', 'faqs', 'tickets', 'isSaveEvent'));
    }

}
