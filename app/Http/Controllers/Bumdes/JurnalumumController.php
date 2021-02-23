<?php

namespace App\Http\Controllers\Bumdes;

use App\Http\Controllers\Controller;
use App\Models\Daftarakun;
use App\Models\Daftarakunpembantu;
use App\Models\Jurnalakun;
use App\Models\Jurnalakunpembantu;
use App\Models\Jurnalumum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JurnalumumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function lihatjurnal($sesi)
    {
        $user       = Auth::user();
        $akunfilter = DB::table('daftar_akun')
                    ->join('kategori_akun','daftar_akun.kategoriakun_id','=','kategori_akun.id')
                    ->where('daftar_akun.user_id',$user->id)
                    ->where('kategori_akun.kode',110)
                    ->Orwhere('kategori_akun.kode',120)
                    ->Orwhere('kategori_akun.kode',210)
                    ->select('daftar_akun.*')
                    ->orderBy('daftar_akun.nama_akun','ASC')
                    ->get();
        $akun = DB::table('daftar_akun')
                    ->where('daftar_akun.user_id',$user->id)
                    ->join('kategori_akun','daftar_akun.kategoriakun_id','=','kategori_akun.id')
                    ->select('daftar_akun.*')
                    ->orderBy('daftar_akun.nama_akun','ASC')
                    ->get();
        $akunpembantu = Daftarakunpembantu::where('user_id',$user->id)->get();
        switch ($sesi) {
            case 'pemasukan':
                // $jurnal     = Jurnalumum::where('user_id',$user->id)->get();
                // $jurnal     = DB::table('jurnal_umum')
                // ->join('jurnal_akun','jurnal_umum.id','=','jurnal_akun.jurnalumum_id')
                // ->where('user_id',$user->id)->get();
                $debet  = $akunfilter;
                $kredit = $akun;
                break;
            case 'pengeluaran':
                // $jurnal     = Jurnalumum::where('user_id',$user->id)->get();
                $debet  = $akun;
                $kredit = $akunfilter;
                break;

            case 'semua':
                $debet  = $akun;
                $kredit = $akunfilter;
                break;
        }
            $jurnal     = Jurnalumum::where('user_id',$user->id)->orderBy('id','DESC')->get();
        return view('bumdes.jurnalumum.index', compact('sesi','jurnal','user','debet','kredit','akunpembantu'));
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
        // menyimpan jurnal
        // Jurnalumum::create([
        //     'user_id' => $request->user_id,
        //     'tgl_transaksi' => $request->tgl_transaksi,
        //     'bukti_transaksi' => $request->bukti_transaksi,
        //     'keterangan' => $request->keterangan,
        //     'nominal_jurnal' => cikararesetrupiah($request->nominal_jurnal),
        // ]);
        
        // ambil jurnal umum yang sudah ditambahkan
        $jurnalumum = Jurnalumum::where('user_id',$request->user_id)->orderBy('id','DESC')->first();

        // simpan ke jurnal akun
        // akun debet
        // Jurnalakun::create([
        //     'jurnalumum_id' => $jurnalumum->id,
        //     'daftarakun_id' => $request->debet,
        //     'status_jurnalakun' => 'debet',
        // ]);
        // akun kredit
        // Jurnalakun::create([
        //     'jurnalumum_id' => $jurnalumum->id,
        //     'daftarakun_id' => $request->kredit,
        //     'status_jurnalakun' => 'kredit',
        // ]);

        // jika akunpembantu diisi maka disimpan ke jurnal akun pembantu
        if ($request->akunpembantu <> NULL) {
            Jurnalakunpembantu::create([
                'jurnalumum_id' => $jurnalumum->id,
                'daftarakunpembantu_id' => $request->akunpembantu,
                'status_jurnalakunpembantu' => $request->status_jurnalakunpembantu,
            ]);
        }

        return redirect()->back()->with('ds','Jurnal Umum');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurnalumum  $jurnalumum
     * @return \Illuminate\Http\Response
     */
    public function show(Jurnalumum $jurnalumum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurnalumum  $jurnalumum
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurnalumum $jurnalumum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurnalumum  $jurnalumum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $jurnalumum     = Jurnalumum::find($request->id);
         // menyimpan jurnal
         Jurnalumum::where('id',$request->id)->update([
            'tgl_transaksi' => $request->tgl_transaksi,
            'bukti_transaksi' => $request->bukti_transaksi,
            'keterangan' => $request->keterangan,
            'nominal_jurnal' => cikararesetrupiah($request->nominal_jurnal),
        ]);
        
        // simpan ke jurnal akun
        // akun debet
        Jurnalakun::where('jurnalumum_id',$request->id)->where('status_jurnalakun','debet')->update([
            'daftarakun_id' => $request->debet,
        ]);
        // akun kredit
        Jurnalakun::where('jurnalumum_id',$request->id)->where('status_jurnalakun','kredit')->update([
            'daftarakun_id' => $request->kredit,
        ]);

        return redirect()->back()->with('du','Jurnal Umum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurnalumum  $jurnalumum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurnalumum $jurnalumum)
    {
        //
    }
}
