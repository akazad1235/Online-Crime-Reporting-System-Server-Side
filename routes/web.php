<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliceStationController;

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
    return view('dashboard');
});

// Route::get('/station', [PoliceStationController::class, 'index']);

// Route::post('/station', [PoliceStationController::class, 'store']);


//station is creating the group
Route::prefix('policeStation')->name('station.')->group(function () {

    Route::get('/station', [PoliceStationController::class, 'index'])->name('index');
    Route::get('/getform', [PoliceStationController::class, 'create'])->name('create');
    Route::post('/station', [PoliceStationController::class, 'store'])->name('store');
    
});




