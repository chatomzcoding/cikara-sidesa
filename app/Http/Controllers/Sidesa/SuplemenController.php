<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Anggotasuplemen;
use App\Models\Penduduk;
use App\Models\Suplemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SuplemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplemen   = Suplemen::all();

        return view('admin.kependudukan.suplemen.index', compact('suplemen'));
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
        Suplemen::create($request->all());

        return redirect()->back()->with('ds','Suplemen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suplemen  $suplemen
     * @return \Illuminate\Http\Response
     */
    public function show($suplemen)
    {
        $suplemen = Suplemen::find(Crypt::decryptString($suplemen));
        $anggotasuplemen = Anggotasuplemen::where('suplemen_id',$suplemen->id)->get();
        $penduduk   = Penduduk::all();
        return view('admin.kependudukan.suplemen.show', compact('suplemen','anggotasuplemen','penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suplemen  $suplemen
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplemen $suplemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suplemen  $suplemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Suplemen::where('id',$request->id)->update([
            'sasaran' => $request->sasaran,
            'nama_suplemen' => $request->nama_suplemen,
            'keterangan_suplemen' => $request->keterangan_suplemen,
        ]);

        return redirect()->back()->with('du','Suplemen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suplemen  $suplemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suplemen $suplemen)
    {
        $suplemen->delete();

        return redirect()->back()->with('dd','Suplemen');
    }
}
