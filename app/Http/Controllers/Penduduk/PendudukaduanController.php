<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\Pendudukaduan;
use Illuminate\Http\Request;

class PendudukaduanController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendudukaduan  $pendudukaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendudukaduan $pendudukaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendudukaduan  $pendudukaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendudukaduan $pendudukaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendudukaduan  $pendudukaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendudukaduan $pendudukaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendudukaduan  $pendudukaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendudukaduan $pendudukaduan)
    {
        $pendudukaduan->delete();

        return back()->with('dd','Pengaduan');
    }
}
