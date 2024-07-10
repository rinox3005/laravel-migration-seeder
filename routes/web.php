<?php

use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\TrainsController;
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

Route::get('/', [HomeController::class, 'index'])->name('trains');
Route::get('/trains', [TrainsController::class, 'index'])->name('trains');
Route::get('/train/{id}', [TrainsController::class, 'show'])->name('train-details');
