<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Anggotarumahtangga;
use Illuminate\Http\Request;

class AnggotarumahtanggaController extends Controller
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
        Anggotarumahtangga::create($request->all());

        return redirect()->back()->with('ds','Anggota Rumah Tangga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggotarumahtangga  $anggotarumahtangga
     * @return \Illuminate\Http\Response
     */
    public function show(Anggotarumahtangga $anggotarumahtangga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggotarumahtangga  $anggotarumahtangga
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggotarumahtangga $anggotarumahtangga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggotarumahtangga  $anggotarumahtangga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Anggotarumahtangga::where('id',$request->id)->update([
            'penduduk_id' => $request->penduduk_id
        ]);

        return redirect()->back()->with('du','Anggota Rumah Tangga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggotarumahtangga  $anggotarumahtangga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggotarumahtangga $anggotarumahtangga)
    {
        $anggotarumahtangga->delete();

        return redirect()->back()->with('dd','Anggota Rumah Tangga');
    }
}
