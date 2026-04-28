<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    public function test(){
        return response()->json([
            "auth" => true
        ]);
    }
}
