<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\Lapak;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $folder = 'public/img/penduduk/produk';

    public function index()
    {
        $user   = Auth::user();
        $judul  = 'Produk';
        $lapak  = Lapak::where('user_id',$user->id)->first();
        if ($lapak) {
            $produk = Produk::where('lapak_id',$lapak->id)->get();
            $totaldilihat = Produk::where('lapak_id',$lapak->id)->sum('dilihat');
        } else {
            $totaldilihat = 0;
            $produk     = null;
        }
        $menu = 'produk';
        return view('penduduk.produk.index', compact('user','judul','lapak','produk','menu','totaldilihat'));
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
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = $this->folder;
        $file->move($tujuan_upload,$nama_file);

        Produk::create([
            'lapak_id' => $request->lapak_id,
            'nama' => $request->nama,
            'dilihat' => 0,
            'keterangan' => $request->keterangan,
            'harga' => cikararesetrupiah($request->harga),
            'gambar' => $nama_file,
        ]);

        return redirect()->back()->with('ds', 'Produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $produk     = Produk::find($request->id);
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
        } else {
            $nama_file  = $produk->gambar;
        }
        
        Produk::where('id',$request->id)->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'harga' => cikararesetrupiah($request->harga),
            'gambar' => $nama_file,
        ]);

        return redirect()->back()->with('du', 'Produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($produk)
    {
        $produk     = Produk::find($produk);

        deletefile($this->folder.'/'.$produk->gambar);

        $produk->delete();
        return redirect()->back()->with('dd', 'Produk');
    }
}
