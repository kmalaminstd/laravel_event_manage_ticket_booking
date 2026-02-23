<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    
    public function index(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    // registering user
    public function store(Request $request){

        // dd($request->role);

        $attributes = $request->validate([
            "name" => 'required|min:3',
            "email" => 'required|email|unique:users,email',
            "password" => 'required|min:6',
            "role" => ['required', new Enum(UserRole::class)],
            "media_id" => 'nullable'
        ]);

        if($request->termsCondition !== "on"){
            return back();
        }
            
        $user = User::create($attributes);

        
        
        Auth::login($user, true);

        $request->session()->regenerate();

        if($request->role === 'user'){
            return redirect('/user');
        }

        if($request->role === 'organizer'){
            return redirect('/organizer');
        }

    }


    // login existing user
    public function login(Request $request){

        // dd($request);

        $attributes = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required']
        ]);

        $remember = $request->remember === 'on' ? true : false;

        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                "email" => "Credentials does not matches"
            ]);
        }

        request()->session()->regenerate();

        if(Auth::user()->role === 'organizer'){
            return redirect('/organizer');
        }

        if(Auth::user()->role === 'user'){
            return redirect('/user');
        }

        if(Auth::user()->role === 'admin'){
            return redirect('/admin');
        }

        if(!Auth::user()->role){
            return redirect('/user');
        }

    }

    public function destroy(){
        Auth::logout();

        return redirect('/auth/login');
    }

}
