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

    // INFO DESA
    Route::resource('profil', 'App\Http\Controllers\Admin\ProfilController');
    Route::resource('staf', 'App\Http\Controllers\Admin\StafController');
    Route::resource('dusun', 'App\Http\Controllers\Sidesa\Desa\DusunController');
    
    // KEPENDUDUKAN
    Route::resource('penduduk', 'App\Http\Controllers\Sidesa\PendudukController');
    Route::resource('keluarga', 'App\Http\Controllers\Sidesa\KeluargaController');
    Route::resource('anggotakeluarga', 'App\Http\Controllers\Sidesa\AnggotakeluargaController');
    Route::resource('rumahtangga', 'App\Http\Controllers\Sidesa\RumahtanggaController');
    Route::resource('anggotarumahtangga', 'App\Http\Controllers\Sidesa\AnggotarumahtanggaController');
    Route::resource('kategorikelompok', 'App\Http\Controllers\Sidesa\KategorikelompokController');
    Route::resource('kelompok', 'App\Http\Controllers\Sidesa\KelompokController');
    Route::resource('anggotakelompok', 'App\Http\Controllers\Sidesa\AnggotakelompokController');
    Route::resource('suplemen', 'App\Http\Controllers\Sidesa\SuplemenController');
    Route::resource('anggotasuplemen', 'App\Http\Controllers\Sidesa\AnggotasuplemenController');
    
    // SEKRETARIAT
    Route::resource('informasipublik', 'App\Http\Controllers\Sidesa\Sekretariat\InformasipublikController');
    Route::resource('inventaris', 'App\Http\Controllers\Sidesa\Sekretariat\InventarisController');
    Route::resource('klasifikasisurat', 'App\Http\Controllers\Sidesa\Sekretariat\KlasifikasisuratController');
    Route::get('inventaris/list/{inventaris}', 'App\Http\Controllers\Sidesa\Sekretariat\InventarisController@list');
    Route::get('inventaris/tambah/{inventaris}', 'App\Http\Controllers\Sidesa\Sekretariat\InventarisController@tambah');
    
    // BANTUAN
    Route::resource('bantuan', 'App\Http\Controllers\Sidesa\BantuanController');

    Route::get('view/{sesi}', 'App\Http\Controllers\Design\ViewController@view');
});
