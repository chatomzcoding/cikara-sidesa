<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Keluarga;
use App\Models\Lapak;
use App\Models\Lapor;
use App\Models\Penduduk;
use App\Models\Potensi;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Staf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    // cetak data berbentuk list
    public function list($sesi)
    {
        switch ($sesi) {
            case 'dusun':
                $dusun      = Dusun::all();
                $namafile   = 'Laporan Data Dusun';
                $pdf        = PDF::loadview('sistem.cetak.list.dusun', compact('dusun'));
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
            case 'penduduk':
                $penduduk   = Penduduk::all();
                $namafile   = 'Laporan Data Penduduk';
                $pdf        = PDF::loadview('sistem.cetak.list.penduduk', compact('penduduk'))->setPaper('a4','landscape');
                break;
            case 'lapor':
                $lapor   = Lapor::all();
                $namafile   = 'Data Laporan Penduduk';
                $pdf        = PDF::loadview('sistem.cetak.list.lapor', compact('lapor'))->setPaper('a4','landscape');
                break;
            case 'lapak':
                $lapak   = Lapak::all();
                $namafile   = 'Laporan Data Lapak';
                $pdf        = PDF::loadview('sistem.cetak.list.lapak', compact('lapak'))->setPaper('a4','landscape');
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
            
            default:
                return 'page not found';
                break;
        }
        return $pdf->download($namafile.'.pdf');
    }

    public function listrwperdusun($id)
    {
        $rw     = Rw::where('dusun_id',$id)->get();
        $dusun  = Dusun::find($id);
        $pdf    = PDF::loadview('sistem.cetak.listrwperdusun', compact('rw','dusun'));
        return $pdf->download('laporan data rw per dusun.pdf');
    }
    public function listrtperwilayahrw($id)
    {
        $rw  = Rw::find($id);
        $rt     = Rt::where('rw_id',$id)->get();
        $pdf    = PDF::loadview('sistem.cetak.listrtperwilayahrw', compact('rw','rt'));
        return $pdf->download('laporan data rt per wilayah rw.pdf');
    }
    public function penduduk($id)
    {
        $penduduk   = Penduduk::find($id);
        $pdf    = PDF::loadview('sistem.cetak.penduduk', compact('penduduk'));
        return $pdf->download('Data Penduduk - '.$penduduk->nik.' '.$penduduk->nama_penduduk.'.pdf');
    }
}
