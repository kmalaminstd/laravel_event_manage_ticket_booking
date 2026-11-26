<?php

namespace App\Models;

use App\Policies\AttendeesPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;

#[UsePolicy(AttendeesPolicy::class)]
class Attendees extends Model
{

    protected $guarded = ['id'];

}
