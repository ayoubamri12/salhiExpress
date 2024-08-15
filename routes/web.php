<?php

use App\Http\Controllers\AdminConttroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColisController;
use App\Http\Controllers\DeliveryController;
use App\Models\Coli;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return to_route("login");
});
Route::get('/login',[AuthController::class,'show'])->name("login");
Route::get('/login/register',[AuthController::class,'showRegister'])->name("login.registerShown");
Route::post('/login/store',[AuthController::class,'login'])->name("store");
Route::post('/register',[AuthController::class,'register'])->name("register");
Route::get('/logout',[AuthController::class,'logout'])->name("logout");
// admin 
Route::middleware("auth")->group(function(){
    Route::get('/admin/dashboard',[AdminConttroller::class,'show'])->name("admin.show");
    Route::get('/admin/parcels/all',[AdminConttroller::class,'index'])->name("admin.index");
    Route::get('/admin/parcels/free_parcels',[AdminConttroller::class,'free_parcels'])->name("admin.free_parcels");
    Route::get('/admin/parcels/create',[AdminConttroller::class,'create'])->name("parcel.create");
    Route::get('/admin/parcels/create/excel',[AdminConttroller::class,'create_with_excel'])->name("parcel.create_with_excel");

    Route::get('/delivery/home',[DeliveryController::class,'show'])->name("delivery.show");
    Route::post('/coli/status/{id}',[ColisController::class,'update'])->name("colis.status");
    Route::get('/delivery/parcels/delivred',[DeliveryController::class,"deliveredPrcels"])->name("parcels.delivred");
    Route::get('/delivery/parcels/delayed',[DeliveryController::class,"delayedPrcels"])->name("parcels.delayed");

    Route::get('/parcels/show/{code}',[ColisController::class,'show'])->name("parcels.show");
    Route::post('/parcels/store',[ColisController::class,'store'])->name("parcel.store");
});

