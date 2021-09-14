<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\Forumdiskusi;
use App\Models\Klasifikasisurat;
use App\Models\Lapor;
use App\Models\Suratpenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LayananmandiriController extends Controller
{
    public function index($sesi)
    {
        $user   = Auth::user();
        switch ($sesi) {
            case 'lapor':
                $lapor  = Lapor::where('user_id',$user->id)->get();
                $judul  = 'Laporan Penduduk';
                $total  = [
                    'selesai' => Lapor::where('user_id',$user->id)->where('status','selesai')->count(),
                    'proses' => Lapor::where('user_id',$user->id)->where('status','proses')->count(),
                    'menunggu' => Lapor::where('user_id',$user->id)->where('status','menunggu')->count(),
                ];
                return view('penduduk.layananmandiri.lapor', compact('lapor','judul','total','user'));
                break;
            case 'surat':
                $judul  = 'Surat';
                $surat  = DB::table('surat_penduduk')
                        ->join('klasifikasi_surat','surat_penduduk.klasifikasisurat_id','=','klasifikasi_surat.id')
                        ->select('surat_penduduk.*','klasifikasi_surat.nama')
                        ->where('user_id',$user->id)
                        ->get();
                $klasifikasisurat   = Klasifikasisurat::all();
                $total  = [
                    'total' => count($surat),
                    'selesai' => Suratpenduduk::where('user_id',$user->id)->where('status','selesai')->count(),
                    'proses' => Suratpenduduk::where('user_id',$user->id)->where('status','proses')->count(),
                    'menunggu' => Suratpenduduk::where('user_id',$user->id)->where('status','menunggu')->count(),
                ];
                return view('penduduk.layananmandiri.surat', compact('judul','user','total','klasifikasisurat','surat'));
                break;
            default:
                # code...
                break;
        }
    }

    public function proseslapor(Request $request)
    {
        Lapor::create([
            'user_id' => $request->user_id,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'status' => $request->status,
        ]);

        return redirect('layananmandiri/lapor')->with('ds','Laporan');
    }
    public function prosessurat(Request $request)
    {
        Suratpenduduk::create([
            'user_id' => $request->user_id,
            'klasifikasisurat_id' => $request->klasifikasisurat_id,
            'perihal' => $request->perihal,
            'tgl_ambil' => $request->tgl_ambil,
            'pesan' => $request->pesan,
            'status' => $request->status,
        ]);

        return redirect('layananmandiri/surat')->with('ds','Surat');
    }
    public function kirimpesandiskusi(Request $request)
    {
        Forumdiskusi::create([
            'user_id' => $request->user_id,
            'forum_id' => $request->forum_id,
            'isi' => $request->isi,
        ]);

        return redirect()->back()->with('dsc','Pesan Telah Terkirim');
    }
}
