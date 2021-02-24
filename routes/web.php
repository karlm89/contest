<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContestEntryController;

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

Route::get('/', function () {
    return view('index.index');
});

Route::post('/contest', [ ContestEntryController::class, 'store' ]);

require __DIR__.'/auth.php';
