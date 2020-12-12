<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliceStationController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CriminalController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\userController;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;

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
    Route::get('/delete/{id}', [CriminalController::class, 'destroy'])->name('delete');
    

});

//Coplain is create the group
Route::prefix('complain')->name('complain.')->group(function () {

    Route::get('/index', [ComplainController::class, 'index'])->name('index');
 
});

//Users is create the group
Route::prefix('users')->name('users.')->group(function () {

    Route::get('/index', [userController::class, 'index'])->name('index');
    Route::get('/create', [userController::class, 'create'])->name('create');
    Route::post('/store', [userController::class, 'store'])->name('store');
 
});

Auth::routes(['register' => false]);


Route::group(['middleware' => 'admin', 'middleware' => 'auth',], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
});

