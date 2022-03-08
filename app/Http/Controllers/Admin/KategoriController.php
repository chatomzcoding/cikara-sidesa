<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
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
        Kategori::create($request->all());
        if ($request->label == 'pemilih') {
            return back()->with('ds','Kategori Pemilih');
        } else {
            $kategori    = Kategori::latest()->first();
            $data               = [
                'sesi' => 'kategorivaksin',
                'aksi' => 'tambah',
                'table_id' => $kategori->id,
                'detail' => [
                    'data' => [
                        'tambah data kategori vaksin <strong>"'.$request->nama_kategori.'"</strong>'
                    ]
                ]
            ];
            DbCikara::saveLog($data);
            return back()->with('ds','Jenis Vaksin');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $kategori   = Kategori::find($request->id);
        Kategori::where('id',$request->id)->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan_kategori' => $request->keterangan_kategori
        ]);
        $detail     = [
            'data' => data_perubahan($kategori,$request,['nama_kategori','keterangan_kategori'])
        ];

        $data               = [
            'sesi' => 'kategorivaksin',
            'aksi' => 'edit',
            'table_id' => $request->id,
            'detail' => $detail
        ];
        DbCikara::saveLog($data);
        return back()->with('du','Jenis Vaksin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $data               = [
            'sesi' => 'kategorivaksin',
            'aksi' => 'hapus',
            'table_id' => $kategori->id,
            'detail' => [
                'data' => [
                    'hapus data kategori vaksin <strong>"'.$kategori->nama_kategori.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);
        $kategori->delete();
        return back()->with('dd','Jenis Vaksin');
    }
}
