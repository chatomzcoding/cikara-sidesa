<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lapak;
use Illuminate\Http\Request;

class LapakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Lapak::all();
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
        $token = $request->token;
        if (cektoken($token)) {
            $namafile   = uploadgambar($request,'penduduk/lapak');
            Lapak::create([
                'user_id' => $request->user_id,
                'nama_lapak' => $request->nama_lapak,
                'tentang' => $request->tentang,
                'alamat' => $request->alamat,
                'status_lapak' => $request->status_lapak,
                'telp' => $request->telp,
                'logo' => $namafile,
            ]);

            if (response()) {
                $result["success"] = "1";
                $result["message"] = "success";
            } else {
                $result["success"] = "0";
                $result["message"] = "error";
            }
        } else {
            $result["success"] = "0";
            $result["message"] = "Access Denied";
        }
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function show(Lapak $lapak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapak $lapak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapak $lapak)
    {
        $token = $request->token;
        if (cektoken($token)) {
            Lapak::where('id',$lapak->id)->update([
                'nama_lapak' => $request->nama_lapak,
                'tentang' => $request->tentang,
                'alamat' => $request->alamat,
                'status_lapak' => $request->status_lapak,
                'telp' => $request->telp,
                'logo' => $request->logo,
            ]);
    
            if (response()) {
                $result["success"] = "1";
                $result["message"] = "success";
            } else {
                $result["success"] = "0";
                $result["message"] = "error";
            }
        } else {
            $result["success"] = "0";
            $result["message"] = "Access Denied";
        }

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapak $lapak)
    {
        //
    }
}
