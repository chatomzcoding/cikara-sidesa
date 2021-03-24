<?php

namespace App\Http\Controllers\Sidesa\Desa;

use App\Http\Controllers\Controller;
use App\Models\Rt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RtController extends Controller
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
        Rt::create($request->all());

        return redirect('/rw/'.Crypt::encryptString($request->rw_id))->with('ds','Wilayah Administratif RT');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function show(Rt $rt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function edit(Rt $rt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Rt::where('id',$request->id)->update([
            'nama_rt' => $request->nama_rt,
            'nik' => $request->nik,
        ]);

        return redirect('/rw/'.Crypt::encryptString($request->rw_id))->with('du','Wilayah Administratif RT');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rt  $rt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rt $rt)
    {
        $rt->delete();

        return redirect('/rw/'.Crypt::encryptString($rt->rw_id))->with('dd','Wilayah Administratif RT');
    }
}
