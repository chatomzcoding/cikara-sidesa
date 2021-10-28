<?php

namespace App\Http\Controllers\Sidesa\Layanan;

use App\Http\Controllers\Controller;
use App\Models\Datasyaratsurat;
use Illuminate\Http\Request;

class DatasyaratsuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syarat = Datasyaratsurat::all();
        $menu   = 'syaratsurat';
        return view('admin.layananmandiri.surat.datasyaratsurat', compact('syarat','menu'));
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
        Datasyaratsurat::create($request->all());

        return redirect()->back()->with('ds','Data Syarat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datasyaratsurat  $datasyaratsurat
     * @return \Illuminate\Http\Response
     */
    public function show(Datasyaratsurat $datasyaratsurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datasyaratsurat  $datasyaratsurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Datasyaratsurat $datasyaratsurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datasyaratsurat  $datasyaratsurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Datasyaratsurat::where('id',$request->id)->update([
            'nama_syarat' => $request->nama_syarat
        ]);
        return redirect()->back()->with('du','Data Syarat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datasyaratsurat  $datasyaratsurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datasyaratsurat $datasyaratsurat)
    {
        $datasyaratsurat->delete();
        return redirect()->back()->with('ds','Data Syarat');
    }
}
