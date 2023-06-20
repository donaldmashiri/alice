<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reports', [App\Http\Controllers\HomeController::class, 'reports'])->name('reports');
Route::get('/records', [App\Http\Controllers\HomeController::class, 'records'])->name('records');
Route::get('/all_reports', [App\Http\Controllers\HomeController::class, 'all_reports'])->name('all_records');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::resource('loans', \App\Http\Controllers\LoanController::class);
Route::resource('online', \App\Http\Controllers\OnlinePaymentController::class);
