<?php

namespace App\Http\Controllers\Bumdes;

use App\Http\Controllers\Controller;
use App\Models\Datapokok;
use Illuminate\Http\Request;

class DatapokokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapokok = Datapokok::first();

        return view('pimpinan.datapokok.index', compact('datapokok'));
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
     * @param  \App\Models\Datapokok  $datapokok
     * @return \Illuminate\Http\Response
     */
    public function show(Datapokok $datapokok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datapokok  $datapokok
     * @return \Illuminate\Http\Response
     */
    public function edit(Datapokok $datapokok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datapokok  $datapokok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datapokok $datapokok)
    {
        Datapokok::where('id',$datapokok->id)->update([
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'nama_bumdes' => $request->nama_bumdes,
            'penasehat' => $request->penasehat,
            'direktur' => $request->direktur,
            'manajer_keuangan' => $request->manajer_keuangan,
            'manajer_administrasi' => $request->manajer_administrasi,
            'manajer_unit' => $request->manajer_unit,
            'staf' => $request->staf,
            'ketua_pengawas' => $request->ketua_pengawas,
            'berdiri_tanggal' => $request->berdiri_tanggal,
            'dasar_hukum' => $request->dasar_hukum,
        ]);
        return redirect()->back()->with('status','Data Pokok Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datapokok  $datapokok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datapokok $datapokok)
    {
        //
    }
}
