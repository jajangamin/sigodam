<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
    return view('welcome');
});

Route::get('/dashboard', function(){
    // endpoint API
    $perda = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perda_count');
    $perbup = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perbup_count');
    $perda_year = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perda_by_tahun');
    $perbup_year = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perbup_by_tahun');
    // json_decode
    $perda = json_decode($perda);
    $perbup = json_decode($perbup);

    return view('dashboard', [
        'total_perda' => $perda,
        'total_perbup' => $perbup
    ]);
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
