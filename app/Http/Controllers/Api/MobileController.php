<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
