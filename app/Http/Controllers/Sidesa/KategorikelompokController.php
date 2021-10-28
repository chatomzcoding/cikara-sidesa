<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Kategorikelompok;
use Illuminate\Http\Request;

class KategorikelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorikelompok = Kategorikelompok::all();
        $menu           = 'kelompok';
        return view('admin.kependudukan.kelompok.kategori.index', compact('kategorikelompok','menu'));
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
        Kategorikelompok::create($request->all());

        return redirect()->back()->with('ds','Kategori Kelompok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategorikelompok  $kategorikelompok
     * @return \Illuminate\Http\Response
     */
    public function show(Kategorikelompok $kategorikelompok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategorikelompok  $kategorikelompok
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategorikelompok $kategorikelompok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategorikelompok  $kategorikelompok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Kategorikelompok::where('id',$request->id)->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi_kategori' => $request->deskripsi_kategori,
        ]);

        return redirect()->back()->with('du','Kategori Kelompok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategorikelompok  $kategorikelompok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategorikelompok $kategorikelompok)
    {
        $kategorikelompok->delete();

        return redirect()->back()->with('dd','Kategori Kelompok');
    }
}
