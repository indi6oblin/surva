<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginRespondenController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\AdminController;



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


// ----------------------------- home dashboard ------------------------------//
Route::get('/', [LandingController::class, 'index'])->name('landing.index');


// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);

Route::get('/loginadmin', [App\Http\Controllers\Auth\LoginAdminController::class, 'login_admin'])->name('login_admin');
Route::post('/loginadmin', [App\Http\Controllers\Auth\LoginAdminController::class, 'authenticate']);

Route::get('/login_responden',[LoginRespondenController::class, 'showLoginResponden'])->name('login_responden');
Route::post('/login_responden', [LoginRespondenController::class, 'login_responden'])->name('login_responden_post');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser']);

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- home dashboard ------------------------------//
// Route::get('/dashboard1', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard_klien', [App\Http\Controllers\KlienController::class, 'index'])->name('home_klien');
Route::get('/dashboard_admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home_admin');
Route::get('/dashboard_responden', [App\Http\Controllers\RespondenController::class, 'index'])->name('home_responden');

Route::get('/buatsurvei', [App\Http\Controllers\SurveiController::class, 'create'])->name('buat_survei');
Route::post('/simpansurvei', [App\Http\Controllers\SurveiController::class, 'store'])->name('simpan_survei');

Route::get('/buatsurvei2', [App\Http\Controllers\SurveiController::class, 'create2'])->name('buat_survei2');
Route::post('/simpansurvei2', [App\Http\Controllers\SurveiController::class, 'store2'])->name('simpan_survei2');

Route::get('/editprofil', [App\Http\Controllers\KlienController::class, 'edit'])->name('editprofil');
Route::post('/simpan_datadiri/{id_klien}', [App\Http\Controllers\KlienController::class, 'update'])->name('simpan_datadiri');
Route::post('/simpan_password/{id_klien}', [App\Http\Controllers\KlienController::class, 'updatePassword'])->name('simpan_password');

Route::get('/detail_survei', [App\Http\Controllers\SurveiController::class, 'index'])->name('detail_survei');
Route::get('/detail_survei/{id_survei}', [App\Http\Controllers\SurveiController::class, 'show_detail'])->name('detail_survei2');

Route::get('/pembayaran', [App\Http\Controllers\SurveiController::class, 'index_pembayaran'])->name('daftar_pembayaran');
Route::get('/pembayaran/{id_survei}', [App\Http\Controllers\KlienController::class, 'pembayaran'])->name('pembayaran');
Route::post('/simpan_pembayaran', [App\Http\Controllers\SurveiController::class, 'store_pembayaran'])->name('simpan_pembayaran');

Route::get('/verifikasi', [App\Http\Controllers\SurveiController::class, 'index_verifikasi'])->name('verifikasi');

// ----------------------------- menu sidebar admin ------------------------------//
Route::get('/sortir_admin', [App\Http\Controllers\AdminController::class, 'sortir_admin'])->name('sortir_admin');
Route::get('/detail_survei_sortir/{id_survei}', [App\Http\Controllers\AdminController::class, 'detail_survei_sortir'])->name('detail_survei_sortir');

Route::post('/setuju/{id_survei}', [App\Http\Controllers\SurveiController::class, 'validasi_setuju'])->name('setuju');
Route::post('/tolak/{id_survei}', [App\Http\Controllers\SurveiController::class, 'validasi_tolak'])->name('tolak');
Route::post('/terima_bayar/{id_survei}', [App\Http\Controllers\SurveiController::class, 'terima_bayar'])->name('terima_bayar');
Route::post('/tolak_bayar/{id_survei}', [App\Http\Controllers\SurveiController::class, 'tolak_bayar'])->name('tolak_bayar');

Route::get('/detail_survei_home/{id_survei}', [App\Http\Controllers\AdminController::class, 'detail_survei_home'])->name('detail_survei_home');
Route::get('/sudah_bayar', [App\Http\Controllers\AdminController::class, 'sudah_bayar'])->name('sudah_bayar');
Route::get('/detail_sudah_bayar/{id_survei}', [App\Http\Controllers\AdminController::class, 'detail_sudah_bayar'])->name('detail_sudah_bayar');
Route::get('/disetujui', [App\Http\Controllers\AdminController::class, 'disetujui'])->name('disetujui');
Route::get('/detail_disetujui/{id_survei}', [App\Http\Controllers\AdminController::class, 'detail_disetujui'])->name('detail_disetujui');
Route::get('/dibatalkan', [App\Http\Controllers\AdminController::class, 'dibatalkan'])->name('dibatalkan');
Route::get('/detail_dibatalkan/{id_survei}', [App\Http\Controllers\AdminController::class, 'detail_dibatalkan'])->name('detail_dibatalkan');

Route::get('/kelola_klien', [App\Http\Controllers\AdminController::class, 'kelola_klien'])->name('kelola_klien');
Route::delete('/hapus_klien/{id_klien}', [App\Http\Controllers\AdminController::class, 'hapus_klien'])->name('hapus_klien');
Route::get('/kelola_responden', [App\Http\Controllers\AdminController::class, 'kelola_responden'])->name('kelola_responden');
Route::delete('/hapus_responden/{id_responden}', [App\Http\Controllers\AdminController::class, 'hapus_responden'])->name('hapus_responden');

// Route for logging out
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/logoutadmin', [App\Http\Controllers\Auth\LoginAdminController::class, 'logout'])->name('logout_admin');
Route::post('/logout_responden', [LoginRespondenController::class, 'logout'])->name('logout_responden');


// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagementController::class, 'profile'])->name('profile_user');
Route::post('profile_user/store', [App\Http\Controllers\UserManagementController::class, 'profileStore'])->name('profile_user/store');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');
Route::get('user/add/new', [App\Http\Controllers\UserManagementController::class, 'addNewUser'])->middleware('auth')->name('user/add/new');
Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');
Route::get('view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetail'])->middleware('auth');
Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
Route::get('delete_user/{id}', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth');

Route::get('/change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])
    ->middleware('auth')
    ->name('change/password');

Route::post('/change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])
    ->name('change/password/db');
