<?php

namespace App\Http\Controllers\Sidesa\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\Formatsurat;
use App\Models\Penduduk;
use App\Models\Suratkeluar;
use Illuminate\Http\Request;

class SuratkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = 'suratkeluar';
        $s = (isset($_GET['s'])) ? $_GET['s'] : 'index' ;
        $formatsurat = Formatsurat::where('layanan_mandiri','tidak')->get();
        $suratkeluar = Suratkeluar::latest()->get();
        switch ($s) {
            case 'format':
                return view('admin.sekretariat.suratkeluar.format.index', compact('menu','formatsurat'));
                break;
            
            default:
            return view('admin.sekretariat.suratkeluar.index', compact('menu','suratkeluar','formatsurat'));
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formatsurat    = Formatsurat::find($_GET['id']);
        $menu           = 'surat keluar';
        $penduduk       = Penduduk::all('nama_penduduk','nik','id');
        $penduduk_id    = (isset($_GET['penduduk_id'])) ? $_GET['penduduk_id'] : NULL ;
        $main           = [
            'id' => $penduduk_id,
            'penduduk' => Penduduk::find($penduduk_id)
        ];
        return view('admin.sekretariat.suratkeluar.create', compact('menu','formatsurat','penduduk','main'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function show(Formatsurat $formatsurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Formatsurat $formatsurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Formatsurat::where('id',$request->id)->update([
            'nama_surat' => $request->nama_surat,
            'kode' => $request->kode,
        ]);

        return back()->with('du','Surat Keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formatsurat $formatsurat)
    {
        //
    }
}
