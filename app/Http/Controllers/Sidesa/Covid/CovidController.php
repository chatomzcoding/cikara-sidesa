<?php

namespace App\Http\Controllers\Sidesa\Covid;

use App\Http\Controllers\Controller;
use App\Models\Covid;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $covid  = DB::table('covid')
                    ->join('penduduk','covid.penduduk_id','=','penduduk.id')
                    ->select('covid.*','penduduk.nama_penduduk','penduduk.alamat_sekarang')
                    ->get();
        $menu   = 'covid';
        $penduduk   = Penduduk::all();
        $total  = [
            'terkonfirmasi' => Covid::where('status','terkonfirmasi')->count(),
            'sembuh' => Covid::where('status','sembuh')->count(),
            'meninggal' => Covid::where('status','meninggal')->count(),
            'pemantauan' => Covid::where('status','pemantauan')->count(),
        ];

        return view('admin.covid.info.index', compact('covid','menu','penduduk','total'));
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
        $keterangan    = [
            [
            'status' => $request->status,
            'tanggal' => $request->tanggal,
            ]
        ];

        Covid::create([
            'penduduk_id' => $request->penduduk_id,
            'status' => $request->status,
            'tanggal' => $request->tanggal,
            'keterangan' => json_encode($keterangan)
        ]);

        return back()->with('ds','Covid Penduduk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function show(Covid $covid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function edit(Covid $covid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $covid  = Covid::find($request->id);
        // cek jika status dan tanggal sama
        if ($covid->status == $request->status AND $covid->tanggal == $request->tanggal) {
            return back()->with('danger','Tidak ada perubahan data!');
        }else{
            $keterangan = json_decode($covid->keterangan);
            $ceksama    = FALSE;
            foreach ($keterangan as $row) {
                if ($row->status == $request->status) {
                    $ceksama = TRUE;
                }
            }
            if ($ceksama) {
                $keteranganbaru    = [
                    [
                    'status' => $request->status,
                    'tanggal' => $request->tanggal,
                    'update' => tgl_sekarang()
                    ]
                ];
            } else {
                $keteranganbaru    = [
                    [
                    'status' => $request->status,
                    'tanggal' => $request->tanggal,
                    ]
                ];
            }

            $dataketerangan    = array_merge($keterangan,$keteranganbaru);
            Covid::where('id',$request->id)->update([
                'status' => $request->status,
                'tanggal' => $request->tanggal,
                'keterangan' => json_encode($dataketerangan)
            ]);
        }
        return back()->with('du','Covid Penduduk');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Covid  $covid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Covid $covid)
    {
        $covid->delete();

        return back()->with('dd','Data Covid');
    }
}
