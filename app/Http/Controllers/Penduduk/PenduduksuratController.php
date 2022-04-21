<?php

namespace App\Http\Controllers\Penduduk;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Anggotakeluarga;
use App\Models\Dusun;
use App\Models\Formatsurat;
use App\Models\Infowebsite;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Penduduksurat;
use App\Models\Profil;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PenduduksuratController extends Controller
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
        $format     = Formatsurat::find($request->formatsurat_id);
        Penduduksurat::create([
            'user_id' => $request->user_id,
            'formatsurat_id' => $request->formatsurat_id,
            'nomor_surat' => DbCikara::nomorsurat($format->kode),
            'status' => $request->status,
        ]);

        $suratpenduduk  = Penduduksurat::where('user_id',$request->user_id)->orderBy('id','DESC')->first();
        return redirect('penduduksurat/'.Crypt::encryptString($suratpenduduk->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function show($penduduksurat)
    {
        $info       = Infowebsite::first();
        $surat      = Penduduksurat::find(Crypt::decryptString($penduduksurat));
        $user       = User::find($surat->user_id);
        $format     = Formatsurat::find($surat->formatsurat_id);
        $penduduk   = Penduduk::where('nik',$user->name)->first();
        $rt         = Rt::find($penduduk->rt_id);
        $rw         = Rw::find($rt->rw_id);
        $dusun      = Dusun::find($rw->dusun_id);
        $anggotakk  = Anggotakeluarga::where('penduduk_id',$penduduk->id)->first();
        if ($anggotakk) {
            $datakk     = Keluarga::find($anggotakk->keluarga_id);
            $kepalakk   = Penduduk::find($datakk->penduduk_id);
        } else {
            $datakk     = NULL;
            $kepalakk   = NULL;
        }

        $data       = [
            'penduduk' => $penduduk,
            'rt' => $rt,
            'rw' => $rw,
            'dusun' => $dusun,
            'anggotakk' => $anggotakk,
            'datakk' => $datakk,
            'kepalakk' => $kepalakk,
            'info' => $info
        ];


        $menu   = 'surat';
        
        return view('penduduk.layananmandiri.buatsurat', compact('user','format','surat','data','menu'));
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
    public function update(Request $request, Penduduksurat $penduduksurat)
    {
        $detail     = [];
        foreach (format_surat($request->kode) as $key) {
            $nilai = [
                $key => $request->$key
            ];

            $detail     = array_merge($detail,$nilai);
        }
        $detail     = json_encode($detail);
        Penduduksurat::where('id',$penduduksurat->id)->update([
            'detail' => $detail,
            'status' => $request->status,
        ]);

        if (Auth::user()->level == 'penduduk') {
            return redirect('layananmandiri/surat');
        } else {
            return redirect('suratpenduduk');
        }
        
    }

    public function cetaksurat($id)
    {
        // data utama
        $info       = Infowebsite::first();
        $profil     = Profil::first();
        $surat      = Penduduksurat::find($id);
        $user       = User::find($surat->user_id);
        $format     = Formatsurat::find($surat->formatsurat_id);
        $penduduk   = Penduduk::where('nik',$user->name)->first();
        if ($penduduk) {
            $rt         = Rt::find($penduduk->rt_id);
            $rw         = Rw::find($rt->rw_id);
            $dusun      = Dusun::find($rw->dusun_id);
            $file       = 'public/file/surat/'.$format->file_surat;
            // membaca isi dokumen tempate surat.rtf
            // isi dokumen dinyatakan dalam bentuk string
            $document = file_get_contents($file); // ambil file jadi string
    
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
            $document = str_replace("[nama_kab]", ucwords($profil->nama_kabupaten), $document);
            $document = str_replace("[nama_kec]", ucwords($profil->nama_kecamatan), $document);
            $document = str_replace("[nama_provinsi]", ucwords($profil->provinsi), $document);
            $document = str_replace("[nama_des]", ucwords($profil->nama_desa), $document);
            $document = str_replace("[NAMA_DESA]", ucwords($profil->nama_desa), $document);
            $document = str_replace("[alamat_des]", $profil->alamat, $document);
            
    
            // FOOTER
            $ttd        = json_decode($surat->ttd);
            $document = str_replace("[tgl_surat]", date_indo(tgl_sekarang()), $document);
            $document = str_replace("[jabatan_ttd]", ucwords($ttd->jabatan), $document);
            $document = str_replace("[jabatan]", ucwords($ttd->jabatan), $document);
            $document = str_replace("[nama_pamong]", strtoupper($ttd->nama), $document);
            $document = str_replace("[pamong_nip]", $ttd->nip, $document);
            $document = str_replace("[kode_desa]", $profil->kode_desa, $document);
            $document = str_replace("[kode_surat]", $format->kode, $document);
            
            // DATA PENDUDUK
            $document = str_replace("[nama]", ucwords($penduduk->nama_penduduk), $document);
            $document = str_replace("[ttl]", ucwords($penduduk->tempat_lahir).', '.date_indo($penduduk->tgl_lahir), $document);
            $document = str_replace("[usia]", kingdom_umur($penduduk->tgl_lahir), $document);
            $document = str_replace("[warga_negara]", strtoupper($penduduk->status_warganegara), $document);
            $document = str_replace("[agama]", ucfirst($penduduk->agama), $document);
            $document = str_replace("[jk]", ucfirst($penduduk->jk), $document);
            $document = str_replace("[pekerjaan]", ucfirst($penduduk->pekerjaan), $document);
            $document = str_replace("[alamat]", ucwords($penduduk->alamat_sekarang).' RT. 00'.$rt->nama_rt.'/00'.$rw->nama_rw, $document);
            $document = str_replace("[rt]", $rt->nama_rt, $document);
            $document = str_replace("[rw]", $rw->nama_rw, $document);
            $document = str_replace("[dusun]", ucfirst($dusun->nama_dusun), $document);
            $document = str_replace("[no_ktp]", $penduduk->nik, $document);
            $document = str_replace("[gol_darah]", $penduduk->golongan_darah, $document);
            $document = str_replace("[alamat_sebelumnya]", ucfirst($penduduk->alamat_sebelum), $document);
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
            $document = str_replace("[cacat]", ucfirst($penduduk->cacat), $document);
            $document = str_replace("[pendidikan]", ucfirst($penduduk->pendidikan_kk), $document);
            $document = str_replace("[nama_ibu]", ucwords($penduduk->nama_ibu), $document);
            $document = str_replace("[ibu_nik]", $penduduk->nik_ibu, $document);
            $document = str_replace("[nama_ayah]", ucwords($penduduk->nama_ayah), $document);
            $document = str_replace("[ayah_nik]", $penduduk->nik_ayah, $document);
            
            
            // ISI
            $document = str_replace("[judul_surat]", 'Surat '.$format->nama_surat, $document);
            $document = str_replace("[format_nomor_surat]", $surat->nomor_surat, $document);
            $document = str_replace("[jabatan]", 'Kepala Desa', $document);
            $document = str_replace("[format_surat]", $surat->nomor_surat, $document);
            $document = str_replace("[mulai_berlaku]", $surat->tgl_awal, $document);
            $document = str_replace("[tgl_akhir]", $surat->tgl_akhir, $document);
            $document = str_replace("[form_berlaku_dari]", date_indo($surat->tgl_awal), $document);
            $document = str_replace("[form_berlaku_sampai]", date_indo($surat->tgl_akhir), $document);
    
            $detail     = json_decode($surat->detail);
            $document = str_replace("[no_kk]", cekpost($detail,'no_kk'), $document);
            $document = str_replace("[kepala_kk]", cekpost($detail,'kepala_kk'), $document);
    
            // looping berdasarkan format surat
            foreach (format_surat($format->kode) as $key) {
                $document = str_replace("[form_".$key."]", ucfirst(cekpost($detail,$key)), $document);
            }
            
            $namafile   = $format->nama_surat.'_'.$penduduk->nama_penduduk.' | '.$penduduk->nik.'_'.tgl_sekarang(); // nama surat
    
            // header untuk membuka file output RTF dengan MS. Word
            // nama file output adalah undangan.rtf
            $namafile = $namafile.'.rtf';
            header("Content-type: application/msword");
            header("Content-disposition: inline; filename=".$namafile);
            header("Content-length: " . strlen($document));
            header("Content-Disposition:attachment; filename=\"".$namafile."\"");
            echo $document;
        } else {
            return back()->with('danger','Surat sudah tidak berlaku, penduduk tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function destroy($penduduksurat)
    {
        Penduduksurat::find($penduduksurat)->delete();

        return redirect()->back()->with('dd','Surat');
    }
}
