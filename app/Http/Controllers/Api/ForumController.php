<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\Forumdiskusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
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
        return Forum::all();
    }

    public function chatforum($id)
    {
        $token  = $_GET['token'];
        // $token  = $request->token;
        if (!cektoken($token)) {
            return response()->json('akses dilarang');
        }
        $result = DB::table('forum_diskusi')
                ->join('users','forum_diskusi.user_id','=','users.id')
                ->join('penduduk','users.name','=','penduduk.nik')
                ->select('forum_diskusi.*','penduduk.nama_penduduk')
                ->where('forum_diskusi.forum_id',$id)
                ->orderBy('forum_diskusi.id','ASC')
                ->get();
        return $result;
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
        // $token  = $_GET['token'];
        $token  = $request->token;
        if (!cektoken($token)) {
            return response()->json('akses dilarang');
        }
        Forumdiskusi::create([
            'user_id' => $request->user_id,
            'forum_id' => $request->forum_id,
            'isi' => $request->isi,
        ]);

        if (response()) {
            $result["success"] = "1";
            $result["message"] = "success";
        } else {
            $result["success"] = "0";
            $result["message"] = "error";
        }
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //
    }
}
