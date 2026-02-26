<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{

    use AuthorizesRequests;

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

}
