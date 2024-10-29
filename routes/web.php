<?php

use App\Http\Controllers\AdminConttroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColisController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DeliverymenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SettingsController;



// Public Routes
Route::get('/', function () {
    return to_route("login");
});
Route::get('/login', [AuthController::class, 'show'])->name("login");
Route::get('/login/register', [AuthController::class, 'showRegister'])->name("login.registerShown");
Route::post('/login/store', [AuthController::class, 'login'])->name("store");
Route::post('/register', [AuthController::class, 'register'])->name("register");
Route::get('/logout', [AuthController::class, 'logout'])->name("logout");



Route::middleware("admin-auth")->group(function () {
    Route::get('/accounts', [AuthController::class, 'index'])->name('accounts.index');

    Route::get('/admin/dashboard', [AdminConttroller::class, 'show'])->name("admin.show");
    Route::get('/admin/parcels/all', [AdminConttroller::class, 'index'])->name("admin.index");
    Route::get('/admin/parcels/unshipped', [AdminConttroller::class, 'free_parcels'])->name("admin.free_parcels");
    Route::get('/admin/parcels/create', [AdminConttroller::class, 'create'])->name("parcel.create");
    Route::get('/admin/parcels/edit/{parcel}', [ColisController::class, 'edit'])->name("parcel.edit");
    Route::post('/admin/parcels/edit/{parcel}', [ColisController::class, 'update'])->name("parcel.update");
    Route::get('/admin/parcels/create/excel', [AdminConttroller::class, 'create_with_excel'])->name("parcel.create_with_excel");
    Route::get('/complaint/approving/{complaint}', [ComplaintController::class, 'approving'])->name("complaint.approving");
    Route::get('/complaint/disapproving/{complaint}', [ComplaintController::class, 'disapproving'])->name("complaint.disapproving");
    Route::post('/parcels/store', [ColisController::class, 'store'])->name("parcel.store");
    Route::get('/admin/parcels/colis_a_suivre', [ColisController::class, 'colisASuivre'])->name('admin.colis_a_suivre');
    Route::get('/admin/deliverymens', [DeliverymenController::class, 'index'])->name('deliverymens.index');
    Route::get('/admin/deliverymens/whatsapp/{id}', [DeliverymenController::class, 'openWhatsAppChat'])->name('deliverymens.whatsapp');
    Route::get('/deliverymen/send-message/{deliveryman}/{parcel}', [DeliverymenController::class, 'sendMessage'])->name('deliverymen.sendMessage');
    Route::get('/deliverymen/{id}/number', [DeliverymenController::class, 'getDeliverymanNumber']);


    // Show form to create a new deliveryman
    Route::get('/admin/deliverymens/create', [DeliverymenController::class, 'create'])->name('deliverymens.create');

    // Store a new deliveryman
    Route::post('/admin/deliverymens/store', [DeliverymenController::class, 'store'])->name('deliverymens.store');

    // Show form to edit a deliveryman
    Route::get('/admin/deliverymens/edit/{id}', [DeliverymenController::class, 'edit'])->name('deliverymens.edit');

    // Update a deliveryman
    Route::put('/admin/deliverymens/update/{id}', [DeliverymenController::class, 'update'])->name('deliverymens.update');

    // Delete a deliveryman
    Route::delete('/admin/deliverymens/destroy/{id}', [DeliverymenController::class, 'destroy'])->name('deliverymens.destroy');
    Route::resource('regions', RegionController::class);
    Route::get('/admin/settings', [SettingsController::class, 'show'])->name('settings.index');
    Route::get('/parcels/{code}', [ColisController::class, 'show'])->name('parcels.show');







});




// Delivery User Routes
Route::middleware("delivery-auth")->group(function () {
    Route::get('/delivery/home', [DeliveryController::class, 'show'])->name("delivery.show");
    Route::get('/delivery/parcels/delivred', [DeliveryController::class, "deliveredPrcels"])->name("parcels.delivred");
    Route::get('/delivery/parcels/delayed', [DeliveryController::class, "delayedPrcels"])->name("parcels.delayed");
    Route::get('/delivery/parcels/other', [DeliveryController::class, "otherPrcels"])->name("parcels.other");
    Route::get('/delivery/parcel/scan', [DeliveryController::class, "scan_parcel"])->name("parcel.scan");
    Route::get('/delivery/home', [DeliveryController::class, 'show'])->name("delivery.show");
    // Parcels
    Route::post('/coli/status/{id}', [ComplaintController::class, 'store'])->name("colis.status");
    Route::get('/parcels/show/{code}', [ColisController::class, 'show'])->name("parcels.show");


});
