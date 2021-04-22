<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
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
Route::resource('reviews', ReviewController::class);

// Route::get('addreview', 'ReviewController@create')->name('addreview');
// Route::get('addreview', 'App\Http\Controllers\ReviewController@create')->name('addreview');

Route::get('/addreview', function () {
    return view('create');
})->name('addreview');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
