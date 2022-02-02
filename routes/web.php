<?php

use App\Http\Controllers\DeviceChargeController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\InstrumentCategoryController;
use App\Http\Controllers\InstrumentController;
use App\Models\DeviceCharge;
use App\Models\Instrument;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/search', [DeviceChargeController::class, 'search'])->name('search_index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/charge/{deviceCharge:id}', [DeviceChargeController::class, 'show'])->name('charge_show_id');
Route::get('/charge/barcode/{deviceCharge:barcode}', [DeviceChargeController::class, 'show']);



Route::middleware(['auth'])->group(function() {
    Route::resource('instrument-category', InstrumentCategoryController::class);
    Route::resource('instrument', InstrumentController::class);
    Route::get('/device/{device}', [DeviceController::class, 'show'])->name('device');
    Route::post('/charge/create', [DeviceChargeController::class, 'store'])->name('charge_store');
    Route::get('/charge', [DeviceChargeController::class, 'index'])->name('all_charges');
});
