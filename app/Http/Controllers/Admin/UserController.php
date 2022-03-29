<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\Staf;
use App\Models\Stafakses;
use App\Models\User;
use App\Models\Userakses;
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

    function __construct()
    {
        $this->middleware('superadmin', ['only' => ['index']]);
    }

    public function index()
    {
        $menu   = 'datauser';
        if (isset($_GET['sesi'])) {
            $judul  = 'User Staf';
            $staf   = Staf::where('status_pegawai','aktif')->get();
            $user   = DB::table('users')
                        ->join('staf_akses','users.id','=','staf_akses.user_id')
                        ->join('staf','staf_akses.staf_id','=','staf.id')
                        ->select('users.*','staf.nama_pegawai','staf.jabatan','staf.nik')
                        ->where('users.level','staf')
                        ->get();
            return view('admin.user.staf', compact('user','judul','staf','menu'));
        } else {
            $user   = DB::table('users')
                        ->join('user_akses','users.id','=','user_akses.user_id')
                        ->join('penduduk','user_akses.penduduk_id','=','penduduk.id')
                        ->select('users.*','penduduk.nama_penduduk')
                        ->where('users.level','penduduk')
                        ->limit(100)
                        ->get();
            $judul  = 'User Penduduk';
            $penduduk   = Penduduk::select('nik','nama_penduduk')->orderBy('nama_penduduk','ASC')->get();
            $belumdaftar    = count($penduduk) - count($user);
            $total   = [
                'user' => Userakses::count(),
                'penduduk' => count($penduduk),
                'belumdaftar' => $belumdaftar
            ];
            return view('admin.user.index', compact('user','judul','penduduk','menu','total'));
        }
        

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
        if (isset($request->sesi)) {
            // echo url()->current();
            $penduduk   = Penduduk::all('id','nik','nama_penduduk');
            foreach ($penduduk as $key) {
                // cek jika sudah ada
                $cekakses = Userakses::where('penduduk_id',$key->id)->first();
                if (!$cekakses) {
                    // create User
                    $email  = $key->nik.'@jantungdesa.com';
                    $user       = User::where('email',$email)->first();
                    if (!$user) {
                        User::create([
                            'name' => $key->nama_penduduk,
                            'email' => $email,
                            'password' => $key->nama_penduduk,
                            'password' => Hash::make($key->nik),
                            'level' => 'penduduk',
                        ]);
                        $user       = User::where('email',$email)->first();
                        Userakses::create([
                            'user_id' => $user->id,
                            'penduduk_id' => $key->id,
                        ]);
                    }
                }
            }
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level,
                'password' => Hash::make($request->password),
            ]);
            $user       = User::where('name',$request->name)->where('level',$request->level)->first();
            if ($request->level == 'penduduk') {
                // tambahkan ke user akses
                $penduduk   = Penduduk::where('nik',$request->name)->first();
                Userakses::create([
                    'user_id' => $user->id,
                    'penduduk_id' => $penduduk->id,
                ]);
            } else {
                $staf = Staf::where('nama_pegawai',$request->name)->first();
                Stafakses::create([
                    'user_id' => $user->id,
                    'staf_id' => $staf->id,
                ]);
            }
        }
        return back()->with('ds','User');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
       $user    = User::find(Crypt::decryptString($user));
       $menu    = 'datauser';
       $listmenu = list_menu();
       return view('admin.user.hakakses', compact('menu','user','listmenu'));
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
        // ubah password
        if (isset($request->ubahpassword)) {
            User::where('id',$request->id)->update([
                'password' => Hash::make($request->password),
                'notifikasi' => NULL,
            ]);

            return redirect()->back()->with('du','User');

        }
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
