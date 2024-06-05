<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IntermediaryController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::post('/calculateQuarterlyVAT', [DashboardController::class, 'calculateQuarterlyVAT'])
    ->middleware(['auth', 'verified'])
    ->name('calculateQuarterlyVAT');
// Todo lo que haya dentro de este grupo, requerirá autenticacion para poder acceder
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('intermediaries', IntermediaryController::class);
    Route::resource('apartments', ApartmentController::class);
    Route::resource('rates', RateController::class);
    Route::resource('incomes', IncomeController::class);
    Route::resource('expenses', ExpenseController::class);

    Route::get('/get-rates/{apartment_id}', [IncomeController::class, 'getRatesForApartment']);
});

require __DIR__.'/auth.php';