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
    Route::resource('datapokok', 'App\Http\Controllers\Bumdes\DatapokokController');
    Route::resource('unit', 'App\Http\Controllers\Bumdes\UnitController');
    Route::resource('laporan', 'App\Http\Controllers\Bumdes\LaporanController');
    Route::resource('jurnalumum', 'App\Http\Controllers\Bumdes\JurnalumumController');
    Route::resource('daftarakun', 'App\Http\Controllers\Bumdes\DaftarakunController');
    Route::resource('daftarakunpembantu', 'App\Http\Controllers\Bumdes\DaftarakunpembantuController');
    Route::post('bumdes/daftarakun/import','App\Http\Controllers\Bumdes\DaftarakunController@import');
    Route::get('bumdes/jurnal/{sesi}','App\Http\Controllers\Bumdes\JurnalumumController@lihatjurnal');
    // laporan
    Route::get('laporankeuangan/{sesi}','App\Http\Controllers\Bumdes\LaporankeuanganController@laporan');
    Route::get('laporanbukubesar/{id}','App\Http\Controllers\Bumdes\LaporankeuanganController@bukubesar');
    Route::post('laporanbukubesar','App\Http\Controllers\Bumdes\LaporankeuanganController@bukubesarpost');
});
