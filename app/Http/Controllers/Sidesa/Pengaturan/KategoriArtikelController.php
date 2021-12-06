<?php

namespace App\Http\Controllers\Sidesa\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Kategoriartikel;
use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriartikel   = Kategoriartikel::orderBy('nama_kategori','ASC')->get();

        $menu   = 'artikel';
        return view('admin.pengaturan.artikel.kategori.index', compact('kategoriartikel','menu'));
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
        Kategoriartikel::create($request->all());

        return redirect()->back()->with('ds','Kategori Artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategoriartikel  $kategoriartikel
     * @return \Illuminate\Http\Response
     */
    public function show(Kategoriartikel $kategoriartikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategoriartikel  $kategoriartikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategoriartikel $kategoriartikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategoriartikel  $kategoriartikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Kategoriartikel::where('id',$request->id)->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('du','Kategori Artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategoriartikel  $kategoriartikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategoriartikel $kategoriartikel)
    {
        $kategoriartikel->delete();

        return redirect()->back()->with('dd','Kategori Artikel');
    }
}
