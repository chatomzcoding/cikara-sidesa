<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Kategorikelompok;
use App\Models\Kelompok;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompok   = DB::table('kelompok')
                        ->join('penduduk','kelompok.penduduk_id','=','penduduk.id')
                        ->join('kategori_kelompok','kelompok.kategorikelompok_id','=','kategori_kelompok.id')
                        ->select('kelompok.*','penduduk.nama_penduduk','kategori_kelompok.nama_kategori')
                        ->get();
        $kategorikelompok = Kategorikelompok::all();
        $penduduk   = Penduduk::all();

        return view('admin.kependudukan.kelompok.index', compact('kelompok','kategorikelompok','penduduk'));
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
        Kelompok::create($request->all());

        return redirect()->back()->with('ds','Kelompok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function show(Kelompok $kelompok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelompok $kelompok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Kelompok::where('id',$request->id)->update([
            'nama_kelompok' => $request->nama_kelompok,
            'kode_kelompok' => $request->kode_kelompok,
            'penduduk_id' => $request->penduduk_id,
            'kategorikelompok_id' => $request->kategorikelompok_id,
            'deskripsi_kelompok' => $request->deskripsi_kelompok,
        ]);

        return redirect()->back()->with('du','Kelompok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelompok $kelompok)
    {
        //
    }
}
