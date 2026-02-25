<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $guarded = [];

    public function posts(){
        return $this->hasMany(Event::class);
    }

    public static function activeCategory(){
        return self::where('status', true)->latest()->get();
    }
    
}
