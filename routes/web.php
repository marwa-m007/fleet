<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StationsController;
use App\Http\Controllers\VehiclesController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('tickets');

Route::get('/stations', [StationsController::class,'index'])->middleware(['auth', 'verified'])->name('stations');

Route::get('/vehicles', [VehiclesController::class,'index'])->middleware(['auth', 'verified'])->name('vehicles');

Route::get('/addbus', [VehiclesController::class,'add'])->middleware(['auth', 'verified'])->name('addbus');

Route::post('/storebus', [VehiclesController::class,'store'])->middleware(['auth', 'verified'])->name('storebus');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
