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
Route::post('/registerAPI', [AuthController::class, 'registerAPI']); // register
Route::post('/login', [AuthController::class, 'login']); // login
Route::post('/loginAPI', [AuthController::class, 'loginAPI']); // login

Route::get('/users', [UserController::class, 'getUser']);
Route::get('/beach', [BeachController::class, 'index']);
Route::get('/beach/{id}', [BeachController::class, 'show']);
Route::get('/beach/search/{beach}', [BeachController::class, 'search']);

Route::get('/get-data-beach', [BeachController::class, 'getData']);
Route::get('/beach/beach-detail/{id}', [BeachController::class, 'getbeachById']);
Route::post('/beach/update/{id}', [BeachController::class, 'update']);
Route::post('/beach/updateAPI', [BeachController::class, 'updateAPI']);

Route::post('/review-beach', [ReviewController::class, 'store']);
Route::post('/storeAPI', [ReviewController::class, 'storeAPI']);
// Route::get('/beach/beach-detail/{id}', [BeachController::class, 'getbeachById']);










Route::post('/beach', [BeachController::class, 'store']);
Route::post('/beachAPI', [BeachController::class, 'storeAPI']);
Route::post('/image', [BeachController::class, 'imageAPI']);
Route::get('/beach-favorite', [BeachController::class, 'favoriteBeach']);
Route::post('/beach/{id}', [BeachController::class, 'update']);
Route::post('/beach/delete/{id}', [BeachController::class, 'destroy'])->name('beach.destroy');
Route::post('/beach/deleteAPI/{id}', [BeachController::class, 'destroyAPI'])->name('beach.destroyAPI');

Route::delete('/logout', [AuthController::class, 'logout']);

Route::post('/favorite', [FavoriteController::class, 'store']);
Route::delete('/favorite/{id}', [FavoriteController::class, 'destroy']);
Route::post('/review', [ReviewController::class, 'store']);
Route::get('/review-beach/{beach_id}', [ReviewController::class, 'getReview']);

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


Route::get('/beach/detail/{beach_id}', [ReviewController::class, 'getBeachDetail']);
