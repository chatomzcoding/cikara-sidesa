<?php

namespace App\Http\Controllers\Penduduk;

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
    protected $folder = 'public/img/penduduk/lapak';

    public function index()
    {
        //
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
        $request->validate([
            'logo' => 'required|file|image|mimes:jpeg,png,jpg|max:4000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('logo');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = $this->folder;
        $file->move($tujuan_upload,$nama_file);

        Lapak::create([
            'user_id' => $request->user_id,
            'nama_lapak' => $request->nama_lapak,
            'tentang' => $request->tentang,
            'alamat' => $request->alamat,
            'status_lapak' => $request->status_lapak,
            'telp' => $request->telp,
            'logo' => $nama_file,
        ]);

        return redirect()->back()->with('ds', 'Lapak');
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
    public function update(Request $request)
    {
        if ($request->sesi == 'admin') {
            Lapak::where('id',$request->id)->update([
                'status_lapak' => $request->status_lapak,
            ]);

        } else {
            # code...
        }

        return redirect()->back()->with('du','Lapak');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function destroy($lapak)
    {
        $lapak  = Lapak::find($lapak);

        deletefile($this->folder.'/'.$lapak->logo);

        $lapak->delete();

        return redirect()->back()->with('dd','Lapak');
    }
}
