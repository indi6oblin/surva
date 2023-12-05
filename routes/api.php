<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveiApiController;

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

Route::get('/survei', [SurveiApiController::class, 'index']);
// route register API
Route::post('/register', [SurveiApiController::class, 'register']);
// route login API
Route::post('/login', [SurveiApiController::class, 'login']);
