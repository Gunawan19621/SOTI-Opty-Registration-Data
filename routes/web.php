<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;

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

// Route::get('/login', function () {
//     return view('login');
// });
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth', 'auth.check'])->group(function () {
    Route::get('/data-pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
});

// Route::get('/data-pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::get('/data-pendaftaran/export', [PendaftaranController::class, 'export'])->name('pendaftaran.export');
Route::get('/', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
