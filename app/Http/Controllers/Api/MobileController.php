<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Lapak;
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

    public function tambahlapak(Request $request)
    {
        $token = $request->token;
        if (cektoken($token)) {
            Lapak::create([
                'user_id' => $request->user_id,
                'nama_lapak' => $request->nama_lapak,
                'tentang' => $request->tentang,
                'alamat' => $request->alamat,
                'status_lapak' => $request->status_lapak,
                'telp' => $request->telp,
                'logo' => $request->logo,
            ]);
    
            if (response()) {
                $result["success"] = "1";
                $result["message"] = "success";
            } else {
                $result["success"] = "0";
                $result["message"] = "error";
            }
        } else {
            $result["success"] = "0";
            $result["message"] = "Access Denied";
        }

        return $result;
        
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
}
