<?php

namespace App\Http\Controllers\Api;

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
        return Lapor::all();
    }

    public function listbyuser($userid)
    {
        return Lapor::where('user_id',$userid)->get();
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
            $data = New Lapor();
            $data->user_id = $request->user_id;
            $data->isi = $request->isi;
            $data->kategori = $request->kategori;
            $data->status = $request->status;
            $data->photo = $request->photo;
    
            $data->save();
    
            if (response()) {
                $result["success"] = "1";
                $result["message"] = "success";
            } else {
                $result["success"] = "0";
                $result["message"] = "error";
            }
            # code...
        } else {
            $result["success"] = "0";
            $result["message"] = "Access Denied";
        }

        return $result;
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
    public function update(Request $request, Lapor $lapor)
    {
        $token = $request->token;
        if (cektoken($token)) {
            Lapor::where('id',$lapor->id)->update([
                'isi' => $request->isi,
                'kategori' => $request->kategori,
                'photo' => $request->photo,
            ]);
                $result["success"] = "1";
                $result["message"] = "success";
            # code...
        } else {
            $result["success"] = "0";
            $result["message"] = "Access Denied";
        }

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function destroy($lapor, Request $request)
    {
        $token = $request->token;
        if (cektoken($token)) {
            $lapor = Lapor::find($lapor);
            if ($lapor) {
                $lapor->delete();
                $result["success"] = "1";
                $result["message"] = "success";
                return $result;
            } else {
                $result["success"] = "0";
                $result["message"] = "error";
                return $result;
            }
        } else {
            return response()->json('Access Denide');
        }
    }
}
