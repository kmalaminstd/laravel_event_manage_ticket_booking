<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $guarded = [];

    public function category(){
        $this->belongsTo(Category::class);
    }

    public function media(){
        $this->hasMany(Media::class);
    }

    public function tickets(){
        $this->hasMany(Ticket::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }

    public function order(){
        $this->hasMany(Event::class);
    }

}
