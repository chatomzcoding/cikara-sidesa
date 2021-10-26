<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Anggotakeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AnggotakeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Anggotakeluarga::create($request->all());

        return redirect('/keluarga/'.Crypt::encryptString($request->keluarga_id))->with('ds','Anggota Keluarga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggotakeluarga  $anggotakeluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Anggotakeluarga $anggotakeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggotakeluarga  $anggotakeluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggotakeluarga $anggotakeluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggotakeluarga  $anggotakeluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Anggotakeluarga::where('id',$request->id)->update([
            'penduduk_id' => $request->penduduk_id,
            'hubungan' => $request->hubungan,
        ]);

        return redirect()->back()->with('du','Anggota Keluarga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggotakeluarga  $anggotakeluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggotakeluarga $anggotakeluarga)
    {
        $anggotakeluarga->delete();

        return redirect()->back()->with('dd','Anggota Keluarga');
    }
}
