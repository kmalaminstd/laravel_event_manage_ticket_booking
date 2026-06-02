<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\TicketCheckOutController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Http\Controllers\WebhookController;

Route::get("/", [HomeController::class, "index"]);
Route::get("/events", [HomeController::class, "events"]);
Route::get("/event/{event}/{slug}", [HomeController::class, "eventDetails"]);
Route::get('/search', [HomeController::class, "search"]);


Route::get("/forgot-password", function () {
    return view("auth.forgot-password");
});

Route::get("/checkout", function () {
    return view("payment.checkout");
});

// admin routes
Route::middleware(["auth", "role:admin"])
    ->prefix("admin")
    ->group(function () {

        Route::controller(AdminController::class)->group(function(){
            Route::get("/", "index");
        });

        Route::controller(OrderController::class)->group(function(){
            Route::get("/orders", 'showAll');
        });

        Route::get("/categories", [AdminController::class, "category"]);
        Route::get("/category/{category}/edit", [
            AdminController::class,
            "editCategory",
        ]);

        Route::get("/refunds", function () {
            return view("admin.refunds");
        });

        Route::get("/manage-events", [AdminController::class ,"manageEvents"]);

        Route::controller(UserController::class)->group(function(){
            Route::get('/manage-users', 'showAll');
        });

        Route::get("/reports", function () {
            return view("admin.reports");
        });

        Route::get("/settings", function () {
            return view("admin.settings");
        });

        Route::post("/category", [CategoryController::class, "store"]);
        Route::post("/category/{category}/update", [
            CategoryController::class,
            "update",
        ]);
        Route::delete("/category/{category}/delete", [
            CategoryController::class,
            "destroy",
        ]);

        Route::patch('/event/{event}/approve', [EventController::class, "approve"]);
        Route::patch('/event/{event}/suspend', [EventController::class, "suspend"]);

        Route::controller(EventController::class)->group(function(){
            Route::patch('/event/{event}/set-feature', 'featureToggle');
        });


});



Route::middleware(["auth", "role:admin,organizer"])
    ->prefix("organizer")
    ->group(function () {
        Route::get("/", function () {
            return view("organizer.index");
        });



        Route::get("/attendees", function () {
            return view("organizer.attendees");
        });

        Route::get("/orders", function () {
            return view("organizer.orders");
        });

        Route::get("/qr-scanner", function () {
            return view("organizer.qr-scanner");
        });

        Route::get("/refunds", function () {
            return view("organizer.refunds");
        });

        Route::controller(OrganizerController::class)->group(function () {
            Route::get("/create-event", "createEvent");
            Route::get("/event/{event}/edit", "editEvent");
            Route::get("/my-events", "myEvents");
            Route::patch('/org-info/{user}/update', 'updateOrganizationInfo');
            Route::get('/settings', 'settings');
            Route::get('/analytics/{user}/{event}', 'analytics');
        });

        Route::controller(EventController::class)->group(function () {
            Route::post("/event/create", "store");
            Route::patch("/event/{event}/update", "update");
            Route::delete("/event/{event}/delete", "destroy");
        });

        
});



Route::middleware(["auth", "role:admin,user"])
    ->prefix("user")
    ->group(function () {
        Route::get("/", function () {
            return view("user.index");
        });

        Route::get("/refund-request", function () {
            return view("user.refund-request");
        });

        Route::get("/settings", function () {
            return view("user.settings");
        });

        Route::controller(TicketController::class)->group(function(){
            Route::get('/tickets', 'userTickets');
            Route::get('/ticket/{order}', 'userTicketDetails');
            Route::get('/ticket/{ticket}/{order}/download', 'userTicketDownload');
        });


        Route::controller(UserController::class)->group(function(){
            Route::post("/{event}/save-event", "saveEvent");
        });
    
        Route::controller(TicketCheckOutController::class)->group(function(){
            Route::post('/checkout/{event}', 'checkout');
            Route::get('/checkout/failed', 'checkOutFailed')->name('checkout-cancel');
            Route::get('/checkout/confirm', 'checkOutSuccess')->name('checkout-success');            
        });

        


});

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleCheckoutSessionCompleted']);

@include "auth.php";
