<?php

namespace App\Http\Controllers\Sidesa\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Pemilih;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = 'pemilih';
        $sesi   = (isset($_GET['sesi'])) ? $_GET['sesi'] : 'index' ;
        $kategori   = Kategori::where('label','pemilih')->orderby('nama_kategori','ASC')->get();
        if ($sesi == 'index') {
            $kategori_id = (isset($_GET['kategori'])) ? $_GET['kategori'] : NULL ;
            $pemilih    = DB::table('pemilih')
                            ->join('penduduk','pemilih.penduduk_id','=','penduduk.id')
                            ->select('pemilih.*','penduduk.nama_penduduk')
                            ->where('pemilih.kategori_id',$kategori_id)
                            ->get();
            $penduduk   = Penduduk::all();
            $main       = [
                'kategori_id' => $kategori_id,
                'kategori' => Kategori::find($kategori_id),
            ];
            return view('admin.kependudukan.pemilih.index', compact('menu','main','pemilih','kategori','penduduk'));
        } else {
            return view('admin.kependudukan.pemilih.kategori', compact('menu','kategori'));
        }
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
        Pemilih::create($request->all());
        return back()->with('ds','Pemilih');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function show(Pemilih $pemilih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemilih $pemilih)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Pemilih::where('id',$request->id)->update([
            'penduduk_id' => $request->penduduk_id,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ]);

        return back()->with('du','Pemilih');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemilih $pemilih)
    {
        $pemilih->delete();

        return back()->with('dd','Pemilih');
    }
}
