<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){

    Route::controller(AuthController::class)->group(function(){
        Route::get('/auth/login', 'index')->name('login');
        Route::get('/auth/register', 'register');
        Route::post('/auth/store', 'store');
        Route::post('/auth/user-login', 'login');
    });
    
    Route::controller(SocialLoginController::class)->group(function(){
        Route::get('/login/{provider}', 'redirect');
        Route::get('/login/{provider}/callback', 'callback');
    });

});

Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'destroy']);
});