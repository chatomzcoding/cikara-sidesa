<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $folder = 'public/img/user';

    public function index()
    {
        // $user   = User::where('level','penduduk')->get();
        $user   = DB::table('users')
                    ->join('user_akses','users.id','=','user_akses.user_id')
                    ->join('penduduk','user_akses.penduduk_id','=','penduduk.id')
                    ->select('users.*','penduduk.nama_penduduk')
                    ->where('users.level','penduduk')
                    ->get();
        $judul  = 'User Penduduk';
        $penduduk   = Penduduk::select('nik','nama_penduduk')->get();
        $menu   = 'datauser';
        $belumdaftar    = count($penduduk) - count($user);
        $total   = [
            'user' => count($user),
            'penduduk' => count($penduduk),
            'belumdaftar' => $belumdaftar
        ];

        return view('admin.user.index', compact('user','judul','penduduk','menu','total'));
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
    public function show($user)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user   = User::find(Crypt::decryptString($user));
        $menu   = 'pengaturan';
        return view('sistem.edituser', compact('user','menu'));
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
        $user   = User::find($request->id);
        // profile_photo_path
        if (isset($request->profile_photo_path)) {
            $request->validate([
                'profile_photo_path' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('profile_photo_path');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = $this->folder;
            $file->move($tujuan_upload,$nama_file);
        } else {
            $nama_file = $user->profile_photo_path;
        }
        
        if (isset($request->password)) {
            User::where('id',$request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'profile_photo_path' => $nama_file,
                'password' => Hash::make($request->password),
            ]);
        } else {
            User::where('id',$request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'profile_photo_path' => $nama_file,
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
