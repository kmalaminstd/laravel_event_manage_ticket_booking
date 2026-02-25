<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/events', [HomeController::class, 'events']);
Route::get('/event', [HomeController::class, 'eventDetails']);

Route::get('/forgot-password', function(){
    return view("auth.forgot-password");
});

Route::get('/checkout', function(){
    return view('payment.checkout');
});

// admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/orders', function(){
        return view('admin.orders');
    });

    Route::get('/categories', [AdminController::class, 'category']);
    Route::get('/category/{category}/edit', [AdminController::class, 'editCategory']);

    Route::get('/refunds', function(){
        return view('admin.refunds');
    });

    Route::get('/manage-events', function(){
        return view('admin.manage-events');
    });

    Route::get('/manage-users', function(){
        return view('admin.manage-users');
    });

    Route::get('/reports', function(){
        return view('admin.reports');
    });

    Route::get('/settings', function(){
        return view('admin.settings');
    });

    Route::post('/category', [CategoryController::class, 'store']);
    Route::post('/category/{category}/update', [CategoryController::class, 'update']);
    Route::delete('/category/{category}/delete', [CategoryController::class, 'destroy']);

});

Route::middleware(['auth', 'role:admin,organizer'])->prefix('organizer')->group(function(){

    Route::get('/', function(){
        return view('organizer.index');
    });

    Route::get('/analytics', function(){
        return view('organizer.analytics');
    });

    Route::get('/attendees', function(){
        return view('organizer.attendees');
    });



    Route::get('/orders', function(){
        return view('organizer.orders');
    });

    Route::get('/qr-scanner', function(){
        return view('organizer.qr-scanner');
    });

    Route::get('/refunds', function(){
        return view('organizer.refunds');
    });

    Route::get('/settings', function(){
        return view('organizer.settings');
    });

    Route::controller(OrganizerController::class)->group(function(){
        Route::get('/create-event', 'createEvent');
        Route::get('/event/{event}/edit', 'editEvent');
        Route::get('/my-events', 'myEvents');
    });

    Route::controller(EventController::class)->group(function(){
        Route::post('/event/create', 'store');
        Route::patch('/event/{event}/update', 'update');
        Route::delete('/event/{event}/delete', 'destroy');
    });


});

Route::middleware(['auth', 'role:admin,user'])->prefix('user')->group(function(){

    Route::get('/', function(){
        return view('user.index');
    });

    Route::get('/refund-request', function(){
        return view('user.refund-request');
    });

    Route::get('/settings', function(){
        return view('user.settings');
    });

    Route::get('/tickets', function(){
        return view('user.tickets');
    });

    Route::get('/ticket', function(){
        return view('user.ticket');
    });


});


@include('auth.php');