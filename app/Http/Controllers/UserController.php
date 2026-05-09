<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\SavePost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    use AuthorizesRequests;

    public function showAll(){
        $users = User::latest()->paginate(30);

        return view('admin.manage-users', compact('users'));
    }

    public function organizerInfoUpdate(User $user ,Request $request){

        $attributes = $request->validate([
            "phone" => ['nullable'],
            "name" => ['required'],
            "website" => ['nullable'],
            "about" => ['nullable']
        ]);

        $user->update($attributes);

        return back();

    }

    public function saveEvent(Event $event){
        $user = Auth::user();

        $existing = SavePost::where("user_id", $user->id)->where("event_id", $event->id)->first();

        if($existing){
            $existing->delete();
            return back();
        }

        SavePost::create([
            "user_id" => $user->id,
            "event_id" => $event->id
        ]);
        return back();
    }

}
