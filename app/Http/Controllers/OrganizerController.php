<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Media;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use App\Services\ImageUploadService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    
    use AuthorizesRequests;

    public function index(){

        $user = Auth::user();

        $order = Order::all();

        $orders = Order::whereHas('event', function ($query) use ($user){
            $query->where('user_id', $user->id);
        });

        $events = Event::whereHas('user', function ($query) use ($user){
            $query->where('user_id', $user->id);
        })->get('id');

        $totalEvents = $events->count();

        $totalRevenue = $orders->sum('amount');
        $totalTickets = $orders->sum('quantity');

        // monthly revenue
        $raw = $orders->whereYear('created_at', Carbon::now()->year)->selectRaw("MONTH(created_at) as month, SUM(amount) as revenue")->groupBy('month')->orderBy('month')->pluck('revenue', 'month');

        $labels = [];
        $data = [];

        for($i = 1; $i <= now()->month; $i++ ){
            $labels[] = Carbon::create()->month($i)->format('M');
            $data[] = $raw[$i] ?? 0;
        }

        $monthlyRevenue = [
            "labels" => $labels,
            "data" => $data
        ];

        $recentOrders = Order::whereHas('event', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['ticket', 'event', 'user'])->latest()->take(3)->get();

        // dd($recentTickets);

        return view("organizer.index", compact(['totalRevenue', 'totalTickets', 'totalEvents', 'monthlyRevenue', 'recentOrders']));
    }

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
        $admin = Auth::user()->role === 'admin';
        if($event->admin_approved){
            if(!$admin){
                abort(403, 'You are not allowed to edit this event');
            }
        }
        // $event->with(['schedule', 'ticket', 'faq']);
        $event->load(['schedule']);
        $categories = Category::activeCategory();
        return view('organizer.edit-event', compact('event', 'categories'));
    }

    public function settings(){
        $user = Auth::user();
        return view("organizer.settings", compact('user'));
    }

    public function updateOrganizationInfo(User $user, Request $request, ImageUploadService $imageUpload){
        
        $infoAttributes = $request->validate([
            "name" => ["required"],
            "phone" => ['nullable'],
            "website" => ['nullable'],
            "about" => ['nullable']
        ]);

        if($request->hasFile('media')){

            if($user->media){
                $imageUpload->delete($user->media->src);
                $user->media->delete();
            }

            $path = $imageUpload->replace($request->file('media'));
            $media = Media::create([
                "name" => $infoAttributes["name"],
                "src" => $path
            ]);
            $infoAttributes["media_id"] = $media->id;
        }

        $user->update($infoAttributes);

        return back();

    }

    public function analytics(Event $event){

        $user = Auth::user();

        if($user->role === "user"){
            return abort(403);
        }

        $loggedInUser = Auth::user();

        if($loggedInUser->id !== $user->id){
            return abort(403);
        }

        $totalRevenue = $event->order()->sum('amount');
        $totalTicketSold = $event->order()->sum('quantity');


        return view('organizer.analytics', compact(['event', 'totalRevenue', 'totalTicketSold']));
    }


}
