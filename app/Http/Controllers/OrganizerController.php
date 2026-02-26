<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Media;
use App\Models\User;
use App\Services\ImageUploadService;
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




}
