<?php

namespace App\Http\Controllers\Bumdes;

use App\Http\Controllers\Controller;
use App\Models\Daftarakun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\DaftarakunImport;
use Maatwebsite\Excel\Facades\Excel;

class DaftarakunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user       = Auth::user();
        $daftarakun = Daftarakun::where('user_id',$user->id)->get();

        return view('bumdes.daftarakun.index', compact('user','daftarakun'));
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

    // fitur import
    public function import(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file/daftarakun',$nama_file);
            
		// import data
		Excel::import(new DaftarakunImport, public_path('/file/daftarakun/'.$nama_file));
 
		// alihkan halaman kembali
		return redirect()->back()->with('success','Data Berhasil diimport');
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
     * @param  \App\Models\Daftarakun  $daftarakun
     * @return \Illuminate\Http\Response
     */
    public function show(Daftarakun $daftarakun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daftarakun  $daftarakun
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftarakun $daftarakun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daftarakun  $daftarakun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Daftarakun::where('id',$request->id)->update([
            'nama_akun' => $request->nama_akun,
            'saldo_akun' => cikararesetrupiah($request->saldo_akun),
        ]);

        return redirect()->back()->with('du','daftar Akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daftarakun  $daftarakun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftarakun $daftarakun)
    {
        //
    }
}
