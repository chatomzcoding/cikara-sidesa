<?php

namespace App\Http\Controllers\Bumdes;

use App\Http\Controllers\Controller;
use App\Models\Daftarakun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporankeuanganController extends Controller
{
    public function laporan($sesi)
    {
        $user   = Auth::user();
        switch ($sesi) {
            case 'neraca':
                $aktivalancar       = Daftarakun::where('kategoriakun_id',2)->where('user_id',$user->id)->get();
                $aktivatidaklancar  = Daftarakun::where('kategoriakun_id',3)->where('user_id',$user->id)->get();
                $liabilitas         = Daftarakun::where('kategoriakun_id',5)->where('user_id',$user->id)->get();
                $ekuitas            = Daftarakun::where('kategoriakun_id',7)->where('user_id',$user->id)->get();
                $data               = [
                    'aktivalancar' => $aktivalancar,
                    'aktivatidaklancar' => $aktivatidaklancar,
                    'liabilitas' => $liabilitas,
                    'ekuitas' => $ekuitas,
                ];
                return view('bumdes.laporankeuangan.neraca', compact('data','user'));
                break;
            case 'labarugi':
                $pendapatan    = Daftarakun::where('kategoriakun_id',8)->where('user_id',$user->id)->get();
                $hpp           = Daftarakun::where('kategoriakun_id',9)->where('user_id',$user->id)->get();
                $sdm           = Daftarakun::where('kategoriakun_id',11)->where('user_id',$user->id)->get();
                $umum          = Daftarakun::where('kategoriakun_id',12)->where('user_id',$user->id)->get();
                $pajak         = Daftarakun::where('kategoriakun_id',14)->where('user_id',$user->id)->get();
                $data          = [
                    'pendapatan' => $pendapatan,
                    'hpp' => $hpp,
                    'sdm' => $sdm,
                    'umum' => $umum,
                    'pajak' => $pajak,
                ];
                return view('bumdes.laporankeuangan.labarugi', compact('data','user'));
                break;

            case 'neracalajur':
                $daftarakun     = Daftarakun::where('user_id',$user->id)->get();
                return view('bumdes.laporankeuangan.neracalajur', compact('daftarakun','user'));
                break;
            
            default:
                # code...
                break;
        }
    }

    public function bukubesar($id)
    {
        $user   = Auth::user();
        $bukubesar  = DB::table('jurnal_akun')
                        ->join('jurnal_umum','jurnal_akun.jurnalumum_id','=','jurnal_umum.id')
                        ->join('daftar_akun','jurnal_akun.daftarakun_id','=','daftar_akun.id')
                        ->where('jurnal_akun.daftarakun_id',$id)
                        ->get();
        $daftarakun     = Daftarakun::where('user_id',$user->id)->orderBy('nama_akun','ASC')->get();
        return view('bumdes.laporankeuangan.bukubesar', compact('bukubesar','user','id','daftarakun'));
    }

    public function bukubesarpost(Request $request)
    {
        return redirect('/laporanbukubesar/'.$request->id);
    }
}
