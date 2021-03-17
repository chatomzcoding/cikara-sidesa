<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Example; 
use App\Http\Livewire\Members; //Load class Members 
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

// PENGUJIAN
Route::get('/pengujian','App\Http\Controllers\Cikara\PengujianController@index');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// PERCOBAAN LIVEWIRE
Route::get('/example',[Example::class, 'render'])->name('example');
// Route::get('member', Members::class)->name('member'); //Tambahkan routing ini

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('member', Members::class)->name('member'); //Tambahkan routing ini
    Route::resource('profil', 'App\Http\Controllers\Admin\ProfilController');
    
    // KEPENDUDUKAN
    Route::resource('penduduk', 'App\Http\Controllers\Sidesa\PendudukController');
    Route::resource('keluarga', 'App\Http\Controllers\Sidesa\KeluargaController');
    Route::resource('anggotakeluarga', 'App\Http\Controllers\Sidesa\AnggotakeluargaController');
    Route::resource('rumahtangga', 'App\Http\Controllers\Sidesa\RumahtanggaController');
    Route::resource('anggotarumahtangga', 'App\Http\Controllers\Sidesa\AnggotarumahtanggaController');
    Route::resource('kategorikelompok', 'App\Http\Controllers\Sidesa\KategorikelompokController');
    Route::resource('kelompok', 'App\Http\Controllers\Sidesa\KelompokController');
    
    Route::get('view/{sesi}', 'App\Http\Controllers\Design\ViewController@view');
});
