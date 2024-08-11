<?php

namespace App\Http\Controllers;

use App\Models\Coli;
use Illuminate\Http\Request;

class AdminConttroller extends Controller
{
    public function show(){
        $colis = Coli::all();
        return view('admin.dashboard',compact("colis"));
    }
}
