<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MailController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PlatformController;
// use App\Http\Controllers\DokumentasiController;
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

Route::controller(TaskController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/task', 'index');
    Route::get('/dashboard/task/create', 'create')->name('task.create');
    Route::post('/dashboard/task', 'store')->name('task.store');
    Route::get('/dashboard/task/edit/{id}', 'edit')->name('task.edit');
    Route::post('/dashboard/task/update/{id}', 'update')->name('task.update');
    Route::post('/dashboard/task/delete/{id}', 'destroy')->name('task.delete');
});

Route::controller(HistoryController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/history', 'index');
    Route::get('/dashboard/history/show/{id}', 'show')->name('history.show');
    Route::get('/dashboard/history/create', 'create')->name('history.create');
    Route::post('/dashboard/history', 'store')->name('history.store');
    Route::get('/dashboard/history/edit/{id}', 'edit')->name('history.edit');
    Route::post('/dashboard/history/update/{id}', 'update')->name('history.update');
    Route::post('/dashboard/history/delete/{id}', 'destroy')->name('history.delete');
});

Route::controller(MailController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/mail', 'index');
    Route::get('/dashboard/mail/create', 'create')->name('mail.create');
    Route::post('/dashboard/mail', 'store')->name('mail.store');
    Route::get('/dashboard/mail/edit/{id}', 'edit')->name('mail.edit');
    Route::post('/dashboard/mail/update/{id}', 'update')->name('mail.update');
    Route::post('/dashboard/mail/delete/{id}', 'destroy')->name('mail.delete');
});

Route::controller(BusinessController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/bisnis', 'index');
    Route::get('/dashboard/bisnis/create', 'create')->name('bisnis.create');
    Route::post('/dashboard/bisnis', 'store')->name('bisnis.store');
    Route::get('/dashboard/bisnis/edit/{id}', 'edit')->name('bisnis.edit');
    Route::post('/dashboard/bisnis/update/{id}', 'update')->name('bisnis.update');
    Route::post('/dashboard/bisnis/delete/{id}', 'destroy')->name('bisnis.delete');
});

Route::controller(PlatformController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/platform', 'index');
    Route::get('/dashboard/platform/create', 'create')->name('platform.create');
    Route::post('/dashboard/platform', 'store')->name('platform.store');
    Route::get('/dashboard/platform/edit/{id}', 'edit')->name('platform.edit');
    Route::post('/dashboard/platform/update/{id}', 'update')->name('platform.update');
    Route::post('/dashboard/platform/delete/{id}', 'destroy')->name('platform.delete');
});

Route::controller(GroupServiceController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/gruplayanan', 'index');
    Route::get('/dashboard/gruplayanan/create', 'create')->name('gruplayanan.create');
    Route::post('/dashboard/gruplayanan', 'store')->name('gruplayanan.store');
    Route::get('/dashboard/gruplayanan/edit/{id}', 'edit')->name('gruplayanan.edit');
    Route::post('/dashboard/gruplayanan/update/{id}', 'update')->name('gruplayanan.update');
    Route::post('/dashboard/gruplayanan/delete/{id}', 'destroy')->name('gruplayanan.delete');
});

Route::controller(ServiceController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/layanan', 'index');
    Route::get('/dashboard/layanan/create', 'create')->name('layanan.create');
    Route::post('/dashboard/layanan', 'store')->name('layanan.store');
    Route::get('/dashboard/layanan/edit/{id}', 'edit')->name('layanan.edit');
    Route::post('/dashboard/layanan/update/{id}', 'update')->name('layanan.update');
    Route::post('/dashboard/layanan/delete/{id}', 'destroy')->name('layanan.delete');
});

Route::controller(StatusController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/status', 'index');
    Route::get('/dashboard/status/create', 'create')->name('status.create');
    Route::post('/dashboard/status', 'store')->name('status.store');
    Route::get('/dashboard/status/edit/{id}', 'edit')->name('status.edit');
    Route::post('/dashboard/status/update/{id}', 'update')->name('status.update');
    Route::post('/dashboard/status/delete/{id}', 'destroy')->name('status.delete');
});

Route::controller(DokumentasiController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/dokumentasi', 'index');
    Route::get('/dashboard/dokumentasi/create', 'create')->name('dokumentasi.create');
    Route::post('/dashboard/dokumentasi', 'store')->name('dokumentasi.store');
    Route::get('/dashboard/dokumentasi/edit/{id}', 'edit')->name('dokumentasi.edit');
    Route::post('/dashboard/dokumentasi/update/{id}', 'update')->name('dokumentasi.update');
    Route::post('/dashboard/dokumentasi/delete/{id}', 'destroy')->name('dokumentasi.delete');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard/user', 'index');
    Route::get('/dashboard/user/create', 'create')->name('user.create');
    Route::post('/dashboard/user', 'store')->name('user.store');
    Route::get('/dashboard/user/edit/{id}', 'edit')->name('user.edit');
    Route::post('/dashboard/user/update/{id}', 'update')->name('user.update');
    Route::post('/dashboard/user/delete/{id}', 'destroy')->name('user.delete');
});