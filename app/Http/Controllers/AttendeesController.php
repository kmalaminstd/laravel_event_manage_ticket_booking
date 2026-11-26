<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendeesController extends Controller
{

    public function organizerAttendees(Event $event){

        $user = Auth::user();

        if($user->cannot('viewAttendees', $event)){
            abort(403);
        }
    
        return view("organizer.attendees");

    }

}
