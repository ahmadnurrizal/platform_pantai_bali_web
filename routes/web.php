<?php

use App\Http\Controllers\BeachController;
use Illuminate\Support\Facades\Route;

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

Route::get('/explore/fetch_data', [BeachController::class, 'fetch_data']);
Route::get('/explore', [BeachController::class, 'index']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

// Route::get('/beach-detail', function () {
//     return view('beach-detail');
// });
Route::get('/beach-detail/{id}', [BeachController::class, 'show']);
