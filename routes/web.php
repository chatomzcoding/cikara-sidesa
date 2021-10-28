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

// homepage
Route::get('/','App\Http\Controllers\HomepageController@index');
Route::get('/kirimpesan','App\Http\Controllers\HomepageController@kirimpesan');
Route::get('/halaman/{sesi}','App\Http\Controllers\HomepageController@halaman');
Route::get('/desa/potensi/{id}','App\Http\Controllers\HomepageController@potensi');
Route::get('/halaman/berita/{slug}','App\Http\Controllers\HomepageController@detailberita');
Route::get('/halaman/berita/kategori/{kategori}','App\Http\Controllers\HomepageController@kategori');

// HOMEPAGE
Route::get('homepage/artikel', 'App\Http\Controllers\HomepageController@artikel');
Route::get('homepage/artikel/{slug}', 'App\Http\Controllers\HomepageController@showartikel');
Route::get('produkdesa/{id}', 'App\Http\Controllers\HomepageController@produkdetail');

// WEBSERVICE
Route::get('ws/{token}/{sesi}/{id}', 'App\Http\Controllers\WebserviceController@data');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/dashboard','App\Http\Controllers\HomeController@index')->name('dashboard');
    // kebutuhan tampilan
    Route::get('tampilan/{sesi}','App\Http\Controllers\HomeController@tampilan');
    Route::get('ujisurat','App\Http\Controllers\HomeController@ujisurat');
    
    // ROUTE UNTUK PENDUDUK
    
    Route::post('/proseslapor','App\Http\Controllers\Penduduk\LayananmandiriController@proseslapor');
    Route::post('/prosessurat','App\Http\Controllers\Penduduk\LayananmandiriController@prosessurat');
    Route::post('/buatsurat','App\Http\Controllers\Penduduk\LayananmandiriController@buatsurat');
    Route::post('/kirimpesandiskusi','App\Http\Controllers\Penduduk\LayananmandiriController@kirimpesandiskusi');
    Route::get('layananmandiri/{sesi}', 'App\Http\Controllers\Penduduk\LayananmandiriController@index');
    Route::get('cetaksurat/{id}', 'App\Http\Controllers\Penduduk\PenduduksuratController@cetaksurat');
    Route::resource('forumdiskusi', 'App\Http\Controllers\Penduduk\ForumdiskusiController');
    Route::resource('produk', 'App\Http\Controllers\Penduduk\ProdukController');
    Route::resource('lapak', 'App\Http\Controllers\Penduduk\LapakController');
    Route::resource('penduduksurat', 'App\Http\Controllers\Penduduk\PenduduksuratController');
    Route::resource('lapor', 'App\Http\Controllers\Sidesa\Layanan\LaporController');


    Route::middleware('admin')->group(function () {
        // COVID 19
        Route::resource('pemudik', 'App\Http\Controllers\Sidesa\Covid\PemudikController');
        
        // INFO DESA
        Route::resource('profil', 'App\Http\Controllers\Admin\ProfilController');
        Route::resource('staf', 'App\Http\Controllers\Admin\StafController');
        Route::resource('dusun', 'App\Http\Controllers\Sidesa\Desa\DusunController');
        Route::resource('rw', 'App\Http\Controllers\Sidesa\Desa\RwController');
        Route::resource('rt', 'App\Http\Controllers\Sidesa\Desa\RtController');
        Route::resource('potensi', 'App\Http\Controllers\Sidesa\Desa\PotensiController');
        Route::resource('potensisub', 'App\Http\Controllers\Sidesa\Desa\PotensisubController');
        
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
        
        // STATISTIK
        Route::get('statistik/kependudukan/{sesi}/{pilih}', 'App\Http\Controllers\Sidesa\Statistik\KependudukanController@pilih');
        Route::get('statistik/laporanbulanan', 'App\Http\Controllers\Sidesa\Statistik\LaporanbulananController@index');
        Route::get('statistik/laporankelompokrentan', 'App\Http\Controllers\Sidesa\Statistik\LaporankelompokrentanController@index');
        
        // SEKRETARIAT
        Route::resource('informasipublik', 'App\Http\Controllers\Sidesa\Sekretariat\InformasipublikController');
        Route::resource('inventaris', 'App\Http\Controllers\Sidesa\Sekretariat\InventarisController');
        Route::resource('klasifikasisurat', 'App\Http\Controllers\Sidesa\Sekretariat\KlasifikasisuratController');
        Route::get('inventaris/list/{inventaris}', 'App\Http\Controllers\Sidesa\Sekretariat\InventarisController@list');
        Route::get('inventaris/tambah/{inventaris}', 'App\Http\Controllers\Sidesa\Sekretariat\InventarisController@tambah');
        
        // BANTUAN
        Route::resource('bantuan', 'App\Http\Controllers\Sidesa\Bantuan\BantuanController');
        Route::resource('pesertabantuan', 'App\Http\Controllers\Sidesa\Bantuan\PesertabantuanController');
        Route::get('bantuan/tambahpeserta/{bantuan}', 'App\Http\Controllers\Sidesa\Bantuan\BantuanController@tambahpeserta');
        
        // LAYANAN
        Route::resource('formatsurat', 'App\Http\Controllers\Admin\FormatsuratController');
        Route::resource('datasyaratsurat', 'App\Http\Controllers\Sidesa\Layanan\DatasyaratsuratController');
        Route::resource('forum', 'App\Http\Controllers\Sidesa\Layanan\ForumController');
        Route::resource('suratpenduduk', 'App\Http\Controllers\Sidesa\Layanan\SuratController');
        
        // ADMIN SETTING
        Route::resource('datapokok', 'App\Http\Controllers\Admin\InfowebsiteController');
        Route::resource('slider', 'App\Http\Controllers\Sidesa\Pengaturan\SliderController');
        Route::resource('artikel', 'App\Http\Controllers\Sidesa\Pengaturan\ArtikelController');
        Route::resource('kategoriartikel', 'App\Http\Controllers\Sidesa\Pengaturan\KategoriartikelController');
        Route::resource('galeri', 'App\Http\Controllers\Sidesa\Pengaturan\GaleriController');
        Route::resource('galeriphoto', 'App\Http\Controllers\Sidesa\Pengaturan\GaleriphotoController');
    });
    
    Route::resource('user', 'App\Http\Controllers\Admin\UserController');
    
    
});
