<?php

namespace App\Http\Controllers\Sidesa\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class InventarisController extends Controller
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

    public function list($inventaris)
    {
        $datainventaris = Inventaris::where('kode',$inventaris)->get();
        $kode           = $inventaris;
        $inventaris     = list_inventaris()[$inventaris];
        $menu           = 'inventaris';
        return view('admin.sekretariat.inventaris.index', compact('datainventaris','inventaris','kode','menu'));
    }

    public function tambah($inventaris)
    {
        $kode   = $inventaris;
        $inventaris     = list_inventaris()[$inventaris];
        $menu   = 'inventaris';
        return view('admin.sekretariat.inventaris.create', compact('kode','inventaris','menu'));
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
        switch ($request->kode) {
            case 'tanah':
                Inventaris::create([
                    'kode' => $request->kode,
                    'nama_barang' => $request->nama_barang,
                    'kode_barang' => $request->kode_barang,
                    'nomor_register' => $request->nomor_register,
                    'luas_tanah' => $request->luas_tanah,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'lokasi' => $request->lokasi,
                    'hak_tanah' => $request->hak_tanah,
                    'penggunaan_barang' => $request->penggunaan_barang,
                    'tanggal_sertifikat' => $request->tanggal_sertifikat,
                    'no_sertifikat' => $request->no_sertifikat,
                    'penggunaan' => $request->penggunaan,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            case 'peralatan-mesin':
                Inventaris::create([
                    'kode' => $request->kode,
                    'nama_barang' => $request->nama_barang,
                    'kode_barang' => $request->kode_barang,
                    'nomor_register' => $request->nomor_register,
                    'merk' => $request->merk,
                    'ukuran' => $request->ukuran,
                    'bahan' => $request->bahan,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'nomor_pabrik' => $request->nomor_pabrik,
                    'nomor_rangka' => $request->nomor_rangka,
                    'nomor_mesin' => $request->nomor_mesin,
                    'nomor_polisi' => $request->nomor_polisi,
                    'bpkb' => $request->bpkb,
                    'penggunaan_barang' => $request->penggunaan_barang,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            case 'gedung-bangunan':
                Inventaris::create([
                    'kode' => $request->kode,
                    'nama_barang' => $request->nama_barang,
                    'kode_barang' => $request->kode_barang,
                    'nomor_register' => $request->nomor_register,
                    'kondisi_bangunan' => $request->kondisi_bangunan,
                    'bangunan_bertingkat' => $request->bangunan_bertingkat,
                    'kontruksi_beton' => $request->kontruksi_beton,
                    'luas_bangunan' => $request->luas_bangunan,
                    'lokasi' => $request->lokasi,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'nomor_bangunan' => $request->nomor_bangunan,
                    'tgl_dok_bangunan' => $request->tgl_dok_bangunan,
                    'status_tanah' => $request->status_tanah,
                    'luas_tanah' => $request->luas_tanah,
                    'nomor_kode_tanah' => $request->nomor_kode_tanah,
                    'penggunaan_barang' => $request->penggunaan_barang,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            case 'jalan-irigasi-jaringan':
                Inventaris::create([
                    'kode' => $request->kode,
                    'nama_barang' => $request->nama_barang,
                    'kode_barang' => $request->kode_barang,
                    'nomor_register' => $request->nomor_register,
                    'kondisi_bangunan' => $request->kondisi_bangunan,
                    'kontruksi' => $request->kontruksi,
                    'panjang' => $request->panjang,
                    'lebar' => $request->lebar,
                    'luas' => $request->luas,
                    'lokasi' => $request->lokasi,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'no_kepemilikan' => $request->no_kepemilikan,
                    'tgl_dok_kepemilikan' => $request->tgl_dok_kepemilikan,
                    'status_tanah' => $request->status_tanah,
                    'nomor_kode_tanah' => $request->nomor_kode_tanah,
                    'penggunaan_barang' => $request->penggunaan_barang,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            case 'asset-tetap':
                Inventaris::create([
                    'kode' => $request->kode,
                    'nama_barang' => $request->nama_barang,
                    'kode_barang' => $request->kode_barang,
                    'nomor_register' => $request->nomor_register,
                    'jenis_aset' => $request->jenis_aset,
                    'jumlah' => $request->jumlah,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'penggunaan_barang' => $request->penggunaan_barang,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            case 'kontruksi-pengerjaan':
                Inventaris::create([
                    'kode' => $request->kode,
                    'nama_barang' => $request->nama_barang,
                    'fisik_bangunan' => $request->fisik_bangunan,
                    'bangunan_bertingkat' => $request->bangunan_bertingkat,
                    'kontruksi_beton' => $request->kontruksi_beton,
                    'luas' => $request->luas,
                    'lokasi' => $request->lokasi,
                    'nomor_bangunan' => $request->nomor_bangunan,
                    'tgl_dok_bangunan' => $request->tgl_dok_bangunan,
                    'tgl_mulai' => $request->tgl_mulai,
                    'status_tanah' => $request->status_tanah,
                    'nomor_kode_tanah' => $request->nomor_kode_tanah,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            
            default:
                # code...
                break;
        }

        return redirect('/inventaris/list/'.$request->kode)->with('ds','Inventaris');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Inventaris $inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit($inventaris)
    {
        $inventaris     = Inventaris::find(Crypt::decryptString($inventaris));
        $title  = list_inventaris()[$inventaris->kode];

        return view('admin.sekretariat.inventaris.edit', compact('inventaris','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventaris $inventaris)
    {
        switch ($request->kode) {
            case 'tanah':
                Inventaris::where('id',$request->id)->update([
                    'nama_barang' => $request->nama_barang,
                    'kode_barang' => $request->kode_barang,
                    'nomor_register' => $request->nomor_register,
                    'luas_tanah' => $request->luas_tanah,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'lokasi' => $request->lokasi,
                    'hak_tanah' => $request->hak_tanah,
                    'penggunaan_barang' => $request->penggunaan_barang,
                    'tanggal_sertifikat' => $request->tanggal_sertifikat,
                    'no_sertifikat' => $request->no_sertifikat,
                    'penggunaan' => $request->penggunaan,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            case 'peralatan-mesin':
                Inventaris::where('id',$request->id)->update([
                    'nama_barang' => $request->nama_barang,
                    'kode_barang' => $request->kode_barang,
                    'nomor_register' => $request->nomor_register,
                    'merk' => $request->merk,
                    'ukuran' => $request->ukuran,
                    'bahan' => $request->bahan,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'nomor_pabrik' => $request->nomor_pabrik,
                    'nomor_rangka' => $request->nomor_rangka,
                    'nomor_mesin' => $request->nomor_mesin,
                    'nomor_polisi' => $request->nomor_polisi,
                    'bpkb' => $request->bpkb,
                    'penggunaan_barang' => $request->penggunaan_barang,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            case 'gedung-bangunan':
                Inventaris::where('id',$request->id)->update([
                    'nama_barang' => $request->nama_barang,
                    'kode_barang' => $request->kode_barang,
                    'nomor_register' => $request->nomor_register,
                    'kondisi_bangunan' => $request->kondisi_bangunan,
                    'bangunan_bertingkat' => $request->bangunan_bertingkat,
                    'kontruksi_beton' => $request->kontruksi_beton,
                    'luas_bangunan' => $request->luas_bangunan,
                    'lokasi' => $request->lokasi,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'nomor_bangunan' => $request->nomor_bangunan,
                    'tgl_dok_bangunan' => $request->tgl_dok_bangunan,
                    'status_tanah' => $request->status_tanah,
                    'luas_tanah' => $request->luas_tanah,
                    'nomor_kode_tanah' => $request->nomor_kode_tanah,
                    'penggunaan_barang' => $request->penggunaan_barang,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            case 'jalan-irigasi-jaringan':
                Inventaris::where('id',$request->id)->update([
                    'nama_barang' => $request->nama_barang,
                    'kode_barang' => $request->kode_barang,
                    'nomor_register' => $request->nomor_register,
                    'kondisi_bangunan' => $request->kondisi_bangunan,
                    'kontruksi' => $request->kontruksi,
                    'panjang' => $request->panjang,
                    'lebar' => $request->lebar,
                    'luas' => $request->luas,
                    'lokasi' => $request->lokasi,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'no_kepemilikan' => $request->no_kepemilikan,
                    'tgl_dok_kepemilikan' => $request->tgl_dok_kepemilikan,
                    'status_tanah' => $request->status_tanah,
                    'nomor_kode_tanah' => $request->nomor_kode_tanah,
                    'penggunaan_barang' => $request->penggunaan_barang,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            case 'asset-tetap':
                Inventaris::where('id',$request->id)->update([
                    'nama_barang' => $request->nama_barang,
                    'kode_barang' => $request->kode_barang,
                    'nomor_register' => $request->nomor_register,
                    'jenis_aset' => $request->jenis_aset,
                    'jumlah' => $request->jumlah,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'penggunaan_barang' => $request->penggunaan_barang,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            case 'kontruksi-pengerjaan':
                Inventaris::where('id',$request->id)->update([
                    'nama_barang' => $request->nama_barang,
                    'fisik_bangunan' => $request->fisik_bangunan,
                    'bangunan_bertingkat' => $request->bangunan_bertingkat,
                    'kontruksi_beton' => $request->kontruksi_beton,
                    'luas' => $request->luas,
                    'lokasi' => $request->lokasi,
                    'nomor_bangunan' => $request->nomor_bangunan,
                    'tgl_dok_bangunan' => $request->tgl_dok_bangunan,
                    'tgl_mulai' => $request->tgl_mulai,
                    'status_tanah' => $request->status_tanah,
                    'nomor_kode_tanah' => $request->nomor_kode_tanah,
                    'asal_usul' => $request->asal_usul,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                ]);
                break;
            
            default:
                # code...
                break;
        }

        return redirect('/inventaris/list/'.$request->kode)->with('du','Inventaris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventaris $inventaris)
    {
        //
    }
}
