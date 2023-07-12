<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\MessageController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/apartments/home', [ApartmentController::class, 'home']);
Route::get('/apartments', [ApartmentController::class, 'index']);
Route::get('/apartment/{slug}', [ApartmentController::class, 'show']);
Route::post('/apartment/{slug}/messages', [ApartmentController::class, 'storeMessage']);
Route::post('/apartment/{slug}/views', [ApartmentController::class, 'storeView']);
