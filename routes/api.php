<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{EventController, AuthController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('events', [EventController::class, 'getEvents']);
Route::get('event/add', [EventController::class, 'addEvent']);
Route::get('events/{id}', [EventController::class, 'getDetails']);
Route::get('event/delete/{id}', [EventController::class, 'delEvent']);
Route::post('event/add/{id}', [EventController::class, 'addImage']);

Route::post('event/progress/{id}', [EventController::class, 'updateProgress']);
Route::post('event/note/{id}', [EventController::class, 'addNote']);

Route::post('profile/{id}', [AuthController::class, 'editProfile']);
