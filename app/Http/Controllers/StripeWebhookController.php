<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class StripeWebhookController extends CashierController
{
    
    public function handleCheckoutSessionCompleted($payload){

        // Log::info('webhook working');
        Log::info('webhook', $payload['data']['object']);

        $session = $payload['data']['object'];

        $subtotal_amount = $session['amount_subtotal'] / 100;

        // dump('Web hook working');
        Order::create([
            "user_id" => $session['metadata']['user_id'],
            "event_id" => $session['metadata']['event_id'],
            "stripe_id" => $session['payment_intent'],
            "status" => $session['payment_status'],
            "currency" => $session['currency'],
            "amount" => $subtotal_amount,
            "tickets" => $session['metadata']['tickets']
        ]);

        return response('ok', 200);

    }

}
