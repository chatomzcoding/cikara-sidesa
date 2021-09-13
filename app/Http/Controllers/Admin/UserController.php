<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user   = User::where('level','penduduk')->get();
        $user   = DB::table('users')
                    ->join('penduduk','users.name','=','penduduk.nik')
                    ->select('users.*','penduduk.nama_penduduk')
                    ->where('users.level','penduduk')
                    ->get();
        $judul  = 'User Penduduk';
        $penduduk   = Penduduk::select('nik','nama_penduduk')->get();
        return view('admin.user.index', compact('user','judul','penduduk'));
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
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('ds','User');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (isset($request->password)) {
            User::where('id',$request->id)->update([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            User::where('id',$request->id)->update([
                'email' => $request->email,
            ]);
        }
        

        return redirect()->back()->with('du','User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        User::find($user)->delete();

        return redirect()->back()->with('dd','User');
    }
}
