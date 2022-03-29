<?php

namespace App\Http\Controllers\Sidesa\Layanan;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Anggotakeluarga;
use App\Models\Dusun;
use App\Models\Formatsurat;
use App\Models\Infowebsite;
use App\Models\Keluarga;
use App\Models\Listdata;
use App\Models\Log;
use App\Models\Penduduk;
use App\Models\Penduduksurat;
use App\Models\Profil;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Staf;
use App\Models\User;
use App\Models\Userakses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\For_;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat  = Penduduksurat::with('user','formatsurat')->latest()->get();
        $judul  = 'Pengajuan Surat';
        $total  = [
            'jumlah' => count($surat),
            'selesai' => Penduduksurat::where('status','selesai')->count(),
            'proses' => Penduduksurat::where('status','proses')->count(),
            'menunggu' => Penduduksurat::where('status','menunggu')->count(),
        ];
        $staf   = Staf::where('status_pegawai','aktif')->orderby('nama_pegawai','ASC')->get();
        $sesi = (isset($_GET['layanan'])) ? 'langsung' : 'mandiri' ;
        $f_status = (isset($_GET['status'])) ? $_GET['status'] : 'semua' ;
        $f_penduduk = (isset($_GET['penduduk_id'])) ? $_GET['penduduk_id'] : 'semua' ;
        $f_tanggal = (isset($_GET['created_at'])) ? $_GET['created_at'] : 'semua' ;

        $surat  = datafilter($surat,['status','penduduk_id','created_at']);
        $filter = [
            'status' => $f_status,
            'penduduk' => $f_penduduk,
            'tanggal' => $f_tanggal,
        ];
        $log    = Log::where('sesi','penduduksurat')->orderby('id','DESC')->get();
        $userpenduduk      = Userakses::with('penduduk')->get();
        $main = [
            'user_penduduk' => $userpenduduk,
            'format_surat'   => Formatsurat::where('layanan_mandiri','ya')->where('status','1')->orderBy('kode','ASC')->get(),
            'sesi'   => $sesi,
        ];
        if ($sesi == 'mandiri') {
            return view('admin.layananmandiri.surat.index', compact('main','surat','judul','total','staf','filter','log'));
        } else {
            return view('admin.layananmandiri.surat.langsung', compact('main','surat','judul','total','staf','filter','log'));
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
        // kode untuk menyimpan format surat ke tabel list data
        $formatsurat    = Formatsurat::find($request->formatsurat_id);
        $data   = [];
        foreach (format_surat($formatsurat->kode) as $item) {
            $data[] = [
                'label' => nama_label($item,$formatsurat->kode),
                'key' => $item
            ];
        }

        Listdata::create([
            'label' => 'format_surat',
            'nama' => $formatsurat->id,
            'keterangan' => json_encode($data)
        ]);

        $nosurat    = DbCikara::nomorsuratbaru($request->formatsurat_id);
        Penduduksurat::create([
            'user_id' => $request->user_id,
            'formatsurat_id' => $request->formatsurat_id,
            'status' => 'proses',
            'nomor_surat' => $nosurat,
        ]);

        $penduduksurat  = Penduduksurat::where('nomor_surat',$nosurat)->first();

        return redirect('suratpenduduk/'.$penduduksurat->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduksurat  $penduduksurat
     * @return \Illuminate\Http\Response
     */
    public function show($penduduksurat)
    {

        $penduduksurat  = Penduduksurat::find($penduduksurat);
        $listformat     = Listdata::where('nama',$penduduksurat->formatsurat->id)->first();
        $userakses      = Userakses::where('user_id',$penduduksurat->user_id)->first();
        $no_kk          = NULL;
        if ($userakses) {
            $penduduk   = Penduduk::find($userakses->penduduk_id);
            if ($penduduk) {
                $keluarga = Anggotakeluarga::where('penduduk_id',$penduduk->id)->first();
                if ($keluarga) {
                    $mo_kk     = Keluarga::find($keluarga->keluarga_id)->no_kk;
                }
            }
        }
        $main           = [
            'no_kk' => $no_kk,
            'staf' => Staf::where('status_pegawai','aktif')->get()
        ];
        return view('admin.layananmandiri.surat.create', compact('main','penduduksurat','listformat'));
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

        return redirect('suratpenduduk?layanan=langsung')->with('cetak',$penduduksurat->id);
    }

    public function cetaksurat($id)
    {
        // data utama
        $surat      = Penduduksurat::find($id);
        $info       = Infowebsite::first();
        $profil     = Profil::first();
        $user       = User::find($surat->user_id);
        $format     = Formatsurat::find($surat->formatsurat_id);
        $penduduk   = Penduduk::find($surat->userakses->penduduk_id);
        if ($penduduk) {
            $rt         = Rt::find($penduduk->rt_id);
            if ($rt) {
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
            $document = str_replace("[nama_kab]", $profil->nama_kabupaten, $document);
            $document = str_replace("[nama_kec]", $profil->nama_kecamatan, $document);
            $document = str_replace("[nama_provinsi]", $profil->provinsi, $document);
            $document = str_replace("[nama_des]", ucwords($profil->nama_desa), $document);
            $document = str_replace("[NAMA_DESA]", $profil->nama_desa, $document);
            $document = str_replace("[alamat_des]", $profil->alamat, $document);
            
    
            // FOOTER
            $ttd        = json_decode($surat->ttd);
            $document = str_replace("[tgl_surat]", date_indo(tgl_sekarang()), $document);
            $document = str_replace("[jabatan_ttd]", ucwords($ttd->jabatan), $document);
            $document = str_replace("[jabatan]", ucwords($ttd->jabatan), $document);
            $document = str_replace("[nama_pamong]", ucwords($ttd->nama), $document);
            $document = str_replace("[pamong_nip]", $ttd->nip, $document);
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
                
            $listformat     = Listdata::where('nama',$format->id)->first();
            // looping berdasarkan format surat
            foreach (json_decode($listformat->keterangan) as $item) {
                $document = str_replace("[form_".$item->key."]", cekpost($detail,$item->key), $document);
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
            } 
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
