<?php

namespace App\Http\Controllers\Sidesa\Desa;

use App\Http\Controllers\Controller;
use App\Models\Dusun;
use App\Models\Penduduk;
use App\Models\Rw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dusun      = Dusun::all();
        $penduduk   = Penduduk::all();
        $menu       = 'wilayah';
        return view('admin.infodesa.wilayah.dusun.index', compact('dusun','penduduk','menu'));
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
        Dusun::create($request->all());

        return redirect()->back()->with('ds','Wilayah Administratif Dusun');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function show($dusun)
    {
        $dusun  = Dusun::find(Crypt::decryptString($dusun));
        $rw     = Rw::where('dusun_id',$dusun->id)->get();
        $penduduk   = Penduduk::all();
        $menu   = 'wilayah';
        return view('admin.infodesa.wilayah.dusun.show', compact('dusun','penduduk','rw','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function edit(Dusun $dusun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Dusun::where('id',$request->id)->update([
            'nama_dusun' => $request->nama_dusun,
            'nik' => $request->nik,
        ]);

        return redirect()->back()->with('du','Wilayah Administratif Dusun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dusun  $dusun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dusun $dusun)
    {
        $dusun->delete();

        return redirect()->back()->with('du','Wilayah Administratif Dusun');
    }
}
