<?php

namespace App\Http\Controllers;

use App\Models\Deliverymen;
use App\Models\Region;
use App\Models\Coli;
use Illuminate\Http\Request;

class DeliverymenController extends Controller
{
    // public function index()
    // {
    //     // Fetch all deliverymen
    //     $deliverymen = Deliverymen::with('region')->get(); // Eager loading regions
    //     return view('deliverymens.ListLiveuer', compact('deliverymen'));
    // }
    public function index(Request $request)
    {
        // Capture the search term
        $search = $request->input('search');

        // If there is a search term, filter the results based on it
        if ($search) {
            $deliverymen = Deliverymen::with('region')
                ->where('firstName', 'LIKE', "%{$search}%")
                ->orWhere('lastName', 'LIKE', "%{$search}%")
                ->orWhereHas('region', function ($query) use ($search) {
                    $query->where('lib', 'LIKE', "%{$search}%");
                })
                ->get();
        } else {
            // If no search term, fetch all deliverymen
            $deliverymen = Deliverymen::with('region')->get(); // Eager loading regions
        }

        // Return the view with search results (if any)
        // return redirect()->back()->with('success', 'Delivery person has been added successfully');

        return view('deliverymens.ListLiveuer', compact('deliverymen', 'search'));
    }


    public function create()
    {
        // Fetch all regions to populate the dropdown
        $regions = Region::all();
        return view('deliverymens.create', compact('regions'));
    }

    public function store(Request $request)
    {
        // Validate the request, without requiring 'user_id'
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'num' => 'required|string|max:20', // Validate the telephone number
            // Remove 'required' from user_id, assume admin is the default
        ]);


        // Use the admin user_id as default if no other users are present
        $user_id = auth()->user()->id;  // Automatically get the logged-in admin's user_id

        // Create a new deliveryman with the provided data
        Deliverymen::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'region_id' => $request->input('region_id'),
            'num' => $request->input('num'),
            'user_id' => $user_id,  // Use the admin's user_id
        ]);


        // Redirect with a success message
        return redirect()->route('deliverymens.index')->with('success', 'Deliveryman created successfully');
    }
    public function getDeliverymanNumber($id)
    {
        $deliveryman = Deliverymen::findOrFail($id);
        return response()->json(['phone_number' => $deliveryman->num]);
    }
    



    public function openWhatsAppChat($id)
    {
        $deliveryman = Deliverymen::findOrFail($id);
        $formattedNumber = '+212' . substr($deliveryman->num, -9); // Ensure number format
        return redirect()->away("https://wa.me/{$formattedNumber}");
    }
    
    public function edit($id)
    {
        // Fetch a specific deliveryman for editing
        $deliveryman = Deliverymen::findOrFail($id);
        $regions = Region::all(); // Fetch all regions to populate the dropdown
        return view('deliverymens.EditLiveuer', compact('deliveryman', 'regions'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'num' => $request->input('num'), // Save telephone number

        ]);

        // Handle update logic for deliveryman
        $deliveryman = Deliverymen::findOrFail($id);
        $deliveryman->update($request->all());
        return redirect()->route('deliverymens.index')->with('success', 'Deliveryman updated successfully');
    }







    public function destroy($id)
    {
        // Find and delete the specific deliveryman
        $deliveryman = Deliverymen::findOrFail($id);
        $deliveryman->delete();

        // Flash a success message to the session
        return redirect()->route('deliverymens.index')->with('success', 'Deliveryman deleted successfully');
    }
}
