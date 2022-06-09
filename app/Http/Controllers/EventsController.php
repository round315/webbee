<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index (){
        $workers = DB::select('select * from workers')
        ->leftJoin ("workshop", "event_id", "=", "workers.id")
        ->get();
        dd($workers);
    }
}
