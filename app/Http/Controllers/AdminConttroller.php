<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Complaint;
use App\Models\Deliverymen;
use App\Models\Region;
use Illuminate\Http\Request;

class AdminConttroller extends Controller
{
    public function index()
    {
        $deliverymen = Deliverymen::all(); // Fetch all deliverymen
        $reporte = Complaint::where('status', 'Reporté')->where("req_state", "not approved")->get();
        $annule = Complaint::where('status', 'Annulé')->where("req_state", "not approved")->get();
        $refuse = Complaint::where('status', 'Refusé')->where("req_state", "not approved")->get();

        return view("admin.parcels", compact(['deliverymen', 'reporte', 'annule', 'refuse']));
    }

    public function show()
    {
        $colis = Coli::all();
        $deliverymen = Deliverymen::all(); // Fetch deliverymen data
        return view('admin.dashboard', compact("colis", "deliverymen")); // Pass to the view
    }

    public function create()
    {
        $regions = Region::all();
        return view("admin.forms.parcel_form", compact('regions'));
    }

    public function create_with_excel()
    {
        return view("admin.forms.parcel_formExcel");
    }

    public function free_parcels()
    {
        $deliverymen = Deliverymen::all(); // Fetch deliverymen data
        return view("admin.free_parcels", compact(['deliverymen'])); // Pass to the view
    }
    
}
