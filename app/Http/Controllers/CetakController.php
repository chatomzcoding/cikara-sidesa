<?php

namespace App\Http\Controllers;

use App\Helpers\Cikara\DbCikara;
use App\Models\Bantuan;
use App\Models\Dusun;
use App\Models\Formatsurat;
use App\Models\Kategori;
use App\Models\Lapak;
use App\Models\Lapor;
use App\Models\Penduduk;
use App\Models\Pendudukaduan;
use App\Models\Potensi;
use App\Models\Potensisub;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Staf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    // function untuk all data
    public function cetak()
    {
        if (isset($_GET['s'])) {
            $sesi   = $_GET['s'];
            $id     = (isset($_GET['id'])) ? $_GET['id'] : NULL ;
            switch ($sesi) {
                case 'user':
                    $data   = DB::table('users')
                    ->join('user_akses','users.id','=','user_akses.user_id')
                    ->join('penduduk','user_akses.penduduk_id','=','penduduk.id')
                    ->select('users.*','penduduk.nama_penduduk')
                    ->where('users.level','penduduk')
                    ->get();
                    $namafile   = 'Laporan Data User Penduduk';
                    $pdf        = PDF::loadview('sistem.cetak.list.user', compact('data'));
                    break;
                case 'userstaf':
                    $data   = DB::table('users')
                        ->join('staf_akses','users.id','=','staf_akses.user_id')
                        ->join('staf','staf_akses.staf_id','=','staf.id')
                        ->select('users.*','staf.nama_pegawai','staf.jabatan','staf.nik')
                        ->where('users.level','staf')
                        ->get();
                    $namafile   = 'Laporan Data User Staf';
                    $pdf        = PDF::loadview('sistem.cetak.list.userstaf', compact('data'));
                    break;
                case 'infocovid':
                    $data  = DB::table('covid')
                    ->join('penduduk','covid.penduduk_id','=','penduduk.id')
                    ->select('covid.*','penduduk.nama_penduduk','penduduk.alamat_sekarang')
                    ->get();
                    $namafile   = 'Laporan Data Covid';
                    $pdf        = PDF::loadview('sistem.cetak.list.infocovid', compact('data'));
                    break;
                case 'dusun':
                    $dusun      = Dusun::all();
                    $namafile   = 'Laporan Data Dusun';
                    $pdf        = PDF::loadview('sistem.cetak.list.dusun', compact('dusun'));
                    break;
                case 'listrw':
                    $rw     = Rw::where('dusun_id',$id)->get();
                    $dusun  = Dusun::find($id);
                    $namafile = 'laporan data rw per dusun';
                    $pdf    = PDF::loadview('sistem.cetak.listrwperdusun', compact('rw','dusun'));
                    break;
                case 'listrt':
                    $rw  = Rw::find($id);
                    $rt     = Rt::where('rw_id',$id)->get();
                    $namafile = 'laporan data rt per wilayah rw';
                    $pdf    = PDF::loadview('sistem.cetak.listrtperwilayahrw', compact('rw','rt'));
                    break;
                case 'staf':
                    $staf       = Staf::all();
                    $namafile   = 'Laporan Data Staf';
                    $pdf        = PDF::loadview('sistem.cetak.list.staf', compact('staf'));
                    break;
                case 'potensi':
                    $potensi    = Potensi::all();
                    $namafile   = 'Laporan Data Potensi Desa';
                    $pdf        = PDF::loadview('sistem.cetak.list.potensi', compact('potensi'));
                    break;
                case 'subpotensi':
                    $potensi    = Potensi::find($id);
                    $subpotensi = Potensisub::where('potensi_id',$id)->get();
                    $namafile   = 'Laporan Data Potensi Desa';
                    $pdf        = PDF::loadview('sistem.cetak.list.subpotensi', compact('potensi','subpotensi'));
                    break;
                case 'penduduk':
                    // proses get data
                    $status_penduduk = $_GET['status_penduduk'];
                    $jk = $_GET['jk'];
                    $dusun = $_GET['dusun'];
                    $filter     = [
                        'status_penduduk' => $status_penduduk,
                        'jk' => $jk,
                        'dusun' => $dusun,
                    ];
                    $penduduk   = Penduduk::all();
                    $namafile   = 'Laporan Data Penduduk';
                    $pdf        = PDF::loadview('sistem.cetak.list.penduduk', compact('penduduk','filter'))->setPaper('a4','landscape');
                    break;
                case 'detailpenduduk':
                    $penduduk   = Penduduk::find($id);
                    $namafile   = 'Data Penduduk - '.$penduduk->nik.' '.$penduduk->nama_penduduk;
                    $pdf    = PDF::loadview('sistem.cetak.penduduk', compact('penduduk'));
                    break;
                case 'lapor':
                    $lapor   = Lapor::all();
                    $namafile   = 'Data Laporan Penduduk';
                    $pdf        = PDF::loadview('sistem.cetak.list.lapor', compact('lapor'))->setPaper('a4','landscape');
                    break;
                case 'vaksinasi':
                    if (isset($_GET['kategori']) AND $_GET['kategori'] <> 'semua') {
                        $vaksinasi  = DB::table('vaksinasi')
                                        ->join('penduduk','vaksinasi.penduduk_id','=','penduduk.id')
                                        ->join('kategori','vaksinasi.kategori_id','=','kategori.id')
                                        ->select('vaksinasi.*','penduduk.nama_penduduk','kategori.nama_kategori')
                                        ->where('vaksinasi.kategori_id',$_GET['kategori'])
                                        ->get();
                        $filter['kategori'] = $_GET['kategori'];
                    } else {
                        $vaksinasi  = DB::table('vaksinasi')
                                        ->join('penduduk','vaksinasi.penduduk_id','=','penduduk.id')
                                        ->join('kategori','vaksinasi.kategori_id','=','kategori.id')
                                        ->select('vaksinasi.*','penduduk.nama_penduduk','kategori.nama_kategori')
                                        ->get();
                        $filter['kategori']  = 'semua';
                    }
                    $namafile   = 'Data Laporan Penduduk';
                    $pdf        = PDF::loadview('sistem.cetak.list.vaksinasi', compact('vaksinasi'))->setPaper('a4','landscape');
                    break;
                case 'lapak':
                    $lapak   = Lapak::all();
                    $namafile   = 'Laporan Data Lapak';
                    $pdf        = PDF::loadview('sistem.cetak.list.lapak', compact('lapak'))->setPaper('a4','landscape');
                    break;
                case 'pemilih':
                    $kategori   = Kategori::find($_GET['kategori_id']);
                    $pemilih    = DB::table('pemilih')
                    ->join('penduduk','pemilih.penduduk_id','=','penduduk.id')
                    ->select('pemilih.*','penduduk.nama_penduduk')
                    ->where('pemilih.kategori_id',$kategori->id)
                    ->get();
                    $namafile   = 'Laporan Data Calon Pemilih '.ucwords($kategori->nama_kategori);
                    $pdf        = PDF::loadview('sistem.cetak.list.pemilih', compact('pemilih'))->setPaper('a4','landscape');
                    break;
                case 'bantuan':
                    $bantuan   = Bantuan::all();
                    $namafile   = 'Laporan Data Bantuan';
                    $pdf        = PDF::loadview('sistem.cetak.list.bantuan', compact('bantuan'))->setPaper('a4','potrait');
                    break;
                case 'kelompok':
                    $kelompok   = DB::table('kelompok')
                                ->join('penduduk','kelompok.penduduk_id','=','penduduk.id')
                                ->join('kategori_kelompok','kelompok.kategorikelompok_id','=','kategori_kelompok.id')
                                ->select('kelompok.*','penduduk.nama_penduduk','kategori_kelompok.nama_kategori')
                                ->get();
                    $namafile   = 'Laporan Data Kelompok';
                    $pdf        = PDF::loadview('sistem.cetak.list.kelompok', compact('kelompok'));
                    break;
                case 'pendudukaduan':
                    $user           = Pendudukaduan::distinct()->get('user_id'); 
                    $status         = (isset($_GET['status'])) ? $_GET['status'] : 'proses' ;
                    $namafile       = 'Laporan Data Aduan';
                    $pdf            = PDF::loadview('sistem.cetak.list.pendudukaduan', compact('user','status'))->setPaper('a4','landscape');
                    break;
                case 'rumahtangga':
                    $rumahtangga    = DB::table('rumah_tangga')
                                ->join('penduduk','rumah_tangga.penduduk_id','=','penduduk.id')
                                ->join('rt','penduduk.rt_id','=','rt.id')
                                ->join('rw','rt.rw_id','=','rw.id')
                                ->join('dusun','rw.dusun_id','=','dusun.id')
                                ->select('rumah_tangga.*','penduduk.nama_penduduk','penduduk.jk','penduduk.alamat_sekarang','penduduk.nik','rt.nama_rt','rw.nama_rw','dusun.nama_dusun')
                                ->get();
                    $namafile   = 'Laporan Data Rumah Tangga';
                    $pdf        = PDF::loadview('sistem.cetak.list.rumahtangga', compact('rumahtangga'))->setPaper('a4','landscape');
                    break;
                case 'keluarga':
                    $keluarga   = DB::table('keluarga')
                                ->join('penduduk','keluarga.penduduk_id','=','penduduk.id')
                                ->join('rt','penduduk.rt_id','=','rt.id')
                                ->join('rw','rt.rw_id','=','rw.id')
                                ->join('dusun','rw.dusun_id','=','dusun.id')
                                ->select('keluarga.*','penduduk.nama_penduduk','penduduk.jk','penduduk.alamat_sekarang','penduduk.nik','rt.nama_rt','rw.nama_rw','dusun.nama_dusun')
                                ->get();
                    $namafile   = 'Laporan Data Keluarga';
                    $pdf        = PDF::loadview('sistem.cetak.list.keluarga', compact('keluarga'))->setPaper('a4','landscape');
                    break;
                case 'formatsurat':
                    if (isset($_GET['kategori']) AND $_GET['kategori'] <> 'semua') {
                        $filter['kategori'] = $_GET['kategori'];
                        $formatsurat        = Formatsurat::where('kategori',$_GET['kategori'])->orderBy('id','DESC')->get();
                    } else {
                        $filter['kategori'] = 'semua';
                        $formatsurat        = Formatsurat::orderBy('id','DESC')->get();
                    }
                    $namafile   = 'Laporan Daftar Format Surat';
                    $pdf        = PDF::loadview('sistem.cetak.list.formatsurat', compact('formatsurat'));
                    break;
                case 'statistik':
                    $keluarga   = DB::table('keluarga')
                                ->join('penduduk','keluarga.penduduk_id','=','penduduk.id')
                                ->join('rt','penduduk.rt_id','=','rt.id')
                                ->join('rw','rt.rw_id','=','rw.id')
                                ->join('dusun','rw.dusun_id','=','dusun.id')
                                ->select('keluarga.*','penduduk.nama_penduduk','penduduk.jk','penduduk.alamat_sekarang','penduduk.nik','rt.nama_rt','rw.nama_rw','dusun.nama_dusun')
                                ->get();
                    $data   = DbCikara::datastatistik($_GET['sesi']);
                    $namafile   = 'Laporan Data Statistik '.$data['header'];
                    $pdf        = PDF::loadview('sistem.cetak.list.statistik', compact('data'));
                    break;
                case 'suratpenduduk':
                    $data  = DB::table('penduduk_surat')
                    ->join('format_surat','penduduk_surat.formatsurat_id','=','format_surat.id')
                    ->select('penduduk_surat.*','format_surat.nama_surat')
                    ->orderBy('penduduk_surat.id','DESC')
                    ->get();
                    $filter = [
                        'status' => $_GET['status'],
                        'penduduk' => $_GET['penduduk'],
                        'tanggal' => $_GET['tanggal'],
                    ];
                    $namafile   = 'Laporan Data Surat Penduduk';
                    $pdf        = PDF::loadview('sistem.cetak.list.suratpenduduk', compact('data','filter'));
                    break;
                default:
                    return 'sesi tidak ada';
                    break;
                }
            return $pdf->download($namafile.'.pdf');
        } else {
            return 'page not found';
        }
    }
}
