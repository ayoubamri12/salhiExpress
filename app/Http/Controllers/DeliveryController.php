<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Deliverymen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function show(){
        $colis = Coli::with("deliverymen")->where("deliverymen_id",auth()->user()->deliverymen->id)->where("created_at","=",Carbon::today())->get();
        return view("delivers.dashboard",compact("colis"));
    }
    public function deliveredPrcels()
    {
        $colis = Coli::where("status", "Livre")->where("deliverymen_id",auth()->user()->deliverymen->id)->get();
        return view("delivers.delivred_parcels", compact("colis"));
    }
    public function delayedPrcels()
    {
        $colis = Coli::where("created_at", Carbon::today())->where("deliverymen_id",auth()->user()->deliverymen->id)->get();
        return view("delivers.delayed_parcels", compact("colis"));
    }
}
