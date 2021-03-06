<?php

namespace App\Http\Controllers\Sidesa\Pengaturan;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Galeriphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GaleriphotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $table = 'Galeri Photo';

    protected $sesi = 'galeriphoto';

    protected $folder = 'public/img/pengaturan/galeriphoto';

    public function index()
    {
        
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
            'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('photo');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = $this->folder;
        $file->move($tujuan_upload,$nama_file);

        Galeriphoto::create([
            'galeri_id' => $request->galeri_id,
            'nama_photo' => $request->nama_photo,
            'photo' => $nama_file,
        ]);
        $galeri    = Galeriphoto::latest()->first();

        $data               = [
            'sesi' => $this->sesi,
            'aksi' => 'tambah',
            'table_id' => $galeri->id,
            'detail' => [
                'data' => [
                    'tambah data gambar <strong>"'.$request->nama_photo.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);

        return redirect('/galeri/'.Crypt::encryptString($request->galeri_id))->with('ds', $this->table);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeriphoto  $galeriphoto
     * @return \Illuminate\Http\Response
     */
    public function show(Galeriphoto $galeriphoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeriphoto  $galeriphoto
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeriphoto $galeriphoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeriphoto  $galeriphoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $galeriphoto = Galeriphoto::find($request->id);
        if (isset($request->photo)) {
            $request->validate([
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('photo');
            
            $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = $this->folder;
            $file->move($tujuan_upload,$nama_file);
            deletefile($this->folder.'/'.$galeriphoto->photo);
        } else {
            $nama_file = $galeriphoto->photo;
        }
        

        Galeriphoto::where('id',$request->id)->update([
            'nama_photo' => $request->nama_photo,
            'status' => $request->status,
            'photo' => $nama_file,
        ]);
        $custom         = [
            [
                'awal' => $galeriphoto->photo,
                'baru' => $nama_file,
                'field' => 'photo',
            ]
        ];
        $detail     = [
            'data' => data_perubahan($galeriphoto,$request,['nama_photo','status'], $custom)
        ];

        $data               = [
            'sesi' => $this->sesi,
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
     * @param  \App\Models\Galeriphoto  $galeriphoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeriphoto $galeriphoto)
    {
        $data               = [
            'sesi' => $this->sesi,
            'aksi' => 'hapus',
            'table_id' => $galeriphoto->id,
            'detail' => [
                'data' => [
                    'hapus data gambar <strong>"'.$galeriphoto->nama_photo.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);
        deletefile($this->folder.'/'.$galeriphoto->photo);
        $galeriphoto->delete();

        return redirect()->back()->with('du', $this->table);
    }
}
