<?php

namespace App\Http\Controllers\Penduduk;

use App\Http\Controllers\Controller;
use App\Models\Formatsurat;
use App\Models\Infowebsite;
use App\Models\Penduduk;
use App\Models\Penduduksurat;
use App\Models\Profil;
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
        Penduduksurat::create([
            'user_id' => $request->user_id,
            'formatsurat_id' => $request->formatsurat_id,
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
        $surat      = Penduduksurat::find(Crypt::decryptString($penduduksurat));
        $user       = User::find($surat->user_id);
        $format     = Formatsurat::find($surat->formatsurat_id);
        return view('penduduk.layananmandiri.buatsurat', compact('user','format','surat'));
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
            'nomor_surat' => 'ccccc/IX/2021',
            'status' => 'selesai', // percobaan
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
        $file       = 'public/file/surat/'.$format->file_surat;
        
        // membaca isi dokumen tempate surat.rtf
        // isi dokumen dinyatakan dalam bentuk string
        $namafile   = $format->nama_surat.'_'.$penduduk->nik.'_'.tgl_sekarang(); // nama surat
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
        $document = str_replace("[nama_kab]", $profil->nama_kabupaten, $document);
        $document = str_replace("[nama_kec]", $profil->nama_kecamatan, $document);
        $document = str_replace("[nama_provinsi]", $profil->provinsi, $document);
        $document = str_replace("[nama_des]", $profil->nama_desa, $document);
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
        $document = str_replace("[nama]", $penduduk->nama_penduduk, $document);
        $document = str_replace("[ttl]", $penduduk->tempat_lahir.', '.date_indo($penduduk->tgl_lahir), $document);
        $document = str_replace("[usia]", 20, $document);
        $document = str_replace("[warga_negara]", $penduduk->status_warganegara, $document);
        $document = str_replace("[agama]", $penduduk->agama, $document);
        $document = str_replace("[jk]", $penduduk->jk, $document);
        $document = str_replace("[pekerjaan]", $penduduk->pekerjaan, $document);
        $document = str_replace("[alamat]", $penduduk->alamat_sekarang, $document);
        $document = str_replace("[no_ktp]", $penduduk->nik, $document);
        $document = str_replace("[no_kk]", $penduduk->kk_sebelum, $document);
        $document = str_replace("[no_kk]", $penduduk->kk_sebelum, $document); //uji
        $document = str_replace("[gol_darah]", $penduduk->golongan_darah, $document);

        $document = str_replace("[alamat_sebelumnya]", $penduduk->alamat_sebelum, $document);
        $document = str_replace("[dokumen_pasport]", $penduduk->nomor_paspor, $document);
        $document = str_replace("[tanggal_akhir_paspor]", '33', $document);
        $document = str_replace("[tempatlahir]", $penduduk->tempat_lahir, $document);
        $document = str_replace("[tanggallahir]", $penduduk->tgl_lahir, $document);
        $document = str_replace("[akta_lahir]", $penduduk->no_akta, $document);
        $document = str_replace("[status]", $penduduk->status_ktp, $document);
        $document = str_replace("[akta_perkawinan]", $penduduk->no_bukunikah, $document);
        $document = str_replace("[tanggalperkawinan]", $penduduk->tgl_perkawinan, $document);
        $document = str_replace("[akta_perceraian]", $penduduk->akta_perceraian, $document);
        $document = str_replace("[tanggalperceraian]", $penduduk->tgl_perceraian, $document);
        $document = str_replace("[hubungan_keluarga]", $penduduk->hubungan_keluarga, $document);
        $document = str_replace("[cacat]", $penduduk->cacat, $document);
        $document = str_replace("[pendidikan]", $penduduk->pendidikan_tempuh, $document);
        $document = str_replace("[nama_ibu]", $penduduk->nama_ibu, $document);
        $document = str_replace("[ibu_nik]", $penduduk->nik_ibu, $document);
        $document = str_replace("[nama_ayah]", $penduduk->nama_ayah, $document);
        $document = str_replace("[ayah_nik]", $penduduk->nik_ayah, $document);
        $document = str_replace("[kepala_kk]", 'Kepala KK', $document);


        // ISI
        $document = str_replace("[judul_surat]", 'Surat '.$format->nama_surat, $document);
        $document = str_replace("[format_nomor_surat]", $surat->nomor_surat, $document);
        $document = str_replace("[jabatan]", 'Kepala Desa', $document);
        $document = str_replace("[format_surat]", $surat->nomor_surat, $document);
        $document = str_replace("[mulai_berlaku]", $surat->tgl_awal, $document);
        $document = str_replace("[tgl_akhir]", $surat->tgl_akhir, $document);
        
        switch ($format->kode) {
            case 'S-01':
                $document = str_replace("[keperluan]", $surat->keperluan, $document);
                break;
            case 'S-02':
                $document = str_replace("[keterangan]", $surat->keterangan, $document);
                break;
            case 'S-03':
                $document = str_replace("[kepala_kk]", 'Kepala KK', $document);
                break;
            
            default:
                # code...
                break;
        }
        
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
