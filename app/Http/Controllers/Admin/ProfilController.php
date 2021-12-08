<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil     = Profil::first();
        $menu   = 'profil';
        $info   = Info::where('nama','kantor desa')->first();
        return view('admin.infodesa.identitas.index', compact('profil','menu','info'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit($profil)
    {
        $profil = Profil::find(Crypt::decryptString($profil));
        $menu   = 'profil';
        return view('admin.infodesa.identitas.edit', compact('profil','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        Profil::where('id',$profil->id)->update([
            'nama_desa' => $request->nama_desa,
            'kode_desa' => $request->kode_desa,
            'kode_pos' => $request->kode_pos,
            'kepala_desa' => $request->kepala_desa,
            'nip_kepaladesa' => $request->nip_kepaladesa,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'website' => $request->website,
            'nama_kecamatan' => $request->nama_kecamatan,
            'kode_kecamatan' => $request->kode_kecamatan,
            'nama_camat' => $request->nama_camat,
            'nip_camat' => $request->nip_camat,
            'nama_kabupaten' => $request->nama_kabupaten,
            'kode_kabupaten' => $request->kode_kabupaten,
            'provinsi' => $request->provinsi,
            'kode_provinsi' => $request->kode_provinsi,
        ]);

        return redirect('/profil')->with('du','Profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
