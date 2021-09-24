<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;

class WebserviceController extends Controller
{
    public function data($token,$sesi,$id)
    {
        $user   = User::find($id);
        if ($token == 'cikara' AND $user) {
            switch ($sesi) {
                case 'penduduk':
                    $result   = Penduduk::where('nik',$user->name)->first();
                    break;
                
                default:
                    # code...
                    break;
            }
        } else {
            echo 'maaf akses ditolak';
            die();
        }
        return json_encode($result);
    }
}
