<?php

namespace App\Http\Controllers\Sidesa\Statistik;

use App\Http\Controllers\Controller;
use App\Models\Bantuan;
use App\Models\Dusun;
use Illuminate\Http\Request;

class KependudukanController extends Controller
{
    public function pilih($sesi,$pilih)
    {
        $dusun  = Dusun::all();
        $bantuan    = Bantuan::all();
        return view('admin.statistik.index', compact('sesi','dusun','bantuan','pilih'));
    }
}
