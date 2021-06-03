<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\IndexController; 
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\AdController; 
use App\Http\Controllers\AdsController; 

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
    return view('welcome');
})->name('welcome');


Route::resource('user', UserController::class); 

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    
    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile', [ProfileController::class, 'delete'])->name('profile.delete');

});


/* Routes pour les annonces */
Route::resource('ad', AdController::class); 
Route::resource('ads', AdsController::class); 
Route::get('/search', [AdsController::class, 'search'])->name('search');

require __DIR__.'/auth.php';
