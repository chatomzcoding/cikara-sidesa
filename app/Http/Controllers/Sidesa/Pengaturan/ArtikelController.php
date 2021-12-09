<?php

namespace App\Http\Controllers\Sidesa\Pengaturan;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Kategoriartikel;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $folder = 'public/img/pengaturan/artikel';

    public function index()
    {
        $kategori = (isset($_GET['kategori'])) ? $_GET['kategori'] : 'semua' ;
        $filter['kategori'] = $kategori;
        if ($kategori == 'semua') {
            $artikel    = DB::table('artikel')
                            ->join('kategori_artikel','artikel.kategoriartikel_id','=','kategori_artikel.id')
                            ->select('artikel.*','kategori_artikel.nama_kategori')
                            ->orderByDesc('artikel.id')
                            ->get();
                            # code...
        } else {
            $artikel    = DB::table('artikel')
                            ->join('kategori_artikel','artikel.kategoriartikel_id','=','kategori_artikel.id')
                            ->select('artikel.*','kategori_artikel.nama_kategori')
                            ->where('kategori_artikel.id',$kategori)
                            ->orderByDesc('artikel.id')
                            ->get();
        }
        $kategori   = Kategoriartikel::orderBy('nama_kategori','ASC')->get();
        $menu       = 'artikel';
        $log        = Log::where('sesi','artikel')->orderBy('id','DESC')->get();
        $judul      = 'Artikel';
        return view('admin.pengaturan.artikel.index', compact('artikel','kategori','menu','filter','log','judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori   = Kategoriartikel::orderBy('nama_kategori','ASC')->get();

        $menu       = 'artikel';

        return view('admin.pengaturan.artikel.create', compact('kategori','menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_file  = NULL;
        if (isset($request->gambar_artikel)) {
            $request->validate([
                'gambar_artikel' => 'required|file|image|mimes:jpeg,png,jpg|max:10000',
            ]);
            $file = $request->file('gambar_artikel');
            $nama_file = kompres($file,$this->folder);
        }

        Artikel::create([
            'user_id' => Auth::user()->id,
            'judul_artikel' => $request->judul_artikel,
            'slug' => Str::slug($request->judul_artikel),
            'isi_artikel' => $request->isi_artikel,
            'kategoriartikel_id' => $request->kategoriartikel_id,
            'view' => 0,
            'gambar_artikel' => $nama_file,
        ]);

        $artikel    = Artikel::latest()->first();
        $data               = [
            'sesi' => 'artikel',
            'aksi' => 'tambah',
            'table_id' => $artikel->id,
            'detail' => [
                'data' => [
                    'tambah artikel dengan judul <strong>"'.$request->judul_artikel.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);

        return redirect('/artikel')->with('dsc', 'Artikel dengan judul '.$request->judul_artikel.' telah berhasil diposting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($artikel)
    {
        $artikel    = Artikel::find(Crypt::decryptString($artikel));
        $kategori = Kategoriartikel::orderBy('nama_kategori','ASC')->get();
        $menu       = 'artikel';

        return view('admin.pengaturan.artikel.edit', compact('kategori','artikel','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        if (isset($request->gambar_artikel)) {
            $request->validate([
                'gambar_artikel' => 'required|file|image|mimes:jpeg,png,jpg|max:10000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar_artikel');
            
            // $nama_file = time()."_".$file->getClientOriginalName();
            $nama_file = kompres($file,$this->folder);
            
            // isi dengan nama folder tempat kemana file diupload
            // $tujuan_upload = $this->folder;
            // $file->move($tujuan_upload,$nama_file);
            // deletefile($tujuan_upload.'/'.$artikel->gambar_artikel);
        } else {
            $nama_file = $artikel->gambar_artikel;
        }
        

        Artikel::where('id',$artikel->id)->update([
            'judul_artikel' => $request->judul_artikel,
            'slug' => Str::slug($request->judul_artikel),
            'isi_artikel' => $request->isi_artikel,
            'kategoriartikel_id' => $request->kategoriartikel_id,
            'gambar_artikel' => $nama_file,
        ]);

        $kategoriawal   = Kategoriartikel::find($artikel->kategoriartikel_id);
        $kategoribaru   = Kategoriartikel::find($request->kategoriartikel_id);
        $custom         = [
            [
                'awal' => $kategoriawal->nama_kategori,
                'baru' => $kategoribaru->nama_kategori,
                'field' => 'kategori artikel',
            ]
        ];

        $detail     = [
            'data' => data_perubahan($artikel,$request,['judul','isi_artikel'],$custom)
        ];

        $data               = [
            'sesi' => 'artikel',
            'aksi' => 'edit',
            'table_id' => $artikel->id,
            'detail' => $detail
        ];
        DbCikara::saveLog($data);

        return redirect('/artikel')->with('du', 'Artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $data               = [
            'sesi' => 'artikel',
            'aksi' => 'hapus',
            'table_id' => $artikel->id,
            'detail' => [
                'data' => [
                    'hapus artikel dengan judul <strong>"'.$artikel->judul_artikel.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);

        deletefile($this->folder.'/'.$artikel->gambar_artikel);
        $artikel->delete();
        return redirect('/artikel')->with('dd', 'Artikel');
    }
}
