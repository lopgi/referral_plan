<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PurchaseController;

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
    return view('welcome');
});
    Route::post('postlogin',[Controller::class,'postlogin'])->name('postlogin');

    Route::middleware('auth')->group(function() {
    Route::get('/referral/dashboard', [Controller::class, 'index'])->name('referral.dashboard');
    // Route::get('/referral/dashboard', [ReferralController::class, 'dashboard'])->name('referral.dashboard');

    // Route::post('/purchase', [ReferralController::class, 'purchase'])->name('purchase');
});
    Route::get('/logout',[Controller::class,'logout'])->name('logout');
    Route::get('/register',action: [Controller::class,'register'])->name('register');
    Route::post('/postregister',action: [Controller::class,'postregister'])->name('postregister');
    Route::post('/purchase', [PurchaseController::class, 'purchase'])->name('purchase');
    Route::get('/dashboard', [Controller::class, 'index'])->name('dashboard');
