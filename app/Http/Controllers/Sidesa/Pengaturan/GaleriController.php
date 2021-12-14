<?php

namespace App\Http\Controllers\Sidesa\Pengaturan;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Galeriphoto;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $table = 'galeri';
    protected $folder = 'public/img/pengaturan/galeri';

    public function index()
    {
        $menu       = 'galeri';
        $judul      = 'Galeri';
        $galeri     = Galeri::all();
        $log    = Log::where('sesi',$this->table)->orderby('id','DESC')->get();
        return view('admin.pengaturan.galeri.index', compact('galeri','menu','log','judul'));
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
            'gambar_galeri' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar_galeri');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = $this->folder;
        $file->move($tujuan_upload,$nama_file);

        Galeri::create([
            'nama_galeri' => $request->nama_galeri,
            'keterangan' => $request->keterangan,
            'gambar_galeri' => $nama_file,
        ]);

        $galeri    = Galeri::latest()->first();
        $data               = [
            'sesi' => $this->table,
            'aksi' => 'tambah',
            'table_id' => $galeri->id,
            'detail' => [
                'data' => [
                    'tambah data gambar <strong>"'.$request->nama_galeri.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);

        return redirect()->back()->with('ds', $this->table);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show($galeri)
    {
        $galeri = Galeri::find(Crypt::decryptString($galeri));
        $galeriphoto = Galeriphoto::where('galeri_id',$galeri->id)->get();
        $menu       = 'galeri';
        return view('admin.pengaturan.galeri.show', compact('galeri','galeriphoto','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $galeri = Galeri::find($request->id);
        if (isset($request->gambar_galeri)) {
            $request->validate([
                'gambar_galeri' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar_galeri');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = $this->folder;
            $file->move($tujuan_upload,$nama_file);
            deletefile($this->folder.'/'.$galeri->gambar_galeri);
        } else {
            $nama_file = $galeri->gambar_galeri;
        }
        

        Galeri::where('id',$request->id)->update([
            'nama_galeri' => $request->nama_galeri,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'gambar_galeri' => $nama_file,
        ]);
        $detail     = [
            'data' => data_perubahan($galeri,$request,['nama_galeri','keterangan','status'])
        ];

        $data               = [
            'sesi' => $this->table,
            'aksi' => 'edit',
            'table_id' => $request->id,
            'detail' => $detail
        ];
        DbCikara::saveLog($data);

        return redirect()->back()->with('du', $this->table);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        $data               = [
            'sesi' => $this->table,
            'aksi' => 'hapus',
            'table_id' => $galeri->id,
            'detail' => [
                'data' => [
                    'hapus data gambar <strong>"'.$galeri->nama_galeri.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);

        deletefile($this->folder.'/'.$galeri->gambar_galeri);
        $galeri->delete();

        return redirect()->back()->with('dd', $this->table);
    }
}
