<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeachController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//  PUBLIC ROUTE
Route::post('/register', [AuthController::class, 'register']); // register
Route::post('/login', [AuthController::class, 'login']); // login

Route::get('/users', [UserController::class, 'index']);
Route::get('/beach', [BeachController::class, 'index']);
Route::get('/beach/{id}', [BeachController::class, 'show']);
Route::get('/beach/search/{beach}', [BeachController::class, 'search']);

Route::get('/beach/get-data', [BeachController::class, 'getData']);
Route::get('/beach/beach-detail/{id}', [BeachController::class, 'getbeachById']);

Route::post('/beach', [BeachController::class, 'store']);
Route::get('/beach-favorite', [BeachController::class, 'favoriteBeach']);
Route::post('/beach/{id}', [BeachController::class, 'update']);
Route::delete('/beach/delete/{id}', [BeachController::class, 'destroy']);

Route::delete('/logout', [AuthController::class, 'logout']);

Route::post('/favorite', [FavoriteController::class, 'store']);
Route::delete('/favorite/{id}', [FavoriteController::class, 'destroy']);
Route::post('/review', [ReviewController::class, 'store']);

//  PROTECTED ROUTE
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::post('/beach', [BeachController::class, 'store']);
    // Route::get('/beach-favorite', [BeachController::class, 'favoriteBeach']);
    // Route::post('/beach/{id}', [BeachController::class, 'update']);
    // Route::delete('/beach/{id}', [BeachController::class, 'destroy']);

    // Route::delete('/logout', [AuthController::class, 'logout']);

    // Route::post('/favorite', [FavoriteController::class, 'store']);
    // Route::delete('/favorite/{id}', [FavoriteController::class, 'destroy']);
    // Route::post('/review', [ReviewController::class, 'store']);
});
