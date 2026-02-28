<?php

use App\Http\Controllers\Web\JobOfferController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobOfferController::class, 'index'])->name('home');
Route::post('/fetch-offers', [JobOfferController::class, 'fetchOffers']);
Route::delete('/job-offers/{id}', [JobOfferController::class, 'destroy']);
