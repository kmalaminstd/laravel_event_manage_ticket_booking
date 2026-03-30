<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavePost extends Model
{

    protected $guarded = [];

    public function event(){
        $this->belongsToMany(Event::class);
    }

    public function user(){
        $this->belongsToMany(User::class);
    }


}
