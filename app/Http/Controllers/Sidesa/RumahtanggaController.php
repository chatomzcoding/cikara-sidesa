<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Anggotarumahtangga;
use App\Models\Penduduk;
use App\Models\Rumahtangga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class RumahtanggaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumahtangga    = DB::table('rumah_tangga')
                            ->join('penduduk','rumah_tangga.penduduk_id','=','penduduk.id')
                            ->select('rumah_tangga.*','penduduk.nama_penduduk','penduduk.nik','penduduk.alamat_sekarang')
                            ->get();
        $penduduk       = Penduduk::all();

        return view('admin.kependudukan.rumahtangga.index', compact('rumahtangga','penduduk'));
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
        Rumahtangga::create($request->all());

        // simpan kepala rumah tangga

        $rumahtangga  = Rumahtangga::where('penduduk_id',$request->penduduk_id)->first();

        Anggotarumahtangga::create([
            'rumahtangga_id' => $rumahtangga->id,
            'penduduk_id' => $rumahtangga->penduduk_id,
        ]);

        return redirect('/rumahtangga/'.Crypt::encryptString($rumahtangga->id))->with('ds','Rumah Tangga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rumahtangga  $rumahtangga
     * @return \Illuminate\Http\Response
     */
    public function show($rumahtangga)
    {
        $rumahtangga = DB::table('rumah_tangga')
        ->join('penduduk','rumah_tangga.penduduk_id','=','penduduk.id')
        ->select('rumah_tangga.*','penduduk.nama_penduduk','penduduk.nik','penduduk.alamat_sekarang')
        ->where('rumah_tangga.id',Crypt::decryptString($rumahtangga))
        ->first();

        $anggotarumahtangga = DB::table('anggota_rumah_tangga')
                                ->join('penduduk','anggota_rumah_tangga.penduduk_id','=','penduduk.id')
                                ->select('anggota_rumah_tangga.*','penduduk.nama_penduduk','penduduk.nik','penduduk.jk','penduduk.alamat_sekarang')
                                ->where('rumahtangga_id',$rumahtangga->id)->get();
        $penduduk = Penduduk::all();
        return view('admin.kependudukan.rumahtangga.show', compact('rumahtangga','penduduk','anggotarumahtangga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rumahtangga  $rumahtangga
     * @return \Illuminate\Http\Response
     */
    public function edit(Rumahtangga $rumahtangga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rumahtangga  $rumahtangga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rumahtangga $rumahtangga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rumahtangga  $rumahtangga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rumahtangga $rumahtangga)
    {
        $rumahtangga->delete();

        return redirect()->back()->with('dd','Rumah Tangga');
    }
}