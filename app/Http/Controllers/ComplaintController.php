<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function store(Coli $id, Request $request)
    {
        $status = $request->input("status");
        if ($status === 'livré')
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
    public function approving(Complaint $complaint){
        $complaint->update(['req_state'=>"approved"]);
        $parcel = Coli::findOrFail($complaint->coli_id);
        $parcel->status=$complaint->status;
        $parcel->delay=Carbon::today()->addDays(5);
        $parcel->save();
        return back()->with("approving",'approved');
    }
    public function disapproving(Complaint $complaint){
        $complaint->delete();
        return back()->with("approving",'disapproved');
    }
}
