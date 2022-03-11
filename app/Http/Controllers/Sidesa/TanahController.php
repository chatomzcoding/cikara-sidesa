<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Tanah;
use Illuminate\Http\Request;

class TanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = 'tanah';
        $tanah  = Tanah::all();
        $judul  = 'Pertanahan';
        return view('admin.tanah.index', compact('menu','tanah','judul'));
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
        Tanah::create([
            'nop' => $request->nop,
            'namawp' => $request->namawp,
            'alamatwp' => $request->alamatwp,
            'alamatop' => $request->alamatop,
            'kode_znt' => $request->kode_znt,
            'pbb_bumi' => $request->pbb_bumi,
            'pbb_bangunan' => $request->pbb_bangunan,
            'nonpbb_bumi' => $request->nonpbb_bumi,
            'nonpbb_bangunan' => $request->nonpbb_bangunan,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('ds','Pertanahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function show(Tanah $tanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanah $tanah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanah $tanah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanah $tanah)
    {
        //
    }
}
