<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class ColisController extends Controller
{
    public function filteredData(Request $request){
      
            $parcels = Coli::query();
        
            if (!empty($request->input('code'))) {
                  $parcels->where('code', 'like', '%' . $request->input('code') . '%');
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
            return response()->json(["data"=>$parcels]);
        
    }
   public function index(){
    $parcels = Coli::latest()->paginate(2);
    return view("admin.parcels",compact('parcels'));
   }
    public function update(Coli $id, Request $request)
    {
        $status = $request->input("status");
        if ($status === 'Livre')
            $id->update(['status' => $status,"updated_at"=>Carbon::today()]);
        else {
            Complaint::create([
                "coli_id" => $id->id,
                "comment" => $request->input("comment"),
                "status" => $status,
                "req_state" => 'processing',
            ]);
        }
        return to_route("delivery.show")->with("success",'mmmmmm');
    }
    public function deliveredPrcels(){
        $colis = Coli::where("status","Livre")->get();
        return view("delivers.delivred_parcels",compact("colis"));
    }
}
