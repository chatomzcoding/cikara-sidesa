<?php

namespace App\Http\Controllers\Sidesa\Covid;

use App\Http\Controllers\Controller;
use App\Models\Pemudik;
use Illuminate\Http\Request;

class PemudikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemudik = Pemudik::all();
        $menu   = 'datacovid';
        return view('admin.covid.pendataan.index', compact('pemudik','menu'));
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
     * @param  \App\Models\Pemudik  $pemudik
     * @return \Illuminate\Http\Response
     */
    public function show(Pemudik $pemudik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemudik  $pemudik
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemudik $pemudik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemudik  $pemudik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemudik $pemudik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemudik  $pemudik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemudik $pemudik)
    {
        //
    }
}
