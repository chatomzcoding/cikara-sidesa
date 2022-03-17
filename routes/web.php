<?php

use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Sidesa\Penduduk\PemilihController;
use App\Http\Controllers\Sidesa\Pengaturan\KategoriartikelController;
use App\Http\Controllers\Sidesa\Pengaturan\ListdataController;
use App\Http\Controllers\Sidesa\Sekretariat\SuratkeluarController;
use App\Http\Controllers\Sidesa\TanahController;
use Illuminate\Support\Facades\Route;
use App\Imports\DataPenduduk;
use App\Imports\KategoriartikelImport;
use App\Imports\PendudukImport;
use App\Imports\PendudukpenyesuainaImport;
use App\Imports\PenduduksimpleImport;
use Maatwebsite\Excel\Facades\Excel;

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
Route::post('/kirimkomentar','App\Http\Controllers\HomepageController@kirimkomentar');
Route::get('/cetak','App\Http\Controllers\HomeController@cetak');
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
    
    // CETAK
    Route::get('cetakdata','App\Http\Controllers\CetakController@cetak');

    Route::get('cetak/penduduk/{id}','App\Http\Controllers\CetakController@penduduk');
    Route::get('cetak/listrwperdusun/{id}','App\Http\Controllers\CetakController@listrwperdusun');
    Route::get('cetak/listrtperwilayahrw/{id}','App\Http\Controllers\CetakController@listrtperwilayahrw');

    // IMPORT
    Route::post('/import/kategoriartikel', function () {
        Excel::import(new KategoriartikelImport, request()->file('file'));
        return back();
    });
    Route::post('/import/prodeskel', function () {
        Excel::import(new DataPenduduk, request()->file('file'));
        return back();
    });
    Route::post('/import/penduduk', function () {
        Excel::import(new PendudukImport, request()->file('file'));
        return back();
    });
    Route::post('/import/penduduksimple', function () {
        Excel::import(new PenduduksimpleImport, request()->file('file'));
        return back();
    });
    Route::post('/import/pendudukpenyesuaian', function () {
        Excel::import(new PendudukpenyesuainaImport, request()->file('file'));
        return back()->with('dsc','Data Penyesuaian berhasil diimport');
    });
    
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
        Route::resource('info', 'App\Http\Controllers\Admin\InfoController');
        Route::resource('tanah', TanahController::class);
        // COVID 19
        Route::resource('vaksinasi', 'App\Http\Controllers\Sidesa\Covid\VaksinasiController');
        Route::resource('covid', 'App\Http\Controllers\Sidesa\Covid\CovidController');
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
        Route::resource('pemilih', PemilihController::class);
        Route::resource('laporan', 'App\Http\Controllers\Sidesa\LaporanController');
        Route::resource('keluarga', 'App\Http\Controllers\Sidesa\KeluargaController');
        Route::resource('anggotakeluarga', 'App\Http\Controllers\Sidesa\AnggotakeluargaController');
        Route::resource('rumahtangga', 'App\Http\Controllers\Sidesa\RumahtanggaController');
        Route::resource('anggotarumahtangga', 'App\Http\Controllers\Sidesa\AnggotarumahtanggaController');
        Route::resource('kategorikelompok', 'App\Http\Controllers\Sidesa\KategorikelompokController');
        Route::resource('kelompok', 'App\Http\Controllers\Sidesa\KelompokController');
        Route::resource('anggotakelompok', 'App\Http\Controllers\Sidesa\AnggotakelompokController');
        Route::resource('suplemen', 'App\Http\Controllers\Sidesa\SuplemenController');
        Route::resource('anggotasuplemen', 'App\Http\Controllers\Sidesa\AnggotasuplemenController');
        Route::resource('pendudukaduan', 'App\Http\Controllers\Penduduk\PendudukaduanController');
        
        // STATISTIK
        Route::get('statistik/kependudukan/{sesi}/{pilih}', 'App\Http\Controllers\Sidesa\Statistik\KependudukanController@pilih');
        Route::get('statistik/laporanbulanan', 'App\Http\Controllers\Sidesa\Statistik\LaporanbulananController@index');
        Route::get('statistik/laporankelompokrentan', 'App\Http\Controllers\Sidesa\Statistik\LaporankelompokrentanController@index');
        
        // SEKRETARIAT
        Route::resource('informasipublik', 'App\Http\Controllers\Sidesa\Sekretariat\InformasipublikController');
        Route::resource('inventaris', 'App\Http\Controllers\Sidesa\Sekretariat\InventarisController');
        Route::resource('klasifikasisurat', 'App\Http\Controllers\Sidesa\Sekretariat\KlasifikasisuratController');
        Route::resource('suratkeluar', SuratkeluarController::class);
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
        Route::resource('kategori', KategoriController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('listdata', ListdataController::class);
        Route::resource('slider', 'App\Http\Controllers\Sidesa\Pengaturan\SliderController');
        Route::resource('artikel', 'App\Http\Controllers\Sidesa\Pengaturan\ArtikelController');
        Route::resource('kategoriartikel', KategoriartikelController::class);
        Route::resource('galeri', 'App\Http\Controllers\Sidesa\Pengaturan\GaleriController');
        Route::resource('galeriphoto', 'App\Http\Controllers\Sidesa\Pengaturan\GaleriphotoController');
    });
    
    Route::middleware('superadmin')->group(function () {
        Route::resource('datapokok', 'App\Http\Controllers\Admin\InfowebsiteController');
    });


    
    Route::resource('user', 'App\Http\Controllers\Admin\UserController');
    
    
});
