<?php

namespace App\Http\Controllers\Sidesa\Desa;

use App\Http\Controllers\Controller;
use App\Models\Dusun;
use App\Models\Penduduk;
use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RwController extends Controller
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
        Rw::create($request->all());

        return redirect('/dusun/'.Crypt::encryptString($request->dusun_id))->with('ds','Wilayah Administratif RW');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function show($rw)
    {
        $rw         = Rw::find(Crypt::decryptString($rw));
        $rt         = Rt::where('rw_id',$rw->id)->get();
        $penduduk   = Penduduk::all();
        $menu       = 'wilayah';
        return view('admin.infodesa.wilayah.rw.show', compact('rw','penduduk','rt','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function edit(Rw $rw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Rw::where('id',$request->id)->update([
            'nama_rw' => $request->nama_rw,
            'nik' => $request->nik,
        ]);

        return redirect('/dusun/'.Crypt::encryptString($request->dusun_id))->with('du','Wilayah Administratif RW');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rw $rw)
    {
        $rw->delete();

        return redirect('/dusun/'.Crypt::encryptString($rw->dusun_id))->with('dd','Wilayah Administratif RW');
    }
}
