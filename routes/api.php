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

// route tabel survei
Route::get('/survei/{respondenId}', [SurveiApiController::class, 'listSurvei']);
Route::get('/survei', [SurveiApiController::class, 'survei']);
Route::get('/hasil', [SurveiApiController::class, 'hasil']);

// menampilkan pertanyaan api
Route::get('/pertanyaan/{id_survei}', [SurveiApiController::class, 'pertanyaanBySurvei']);

Route::post('/surveiTerjawab', [SurveiApiController::class, 'surveiTerjawab']);
Route::post('/hasilSurvei', [SurveiApiController::class, 'hasilSurvei']);


// route register API
Route::post('/register', [SurveiApiController::class, 'register']);
// route login API
Route::post('/login', [SurveiApiController::class, 'login']);

Route::post('/test/{respondenId}', [SurveiApiController::class, 'surveiBelumDijawab']);
// history api
Route::get('/riwayat/{respondenId}', [SurveiApiController::class, 'riwayatSurvei']);
