<?php

namespace App\Http\Controllers\Sidesa\Layanan;

use App\Helpers\Cikara\DbCikara;
use App\Http\Controllers\Controller;
use App\Models\Anggotakeluarga;
use App\Models\Dusun;
use App\Models\Formatsurat;
use App\Models\Infowebsite;
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
        $user   = User::find($surat[0]->user_id);
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
        $formatsurat    = Formatsurat::find($_GET['id']);
        $listformat     = Listdata::where('nama',$formatsurat->id)->first();
        $penduduk_id    = (isset($_GET['penduduk_id'])) ? $_GET['penduduk_id'] : NULL ;
        $data           = NULL;
        if (!is_null($penduduk_id)) {
            $penduduk       = Penduduk::find($penduduk_id);
            $no_kk          = NULL;
            $kepala_kk      = NULL;
            $ak             = Anggotakeluarga::where('penduduk_id',$penduduk->id)->first()->keluarga;
            $userakses      = Userakses::where('penduduk_id',$penduduk->id)->first();
            if (!$userakses) {
                
            }
            if ($ak) {
                $no_kk      = $ak->no_kk;
                $kepala_kk  = Penduduk::find($ak->penduduk_id)->nama_penduduk;
            }
            $data   = [
                'no_kk' => $no_kk,
                'kepala_kk' => ucwords($kepala_kk),
                'penduduk' => $penduduk,
                'user' => $userakses
            ];
        }

        $main           = [
            'penduduk_id' => $penduduk_id,
            'staf' => Staf::where('status_pegawai','aktif')->orderBy('nama_pegawai','ASC')->get(),
            'data' => $data
        ];
        $penduduk       = Penduduk::orderBy('nama_penduduk','ASC')->get();
        return view('admin.layananmandiri.surat.format.create', compact('formatsurat','listformat','main','penduduk'));
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
        $staf   = Staf::find($request->staf_id);
        $ttd    = [
            'nama' => $staf->nama_pegawai,
            'jabatan' => $staf->jabatan,
            'nip' => $staf->nip,
            'nipd' => $staf->nipd,
        ];

        $listformat     = Listdata::where('nama',$request->formatsurat_id)->first();        
        $detail     = [];
        foreach (json_decode($listformat->keterangan) as $item) {
            $key    = $item->key;
            $db = [
                $key => $request->$key
            ];
            $detail = array_merge($detail,$db);
        }

        $nosurat    = DbCikara::nomorsuratbaru($request->formatsurat_id);
        Penduduksurat::create([
            'user_id' => $request->user_id,
            'formatsurat_id' => $request->formatsurat_id,
            'nomor_surat' => $nosurat,
            'status' => 'selesai',
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'ttd' => json_encode($ttd),
            'detail' => json_encode($detail),
        ]);

        $penduduksurat  = Penduduksurat::where('nomor_surat',$nosurat)->first();

        return redirect('suratpenduduk?layanan=langsung')->with('cetak',$penduduksurat->id);

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
        $kepala_kk      = NULL;
        $ak             = Anggotakeluarga::where('penduduk_id',$penduduksurat->userakses->penduduk_id)->first()->keluarga;
        if ($ak) {
            $no_kk      = $ak->no_kk;
            $kepala_kk  = Penduduk::find($ak->penduduk_id)->nama_penduduk;
        }
        $main           = [
            'no_kk' => $no_kk,
            'kepala_kk' => ucwords($kepala_kk),
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
        $listformat     = Listdata::where('nama',$penduduksurat->formatsurat_id)->first();        
        $detail     = [];
        foreach (json_decode($listformat->keterangan) as $item) {
            $key    = $item->key;
            $db = [
                $key => $request->$key
            ];
            $detail = array_merge($detail,$db);
        }

        Penduduksurat::where('id',$request->id)->update([
            'status' => $request->status,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'ttd' => json_encode($ttd),
            'detail' => json_encode($detail),
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
        $userakses  = Userakses::where('user_id',$surat->user->id)->first();
        $format     = Formatsurat::find($surat->formatsurat_id);
        $penduduk   = Penduduk::find($userakses->penduduk_id);
        if ($penduduk) {
            $rt         = Rt::find($penduduk->rt_id);
            if ($rt) {
            $rw         = Rw::find($rt->rw_id);
            $dusun      = Dusun::find($rw->dusun_id);
            $file       = 'public/file/surat/'.$format->file_surat;
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
