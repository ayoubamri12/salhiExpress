<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminConttroller extends Controller
{
    public function show(){
        return view('admin.dashboard');
    }
}
