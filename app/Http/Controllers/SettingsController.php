<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function show(Request $request)
    {
        // You can add filtering or searching here if necessary
        $accounts = User::query();

        // Example: Searching based on 'search' input (if you have a search form)
        if ($request->filled('search')) {
            $accounts->where('login', 'like', '%' . $request->input('search') . '%');
        }

        // Paginate results
        $accounts = $accounts->paginate(10); // Adjust as needed

        return view('admin.settings', compact('accounts'));
    }
    
}
