<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Bantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bantuan = Bantuan::all();

        return view('admin.bantuan.index', compact('bantuan'));
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
        Bantuan::create($request->all());

        return redirect()->back()->with('ds','Bantuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function show(Bantuan $bantuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bantuan $bantuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Bantuan::where('id',$request->id)->update([
            'nama_program' => $request->nama_program,
            'sasaran' => $request->sasaran,
            'keterangan' => $request->keterangan,
            'asal_dana' => $request->asal_dana,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('du','Bantuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bantuan  $bantuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bantuan $bantuan)
    {
        $bantuan->delete();

        return redirect()->back()->with('dd','Bantuan');
    }
}
