<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    
    protected $guarded = [];

    public function event(){
        return $this->hasOne(Event::class, 'media_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
