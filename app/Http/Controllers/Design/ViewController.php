<?php

namespace App\Http\Controllers\Design;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view($sesi)
    {
        switch ($sesi) {
            // MENU INFO DESA 
            case 'profil':
                return view('admin.profil.index');
                break;
            
            // MENU KEPENDUDUKAN
            case 'penduduk':
                return view('admin.kependudukan.penduduk.index');
                break;
            case 'keluarga':
                return view('admin.kependudukan.keluarga.index');
                break;
            default:
                # code...
                break;
        }
    }
}
