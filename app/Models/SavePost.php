<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavePost extends Model
{

    public function event(){
        $this->belongsToMany(Event::class);
    }

    public function user(){
        $this->belongsToMany(User::class);
    }


}
