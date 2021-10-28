<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Anggotakelompok;
use App\Models\Kategorikelompok;
use App\Models\Kelompok;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorikelompok = Kategorikelompok::all();
        $penduduk   = Penduduk::all();
        if (isset($_GET['kategori']) AND $_GET['kategori'] <> 'semua') {
            $kategori = $_GET['kategori'];
            $kelompok   = DB::table('kelompok')
                            ->join('penduduk','kelompok.penduduk_id','=','penduduk.id')
                            ->join('kategori_kelompok','kelompok.kategorikelompok_id','=','kategori_kelompok.id')
                            ->select('kelompok.*','penduduk.nama_penduduk','kategori_kelompok.nama_kategori')
                            ->where('kelompok.kategorikelompok_id',$kategori)
                            ->get();
        } else {
            $kategori = NULL;
            $kelompok   = DB::table('kelompok')
                            ->join('penduduk','kelompok.penduduk_id','=','penduduk.id')
                            ->join('kategori_kelompok','kelompok.kategorikelompok_id','=','kategori_kelompok.id')
                            ->select('kelompok.*','penduduk.nama_penduduk','kategori_kelompok.nama_kategori')
                            ->get();
        }
        $menu       = 'kelompok';
        return view('admin.kependudukan.kelompok.index', compact('kelompok','kategorikelompok','penduduk','kategori','menu'));
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
        Kelompok::create($request->all());

        return redirect()->back()->with('ds','Kelompok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function show($kelompok)
    {
        $kelompok   = DB::table('kelompok')
                        ->join('penduduk','kelompok.penduduk_id','=','penduduk.id')
                        ->join('kategori_kelompok','kelompok.kategorikelompok_id','=','kategori_kelompok.id')
                        ->select('kelompok.*','penduduk.nama_penduduk','kategori_kelompok.nama_kategori')
                        ->where('kelompok.id', Crypt::decryptString($kelompok))
                        ->first();

        $anggotakelompok = DB::table('anggota_kelompok')
                            ->join('penduduk','anggota_kelompok.penduduk_id','=','penduduk.id')
                            ->select('anggota_kelompok.*','penduduk.nik','penduduk.nama_penduduk','penduduk.alamat_sekarang')
                            ->where('anggota_kelompok.kelompok_id',$kelompok->id)
                            ->get();
        $penduduk       = Penduduk::all();
        $menu           = 'kelompok';
        return view('admin.kependudukan.kelompok.show', compact('kelompok','anggotakelompok','penduduk','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelompok $kelompok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Kelompok::where('id',$request->id)->update([
            'nama_kelompok' => $request->nama_kelompok,
            'kode_kelompok' => $request->kode_kelompok,
            'penduduk_id' => $request->penduduk_id,
            'kategorikelompok_id' => $request->kategorikelompok_id,
            'deskripsi_kelompok' => $request->deskripsi_kelompok,
        ]);

        return redirect()->back()->with('du','Kelompok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelompok  $kelompok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelompok $kelompok)
    {
        $kelompok->delete();

        return redirect()->back()->with('dd','Kelompok');
    }
}
