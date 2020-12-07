<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliceStationController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CriminalController;

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
    Route::get('/getdata/{id}', [PoliceStationController::class, 'edit'])->name('edit');
    Route::post('/dataUpdate/{id}', [PoliceStationController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [PoliceStationController::class, 'destroy'])->name('delete');
});

//station is creating the group
Route::prefix('district')->name('district.')->group(function () {

    Route::get('/showAll', [DistrictController::class, 'index'])->name('index');
    Route::get('/district', [DistrictController::class, 'create'])->name('create');
    Route::post('/district', [DistrictController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [DistrictController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [DistrictController::class, 'destroy'])->name('delete');
    
});

//criminals is create the group
Route::prefix('criminals')->name('criminals.')->group(function () {

    Route::get('/index', [CriminalController::class, 'index'])->name('index');
    Route::get('/create', [CriminalController::class, 'create'])->name('create');
    Route::post('/store', [CriminalController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CriminalController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [CriminalController::class, 'update'])->name('update');
    

});





