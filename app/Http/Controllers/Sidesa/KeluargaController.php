<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Anggotakeluarga;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk   = Penduduk::all();
        $keluarga   = DB::table('keluarga')
                        ->join('penduduk','keluarga.penduduk_id','=','penduduk.id')
                        ->select('keluarga.*','penduduk.nama_penduduk','penduduk.jk','penduduk.alamat_sekarang','penduduk.nik')
                        ->get();
        return view('admin.kependudukan.keluarga.index', compact('keluarga','penduduk'));
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
        Keluarga::create($request->all());

        return redirect()->back()->with('ds','Keluarga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show($keluarga)
    {
        $keluarga   = Keluarga::find(Crypt::decryptString($keluarga));
        $penduduk   = Penduduk::find($keluarga->penduduk_id);
        $listpenduduk = Penduduk::all();
        $anggotakeluarga = DB::table('anggota_keluarga')
                            ->join('penduduk','anggota_keluarga.penduduk_id','=','penduduk.id')
                            ->select('anggota_keluarga.*','penduduk.nik','penduduk.nama_penduduk','penduduk.tgl_lahir','penduduk.jk')
                            ->get();
        return view('admin.kependudukan.keluarga.show', compact('keluarga','penduduk','anggotakeluarga','listpenduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluarga $keluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluarga $keluarga)
    {
        $keluarga->delete();

        return redirect()->back()->with('dd','Keluarga');
    }
}
