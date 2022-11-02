<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPropertiController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAboutUsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AdminTeamController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', HomeController::class);
Route::resource('about',AboutController::class);
Route::get('/login',[LoginController::class,'login']);
Route::post('/postlogin',[LoginController::class,'postLogin']);

 
Route::group(['middleware' => ['authcheck']],function () {
    Route::get('/logout',[LoginController::class,'logout']);
    Route::resource('/admin-dashboard' , AdminDashboardController::class);
    Route::resource('/admin-properti', AdminPropertiController::class);
    Route::resource('/admin-kategori', AdminKategoriController::class);
    Route::resource('/admin-slider', SliderController::class);
    Route::resource('/admin-about', AdminAboutUsController::class);
    Route::resource('/admin-team', AdminTeamController::class);
});