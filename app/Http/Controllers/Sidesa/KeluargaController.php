<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Anggotakeluarga;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk   = Penduduk::where('jk','laki-laki')->where('status_perkawinan','kawin')->get();
        $keluarga   = DB::table('keluarga')
                        ->join('penduduk','keluarga.penduduk_id','=','penduduk.id')
                        ->join('rt','penduduk.rt_id','=','rt.id')
                        ->join('rw','rt.rw_id','=','rw.id')
                        ->join('dusun','rw.dusun_id','=','dusun.id')
                        ->select('keluarga.*','penduduk.nama_penduduk','penduduk.jk','penduduk.alamat_sekarang','penduduk.nik','rt.nama_rt','rw.nama_rw','dusun.nama_dusun')
                        ->get();
        $menu       = 'keluarga';
        return view('admin.kependudukan.keluarga.index', compact('keluarga','penduduk','menu'));
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
        Keluarga::create($request->all());

        // tambahkan kepala keluarga otomatis

        // ambil data keluarga dari penduduk_id
        $keluarga = Keluarga::where('penduduk_id',$request->penduduk_id)->first();
        Anggotakeluarga::create([
            'keluarga_id' => $keluarga->id,
            'penduduk_id' => $keluarga->penduduk_id,
            'hubungan' => 'suami'
        ]);

        return redirect('/keluarga/'.Crypt::encryptString($keluarga->id))->with('ds','Keluarga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show($keluarga)
    {
        $keluarga   = Keluarga::find(Crypt::decryptString($keluarga));
        $penduduk   = Penduduk::find($keluarga->penduduk_id);
        $listpenduduk = Penduduk::all();
        $anggotakeluarga = DB::table('anggota_keluarga')
                            ->join('penduduk','anggota_keluarga.penduduk_id','=','penduduk.id')
                            ->select('anggota_keluarga.*','penduduk.nik','penduduk.nama_penduduk','penduduk.tgl_lahir','penduduk.jk')
                            ->get();
        $menu       = 'keluarga';
        return view('admin.kependudukan.keluarga.show', compact('keluarga','penduduk','anggotakeluarga','listpenduduk','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluarga $keluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluarga $keluarga)
    {
        $keluarga->delete();

        return redirect()->back()->with('dd','Keluarga');
    }
}
