<?php

namespace App\Http\Controllers\Sidesa\Statistik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporankelompokrentanController extends Controller
{
    public function index()
    {
        $menu   = 'laporankelompok';
        return view('admin.statistik.laporankelompokrentan.index', compact('menu'));
    }
}
