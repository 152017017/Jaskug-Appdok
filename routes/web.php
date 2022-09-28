<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\GroupServiceController;

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
    return view('welcome', [
        'title' => 'Homepage'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
    
    })->middleware('auth');

Route::controller(BusinessController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/bisnis', 'index');
    Route::get('/dashboard/bisnis/create', 'create')->name('bisnis.create');
    Route::post('/dashboard/bisnis', 'store')->name('bisnis.store');
    Route::get('/dashboard/bisnis/{id}/edit', 'edit')->name('bisnis.edit');
    Route::post('/dashboard/bisnis', 'update')->name('bisnis.update');
    Route::post('/dashboard/bisnis/{id}/delete', 'destroy')->name('bisnis.delete');
});

// Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){
//     Route::resource('bisnis', BusinessController::class);
// });

// Route::resource('/dashboard/bisnis', BusinessController::class)->middleware('auth');

Route::resource('/dashboard/platform', PlatformController::class)->middleware('auth');

Route::resource('/dashboard/gruplayanan', GroupServiceController::class)->middleware('auth');

Route::resource('/dashboard/layanan', ServiceController::class)->middleware('auth');

Route::resource('/dashboard/status', StatusController::class)->middleware('auth');

Route::resource('/dashboard/dokumentasi', DokumentasiController::class)->middleware('auth');