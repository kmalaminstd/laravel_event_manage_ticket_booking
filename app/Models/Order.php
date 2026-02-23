<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    public function event(){
        $this->belongsTo(Event::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }

    public function ticket(){
        $this->belongsTo(Ticket::class);
    }

}
