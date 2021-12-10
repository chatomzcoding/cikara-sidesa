<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lapor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token  = $_GET['token'];
        // $token  = $request->token;
        if (!cektoken($token)) {
            return response()->json('akses dilarang');
        }
        $user_id    = $_GET['user_id'];
        $data = DB::table('lapor')
                ->join('users','lapor.user_id','=','users.id')
                ->join('user_akses','users.id','=','user_akses.user_id')
                ->join('penduduk','user_akses.penduduk_id','=','penduduk.id')
                ->select('lapor.*','users.profile_photo_path','penduduk.nama_penduduk')
                ->orderByDesc('lapor.id')
                ->get();
        $result     = [];
        foreach ($data as $item) {
            $dresult = [];
            foreach ($item as $key => $value) {
                $dresult[$key] = $value;
            }
            $like = json_decode($item->datalike);
            $status = 0;
            $jumlah     = 0;
            if (!is_null($like)) {
                for ($i=0; $i < count($like); $i++) { 
                    if ($like[$i]->id == $user_id) {
                        $status = 1;
                    }
                }
                $jumlah = count($like);
            }
            $dresult['jumlahlike'] = $jumlah;
            $dresult['statuslike'] = $status;
            $result[] = $dresult;
        }

        return $result;
    }

    public function listbyuser($userid)
    {
        $token  = $_GET['token'];
        // $token  = $request->token;
        if (!cektoken($token)) {
            return response()->json('akses dilarang');
        }
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
            $namafile = uploadgambar($request,'penduduk/lapor');

            $data = New Lapor();
            $data->user_id = $request->user_id;
            $data->isi = $request->isi;
            $data->kategori = $request->kategori;
            $data->status = $request->status;
            $data->identitas = $request->identitas;
            $data->posting = $request->posting;
            $data->photo = $namafile;
    
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
                'posting' => $request->posting,
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
    public function destroy($lapor)
    {
        $token = $_GET['token'];
        if (cektoken($token)) {
            $lapor = Lapor::find($lapor);
            if ($lapor) {
                $lapor->delete();
                $result["success"] = "1";
                $result["message"] = "success";
                return $result;
            } else {
                $result["success"] = "0";
                $result["message"] = "data tidak ada";
                return $result;
            }
        } else {
            return response()->json('Access Denide');
        }
    }
}
