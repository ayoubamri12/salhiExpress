<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Deliverymen;
use App\Models\Region;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        // You can handle filtering and searching here based on your logic
        $users = User::query();

        // Filtering based on 'type'
        if ($request->filled('type')) {
            $users->where('type', $request->input('type'));
        }

        // Searching based on 'search' input
        if ($request->filled('search')) {
            $users->where('login', 'like', '%' . $request->input('search') . '%');
        }

        $accounts = $users->paginate(10); // Adjust pagination as needed

        return view('admin.accounts.index', compact('accounts')); // Adjust view path as necessary
    }
   
    public function show(){
        return view('login.login');
    }
    public function showRegister()
    {
        $regions = Region::all();
        return view('login.register', compact('regions'));
    }
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session()->regenerate();

            logger('Logged in user type: ' . $user->type); // Log user type on login

            if ($user->type === 'admin') {
                return to_route("admin.show");
            } elseif ($user->type === 'company') {
                return redirect()->route('company.dashboard');
            } else {
                return redirect()->route('delivery.show');
            }
        }

        logger('Login failed for credentials: ' . json_encode($credentials)); // Log failed login attempt
        return back()->onlyInput("login")->withErrors(['email' => 'Invalid credentials']);
    }


    public function register(Request $request)
    {

        $user = new User();
        $user->login = $request->input('login');
        $user->type = $request->input('type');
        $user->password = bcrypt($request->input('password')); // You should use Hash facade for Laravel 7+
        $user->save();
        if ($request->input("type") === "company") {
            $client = new Client();
            $client->firtsName = $request->input('firtsName');
            $client->lastName = $request->input('lastName');
            $client->phone = $request->input('phone');
            $client->RIB = $request->input('RIB');
            $client->qr_rib = $request->file('qr_rib') ? $request->file('qr_rib')->store("images", "public") : " ";
            $client->user_id = $user->id;
            $client->save();
            $company = new Company();
            $company->companyName = $request->input('company');
            $company->client_id = $client->id;
            $company->save();
        } else {
            $delivery = new Deliverymen();
            $delivery->firtsName = $request->input('firtsName');
            $delivery->lastName = $request->input('lastName');
            $delivery->user_id = $user->id;
            $delivery->region_id = $request->input('region');
            $delivery->save();
        }
        // You can add additional logic here, such as sending a welcome email

        return redirect()->route('login')->with('success', 'Registration successful!');
    }
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return to_route("login");
    }
}
