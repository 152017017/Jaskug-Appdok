<?php

use App\Models\Service;
// use App\Http\Controllers\MailController;
// use App\Http\Controllers\DokumentasiController;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\DokumentasiController;
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

// Route::get('/', function () {
//     return view('welcome', [
//         'title' => 'Homepage'
//     ]);
// });

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::controller(OverviewController::class)->prefix('dashboard/overview')->middleware(['role:admin|operator|user-bisnis|user-qa'])->group(function () {
    Route::get('/', 'index');
});

Route::controller(TaskController::class)->prefix('dashboard/task')->middleware(['role:admin|operator|user-bisnis|user-qa'])->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create')->name('task.create');
    Route::post('/', 'store')->name('task.store');
    Route::get('/edit/{id}', 'edit')->name('task.edit');
    Route::post('/update/{id}', 'update')->name('task.update');
    Route::post('/delete/{id}', 'destroy')->name('task.delete');
});

Route::controller(HistoryController::class)->prefix('dashboard/history')->middleware(['role:admin|operator|user-bisnis|user-qa'])->group(function () {
    Route::get('/', 'index');
    Route::get('/show/{id}', 'show')->name('history.show');
    Route::get('/create', 'create')->name('history.create');
    Route::post('/', 'store')->name('history.store');
    Route::get('/edit/{id}', 'edit')->name('history.edit');
    Route::post('/update/{id}', 'update')->name('history.update');
    Route::post('/delete/{id}', 'destroy')->name('history.delete');
});

// Route::controller(MailController::class)->middleware(['auth'])->group(function () {
//     Route::get('/dashboard/mail', 'index');
//     Route::get('/dashboard/mail/create', 'create')->name('mail.create');
//     Route::post('/dashboard/mail', 'store')->name('mail.store');
//     Route::get('/dashboard/mail/edit/{id}', 'edit')->name('mail.edit');
//     Route::post('/dashboard/mail/update/{id}', 'update')->name('mail.update');
//     Route::post('/dashboard/mail/delete/{id}', 'destroy')->name('mail.delete');
// });

Route::controller(BusinessController::class)->prefix('dashboard/bisnis')->middleware('role:admin|operator')->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create')->name('bisnis.create');
    Route::post('/', 'store')->name('bisnis.store');
    Route::get('/edit/{id}', 'edit')->name('bisnis.edit');
    Route::post('/update/{id}', 'update')->name('bisnis.update');
    Route::post('/delete/{id}', 'destroy')->name('bisnis.delete');
});

Route::controller(PlatformController::class)->prefix('dashboard/platform')->middleware('role:admin|operator')->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create')->name('platform.create');
    Route::post('/', 'store')->name('platform.store');
    Route::get('/edit/{id}', 'edit')->name('platform.edit');
    Route::post('/update/{id}', 'update')->name('platform.update');
    Route::post('/delete/{id}', 'destroy')->name('platform.delete');
});

Route::controller(GroupServiceController::class)->prefix('dashboard/gruplayanan')->middleware('role:admin|operator')->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create')->name('gruplayanan.create');
    Route::post('/', 'store')->name('gruplayanan.store');
    Route::get('/edit/{id}', 'edit')->name('gruplayanan.edit');
    Route::post('/update/{id}', 'update')->name('gruplayanan.update');
    Route::post('/delete/{id}', 'destroy')->name('gruplayanan.delete');

    Route::get('/groupservice', 'select')->name('groupservice.select');
});

Route::controller(ServiceController::class)->prefix('dashboard/layanan')->middleware('role:admin|operator')->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create')->name('layanan.create');
    Route::post('/', 'store')->name('layanan.store');
    Route::get('/edit/{id}', 'edit')->name('layanan.edit');
    Route::post('/update/{id}', 'update')->name('layanan.update');
    Route::post('/delete/{id}', 'destroy')->name('layanan.delete');

    Route::get('/service', 'select')->name('service.select');
});

Route::controller(StatusController::class)->prefix('dashboard/status')->middleware('role:admin|operator')->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create')->name('status.create');
    Route::post('/', 'store')->name('status.store');
    Route::get('/edit/{encrypt}', 'edit')->name('status.edit');
    Route::post('/update/{encrypt}', 'update')->name('status.update');
    Route::post('/delete/{encrypt}', 'destroy')->name('status.delete');
});

// Route::controller(DokumentasiController::class)->middleware('role:admin|operator')->group(function () {
//     Route::get('/dashboard/dokumentasi', 'index');
//     Route::get('/dashboard/dokumentasi/create', 'create')->name('dokumentasi.create');
//     Route::post('/dashboard/dokumentasi', 'store')->name('dokumentasi.store');
//     Route::get('/dashboard/dokumentasi/edit/{id}', 'edit')->name('dokumentasi.edit');
//     Route::post('/dashboard/dokumentasi/update/{id}', 'update')->name('dokumentasi.update');
//     Route::post('/dashboard/dokumentasi/delete/{id}', 'destroy')->name('dokumentasi.delete');
// });

Route::controller(UserController::class)->prefix('dashboard/user')->middleware('role:admin')->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create')->name('user.create');
    Route::post('/', 'store')->name('user.store');
    Route::get('/edit/{id}', 'edit')->name('user.edit');
    Route::post('/update/{id}', 'update')->name('user.update');
    Route::post('/delete/{id}', 'destroy')->name('user.delete');
});

// Cascading Dropdown
Route::get('getService/{id}', function ($id) {
    $service = App\Models\Service::where('gruplayanan_id', $id)->get();
    return response()->json($service);
});

