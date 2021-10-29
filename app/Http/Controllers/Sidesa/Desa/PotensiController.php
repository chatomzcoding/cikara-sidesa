<?php

namespace App\Http\Controllers\Sidesa\Desa;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use App\Models\Potensisub;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $folder = 'public/img/desa/potensi';

    public function index()
    {
        $potensi    = Potensi::all();
        $judul      = 'Potensi Desa';
        $menu       = 'potensi';
        $total      = [
            'potensi' => count($potensi),
            'subpotensi' => Potensisub::count(),
            'dilihat' => Potensi::sum('dilihat')
        ];
        return view('admin.infodesa.potensi.index', compact('potensi','judul','menu','total'));
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
            'poto_potensi' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('poto_potensi');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = $this->folder;
        $file->move($tujuan_upload,$nama_file);

        Potensi::create([
            'nama_potensi' => $request->nama_potensi,
            'keterangan_potensi' => $request->keterangan_potensi,
            'poto_potensi' => $nama_file,
            'dilihat' => 0,
        ]);

        return redirect()->back()->with('ds', 'Potensi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function show(Potensi $potensi)
    {
        $potensisub     = Potensisub::where('potensi_id',$potensi->id)->get();
        $judul          = 'Potensi Desa';
        $menu           = 'potensi';
        return view('admin.infodesa.potensi.show', compact('potensisub','potensi','judul','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Potensi $potensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $potensi = Potensi::find($request->id);
        if (isset($request->poto_potensi)) {
            $request->validate([
                'poto_potensi' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('poto_potensi');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = $this->folder;
            $file->move($tujuan_upload,$nama_file);
            deletefile($tujuan_upload.'/'.$potensi->poto_potensi);
        } else {
            $nama_file  = $potensi->poto_potensi;
        }
        

        Potensi::where('id',$request->id)->update([
            'nama_potensi' => $request->nama_potensi,
            'keterangan_potensi' => $request->keterangan_potensi,
            'poto_potensi' => $nama_file,
        ]);

        return redirect()->back()->with('du', 'Potensi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($potensi)
    {
        $potensi = Potensi::find($potensi);
        deletefile($this->folder.'/'.$potensi->poto_potensi);
        $potensi->delete();

        return redirect()->back()->with('dd', 'Potensi');
    }
}
