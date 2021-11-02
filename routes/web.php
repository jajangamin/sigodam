<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/simpeg',[PegawaiController::class,'index'])->middleware('auth');
Route::get('/dashboard/jdih',[DashboardController::class,'jdih'])->middleware('auth');
Route::get('/dashboard/pikocis',[DashboardController::class,'pikcovid'])->middleware('auth') ;
Route::get('/dashboard/prokes',[DashboardController::class,'prokes'])->middleware('auth') ;

Route::get('/pegawai',[PegawaiController::class,'index'] );

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
