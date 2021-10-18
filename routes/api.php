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
Route::resource('user','App\Http\Controllers\Api\UserController');
Route::get('produklapak/{userid}','App\Http\Controllers\Api\ProdukController@produklapak');

// api penduduk
Route::get('penduduk/{id}','App\Http\Controllers\Api\PendudukController@userid');