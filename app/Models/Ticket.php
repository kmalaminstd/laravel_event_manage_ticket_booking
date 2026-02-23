<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    
    public function event(){
        $this->belongsTo(Event::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }

    public function order(){
        $this->belongsTo(Order::class);
    }

}
