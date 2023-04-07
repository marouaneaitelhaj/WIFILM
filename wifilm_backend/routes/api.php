<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\adminsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\genres_moviesController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\reviewsController;
use App\Models\actors;
use App\Models\admins;
use App\Models\genres;

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

Route::post('register', [authController::class, 'store']);
Route::post('login', [authController::class, 'login']);
Route::post('AdminLogin', [adminsController::class, 'login']);



// Route::middleware('auth')->group(
//     function () {

    Route::apiResource('movies', MoviesController::class);
Route::middleware('auth:sanctum')->group(
    function () {
        Route::get('user', [authController::class, 'index']);
        Route::apiResource('actors', ActorsController::class);
        Route::apiResource('reviews', reviewsController::class);
        Route::apiResource('genres', GenreController::class);
        Route::apiResource('genresmovies', genres_moviesController::class);
        Route::get('searshofgenres/{text}', [GenreController::class, 'searshofgenres']);
        Route::post('check', [reviewsController::class, 'check']);
    }
);
