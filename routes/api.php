<?php

use App\Http\Controllers\Api\JobOfferController;
use Illuminate\Support\Facades\Route;

Route::apiResource('job-offers', JobOfferController::class);
