<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    
    public function post(){
        $this->belongsTo(Event::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }

}
