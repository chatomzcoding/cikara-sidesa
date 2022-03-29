<?php

use App\Http\Controllers\Admin\FormatsuratController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\InfowebsiteController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\StafController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Penduduk\ForumdiskusiController;
use App\Http\Controllers\Penduduk\LapakController;
use App\Http\Controllers\Penduduk\LayananmandiriController;
use App\Http\Controllers\Penduduk\PendudukaduanController;
use App\Http\Controllers\Penduduk\PenduduksuratController;
use App\Http\Controllers\Penduduk\ProdukController;
use App\Http\Controllers\Sidesa\AnggotakelompokController;
use App\Http\Controllers\Sidesa\AnggotakeluargaController;
use App\Http\Controllers\Sidesa\AnggotarumahtanggaController;
use App\Http\Controllers\Sidesa\Bantuan\BantuanController;
use App\Http\Controllers\Sidesa\Bantuan\PesertabantuanController;
use App\Http\Controllers\Sidesa\Covid\CovidController;
use App\Http\Controllers\Sidesa\Covid\PemudikController;
use App\Http\Controllers\Sidesa\Covid\VaksinasiController;
use App\Http\Controllers\Sidesa\Desa\DusunController;
use App\Http\Controllers\Sidesa\Desa\PotensiController;
use App\Http\Controllers\Sidesa\Desa\PotensisubController;
use App\Http\Controllers\Sidesa\Desa\RtController;
use App\Http\Controllers\Sidesa\Desa\RwController;
use App\Http\Controllers\Sidesa\KategorikelompokController;
use App\Http\Controllers\Sidesa\KelompokController;
use App\Http\Controllers\Sidesa\KeluargaController;
use App\Http\Controllers\Sidesa\LaporanController;
use App\Http\Controllers\Sidesa\Layanan\DatasyaratsuratController;
use App\Http\Controllers\Sidesa\Layanan\ForumController;
use App\Http\Controllers\Sidesa\Layanan\LaporController;
use App\Http\Controllers\Sidesa\Layanan\SuratController;
use App\Http\Controllers\Sidesa\Penduduk\PemilihController;
use App\Http\Controllers\Sidesa\PendudukController;
use App\Http\Controllers\Sidesa\Pengaturan\ArtikelController;
use App\Http\Controllers\Sidesa\Pengaturan\GaleriController;
use App\Http\Controllers\Sidesa\Pengaturan\GaleriphotoController;
use App\Http\Controllers\Sidesa\Pengaturan\KategoriartikelController;
use App\Http\Controllers\Sidesa\Pengaturan\ListdataController;
use App\Http\Controllers\Sidesa\Pengaturan\SliderController;
use App\Http\Controllers\Sidesa\RumahtanggaController;
use App\Http\Controllers\Sidesa\Sekretariat\InformasipublikController;
use App\Http\Controllers\Sidesa\Sekretariat\InventarisController;
use App\Http\Controllers\Sidesa\Sekretariat\KlasifikasisuratController;
use App\Http\Controllers\Sidesa\Sekretariat\SuratkeluarController;
use App\Http\Controllers\Sidesa\Statistik\KependudukanController;
use App\Http\Controllers\Sidesa\TanahController;
use Illuminate\Support\Facades\Route;
use App\Imports\DataPenduduk;
use App\Imports\KategoriartikelImport;
use App\Imports\PendudukImport;
use App\Imports\PendudukpenyesuainaImport;
use App\Imports\PenduduksimpleImport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/cetak','App\Http\Controllers\HomeController@cetak');
// homepage
Route::get('/',[HomepageController::class,'index']);
Route::get('/kirimpesan',[HomepageController::class,'kirimpesan']);
Route::get('/kirimkomentar',[HomepageController::class,'kirimkomentar']);
Route::get('/halaman/{sesi}',[HomepageController::class,'halaman']);
Route::get('/desa/potensi/{id}',[HomepageController::class,'potensi']);
Route::get('/halaman/berita/{slug}',[HomepageController::class,'detailberita']);
Route::get('/halaman/berita/kategori/{kategori}',[HomepageController::class,'kategori']);
Route::get('/homepage/artikel',[HomepageController::class,'artikel']);
Route::get('/homepage/artikel/{slug}',[HomepageController::class,'showartikel']);
Route::get('/produkdesa/{id}',[HomepageController::class,'produkdetail']);

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
    
    Route::post('/proseslapor',[LayananmandiriController::class,'proseslapor']);
    Route::post('/prosessurat',[LayananmandiriController::class,'prosessurat']);
    Route::post('/buatsurat',[LayananmandiriController::class,'buatsurat']);
    Route::post('/kirimpesandiskusi',[LayananmandiriController::class,'kirimpesandiskusi']);
    Route::post('/layananmandiri/{sesi}',[LayananmandiriController::class,'index']);
    Route::post('/cetaksurat/{id}',[PenduduksuratController::class,'cetaksurat']);
    
    Route::resource('forumdiskusi', ForumdiskusiController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('lapak', LapakController::class);
    Route::resource('penduduksurat', PenduduksuratController::class);
    Route::resource('lapor', LaporController::class);


    Route::middleware('admin')->group(function () {
        Route::resource('info', InfoController::class);
        Route::resource('tanah', TanahController::class);
        // COVID 19
        Route::resource('vaksinasi', VaksinasiController::class);
        Route::resource('covid', CovidController::class);
        Route::resource('pemudik', PemudikController::class);
        
        // INFO DESA
        Route::resource('profil', ProfilController::class);
        Route::resource('staf', StafController::class);
        Route::resource('dusun', DusunController::class);
        Route::resource('rw', RwController::class);
        Route::resource('rt', RtController::class);
        Route::resource('potensi', PotensiController::class);
        Route::resource('potensisub',  PotensisubController::class);
        
        // KEPENDUDUKAN
        Route::resource('penduduk', PendudukController::class);
        Route::resource('pemilih', PemilihController::class);
        Route::resource('laporan', LaporanController::class);
        Route::resource('keluarga', KeluargaController::class);
        Route::resource('anggotakeluarga', AnggotakeluargaController::class);
        Route::resource('rumahtangga', RumahtanggaController::class);
        Route::resource('anggotarumahtangga', AnggotarumahtanggaController::class);
        Route::resource('kategorikelompok', KategorikelompokController::class);
        Route::resource('kelompok', KelompokController::class);
        Route::resource('anggotakelompok', AnggotakelompokController::class);
        Route::resource('pendudukaduan', PendudukaduanController::class);
        
        // STATISTIK
        Route::get('statistik/kependudukan/{sesi}/{pilih}', [KependudukanController::class,'pilih']);
        // Route::get('statistik/laporanbulanan', 'App\Http\Controllers\Sidesa\Statistik\LaporanbulananController@index');
        // Route::get('statistik/laporankelompokrentan', 'App\Http\Controllers\Sidesa\Statistik\LaporankelompokrentanController@index');
        
        // SEKRETARIAT
        Route::resource('informasipublik', InformasipublikController::class);
        Route::resource('inventaris', InventarisController::class);
        Route::resource('klasifikasisurat', KlasifikasisuratController::class);
        Route::resource('suratkeluar', SuratkeluarController::class);
        Route::get('inventaris/list/{inventaris}', [InventarisController::class,'list']);
        Route::get('inventaris/tambah/{inventaris}', [InventarisController::class,'tambah']);
        
        // BANTUAN
        Route::resource('bantuan', BantuanController::class);
        Route::resource('pesertabantuan', PesertabantuanController::class);
        Route::get('bantuan/tambahpeserta/{bantuan}', [BantuanController::class,'tambahpeserta']);
        
        // LAYANAN
        Route::resource('formatsurat', FormatsuratController::class);
        Route::resource('datasyaratsurat', DatasyaratsuratController::class);
        Route::resource('forum', ForumController::class);
        Route::resource('suratpenduduk', SuratController::class);
        Route::get('cetaksuratlangsung/{id}', [SuratController::class,'cetaksurat']);
        
        // ADMIN SETTING
        Route::resource('kategori', KategoriController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('listdata', ListdataController::class);
        Route::resource('slider', SliderController::class);
        Route::resource('artikel', ArtikelController::class);
        Route::resource('kategoriartikel', KategoriartikelController::class);
        Route::resource('galeri', GaleriController::class);
        Route::resource('galeriphoto', GaleriphotoController::class);
    });
    
    Route::middleware('superadmin')->group(function () {
        Route::resource('datapokok', InfowebsiteController::class);
    });


    
    Route::resource('user', UserController::class);
    
    
});
