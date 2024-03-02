<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

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

// Auth Routes
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [LoginController::class, 'login']); // Login route
    Route::post('register', [RegisterController::class, 'register']); // Register route
});

// Genres Routes
Route::group(['prefix' => 'genres'], function () {
    Route::get('', [GenreController::class, "index"]); // Get All
    Route::post('', [GenreController::class, "store"]); // Add New
});

// Movies Routes
Route::group(['prefix' => 'movies'], function () {
    Route::get('', [MovieController::class, "index"]); // Get All
    Route::post('', [MovieController::class, "store"]); // Add New
});

// Ratings Routes
Route::group(['prefix' => 'ratings'], function () {
    Route::get('', [RatingController::class, "index"]); // Get All
    Route::post('', [RatingController::class, "store"]); // Add New
});
