<?php

namespace App\Http\Controllers\Sidesa\Pengaturan;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Kategoriartikel;
use App\Models\Log;
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
        $menu   = 'artikel';
        $kategoriartikel   = Kategoriartikel::orderBy('nama_kategori','ASC')->get();
        $log    = Log::where('sesi','kategori_artikel')->get();
        dd($log);
        return view('admin.pengaturan.artikel.kategori.index', compact('kategoriartikel','menu','log'));
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

        $kategoriartikel    = Kategoriartikel::latest()->first();
        $data               = [
            'sesi' => 'kategori_artikel',
            'aksi' => 'tambah',
            'table_id' => $kategoriartikel->id,
            'detail' => [
                'data' => [
                    'tambah data Kategori <strong>"'.$request->nama_kategori.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);

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
        $kategoriartikel = Kategoriartikel::find($request->id);

        Kategoriartikel::where('id',$request->id)->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        $detail     = [
            'data' => data_perubahan($kategoriartikel,$request,['nama_kategori','keterangan'])
        ];

        $data               = [
            'sesi' => 'kategori_artikel',
            'aksi' => 'edit',
            'table_id' => $request->id,
            'detail' => $detail
        ];
        DbCikara::saveLog($data);

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
        $data               = [
            'sesi' => 'kategori_artikel',
            'aksi' => 'hapus',
            'table_id' => $kategoriartikel->id,
            'detail' => [
                'data' => [
                    'hapus data Kategori <strong>"'.$kategoriartikel->nama_kategori.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);

        $kategoriartikel->delete();

        return redirect()->back()->with('dd','Kategori Artikel');
    }
}
