<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class StripeWebhookController extends CashierController
{
    
    public function handleCheckoutSessionCompleted($payload){

        // Log::info('webhook working');
        
        $session = $payload['data']['object'];
        
        // $subtotal_amount = $session['amount_subtotal'] / 100;
        
        
        $tickets = json_decode($session['metadata']['tickets'], true);

        $paymentCode = "#".now()->year.'-'. Str::random(5);

        Log::info('webhook', $tickets);
        
        foreach($tickets as $ticket){

            // $ticket_price = $ticket['price'] / 100

            Order::create([
                "user_id" => $session['metadata']['user_id'],
                "event_id" => $session['metadata']['event_id'],
                "stripe_id" => $session['payment_intent'],
                "status" => $session['payment_status'],
                "currency" => $session['currency'],
                "amount" => $ticket['price'],
                'ticket_id' => $ticket['id'],
                "quantity" => $ticket['quantity'],
                "order_code" => $paymentCode
            ]);

        }


        return response('ok', 200);

    }

}
