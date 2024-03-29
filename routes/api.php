<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    EventsController,
    LoginController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('/events', EventsController::class);
    //subrecursos
    Route::get('/events/{event}/guests', function () {
        return view('welcome');
    });
    Route::get('/events/{event}/guests/{guest}', function () {
        return view('welcome');
    });
    
});

Route::post('login', [LoginController::class, 'login']);