<?php

use App\Http\Controllers\ContestEntryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/contest', [ContestEntryController::class, 'store'])->name('store_contest');

require __DIR__.'/auth.php';
