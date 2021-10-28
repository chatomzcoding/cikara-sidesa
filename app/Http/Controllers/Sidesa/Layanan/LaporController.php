<?php

namespace App\Http\Controllers\Sidesa\Layanan;

use App\Http\Controllers\Controller;
use App\Models\Lapor;
use Illuminate\Http\Request;

class LaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lapor  = Lapor::all();
        $judul  = 'Laporan Penduduk';
        $menu   = 'laporpenduduk';
        return view('admin.layananmandiri.lapor.index', compact('lapor','judul','menu'));
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
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function show(Lapor $lapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapor $lapor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Lapor::where('id',$request->id)->update([
            'status' => $request->status,
            'tanggapan' => $request->tanggapan,
        ]);

        return redirect()->back()->with('duc','Tanggapan sudah direspon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function destroy($lapor)
    {
        $lapor = Lapor::find($lapor);
        deletefile('public/img/penduduk/lapor/'.$lapor->photo);
        $lapor->delete();
        return redirect()->back()->with('dd','Laporan');

    }
}
