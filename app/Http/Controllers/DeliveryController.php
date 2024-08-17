<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Deliverymen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function show(){
        $colis = Coli::has("deliverymen")->whereDoesntHave("complaint")->where("deliverymen_id",auth()->user()->deliverymen->id)->where("status","en cours")->get();
        return view("delivers.dashboard",compact("colis"));
    }
    public function deliveredPrcels()
    {
        $colis = Coli::where("status", "livré")->where("deliverymen_id",auth()->user()->deliverymen->id)->get();
        return view("delivers.delivred_parcels", compact("colis"));
    }
    
    public function scan_parcel(){
        return view("delivers.scan_parcel");
    }
    public function otherPrcels()
    {
        $colis = Coli::has('complaint')->where("deliverymen_id",auth()->user()->deliverymen->id)->get();
        return view("delivers.other_parcels", compact("colis"));
    }
    public function delayedPrcels()
    {
        $colis = Coli::where("status", "Reporté")->where("deliverymen_id",auth()->user()->deliverymen->id)->get();
        return view("delivers.delayed_parcels", compact("colis"));
    }
}
