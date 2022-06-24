<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RuanghomeController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/home/store', [HomeController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'count'])->name('dashboard');

// transaksi
Route::get('/transaksi', [TransaksiController::class, 'show'])->name('transaksi');
Route::get('/transaksi/{transaksi}/destroy', [TransaksiController::class, 'destroy']);

// user
Route::get('/userdetail', [UserController::class, 'show'])->name('userdetail');
Route::get('/userdetail/{user}/destroy', [UserController::class, 'destroy']);
Route::get('/edituser/{user}/edit', [UserController::class, 'edit']);
Route::post('/edituser/{user}/update', [UserController::class, 'update']);

// ruang
Route::get('/ruang', [RuanghomeController::class, 'show'])->name('ruang');
Route::get('/ruangdetail', [RuangController::class, 'show'])->name('ruangdetail');
Route::get('/ruangdetail/{ruang}/destroy', [RuangController::class, 'destroy']);
Route::post('/ruangdetail/store', [RuangController::class, 'store']);
Route::get('/editruang/{ruang}/edit', [RuangController::class, 'edit']);
Route::post('/editruang/{ruang}/update', [RuangController::class, 'update']);
