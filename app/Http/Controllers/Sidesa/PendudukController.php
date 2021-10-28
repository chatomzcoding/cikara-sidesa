<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\Rt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk   = Penduduk::all();
        $menu       = 'penduduk';
        return view('admin.kependudukan.penduduk.index', compact('penduduk','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rt     = Rt::all();
        return view('admin.kependudukan.penduduk.create', compact('rt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:penduduk|max:16',
        ]);
        
        Penduduk::create($request->all());
        $menu = 'penduduk';
        return redirect('/penduduk')->with('ds','Penduduk','menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit($penduduk)
    {
        $penduduk = Penduduk::find(Crypt::decryptString($penduduk));
        $rt     = Rt::all();
        $menu   = 'penduduk';
        return view('admin.kependudukan.penduduk.edit', compact('penduduk','rt','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        Penduduk::where('id',$penduduk->id)->update([
            'nik' => $request->nik,
            'nama_penduduk' => $request->nama_penduduk,
            'status_ktp' => $request->status_ktp,
            'status_rekam' => $request->status_rekam,
            'id_card' => $request->id_card,
            'kk_sebelum' => $request->kk_sebelum,
            'hubungan_keluarga' => $request->hubungan_keluarga,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'status_penduduk' => $request->status_penduduk,
            'no_akta' => $request->no_akta,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'waktu_lahir' => $request->waktu_lahir,
            'tempat_dilahirkan' => $request->tempat_dilahirkan,
            'jenis_kelahiran' => $request->jenis_kelahiran,
            'anak_ke' => $request->anak_ke,
            'penolong_kelahiran' => $request->penolong_kelahiran,
            'berat_lahir' => $request->berat_lahir,
            'panjang_lahir' => $request->panjang_lahir,
            'pendidikan_kk' => $request->pendidikan_kk,
            'pendidikan_tempuh' => $request->pendidikan_tempuh,
            'pekerjaan' => $request->pekerjaan,
            'status_warganegara' => $request->status_warganegara,
            'nomor_paspor' => $request->nomor_paspor,
            'tgl_akhirpaspor' => $request->tgl_akhirpaspor,
            'nomor_kitas' => $request->nomor_kitas,
            'nik_ayah' => $request->nik_ayah,
            'nama_ayah' => $request->nama_ayah,
            'nik_ibu' => $request->nik_ibu,
            'nama_ibu' => $request->nama_ibu,
            'rt_id' => $request->rt_id,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'alamat_sebelum' => $request->alamat_sebelum,
            'alamat_sekarang' => $request->alamat_sekarang,
            'status_perkawinan' => $request->status_perkawinan,
            'no_bukunikah' => $request->no_bukunikah,
            'tgl_perkawinan' => $request->tgl_perkawinan,
            'akta_perceraian' => $request->akta_perceraian,
            'tgl_perceraian' => $request->tgl_perceraian,
            'golongan_darah' => $request->golongan_darah,
            'cacat' => $request->cacat,
            'sakit_menahun' => $request->sakit_menahun,
            'akseptor_kb' => $request->akseptor_kb,
            'asuransi' => $request->asuransi,
        ]);

        return redirect('/penduduk')->with('du','Penduduk');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();

        return redirect()->back()->with('dd','Penduduk');
    }
}
