<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuangController;

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

// Route::get('/edit', function () {
//     return view('admin.edituser');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'count'])->name('dashboard');
Route::get('/userdetail', [App\Http\Controllers\UserController::class, 'show'])->name('userdetail');
Route::get('/userdetail/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy']);
Route::get('/ruangdetail', [App\Http\Controllers\RuangController::class, 'show'])->name('ruangdetail');
Route::get('/ruangdetail/{ruang}/destroy', [App\Http\Controllers\RuangController::class, 'destroy']);
Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'show'])->name('transaksi');
Route::get('/transaksi/{transaksi}/destroy', [App\Http\Controllers\TransaksiController::class, 'destroy']);
Route::get('/edituser/{user}/edit', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/edituser/{user}/update', [App\Http\Controllers\UserController::class, 'update']);

Route::post('/ruangdetail/store', [RuangController::class, 'store']);
