<?php

namespace App\Http\Controllers\Sidesa\Sekretariat;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Formatsurat;
use App\Models\Infowebsite;
use App\Models\Penduduk;
use App\Models\Profil;
use App\Models\Rw;
use App\Models\Staf;
use App\Models\Suratkeluar;
use Illuminate\Http\Request;

class DatasuratkeluarController extends Controller
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
        $formatsurat    = Formatsurat::find($request->formatsurat_id);
        switch ($formatsurat->format) {
            case 'upcpk':
                $isi    = [
                    'penduduk_id' => $request->penduduk_id,
                    'perihal' => $request->perihal,
                    'sifat' => $request->sifat,
                    'kepada' => $request->kepada,
                    'isi' => $request->isi,
                    'idbdt' => $request->idbdt,
                    'penyakit' => $request->penyakit,
                    'mengetahui' => $request->mengetahui,
                ];
                break;
            case 'undangan':
                $isi    = [
                    'perihal' => $request->perihal,
                    'sifat' => $request->sifat,
                    'hari' => hari_indo($request->tanggal),
                    'isi' => $request->isi,
                    'tanggal' => $request->tanggal,
                    'tempat' => $request->tempat,
                    'waktu' => $request->waktu,
                ];
                break;
            
            default:
                # code...
                break;
        }
        $nomorsurat     = DbCikara::nomorsuratbaru($formatsurat->id);
        Suratkeluar::create([
            'formatsurat_id' => $formatsurat->id,
            'nomor_surat' => $nomorsurat,
            'konfirmasi' => $request->konfirmasi,
            'isi' => json_encode($isi)
        ]);

        $datasuratkeluar    = Suratkeluar::where('nomor_surat',$nomorsurat)->first();

        return redirect('datasuratkeluar/'.$datasuratkeluar->id)->with('ds','Surat Keluar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suratkeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function show($suratkeluar)
    {
        $suratkeluar    = Suratkeluar::find($suratkeluar);
        $menu           = 'suratkeluar';
        $main           = [];
        $s = (isset($_GET['s'])) ? $_GET['s'] : 'show' ;
        switch ($s) {
            case 'cetak':
                return self::cetak($suratkeluar);
                break;
            
            default:
                return view('admin.sekretariat.suratkeluar.show', compact('menu','suratkeluar','main'));
                break;
        }
    }

    public function cetak($suratkeluar)
    {

        $file       = 'public/file/suratkeluar/'.$suratkeluar->formatsurat->file_surat;
        $document = file_get_contents($file);
        $penduduk   = FALSE;
        switch ($suratkeluar->formatsurat->format) {
            case 'upcpk':
                $namafile   = 'UPCPK';
                $isi        = json_decode($suratkeluar->isi);
                $penduduk   = Penduduk::find($isi->penduduk_id);
                $document = str_replace("[perihal]", $isi->perihal, $document);
                $document = str_replace("[kepada]", $isi->kepada, $document);
                $document = str_replace("[sifat]", $isi->sifat, $document);
                $document = str_replace("[isi]", $isi->isi, $document);
                $document = str_replace("[idbdt]", $isi->idbdt, $document);
                $document = str_replace("[penyakit]", $isi->penyakit, $document);
                $document = str_replace("[mengetahui]", $isi->mengetahui, $document);
                break;
            case 'undangan':
                $namafile   = 'UNDANGAN';
                $isi        = json_decode($suratkeluar->isi);
                $document = str_replace("[perihal]", $isi->perihal, $document);
                $document = str_replace("[hari]", $isi->hari, $document);
                $document = str_replace("[sifat]", $isi->sifat, $document);
                $document = str_replace("[isi]", $isi->isi, $document);
                $document = str_replace("[tanggal]", date_indo($isi->tanggal), $document);
                $document = str_replace("[hari]", $isi->hari, $document);
                $document = str_replace("[waktu]", $isi->waktu, $document);
                $document = str_replace("[tempat]", $isi->tempat, $document);
                break;
            
            default:
                # code...
                break;
        }
        $info       = Infowebsite::first();
        $profil     = Profil::first();
        $staf       = Staf::find($_GET['staf']);

         // UTAMA
         $document = str_replace("[SEBUTAN_KABUPATEN]", $info->sebutan_kabupaten, $document);
         $document = str_replace("[Sebutan_kabupaten]", $info->sebutan_kabupaten, $document);
         $document = str_replace("[SEbutan_kabupaten]", $info->sebutan_kabupaten, $document);
         $document = str_replace("[sebutan_kabupaten]", $info->sebutan_kabupaten, $document);
         $document = str_replace("[Sebutan_desa]", $info->sebutan_desa, $document);
         $document = str_replace("[Sebutan_Desa]", $info->sebutan_desa, $document);
         $document = str_replace("[sebutan_desa]", $info->sebutan_desa, $document);
         $document = str_replace("[sebutan_dusun]", $info->sebutan_dusun, $document);
         $document = str_replace("[sebutan_kecamatan]", $info->sebutan_kecamatan, $document);
         $document = str_replace("[nama_kab]", $profil->nama_kabupaten, $document);
         $document = str_replace("[nama_kec]", $profil->nama_kecamatan, $document);
         $document = str_replace("[nama_provinsi]", $profil->provinsi, $document);
         $document = str_replace("[nama_des]", ucwords($profil->nama_desa), $document);
         $document = str_replace("[NAMA_DESA]", $profil->nama_desa, $document);
         $document = str_replace("[alamat_des]", $profil->alamat, $document);
         
         // SURAT
         $document = str_replace("[nomor_surat]", $suratkeluar->nomor_surat, $document);

         // FOOTER

          $document = str_replace("[tgl_surat]", date_indo(tgl_sekarang()), $document);
          $document = str_replace("[jabatan_ttd]", ucwords($staf->jabatan), $document);
          $document = str_replace("[jabatan]", ucwords($staf->jabatan), $document);
          $document = str_replace("[nama_pamong]", ucwords($staf->nama_pegawai), $document);
          $document = str_replace("[pamong_nip]", $staf->nip, $document);
          $document = str_replace("[kode_desa]", $profil->kode_desa, $document);
          $document = str_replace("[kode_surat]", $suratkeluar->formatsurat->kode, $document);


        if ($penduduk) {
             // DATA PENDUDUK
             $rw    = Rw::find($penduduk->rt->rw_id);
             $document = str_replace("[nama]", ucwords($penduduk->nama_penduduk), $document);
             $document = str_replace("[ttl]", ucwords($penduduk->tempat_lahir).', '.date_indo($penduduk->tgl_lahir), $document);
             $document = str_replace("[usia]", 20, $document);
             $document = str_replace("[warga_negara]", strtoupper($penduduk->status_warganegara), $document);
             $document = str_replace("[agama]", $penduduk->agama, $document);
             $document = str_replace("[jk]", $penduduk->jk, $document);
             $document = str_replace("[pekerjaan]", $penduduk->pekerjaan, $document);
             $document = str_replace("[alamat]", $penduduk->alamat_sekarang, $document);
             $document = str_replace("[rt]", $penduduk->rt->nama_rt, $document);
             $document = str_replace("[rw]", $rw->nama_rw, $document);
             $document = str_replace("[dusun]", $rw->dusun->nama_dusun, $document);
             $document = str_replace("[no_ktp]", $penduduk->nik, $document);
             $document = str_replace("[gol_darah]", $penduduk->golongan_darah, $document);
             $document = str_replace("[alamat_sebelumnya]", $penduduk->alamat_sebelum, $document);
             $document = str_replace("[dokumen_pasport]", $penduduk->nomor_paspor, $document);
             $document = str_replace("[tanggal_akhir_paspor]", '33', $document);
             $document = str_replace("[tempatlahir]", strtoupper($penduduk->tempat_lahir), $document);
             $document = str_replace("[tanggallahir]", date_indo($penduduk->tgl_lahir), $document);
             $document = str_replace("[akta_lahir]", $penduduk->no_akta, $document);
             $document = str_replace("[status]", $penduduk->status_ktp, $document);
             $document = str_replace("[akta_perkawinan]", $penduduk->no_bukunikah, $document);
             $document = str_replace("[tanggalperkawinan]", date_indo($penduduk->tgl_perkawinan), $document);
             $document = str_replace("[akta_perceraian]", $penduduk->akta_perceraian, $document);
             $document = str_replace("[tanggalperceraian]", date_indo($penduduk->tgl_perceraian), $document);
             $document = str_replace("[hubungan_keluarga]", $penduduk->hubungan_keluarga, $document);
             $document = str_replace("[cacat]", $penduduk->cacat, $document);
             $document = str_replace("[pendidikan]", $penduduk->pendidikan_tempuh, $document);
             $document = str_replace("[nama_ibu]", ucwords($penduduk->nama_ibu), $document);
             $document = str_replace("[ibu_nik]", $penduduk->nik_ibu, $document);
             $document = str_replace("[nama_ayah]", ucwords($penduduk->nama_ayah), $document);
             $document = str_replace("[ayah_nik]", $penduduk->nik_ayah, $document);
        }

        $namafile = 'Surat Keluar - '.$namafile.' '.$suratkeluar->nomor_surat;
        $namafile = $namafile.'.rtf';
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=".$namafile);
        header("Content-length: " . strlen($document));
        header("Content-Disposition:attachment; filename=\"".$namafile."\"");
        echo $document;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suratkeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Suratkeluar $suratkeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suratkeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suratkeluar $suratkeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suratkeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suratkeluar $suratkeluar)
    {
        //
    }
}
