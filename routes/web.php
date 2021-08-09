<?php

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;

Route::resource('services', ServiceController::class)->except('show');

Route::get('/', [HomeController::class, 'index']);

use App\Http\Controllers\UserController;
Route::get('users', [UserController::class, 'index']);

Route::post('users', [UserController::class, 'store'])->name('users.store');

Route::post('services', [ServiceController::class, 'store'])->name('services.store');

Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');

Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
