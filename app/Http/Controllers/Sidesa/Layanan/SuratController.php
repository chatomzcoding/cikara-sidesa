<?php

namespace App\Http\Controllers\Sidesa\Layanan;

use App\Http\Controllers\Controller;
use App\Models\Penduduksurat;
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
        $surat  = DB::table('penduduk_surat')
                    ->join('format_surat','penduduk_surat.formatsurat_id','=','format_surat.id')
                    ->select('penduduk_surat.*','format_surat.nama_surat')
                    ->get();
        $judul  = 'Pengajuan Surat';
        $total  = [
            'jumlah' => count($surat),
            'selesai' => Penduduksurat::where('status','selesai')->count(),
            'proses' => Penduduksurat::where('status','proses')->count(),
            'menunggu' => Penduduksurat::where('status','menunggu')->count(),
        ];
        $menu   = 'suratpenduduk';
        return view('admin.layananmandiri.surat.index', compact('surat','judul','total','menu'));
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
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduksurat $penduduksurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduksurat $penduduksurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Penduduksurat::where('id',$request->id)->update([
            'status' => $request->status,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
        ]);

        return redirect()->back()->with('du','Surat Penduduk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduksurat $penduduksurat)
    {
        //
    }
}
