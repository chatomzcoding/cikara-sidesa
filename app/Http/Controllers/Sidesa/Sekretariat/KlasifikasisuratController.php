<?php

namespace App\Http\Controllers\Sidesa\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\Klasifikasisurat;
use Illuminate\Http\Request;

class KlasifikasisuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasisurat = Klasifikasisurat::all();

        return view('admin.sekretariat.klasifikasisurat.index', compact('klasifikasisurat'));
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
        Klasifikasisurat::create($request->all());

        return redirect()->back()->with('ds','Klasifikasi Surat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klasifikasisurat  $klasifikasisurat
     * @return \Illuminate\Http\Response
     */
    public function show(Klasifikasisurat $klasifikasisurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klasifikasisurat  $klasifikasisurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Klasifikasisurat $klasifikasisurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klasifikasisurat  $klasifikasisurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Klasifikasisurat::where('id',$request->id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('du','Klasifikasi Surat');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klasifikasisurat  $klasifikasisurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klasifikasisurat $klasifikasisurat)
    {
        $klasifikasisurat->delete();

        return redirect()->back()->with('dd','Klasifikasi Surat');

    }
}
