<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContestEntryController;

Route::get('/', function () {
    return view('index.index');
});

Route::post('/contest', [ ContestEntryController::class, 'store' ]);