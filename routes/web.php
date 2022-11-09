<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, EventController};

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
    return view('index');
});

//auth
Route::controller(AuthController::class)->group(function() {
    Route::middleware('guest')->group(function (){
        Route::get('/login', 'viewLogin');
        Route::post('/login', 'login');
        Route::get('/register', 'viewRegister');
        Route::post('/register', 'register');
    });
    Route::get('/auth/check', 'authCheck');
    Route::get('/logout', 'logout')->middleware('auth');
    Route::get('profile/get', 'getProfile');
});

Route::get('event/get', [EventController::class, 'getEvent']);
Route::get('events/get', [EventController::class, 'getEvents'])->middleware('auth');
Route::post('event/add', [EventController::class, 'addEvent']);



Route::any('/{slug1}', function () {
    return view('index');
});
Route::any('/{slug1}/{slug2}/', function () {
    return view('index');
});
