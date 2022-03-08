<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\Forumdiskusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ForumdiskusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user   = Auth::user();
        $forum          = Forum::where('status','aktif')->get();
        // $forumdiskusi   = Forumdiskusi::where('user_id',$user->id)->
        $judul          = 'Forum Diskusi';
        $menu   = 'diskusi';
        return view('penduduk.layananmandiri.forum', compact('judul','forum','user','menu'));
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
     * @param  \App\Models\Forumdiskusi  $forumdiskusi
     * @return \Illuminate\Http\Response
     */
    public function show($forumdiskusi)
    {
        $forum      = Forum::find($forumdiskusi);
        // $diskusi    = Forumdiskusi::where('forum_id',$forum->id)->get();
        $diskusi    = DB::table('forum_diskusi')
                        ->join('users','forum_diskusi.user_id','=','users.id')
                        ->select('forum_diskusi.*','users.profile_photo_path')
                        ->where('forum_diskusi.forum_id',$forum->id)
                        ->orderBy('forum_diskusi.id','ASC')
                        ->get();
        $judul      = 'Forum Diskusi';
        $user       = Auth::user();
        $menu       = 'diskusi';
        return view('penduduk.layananmandiri.forumdiskusi', compact('forum','diskusi','judul','user','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forumdiskusi  $forumdiskusi
     * @return \Illuminate\Http\Response
     */
    public function edit(Forumdiskusi $forumdiskusi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forumdiskusi  $forumdiskusi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forumdiskusi $forumdiskusi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forumdiskusi  $forumdiskusi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forumdiskusi $forumdiskusi)
    {
        //
    }
}
