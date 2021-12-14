<?php

namespace App\Http\Controllers\Sidesa\Layanan;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Penduduksurat;
use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat  = DB::table('penduduk_surat')
                    ->join('format_surat','penduduk_surat.formatsurat_id','=','format_surat.id')
                    ->select('penduduk_surat.*','format_surat.nama_surat')
                    ->orderBy('penduduk_surat.id','DESC')
                    ->get();
        $judul  = 'Pengajuan Surat';
        $total  = [
            'jumlah' => count($surat),
            'selesai' => Penduduksurat::where('status','selesai')->count(),
            'proses' => Penduduksurat::where('status','proses')->count(),
            'menunggu' => Penduduksurat::where('status','menunggu')->count(),
        ];
        $menu   = 'suratpenduduk';
        $staf   = Staf::where('status_pegawai','aktif')->orderby('nama_pegawai','ASC')->get();
        $f_status = (isset($_GET['status'])) ? $_GET['status'] : 'semua' ;
        $f_penduduk = (isset($_GET['penduduk'])) ? $_GET['penduduk'] : 'semua' ;
        $f_tanggal = (isset($_GET['tanggal'])) ? $_GET['tanggal'] : 'semua' ;
        $filter = [
            'status' => $f_status,
            'penduduk' => $f_penduduk,
            'tanggal' => $f_tanggal,
        ];
        $log    = Log::where('sesi','penduduksurat')->orderby('id','DESC')->get();
        return view('admin.layananmandiri.surat.index', compact('surat','judul','total','menu','staf','filter','log'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduksurat $penduduksurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduksurat $penduduksurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $staf   = Staf::find($request->staf_id);
        $ttd    = [
            'nama' => $staf->nama_pegawai,
            'jabatan' => $staf->jabatan,
            'nip' => $staf->nip,
            'nipd' => $staf->nipd,
        ];

        $penduduksurat  = Penduduksurat::find($request->id);
        Penduduksurat::where('id',$request->id)->update([
            'status' => $request->status,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'ttd' => json_encode($ttd),
        ]);

        $detail     = [
            'data' => data_perubahan($penduduksurat,$request,['status'])
        ];

        $data               = [
            'sesi' => 'penduduksurat',
            'aksi' => 'edit',
            'table_id' => $request->id,
            'detail' => $detail
        ];

        DbCikara::saveLog($data);

        return redirect()->back()->with('du','Surat Penduduk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function destroy($penduduksurat)
    {
        $penduduksurat  = Penduduksurat::find($penduduksurat);
        $data               = [
            'sesi' => 'penduduksurat',
            'aksi' => 'hapus',
            'table_id' => $penduduksurat->id,
            'detail' => [
                'data' => [
                    'hapus data penduduk surat dengan nomor surat <strong>"'.$penduduksurat->nomor_surat.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);

        $penduduksurat->delete();

        return back()->with('dd','Penduduk Surat');
    }
}
