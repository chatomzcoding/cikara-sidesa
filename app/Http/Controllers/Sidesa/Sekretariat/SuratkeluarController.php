<?php

namespace App\Http\Controllers\Sidesa\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\Formatsurat;
use Illuminate\Http\Request;

class SuratkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = 'suratkeluar';
        $suratkeluar = Formatsurat::where('layanan_mandiri','tidak')->get();
        return view('admin.sekretariat.suratkeluar.index', compact('menu','suratkeluar'));
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
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function show(Formatsurat $formatsurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Formatsurat $formatsurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formatsurat $formatsurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formatsurat $formatsurat)
    {
        //
    }
}
