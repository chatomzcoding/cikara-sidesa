<?php

namespace App\Http\Controllers\Sidesa\Bantuan;

use App\Http\Controllers\Controller;
use App\Models\Pesertabantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PesertabantuanController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->file_kartu)) {
            
        } else {
            $nama_file = NULL;
        }
        
        Pesertabantuan::create([
            'bantuan_id' => $request->bantuan_id,
            'penduduk_id' => $request->penduduk_id,
            'no_kartu' => $request->no_kartu,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'file_kartu' => $nama_file
        ]);

        return redirect('/bantuan/'.Crypt::encryptString($request->bantuan_id))->with('ds','Peserta Bantuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesertabantuan  $pesertabantuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesertabantuan $pesertabantuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesertabantuan  $pesertabantuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesertabantuan $pesertabantuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesertabantuan  $pesertabantuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesertabantuan $pesertabantuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesertabantuan  $pesertabantuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesertabantuan $pesertabantuan)
    {
        //
    }
}
