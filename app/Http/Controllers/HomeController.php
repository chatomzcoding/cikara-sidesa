<?php

namespace App\Http\Controllers;

use App\Helpers\Cikara\DbCikara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user   = Auth::user();
        switch ($user->level) {
            case 'admin':
                return view('admin.dashboard');
                break;
            case 'penduduk':
                return view('penduduk.dashboard');
                break;
            
            default:
                # code...
                break;
        }
        return view('dashboard');
    }

    public function tampilan($sesi)
    {
        switch ($sesi) {
            case 'lapor':
                $judul = 'Laporan Penduduk';
                return view('admin.layananmandiri.lapor.index', compact('judul'));
                break;
            case 'lapak':
                $judul  = 'Lapak Desa';
                return view('admin.layananmandiri.lapak.index',compact('judul'));
                break;
            case 'showlapak':
                $judul  = 'Detail Lapak Ikan Pancing';
                return view('admin.layananmandiri.lapak.show',compact('judul'));
                break;
            case 'forum':
                $judul  = 'Forum';
                return view('admin.layananmandiri.forum.index',compact('judul'));
                break;
            case 'covid':
                $judul  = 'Covid 19';
                return view('admin.layananmandiri.covid',compact('judul'));
                break;
            case 'surat':
                $judul  = 'Permintaan Surat';
                return view('admin.layananmandiri.surat',compact('judul'));
                break;
            case 'penduduk':
                $judul  = 'Penduduk';
                return view('admin.layananmandiri.penduduk',compact('judul'));
                break;
            case 'kk':
                $judul  = 'Kartu Keluarga';
                return view('admin.layananmandiri.kk',compact('judul'));
                break;
            
            default:
                # code...
                break;
        }
    }
}
