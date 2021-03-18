<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staf = Staf::all();

        return view('admin.infodesa.pemerintahdesa.index', compact('staf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infodesa.pemerintahdesa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Staf::create($request->all());

        return redirect('/staf')->with('ds','Staf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function show(Staf $staf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function edit($staf)
    {
        $staf = Staf::find(Crypt::decryptString($staf));
        return view('admin.infodesa.pemerintahdesa.edit', compact('staf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staf $staf)
    {
        Staf::where('id', $staf->id)->update([
            'nama_pegawai' => $request->nama_pegawai,
            'nik' => $request->nik,
            'nipd' => $request->nipd,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'pendidikan' => $request->pendidikan,
            'agama' => $request->agama,
            'golongan' => $request->golongan,
            'nosk_pengangkatan' => $request->nosk_pengangkatan,
            'tglsk_pengangkatan' => $request->tglsk_pengangkatan,
            'nosk_pemberhentian' => $request->nosk_pemberhentian,
            'tglsk_pemberhentian' => $request->tglsk_pemberhentian,
            'masa_jabatan' => $request->masa_jabatan,
            'jabatan' => $request->jabatan,
            'status_pegawai' => $request->status_pegawai,
        ]);

        return redirect('/staf')->with('du','Staf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staf $staf)
    {
        $staf->delete();

        return redirect()->back()->with('dd','Staf');
    }
}
