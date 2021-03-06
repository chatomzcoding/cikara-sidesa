<?php

namespace App\Http\Controllers\Sidesa\Layanan;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Lapor;
use App\Models\Log;
use Illuminate\Http\Request;

class LaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $sesi = 'laporanpenduduk';


    public function index()
    {
        $judul  = 'Laporan Penduduk';
        $menu   = 'laporpenduduk';
        $filter = get_filter(['status']);
        if ($filter['status'] == 'semua') {
            $lapor  = Lapor::all();
        } else {
            $lapor  = Lapor::where('status',$filter['status'])->orderBy('id','DESC')->get();
        }
        $log    = Log::where('sesi',$this->sesi)->orderby('id','DESC')->get();
        return view('admin.layananmandiri.lapor.index', compact('lapor','judul','menu','filter','log'));
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
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function show(Lapor $lapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapor $lapor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $lapor  = Lapor::find($request->id);
        Lapor::where('id',$request->id)->update([
            'status' => $request->status,
            'tanggapan' => $request->tanggapan,
        ]);

        $detail     = [
            'data' => data_perubahan($lapor,$request,['tanggapan','status'])
        ];

        $data               = [
            'sesi' => $this->sesi,
            'aksi' => 'edit',
            'table_id' => $request->id,
            'detail' => $detail
        ];
        DbCikara::saveLog($data);

        return redirect()->back()->with('duc','Tanggapan sudah direspon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function destroy($lapor)
    {
        $lapor = Lapor::find($lapor);
        $data               = [
            'sesi' => $this->sesi,
            'aksi' => 'hapus',
            'table_id' => $lapor->id,
            'detail' => [
                'data' => [
                    'hapus data laporam penduduk <strong>"'.$lapor->isi.'"</strong>'
                ]
            ]
        ];
        DbCikara::saveLog($data);
        deletefile('public/img/penduduk/lapor/'.$lapor->photo);
        $lapor->delete();
        return redirect()->back()->with('dd','Laporan');

    }
}
