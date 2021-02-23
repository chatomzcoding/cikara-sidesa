<?php

namespace App\Http\Controllers\Bumdes;

use App\Http\Controllers\Controller;
use App\Models\Daftarakunpembantu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarakunpembantuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user       = Auth::user();
        $daftarakunpembantu = Daftarakunpembantu::where('user_id',$user->id)->get();

        return view('bumdes.daftarakunpembantu.index', compact('user','daftarakunpembantu'));
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
        Daftarakunpembantu::create([
            'user_id' => $request->user_id,
            'kode_bantu' => $request->kode_bantu,
            'nama_akun' => $request->nama_akun,
            'status' => $request->status,
            'saldo_akunpembantu' => cikararesetrupiah($request->saldo_akunpembantu),
        ]);

		return redirect()->back()->with('ds','Akun Pembantu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daftarakunpembantu  $daftarakunpembantu
     * @return \Illuminate\Http\Response
     */
    public function show(Daftarakunpembantu $daftarakunpembantu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daftarakunpembantu  $daftarakunpembantu
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftarakunpembantu $daftarakunpembantu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daftarakunpembantu  $daftarakunpembantu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Daftarakunpembantu::where('id',$request->id)->update([
            'kode_bantu' => $request->kode_bantu,
            'nama_akun' => $request->nama_akun,
            'status' => $request->status,
            'saldo_akunpembantu' => cikararesetrupiah($request->saldo_akunpembantu),
        ]);

		return redirect()->back()->with('du','Akun Pembantu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daftarakunpembantu  $daftarakunpembantu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftarakunpembantu $daftarakunpembantu)
    {
        $daftarakunpembantu->delete();

		return redirect()->back()->with('dd','Akun Pembantu');
    }
}
