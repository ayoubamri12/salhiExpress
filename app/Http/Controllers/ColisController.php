<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Complaint;
use App\Models\Deliverymen;
use App\Models\Region;
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
        $parcel->state = "Non payé";
        $parcel->status = "en cours";
        $parcel->price = $req->price;
        $parcel->magasin = $req->magasin;
        $parcel->qr_code = $qrCodePath;
        $parcel->save();
        return to_route("parcel.create")->with("created", 'item');
    }
    public function show(Request $req, $code)
    {
        $parcel = Coli::where("code", '=', $code)->first();

        return view("parcels.show", compact('parcel'));
    }
    public function edit(Coli $parcel)
    {
        $regions = Region::all();
        return view("admin.forms.edit-parcel", compact(['parcel', 'regions']));
    }
    public function update(Coli $parcel, Request $req)
    {
        $parcel->fill($req->input())->save();
        return redirect()->back()->with("edited", "edited");
    }

    public function setItShiped(Request $request)
    {
        $selectedIds = $request->input('ids');
        $delivery_id = $request->input('delivery_id');
        foreach ($selectedIds as $id) {
            $coli = Coli::findOrFail($id);
            $coli->update(['deliverymen_id' => $delivery_id, "created_at" => Carbon::now()]);
        }
        return response()->json(['message' => 'Users updated successfully']);
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

        if (!empty($request->input('created_at'))) {
            $parcels->whereBetween('created_at', [$request->input('created_at')[0], $request->input('created_at')[1]]);
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
        $parcels = $parcels->with(['complaint', 'deliverymen'])->where("deliverymen_id", '!=', NULL)->get();
        return response()->json($parcels);
    }
    public function free_parcel(Request $request)
    {
        $queryParcels = Coli::query();
        if (!empty($request->input('code'))) {

            $queryParcels->where('code', 'like', '%' . $request->input('code') . '%');
        }
        if (!empty($request->input('created_at'))) {
            $startDate = Carbon::parse($request->input('created_at')[0])->startOfDay();
            $endDate = Carbon::parse($request->input('created_at')[1])->endOfDay();
            $queryParcels->whereBetween('created_at', [$startDate, $endDate]);
        }

        if (!empty($request->input('magasin'))) {
            $queryParcels->where('magasin', 'like', '%' . $request->input('magasin') . '%');
        }
        $queryParcels=$queryParcels->whereDoesntHave('deliverymen')->get();
        return response()->json($queryParcels);
    }
}
