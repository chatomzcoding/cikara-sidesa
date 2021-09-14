<?php

namespace App\Http\Controllers\Sidesa\Layanan;

use App\Http\Controllers\Controller;
use App\Models\Suratpenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat  = DB::table('surat_penduduk')
                    ->join('klasifikasi_surat','surat_penduduk.klasifikasisurat_id','=','klasifikasi_surat.id')
                    ->select('surat_penduduk.*','klasifikasi_surat.nama')
                    ->get();
        $judul  = 'Pengajuan Surat';
        $total  = [
            'jumlah' => count($surat),
            'selesai' => Suratpenduduk::where('status','selesai')->count(),
            'proses' => Suratpenduduk::where('status','proses')->count(),
            'menunggu' => Suratpenduduk::where('status','menunggu')->count(),
        ];

        return view('admin.layananmandiri.surat.index', compact('surat','judul','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suratpenduduk  $suratpenduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Suratpenduduk $suratpenduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suratpenduduk  $suratpenduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Suratpenduduk $suratpenduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suratpenduduk  $suratpenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suratpenduduk $suratpenduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suratpenduduk  $suratpenduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suratpenduduk $suratpenduduk)
    {
        //
    }
}
