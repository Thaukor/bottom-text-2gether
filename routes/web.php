<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserScheduleController;

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
});

//Route::get('/profile', [UserScheduleController::class, 'index'])->name('profile');

Route::resource('/profile', UserScheduleController::class)->only(['index'])->missing(function (Request $request) {
    return Redirect::route('profile.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
