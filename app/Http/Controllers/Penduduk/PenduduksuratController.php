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
        
        return view('penduduk.layananmandiri.buatsurat', compact('user','format','surat','data'));
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
        Penduduksurat::where('id',$penduduksurat->id)->update([
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'keperluan' => $request->keperluan,
            'keterangan' => $request->keterangan,
            'no_kk' => $request->no_kk,
            'kepala_kk' => $request->kepala_kk,
            'status' => 'selesai', // percobaan
            'rt_tujuan' => $request->rt_tujuan,
            'rw_tujuan' => $request->rw_tujuan,
            'dusun_tujuan' => $request->dusun_tujuan,
            'desa_tujuan' => $request->desa_tujuan,
            'kecamatan_tujuan' => $request->kecamatan_tujuan,
            'kabupaten_tujuan' => $request->kabupaten_tujuan,
            'alasan_pindah' => $request->alasan_pindah,
            'tanggal_pindah' => $request->tanggal_pindah,
            'jumlah_pengikut' => $request->jumlah_pengikut,
            'barang' => $request->barang,
            'jenis' => $request->jenis,
            'nama' => $request->nama,
            'no_identitas' => $request->no_identitas,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'ketua_adat' => $request->ketua_adat,
            'perbedaan' => $request->perbedaan,
            'kartu_identitas' => $request->kartu_identitas,
            'rincian' => $request->rincian,
            'usaha' => $request->usaha,
            'no_jamkesos' => $request->no_jamkesos,
        ]);

        // return self::cetaksurat($penduduksurat->id);

        return redirect('layananmandiri/surat');
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
        $rt         = Rt::find($penduduk->rt_id);
        $rw         = Rw::find($rt->rw_id);
        $dusun      = Dusun::find($rw->dusun_id);
        $file       = 'public/file/surat/'.$format->file_surat;
        
        // membaca isi dokumen tempate surat.rtf
        // isi dokumen dinyatakan dalam bentuk string
        $document = file_get_contents($file); // ambil file jadi string

        // DATA SURAT
        // format
        // $document = str_replace("[", '', $document);
        // $document = str_replace("]", '', $document);

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
        
        // FOOTER
        $document = str_replace("[tgl_surat]", date_indo(tgl_sekarang()), $document);
        $document = str_replace("[jabatan_ttd]", 'Kepala Desa', $document);
        $document = str_replace("[nama_pamong]", 'Firman Setiawan', $document);
        $document = str_replace("[pamong_nip]", '43437643764736473', $document);
        $document = str_replace("[kode_desa]", $profil->kode_desa, $document);
        $document = str_replace("[kode_surat]", $format->kode, $document);
        
        // DATA PENDUDUK
        $document = str_replace("[nama]", ucwords($penduduk->nama_penduduk), $document);
        $document = str_replace("[ttl]", ucwords($penduduk->tempat_lahir).', '.date_indo($penduduk->tgl_lahir), $document);
        $document = str_replace("[usia]", 20, $document);
        $document = str_replace("[warga_negara]", strtoupper($penduduk->status_warganegara), $document);
        $document = str_replace("[agama]", $penduduk->agama, $document);
        $document = str_replace("[jk]", $penduduk->jk, $document);
        $document = str_replace("[pekerjaan]", $penduduk->pekerjaan, $document);
        $document = str_replace("[alamat]", $penduduk->alamat_sekarang, $document);
        $document = str_replace("[rt]", $rt->nama_rt, $document);
        $document = str_replace("[rw]", $rw->nama_rw, $document);
        $document = str_replace("[dusun]", $dusun->nama_dusun, $document);
        $document = str_replace("[no_ktp]", $penduduk->nik, $document);
        $document = str_replace("[no_kk]", $penduduk->kk_sebelum, $document);
        $document = str_replace("[no_kk]", $penduduk->kk_sebelum, $document); //uji
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
        
        
        // ISI
        $document = str_replace("[kepala_kk]", ucwords($surat->kepala_kk), $document);
        $document = str_replace("[nomor_kk]", $surat->no_kk, $document);
        $document = str_replace("[judul_surat]", 'Surat '.$format->nama_surat, $document);
        $document = str_replace("[format_nomor_surat]", $surat->nomor_surat, $document);
        $document = str_replace("[jabatan]", 'Kepala Desa', $document);
        $document = str_replace("[format_surat]", $surat->nomor_surat, $document);
        $document = str_replace("[mulai_berlaku]", $surat->tgl_awal, $document);
        $document = str_replace("[tgl_akhir]", $surat->tgl_akhir, $document);
        
        switch ($format->kode) {
            case 'S-01':
                $document = str_replace("[form_keperluan]", $surat->keperluan, $document);
                break;
            case 'S-02':
                $document = str_replace("[form_keterangan]", $surat->keterangan, $document);
                break;
            case 'S-03':
                // $document = str_replace("[kepala_kk]", 'Kepala KK', $document);
                break;
            case 'S-04':
                $document = str_replace("[form_rt_tujuan]", $surat->rt_tujuan, $document);
                $document = str_replace("[form_rw_tujuan]", $surat->rw_tujuan, $document);
                $document = str_replace("[form_dusun_tujuan]", $surat->dusun_tujuan, $document);
                $document = str_replace("[form_desa_tujuan]", $surat->desa_tujuan, $document);
                $document = str_replace("[form_kecamatan_tujuan]", $surat->kecamatan_tujuan, $document);
                $document = str_replace("[form_kabupaten_tujuan]", $surat->kabupaten_tujuan, $document);
                $document = str_replace("[form_alasan_pindah]", $surat->alasan_pindah, $document);
                $document = str_replace("[form_tanggal_pindah]", date_indo($surat->tanggal_pindah), $document);
                $document = str_replace("[form_jumlah_pengikut]", $surat->jumlah_pengikut, $document);

                break;
            case 'S-05':
                $document = str_replace("[form_barang]", $surat->barang, $document);
                $document = str_replace("[form_jenis]", $surat->jenis, $document);
                $document = str_replace("[form_nama]", ucwords($surat->nama), $document);
                $document = str_replace("[form_no_identitas]", $surat->no_identitas, $document);
                $document = str_replace("[form_tempat_lahir]", $surat->tempat_lahir, $document);
                $document = str_replace("[form_tanggallahir]", date_indo($surat->tgl_lahir), $document);
                $document = str_replace("[form_jk]", $surat->jk, $document);
                $document = str_replace("[form_alamat]", $surat->alamat, $document);
                $document = str_replace("[form_pekerjaan]", $surat->pekerjaan, $document);
                $document = str_replace("[form_ketua_adat]", ucwords($surat->ketua_adat), $document);
                break;
            case 'S-09':
                $document = str_replace("[form_agama]", $surat->agama, $document);
                $document = str_replace("[form_nama]", ucwords($surat->nama), $document);
                $document = str_replace("[form_no_identitas]", $surat->no_identitas, $document);
                $document = str_replace("[form_tempat_lahir]", $surat->tempat_lahir, $document);
                $document = str_replace("[form_tanggallahir]", date_indo($surat->tgl_lahir), $document);
                $document = str_replace("[form_jk]", $surat->jk, $document);
                $document = str_replace("[form_alamat]", $surat->alamat, $document);
                $document = str_replace("[form_pekerjaan]", $surat->pekerjaan, $document);
                $document = str_replace("[form_kartu]", $surat->kartu_identitas, $document);
                $document = str_replace("[form_perbedaan]", $surat->perbedaan, $document);
                break;
            case 'S-10':
                $document = str_replace("[form_keperluan]", $surat->keperluan, $document);
                break;
            case 'S-12':
                $document = str_replace("[form_jenis_keramaian]", $surat->jenis, $document);
                break;
            
            default:
                # code...
                break;
        }
        // all
        $document = str_replace("[form_usaha]", $surat->usaha, $document);
        $document = str_replace("[form_no_jamkesos]", $surat->no_jamkesos, $document);
        $document = str_replace("[form_keterangan]", $surat->keterangan, $document);
        $document = str_replace("[form_rincian]", $surat->rincian, $document);
        $document = str_replace("[form_keperluan]", $surat->keperluan, $document);
        $document = str_replace("[form_berlaku_dari]", date_indo($surat->tgl_awal), $document);
        $document = str_replace("[form_berlaku_sampai]", date_indo($surat->tgl_akhir), $document);


        
        $namafile   = $format->nama_surat.'_'.$penduduk->nama_penduduk.' | '.$penduduk->nik.'_'.tgl_sekarang(); // nama surat

        // header untuk membuka file output RTF dengan MS. Word
        // nama file output adalah undangan.rtf
        
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=".$namafile.".rtf");
        header("Content-length: " . strlen($document));
        echo $document;
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
