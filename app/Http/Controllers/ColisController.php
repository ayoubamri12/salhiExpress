<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Complaint;
use App\Models\Deliverymen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ColisController extends Controller
{
    public function store(Request $req)
    {
        $qrCodePath = route('parcels.show', $req->code); 
        $parcel = new Coli();
        $parcel->code = $req->code;
        $parcel->destination = $req->destination;
        $parcel->phone_number = $req->phone_number;
        $parcel->Name = $req->Name;
        $parcel->state = "Non paye";
        $parcel->status = "en cours";
        $parcel->price =$req->price;
        $parcel->magasin = $req->magasin;
        $parcel->qr_code = $qrCodePath;
        $parcel->save();
        return to_route("parcel.create")->with("created",'item');
    }
    public function show(Request $req,$code){
        $parcel = Coli::where("code",'=',$code)->first();
     
        return view("parcels.show",compact('parcel'));
    }
    public function filteredData(Request $request)
    {
        $parcels = Coli::query();

        if (!empty($request->input('code'))) {
            $parcels->where('code', 'like', '%' . $request->input('code') . '%');
        }
        if (!empty($request->input('delivery'))) {
            $parcels->where('deliverymen_id', $request->input('delivery'));
        }

        if (!empty($request->input('date'))) {
            $parcels->whereDate('created_at', $request->input('date'));
        }

        if (!empty($request->input('state'))) {
            $parcels->where('state', $request->input('state'));
        }

        if (!empty($request->input('status'))) {
            $parcels->where('status', $request->input('status'));
        }

        if (!empty($request->input('magasin'))) {
            $parcels->where('magasin', 'like', '%' . $request->input('magasin') . '%');
        }
        $parcels = $parcels->with(['complaint', 'deliverymen'])->get();
        return response()->json(["data" => $parcels]);
    }
    public function update(Coli $id, Request $request)
    {
        $status = $request->input("status");
        if ($status === 'Livre')
            $id->update(['status' => $status, "updated_at" => Carbon::today()]);
        else {
            Complaint::create([
                "coli_id" => $id->id,
                "comment" => $request->input("comment"),
                "status" => $status,
                "req_state" => 'not approved',
            ]);
        }
        return to_route("delivery.show")->with("success", 'mmmmmm');
    }
    public function free_parcel()
    {
        $parcels = Coli::whereDoesntHave("deliverymen")->get();
        return response()->json($parcels);
    }
}
