<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class TicketCheckOutController extends Controller
{

    public function checkout(Event $event, Request $request){

        $requestedTicketIds = $request->input('ticket', []);

        // filter the tickes which only are request for
        $requestedTicketIds = array_filter($requestedTicketIds, function($item){
            return $item['quantity'] > 0;
        });

        $eventTickets = $event->ticket()->get()->keyBy('id');

        // dd($eventTickets);
        $totalAmount = 0;
        $lineItems = [];
        $finalTickets = [];

        foreach($requestedTicketIds as $item){
            $ticketId = $item['id'];
            $quantity = $item['quantity'];

            
            if(!isset($eventTickets[$ticketId])){
                abort(403);
            }

            $ticket = $eventTickets[$ticketId];

            $totalAmount += $ticket->price * $quantity;

            
            $finalTickets[] = [
                'id' => $ticketId,
                'quantity' => $quantity,
                'price' => $ticket->price,
            ];

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $ticket->price * 100,
                    'product_data' => [
                        'name' => $event->name . ' - ' . $ticket->name,
                    ],
                ],
                'quantity' => $quantity,
            ];

        }

        Stripe::setApiKey(config('services.stripe.api_secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'metadata' => [
                'user_id' => $request->user()->id,
                'event_id' => $event->id,
                'tickets' => json_encode($finalTickets)
            ],
            'success_url' => route('checkout-success'),
            'cancel_url' => route('checkout-cancel')
        ]);

        // dd($session);
        return redirect($session->url);
    }

    public function checkOutFailed(){
        return view('payment.order-cancelled');
    }

    public function checkOutSuccess(){
        return view('payment.order-confirm');
    }

}
