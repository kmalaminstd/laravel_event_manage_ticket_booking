<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function media(){
        return $this->belongsTo(Media::class);
    }

    public function ticket(){
        return $this->hasMany(Ticket::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function faq(){
        return $this->hasMany(FAQ::class);
    }

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }

}
