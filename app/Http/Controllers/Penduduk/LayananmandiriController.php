<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\Formatsurat;
use App\Models\Forumdiskusi;
use App\Models\Klasifikasisurat;
use App\Models\Lapor;
use App\Models\Penduduksurat;
use App\Models\Suratpenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
                $surat  = DB::table('penduduk_surat')
                        ->join('format_surat','penduduk_surat.formatsurat_id','=','format_surat.id')
                        ->select('penduduk_surat.*','format_surat.nama_surat','format_surat.file_surat')
                        ->where('user_id',$user->id)
                        ->orderByDesc('id')
                        ->get();
                $formatsurat   = Formatsurat::all();
                $total  = [
                    'total' => count($surat),
                    'selesai' => Penduduksurat::where('user_id',$user->id)->where('status','selesai')->count(),
                    'proses' => Penduduksurat::where('user_id',$user->id)->where('status','proses')->count(),
                    'menunggu' => Penduduksurat::where('user_id',$user->id)->where('status','menunggu')->count(),
                ];
                return view('penduduk.layananmandiri.surat', compact('judul','user','total','formatsurat','surat'));
                break;
            default:
                # code...
                break;
        }
    }

    public function proseslapor(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('photo');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/img/penduduk/lapor';
        $file->move($tujuan_upload,$nama_file);

        Lapor::create([
            'user_id' => $request->user_id,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'status' => $request->status,
            'identitas' => $request->identitas,
            'posting' => $request->posting,
            'photo' => $nama_file,
        ]);

        return redirect('layananmandiri/lapor')->with('ds','Laporan');
    }
    

    public function buatsurat(Request $request)
    {
        Penduduksurat::create([
            'user_id' => $request->user_id,
            'formatsurat_id' => $request->formatsurat_id,
            'status' => $request->status,
        ]);

        return redirect('layananmandiri/buatsurat');
    }

    public function prosessurat(Request $request)
    {
        Penduduksurat::create([
            'user_id' => $request->user_id,
            'formatsurat_id' => $request->formatsurat_id,
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
