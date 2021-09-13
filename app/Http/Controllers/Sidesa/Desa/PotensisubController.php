<?php

namespace App\Http\Controllers\Sidesa\Desa;

use App\Http\Controllers\Controller;
use App\Models\Potensisub;
use Illuminate\Http\Request;

class PotensisubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $folder = 'public/img/desa/potensi';

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
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = $this->folder;
        $file->move($tujuan_upload,$nama_file);

        Potensisub::create([
            'potensi_id' => $request->potensi_id,
            'nama' => $request->nama,
            'detail' => $request->detail,
            'gambar' => $nama_file,
        ]);

        return redirect()->back()->with('ds', 'Sub Potensi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Potensisub  $potensisub
     * @return \Illuminate\Http\Response
     */
    public function show(Potensisub $potensisub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Potensisub  $potensisub
     * @return \Illuminate\Http\Response
     */
    public function edit(Potensisub $potensisub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Potensisub  $potensisub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $potensisub     = Potensisub::find($request->id);
        if (isset($request->gambar)) {
            $request->validate([
                'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = $this->folder;
            $file->move($tujuan_upload,$nama_file);
            deletefile($this->folder.'/'.$potensisub->gambar);

        } else {
            $nama_file  = $potensisub->gambar;
        }
        

        Potensisub::where('id',$request->id)->update([
            'nama' => $request->nama,
            'detail' => $request->detail,
            'gambar' => $nama_file,
        ]);

        return redirect()->back()->with('du', 'Sub Potensi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Potensisub  $potensisub
     * @return \Illuminate\Http\Response
     */
    public function destroy($potensisub)
    {
        $potensisub     = Potensisub::find($potensisub);

        deletefile($this->folder.'/'.$potensisub->gambar);

        $potensisub->delete();

        return redirect()->back()->with('dd', 'Sub Potensi');
    }
}
