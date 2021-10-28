<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class CetakController extends Controller
{
    // INFO DESA
    public function listdusun()
    {
        $dusun  = Dusun::all();
        $pdf    = PDF::loadview('sistem.cetak.listdusun', compact('dusun'));
        return $pdf->download('laporan data dusun.pdf');
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
}
