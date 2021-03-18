<?php

namespace App\Http\Controllers\Sidesa\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\Informasipublik;
use Illuminate\Http\Request;

class InformasipublikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasipublik = Informasipublik::all();

        return view('admin.sekretariat.informasipublik.index', compact('informasipublik'));
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
            'file_dokumen' => 'required|file|max:2000|mimes:pdf,docx,doc',
        ]);
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload  = 'file/informasipublik';
        
        // menyimpan file logo aplikasi
        $file = $request->file('file_dokumen');
        $file_dokumen = time()."_".$file->getClientOriginalName();
        $file->move($tujuan_upload,$file_dokumen);
        
        Informasipublik::create([
            'judul_dokumen' => $request->judul_dokumen,
            'nama_dokumen' => $request->nama_dokumen,
            'file_dokumen' => $request->file_dokumen,
            'kategori_informasi' => $request->kategori_informasi,
            'tahun' => $request->tahun,
            'file_dokumen' => $file_dokumen,
            ]);
            
        return redirect()->back()->with('ds','Informasi Publik');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasipublik  $informasipublik
     * @return \Illuminate\Http\Response
     */
    public function show(Informasipublik $informasipublik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informasipublik  $informasipublik
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasipublik $informasipublik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informasipublik  $informasipublik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $informasipublik = Informasipublik::find($request->id);
        if (isset($request->file_dokumen)) {
            $request->validate([
                'file_dokumen' => 'required|file|max:2000|mimes:pdf,docx,doc',
            ]);
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload  = 'file/informasipublik';
            
            // menyimpan file logo aplikasi
            $file = $request->file('file_dokumen');
            $file_dokumen = time()."_".$file->getClientOriginalName();
            $file->move($tujuan_upload,$file_dokumen);

            deletefile($tujuan_upload.'/'.$informasipublik->file_dokumen);
            # code...
        } else {
            $file_dokumen = $informasipublik->file_dokumen;
        }
        
        
        Informasipublik::where('id',$request->id)->update([
            'judul_dokumen' => $request->judul_dokumen,
            'nama_dokumen' => $request->nama_dokumen,
            'file_dokumen' => $request->file_dokumen,
            'kategori_informasi' => $request->kategori_informasi,
            'tahun' => $request->tahun,
            'status' => $request->status,
            'file_dokumen' => $file_dokumen,
            ]);
            
        return redirect()->back()->with('du','Informasi Publik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informasipublik  $informasipublik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasipublik $informasipublik)
    {
        deletefile('file/informasipublik/'.$informasipublik->file_dokumen);
        $informasipublik->delete();

        return redirect()->back()->with('dd','Informasi Publik');
    }
}
