<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Formatsurat;
use App\Models\Klasifikasisurat;
use App\Models\Penduduksurat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function listklasifikasisurat()
    {
        return Klasifikasisurat::all();
    }

    public function listformatsurat()
    {
        return Formatsurat::all();
    }

    public function formatsuratbykode($kode)
    {
        return format_surat($kode);
    }

    public function listsuratbyuser($user)
    {
        return Penduduksurat::where('user_id',$user)->get();
    }
}
