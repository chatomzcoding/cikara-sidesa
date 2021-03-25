<?php

namespace App\Http\Controllers\Sidesa\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanbulananController extends Controller
{
    public function index()
    {
        return view('admin.statistik.laporanbulanan.index');
    }
}
