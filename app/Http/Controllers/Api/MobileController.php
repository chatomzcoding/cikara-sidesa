<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Forum;
use App\Models\Kategori;
use App\Models\Lapak;
use App\Models\Lapor;
use App\Models\Penduduksurat;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    // detail lapak per user
    public function lapakByUser($user_id)
    {
        return Lapak::where('user_id',$user_id)->first();
    }

    public function listuser()
    {
        $token = $_GET['token'];
        if (cektoken($token)) {
            return User::where('level','penduduk')->get();
        } else {
            return response()->json('akses dilarang');
        }
        
    }

    public function kategori($sesi)
    {
        switch ($sesi) {
            case 'laporan':
                $result = Kategori::where('label','lapor')->get();
                break;
            
            default:
                $result = NULL;
                break;
        }

        return $result;
    }

    public function listartikel()
    {
        return Artikel::all();
    }

    public function dashboarduser($sesi,$user)
    {
        switch ($sesi) {
            case 'lapor':
                $result  = [
                    'total' => Lapor::where('user_id',$user)->count(),
                    'selesai' => Lapor::where('user_id',$user)->where('status','selesai')->count(),
                    'proses' => Lapor::where('user_id',$user)->where('status','proses')->count(),
                    'menunggu' => Lapor::where('user_id',$user)->where('status','menunggu')->count(),
                ];

                break;
            case 'home':
                $lapak  = Lapak::where('user_id',$user)->first();
                if ($lapak) {
                    $totalproduk = Produk::where('lapak_id',$lapak->id)->count();
                } else {
                    $totalproduk = 0;
                }
                $result = [
                    'laporan' => Lapor::where('user_id',$user)->count(),
                    'surat' => Penduduksurat::where('user_id',$user)->count(),
                    'produk' => $totalproduk,
                    'forum' => Forum::count(),
                ];
                break;
            
            default:
                # code...
                break;
        }

        return $result;
    }
}
