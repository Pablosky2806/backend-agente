<?php

use App\Models\JobOffer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $jobOffers = JobOffer::orderBy('created_at', 'desc')->get();
    return view('jobs.index', compact('jobOffers'));
});
