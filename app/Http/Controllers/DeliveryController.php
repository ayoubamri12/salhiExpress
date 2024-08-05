<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Deliverymen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function show(){
        $delivery = Deliverymen::with("colis")->where("id",auth()->user()->deliverymen->id)->where("created_at","=",Carbon::today())->get();
        return view("delivers.dashboard",compact("delivery"));
    }
}
