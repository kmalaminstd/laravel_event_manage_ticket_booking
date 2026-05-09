<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function showAll(){

        $orders = Order::with(['user', 'event'])->latest()->paginate(30);

        return view("admin.orders", compact('orders'));

    }

}
