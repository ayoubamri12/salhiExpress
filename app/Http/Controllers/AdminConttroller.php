<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Deliverymen;
use App\Models\Region;
use Illuminate\Http\Request;

class AdminConttroller extends Controller
{
    public function index()
    {
        $parcels = Coli::has("deliverymen")->latest()->paginate(15);
        $delmens = Deliverymen::all();
        return view("admin.parcels", compact('parcels','delmens'));
    }
    public function show(){
        $colis = Coli::all();
        return view('admin.dashboard',compact("colis"));
    }
    public function create(){
        $regions = Region::all();
        return view("admin.forms.parcel_form",compact('regions'));
    }
    public function create_with_excel(){
        return view("admin.forms.parcel_formExcel");
    }
    public function free_parcels(){

        return view("admin.free_parcels");
    }
}
