<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formatsurat;
use App\Models\Klasifikasisurat;
use App\Models\Ks;
use App\Models\Penduduksurat;
use Illuminate\Http\Request;

class FormatsuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $folder = 'public/file/surat';

    public function index()
    {
        $formatsurat        = Formatsurat::orderBy('id','DESC')->get();
        $judul              = 'Format Surat';
        $klasifikasisurat   = Klasifikasisurat::where('nama','<>','-')->select('id','nama','kode')->get();
        $total              = [
            'jumlah' => Penduduksurat::count(),
            'selesai' => Penduduksurat::where('status','selesai')->count(),
            'menunggu' => Penduduksurat::where('status','menunggu')->count(),
            'proses' => Penduduksurat::where('status','proses')->count(),
        ];

        $menu   = 'formatsurat';
        return view('admin.surat.index', compact('formatsurat','judul','klasifikasisurat','total','menu'));
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
            'file_surat' => 'required|file|mimes:rtf|max:2000',
        ]);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file_surat');
        
        $nama_file = time()."_".$file->getClientOriginalName();
        
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = $this->folder;
        $file->move($tujuan_upload,$nama_file);

        Formatsurat::create([
            'nama_surat' => $request->nama_surat,
            'kode' => $request->kode,
            'nilai_masaberlaku' => $request->nilai_masaberlaku,
            'status_masaberlaku' => $request->status_masaberlaku,
            'layanan_mandiri' => $request->layanan_mandiri,
            'klasifikasisurat_id' => $request->klasifikasisurat_id,
            'file_surat' => $nama_file,
        ]);

        return redirect()->back()->with('ds', 'Format Surat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function show(Formatsurat $formatsurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Formatsurat $formatsurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Formatsurat::where('id',$request->id)->update([
            'nama_surat' => $request->nama_surat,
            'kode' => $request->kode,
        ]);

        return redirect()->back()->with('du', 'Format Surat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formatsurat  $formatsurat
     * @return \Illuminate\Http\Response
     */
    public function destroy($formatsurat)
    {
        $formatsurat    = Formatsurat::find($formatsurat);

        deletefile($this->folder.'/'.$formatsurat->file_surat);
        $formatsurat->delete();

        return redirect()->back()->with('dd', 'Format Surat');
    }
}
