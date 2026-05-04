<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelQRCode\Facades\QRCode;

class TicketController extends Controller
{
    
    public function userTickets(){

        $user = Auth::user();

        $orders = Order::latest()->where('user_id', $user->id)->with(['event'])->paginate(30);

        // dd($order);

        return view("user.tickets", compact('orders'));

    }

    public function userTicketDetails(Order $order){

        $user = Auth::user();

        if($order->user_id !== $user->id){
            abort(403);
        }

        $order->with(['event', 'ticket', 'user']);

        return view('user.ticket', compact('order'));

    }

    public function userTicketDownload(Ticket $ticket, Order $order){
        
        $qr = base64_encode(
            (string) QRCode::text($order->order_code)->png()
        );

        $pdf = Pdf::loadView('components.cards.event-ticket', compact('ticket', 'order', 'qr'));
            
        return $pdf->download('ticket.pdf');
    }

}
