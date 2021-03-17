<?php

namespace App\Http\Controllers\Sidesa;

use App\Http\Controllers\Controller;
use App\Models\Anggotasuplemen;
use Illuminate\Http\Request;

class AnggotasuplemenController extends Controller
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
        Anggotasuplemen::create($request->all());

        return redirect()->back()->with('ds','Warga Terdata');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggotasuplemen  $anggotasuplemen
     * @return \Illuminate\Http\Response
     */
    public function show(Anggotasuplemen $anggotasuplemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggotasuplemen  $anggotasuplemen
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggotasuplemen $anggotasuplemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggotasuplemen  $anggotasuplemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggotasuplemen $anggotasuplemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggotasuplemen  $anggotasuplemen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggotasuplemen $anggotasuplemen)
    {
        $anggotasuplemen->delete();

        return redirect()->back()->with('dd','Warga Terdata');
    }
}
