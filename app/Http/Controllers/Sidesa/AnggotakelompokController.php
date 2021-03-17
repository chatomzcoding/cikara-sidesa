<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Anggotakelompok;
use Illuminate\Http\Request;

class AnggotakelompokController extends Controller
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
        Anggotakelompok::create($request->all());

        return redirect()->back()->with('ds','Anggota Kelompok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggotakelompok  $anggotakelompok
     * @return \Illuminate\Http\Response
     */
    public function show(Anggotakelompok $anggotakelompok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggotakelompok  $anggotakelompok
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggotakelompok $anggotakelompok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggotakelompok  $anggotakelompok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Anggotakelompok::where('id',$request->id)->update([
            'penduduk_id' => $request->penduduk_id,
            'nomor_anggota' => $request->nomor_anggota,
        ]);

        return redirect()->back()->with('du','Anggota Kelompok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggotakelompok  $anggotakelompok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggotakelompok $anggotakelompok)
    {
        $anggotakelompok->delete();

        return redirect()->back()->with('dd','Anggota Kelompok');
    }
}
