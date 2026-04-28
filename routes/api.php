<?php

use App\Http\Controllers\ApiTestController;
use App\Http\Controllers\StripeWebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Http\Controllers\WebhookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook']);

Route::controller(ApiTestController::class)->group(function(){
    Route::get('/', 'test');
});
