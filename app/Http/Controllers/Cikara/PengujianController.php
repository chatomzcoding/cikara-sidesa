<?php

namespace App\Http\Controllers\Cikara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengujianController extends Controller
{
    public function index()
    {
        $mahasiswa = [['andri','alex','milea','firman','wini'],'alex'];
        return view('percobaan.index');
    }
}
