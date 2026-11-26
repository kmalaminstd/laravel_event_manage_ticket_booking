<?php

namespace App\Models;

use App\Policies\EventPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

#[UsePolicy(EventPolicy::class)]
class Event extends Model
{
    
    protected $guarded = ['id'];

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

    public static function allEvents(){
        return self::latest();
    }

    public function saveposts(){
        return $this->hasMany(SavePost::class);
    }


    protected $casts = [
        "start_date" => "date",
        "end_data" => "date",
        "ticket_close" => "date"
    ];

}
