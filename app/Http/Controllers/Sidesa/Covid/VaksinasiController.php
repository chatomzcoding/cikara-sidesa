<?php

namespace App\Http\Controllers\Sidesa\Covid;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Log;
use App\Models\Penduduk;
use App\Models\Vaksinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VaksinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $sesi = 'vaksinasi';

    public function index()
    {
        $menu       = 'vaksinasi';
        if (isset($_GET['kategori']) AND $_GET['kategori'] <> 'semua') {
            $vaksinasi  = DB::table('vaksinasi')
                            ->join('penduduk','vaksinasi.penduduk_id','=','penduduk.id')
                            ->join('kategori','vaksinasi.kategori_id','=','kategori.id')
                            ->select('vaksinasi.*','penduduk.nama_penduduk','kategori.nama_kategori')
                            ->where('vaksinasi.kategori_id',$_GET['kategori'])
                            ->get();
            $filter['kategori'] = $_GET['kategori'];
        } else {
            $vaksinasi  = DB::table('vaksinasi')
                            ->join('penduduk','vaksinasi.penduduk_id','=','penduduk.id')
                            ->join('kategori','vaksinasi.kategori_id','=','kategori.id')
                            ->select('vaksinasi.*','penduduk.nama_penduduk','kategori.nama_kategori')
                            ->get();
            $filter['kategori']  = 'semua';
        }
        
        $kategori   = Kategori::where('label','vaksinasi')->orderBy('nama_kategori','ASC')->get();
        $penduduk   = Penduduk::all();
        if (isset($_GET['page']) AND $_GET['page'] == 'kategori') {
            $log    = Log::where('sesi','kategorivaksin')->orderby('id','DESC')->get();
        $judul = 'Kategori Vaksin';
            return view('admin.covid.vaksinasi.kategori', compact('kategori','menu','log','judul'));
        } else {
            $total  = [
                'kategori' => count($kategori),
                'vaksinasi' => Vaksinasi::count()
            ];
            $log    = Log::where('sesi','vaksinasi')->orderby('id','DESC')->get();
            $judul  = 'Vaksinasi';
            return view('admin.covid.vaksinasi.index', compact('vaksinasi','kategori','menu','penduduk','filter','total','log','judul'));
        }
        
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
        // pengecekan duplikat data
        $vaksinasi  = Vaksinasi::where('penduduk_id',$request->penduduk_id)->where('kategori_id',$request->kategori_id)->where('tanggal_vaksin',$request->tanggal_vaksin)->where('dosis',$request->dosis)->first();
        if ($vaksinasi) {
            return back()->with('ddc','Data sudah Ada');
        } else {
            Vaksinasi::create($request->all());
            $vaksinasi    = Vaksinasi::latest()->first();
            $penduduk       = Penduduk::find($vaksinasi->penduduk_id);
            $kategori       = Kategori::find($vaksinasi->kategori_id);
            $data               = [
                'sesi' => 'vaksinasi',
                'aksi' => 'tambah',
                'table_id' => $vaksinasi->id,
                'detail' => [
                    'data' => [
                        'tambah data vaksinasi <strong>"'.$kategori->nama_kategori.' tanggal '.$request->tanggal_vaksin.' untuk '.$penduduk->nama_penduduk.'"</strong>'
                    ]
                ]
            ];
            DbCikara::saveLog($data);
            return back()->with('ds','Vaksinasi Penduduk');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaksinasi  $vaksinasi
     * @return \Illuminate\Http\Response
     */
    public function show(Vaksinasi $vaksinasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaksinasi  $vaksinasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaksinasi $vaksinasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaksinasi  $vaksinasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->dosis == $request->dosisa AND $request->kategori_id == $request->kategori_ida) {
            Vaksinasi::where('id',$request->id)->update([
                'tanggal_vaksin' => $request->tanggal_vaksin,
                'keterangan' => $request->keterangan,
            ]);
        } else {
            // cek jika ada di data sebelumnya
            $vaksinasi = Vaksinasi::where('penduduk_id',$request->penduduk_ida)->where('dosis',$request->dosis)->where('kategori_id',$request->kategori_id)->first();
            if ($vaksinasi) {
                return back()->with('ddc','Data sudah ada');
            } else {
                $vaksinasi  = Vaksinasi::find($request->id);
                Vaksinasi::where('id',$request->id)->update([
                    'kategori_id' => $request->kategori_id,
                    'dosis' => $request->dosis,
                    'tanggal_vaksin' => $request->tanggal_vaksin,
                    'keterangan' => $request->keterangan,
                ]);
                 $custom         = [
                    [
                        'awal' => Kategori::find($vaksinasi->kategori_id) ->nama_kategori,
                        'baru' => Kategori::find($request->kategori_id) ->nama_kategori,
                        'field' => 'jenis_vaksin',
                    ]
                ];
                $detail     = [
                    'data' => data_perubahan($vaksinasi,$request,['dosis','tanggal_vaksin','keterangan'],$custom)
                ];
        
                $data               = [
                    'sesi' => 'vaksinasi',
                    'aksi' => 'edit',
                    'table_id' => $request->id,
                    'detail' => $detail
                ];
                DbCikara::saveLog($data);
            }
        }
        return back()->with('du','Vaksinasi');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaksinasi  $vaksinasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaksinasi $vaksinasi)
    {
        $penduduk       = Penduduk::find($vaksinasi->penduduk_id);
        $kategori       = Kategori::find($vaksinasi->kategori_id);   
        $data               = [
            'sesi' => 'vaksinasi',
            'aksi' => 'hapus',
            'table_id' => $vaksinasi->id,
            'detail' => [
                'data' => [
                    'hapus data vaksinasi <strong>"'.$kategori->nama_kategori.' tanggal vaksinasi '.$vaksinasi->tanggal_vaksin.' untuk '.$penduduk->nama_penduduk.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);
        $vaksinasi->delete();

        return back()->with('dd','Vaksinasi');
    }
}
