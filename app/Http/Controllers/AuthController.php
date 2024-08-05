<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Deliverymen;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show(){
        return view('login.login');
    }
    public function showRegister(){
        return view('login.register');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session()->regenerate();
            if ($user->type === 'admin') {
                return to_route("admin.show");
            } elseif ($user->type === 'company') {
                return redirect()->route('company.dashboard');
            }else{
                return redirect()->route('delivery.show');

            }
        }

        return back()->onlyInput("login")->withErrors(['email' => 'Invalid credentials']);
    }
    public function register(Request $request)
    {
        
        $user = new User();
        $user->login = $request->input('login');
        $user->type = $request->input('type');
        $user->password = bcrypt($request->input('password')); // You should use Hash facade for Laravel 7+
        $user->save();
        if($request->input("type")==="company"){
            $client=new Client();
            $client->firtsName = $request->input('firtsName');
            $client->lastName = $request->input('lastName');
            $client->RIB = $request->input('RIB');
            $client->user_id = $user->id;   
            $client->save(); 
            $company=new Company();
            $company->companyName = $request->input('company');
            $company->client_id = $client->id;   
            $company->save(); 
        }else{
            $delivery = new Deliverymen();
            $delivery->firtsName = $request->input('firtsName');
            $delivery->lastName = $request->input('lastName');
            $delivery->user_id = $user->id;
            $delivery->save();
        }
        // You can add additional logic here, such as sending a welcome email

       return redirect()->route('login')->with('success', 'Registration successful!');
    }
    public function logout(){
        Auth::logout();
        session()->flush();
        return to_route("login");
    }
}
