<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\Pendudukaduan;
use App\Models\Userakses;
use Illuminate\Http\Request;

class PendudukaduanController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendudukaduan  $pendudukaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendudukaduan $pendudukaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendudukaduan  $pendudukaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendudukaduan $pendudukaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendudukaduan  $pendudukaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $aduan = Pendudukaduan::find($request->id);

        Pendudukaduan::where('id',$request->id)->update([
            'status' => $request->status
        ]);

        // ubah data penduduk
        $userakses  = Userakses::where('user_id',$aduan->user_id)->first();
        $key        = $aduan->key;
        if (isset($request->databaru)) {
            Penduduk::where('id',$userakses->penduduk_id)->update([
                $key => $request->databaru
            ]);
        } else {
            Penduduk::where('id',$userakses->penduduk_id)->update([
                $key => $request->$key
            ]);
        }
        

        return back()->with('du','Data Aduan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendudukaduan  $pendudukaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendudukaduan $pendudukaduan)
    {
        $pendudukaduan->delete();

        return back()->with('dd','Pengaduan');
    }
}
