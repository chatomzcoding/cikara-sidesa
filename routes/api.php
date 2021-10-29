<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api produk
Route::resource('produk','App\Http\Controllers\Api\ProdukController');
Route::resource('lapak','App\Http\Controllers\Api\LapakController');
Route::resource('forum','App\Http\Controllers\Api\ForumController');
Route::get('chatforum/{id}','App\Http\Controllers\Api\ForumController@chatforum');
Route::resource('lapor','App\Http\Controllers\Api\LaporController');
Route::get('lapor/user/{id}','App\Http\Controllers\Api\LaporController@listbyuser');
Route::resource('user','App\Http\Controllers\Api\UserController');
Route::get('produklapak/{userid}','App\Http\Controllers\Api\ProdukController@produklapak');

// api penduduk
Route::get('penduduk/{id}','App\Http\Controllers\Api\PendudukController@userid');

// mobile api
Route::get('lapakuser/{userid}','App\Http\Controllers\Api\MobileController@lapakByUser');
Route::get('listuser','App\Http\Controllers\Api\MobileController@listuser');
Route::get('listartikel','App\Http\Controllers\Api\MobileController@listartikel');
Route::get('kategori/{sesi}','App\Http\Controllers\Api\MobileController@kategori');
// surat
Route::get('listklasifikasisurat','App\Http\Controllers\Api\SuratController@listklasifikasisurat');
Route::get('listformatsurat','App\Http\Controllers\Api\SuratController@listformatsurat');
Route::get('formatsuratbykode/{kode}','App\Http\Controllers\Api\SuratController@formatsuratbykode');
Route::get('listsuratbyuser/{user}','App\Http\Controllers\Api\SuratController@listsuratbyuser');

// dashboard user
Route::get('dashboarduser/{sesi}/{user}','App\Http\Controllers\Api\MobileController@dashboarduser');
