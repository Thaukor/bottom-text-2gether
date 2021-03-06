<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ChatController;
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

Route::permanentRedirect('/', '/home');
// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/profile', [UserScheduleController::class, 'index'])->name('profile');
Route::resource('match', MatchController::class)->only(['show', 'store', 'destroy'])->middleware('auth');

Route::resource('/profile', UserController::class)->only(['index', 'show'])->middleware('auth');

Route::resource('schedule', UserScheduleController::class)->only(['index', 'store', 'destroy'])->missing(function (Request $request) {
    return Redirect::route('home');
})->middleware('auth');

Route::resource('chat', ChatController::class)->only(['store', 'show'])->middleware('auth');

Route::get('/location/{name}', [UserScheduleController::class, 'get_location']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
