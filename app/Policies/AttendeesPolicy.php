<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Event;
use Illuminate\Auth\Access\Response;

class AttendeesPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Event $event){

        if($event->user->id === $user->id && ( $user->role === "organizer" || $event->role === "admin" )){
            return true;
        }
        return false;

    }
}
