<?php
namespace App\Helpers\Cikara;

use App\Models\Lapor;
use App\Models\Listdata;
use App\Models\Log;
use App\Models\Menu;
use App\Models\Penduduk;
use App\Models\Penduduksurat;
use App\Models\Profil;
use App\Models\User;
use App\Models\Userakses;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DbCikara {

      // total data tabel
      public static function countData($table=null,$where=null)
      {
          $total = null;
          if (!is_null($table)) {
              if (!is_null($where) AND is_array($where)) {
                  if (count($where) == 2) {
                      $total = DB::table($table)
                      ->where($where[0],$where[1])
                      ->count();
                  }
              } else {
                  $total = DB::table($table)
                  ->count();
              }
              return $total;
          }
      }
  
      // tampil data table
      public static function showtable($table=null,$where=null)
      {
          if (!is_null($where) AND is_array($where)) {
              $show = DB::table($table)
              ->where($where[0],$where[1])
              ->get();
          } else {
              $show = DB::table($table)
              ->get();
          }
          return $show;
      }
      // tampil data table
      public static function showtablefirst($table,$where=null)
      {
          if (!is_null($where) AND is_array($where)) {
              $show = DB::table($table)
              ->where($where[0],$where[1])
              ->first();
          } else {
              $show = DB::table($table)
              ->first();
          }
          return $show;
      }
      
    public static function showtableid($table,$id)
    {
        $data = DB::table($table)->where('id',$id)->first();
        return $data;
    }

    // untuk dashboard

    public static function chartDashboard($sesi,$bulan=null,$tahun=null)
    {
        if (is_null($bulan)) {
            $bulan  = ambil_bulan();
        }
        if (is_null($tahun)) {
            $tahun = ambil_tahun();
        }
        switch ($sesi) {
            case 'kunjungan':
                $result = NULL;
                for ($i=1; $i <= ambil_tgl(); $i++) { 
                    $tanggal    = $tahun.'-'.$bulan.'-'.$i;
                    $jumlah    = Visitor::whereDate('created_at',$tanggal)->sum('hits');
                    if ($jumlah) {
                        $result .= $jumlah.',';
                    } else {
                        $result .= '0,';
                    }
                }
                $result = trim($result,',');
                break;
            case 'laporan':
                $result = NULL;
                for ($i=1; $i <= ambil_tgl(); $i++) { 
                    $tanggal    = $tahun.'-'.$bulan.'-'.$i;
                    $jumlah    = Lapor::whereDate('created_at',$tanggal)->count();
                    if ($jumlah) {
                        $result .= $jumlah.',';
                    } else {
                        $result .= '0,';
                    }
                }
                $result = trim($result,',');
                break;
            case 'jumlahkunjungan':
                $result = Visitor::sum('hits');
                break;
            default:
                # code...
                break;
        }

        return $result;
    }

    // khusus penduduk
    public static function datapenduduk($input,$sesi='nik')
    {
        if ($sesi == 'nik') {
            $penduduk   = Penduduk::where('nik',$input)->first();
        } else {
            $akses      = Userakses::where('user_id',$input)->first();
            $penduduk   = Penduduk::find($akses->penduduk_id);
        }
        return $penduduk;
    }

    // No KK
    public static function nomorKK($penduduk)
    {
        $data = DB::table('anggota_keluarga')
                ->join('keluarga','anggota_keluarga.keluarga_id','=','keluarga.id')
                ->where('anggota_keluarga.penduduk_id',$penduduk)
                ->first();
        return $data;
    }

    public static function nomorsurat($kode)
    {
        $desa           = Profil::first();
        $dataterakhir   = Penduduksurat::whereDate('created_at',tgl_sekarang())->orderBy('id','DESC')->first();
        if ($dataterakhir) {
            $total  = Penduduksurat::whereDate('created_at',tgl_sekarang())->count();
            $urutanbaru     = $total + 1;
            if ($urutanbaru > 0 AND $urutanbaru < 10) {
                $nomor = '00'.$urutanbaru;
            }elseif ($urutanbaru > 9 AND $urutanbaru < 100) {
                $nomor = '0'.$urutanbaru;
            }else {
                $nomor = $urutanbaru;
            }
            $result = strtoupper($kode).'/'.$nomor.'/'.$desa->kode_desa.'/'.bulan_romawi().'/'.ambil_tahun();
        } else {
            $result = strtoupper($kode).'/001/'.$desa->kode_desa.'/'.bulan_romawi().'/'.ambil_tahun();
        }
        
        return $result;
    }

    // jumlah KK perdusun
    public static function jumlahKK($sesi, $id)
    {
        switch ($sesi) {
            case 'dusun':
                $jumlah     = DB::table('keluarga')
                                ->join('penduduk','keluarga.penduduk_id','=','penduduk.id')
                                ->join('rt','penduduk.rt_id','=','rt.id')
                                ->join('rw','rt.rw_id','=','rw.id')
                                ->where('rw.dusun_id',$id)
                                ->count();
                break;
            case 'rw':
                $jumlah     = DB::table('keluarga')
                                ->join('penduduk','keluarga.penduduk_id','=','penduduk.id')
                                ->join('rt','penduduk.rt_id','=','rt.id')
                                ->where('rt.rw_id',$id)
                                ->count();
                break;
            case 'rt':
                $jumlah     = DB::table('keluarga')
                                ->join('penduduk','keluarga.penduduk_id','=','penduduk.id')
                                ->where('penduduk.rt_id',$id)
                                ->count();
                break;
            
            default:
                $jumlah = 0;
                break;
        }
        return $jumlah;
    }
    public static function jumlahJk($sesi,$id,$jk)
    {
        switch ($sesi) {
            case 'dusun':
                $jumlah     = DB::table('penduduk')
                                ->join('rt','penduduk.rt_id','=','rt.id')
                                ->join('rw','rt.rw_id','=','rw.id')
                                ->where('rw.dusun_id',$id)
                                ->where('penduduk.jk',$jk)
                                ->count();
                break;
            case 'rw':
                $jumlah     = DB::table('penduduk')
                                ->join('rt','penduduk.rt_id','=','rt.id')
                                ->where('rt.rw_id',$id)
                                ->where('penduduk.jk',$jk)
                                ->count();
                break;
            case 'rt':
                $jumlah     = DB::table('penduduk')
                                ->where('penduduk.rt_id',$id)
                                ->where('penduduk.jk',$jk)
                                ->count();
                break;
            
            default:
                $jumlah = 0;
                break;
        }
        return $jumlah;
    }

    // data statistik
    public static function datastatistik($sesi)
    {
        switch ($sesi) {
            case 'pendidikan-dalam-kk':
                $data   = [
                    'loop' => list_pendidikandalamkk(),
                    'key' => 'pendidikan_kk',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'pendidikan-sedang-ditempuh':
                $data   = [
                    'loop' => list_pendidikantempuh(),
                    'key' => 'pendidikan_tempuh',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'status-perkawinan':
                $data   = [
                    'loop' => list_statusperkawinan(),
                    'key' => 'status_perkawinan',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'pekerjaan':
                $data   = [
                    'loop' => Listdata::where('label','pekerjaan')->orderBy('nama','ASC')->get()->toArray('nama'),
                    'key' => 'pekerjaan',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'agama':
                $data   = [
                    'loop' => Listdata::where('label','agama')->orderBy('nama','ASC')->get()->toArray('nama'),
                    'key' => 'agama',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'jk':
                $data   = [
                    'loop' => list_jeniskelamin(),
                    'key' => 'jk',
                    'header' => 'jenis kelamin',
                ];
                break;
            case 'hubungan-dalam-kk':
                $data   = [
                    'loop' => list_hubungankeluarga(),
                    'key' => 'hubungan_keluarga',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'warga-negara':
                $data   = [
                    'loop' => list_statuskewarganegaraan(),
                    'key' => 'status_warganegara',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'status-penduduk':
                $data   = [
                    'loop' => list_statuspenduduk(),
                    'key' => 'status_penduduk',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'goldar':
                $data   = [
                    'loop' => list_golongandarah(),
                    'key' => 'golongan_darah',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'penyandang-cacat':
                $data   = [
                    'loop' => list_cacat(),
                    'key' => 'cacat',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'penyakit-menahun':
                $data   = [
                    'loop' => list_sakitmenahun(),
                    'key' => 'sakit_menahun',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'akseptor-kb':
                $data   = [
                    'loop' => list_akseptorkb(),
                    'key' => 'akseptor_kb',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'kepemilikan-ktp':
                $data   = [
                    'loop' => list_statusktp(),
                    'key' => 'status_ktp',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
            case 'jenis-asuransi':
                $data   = [
                    'loop' => list_asuransi(),
                    'key' => 'asuransi',
                    'header' => str_replace('_',' ',$sesi),
                ];
                break;
                default:
                $result     = [
                    'tabel' => 'tabel',
                    'judul' => 'judul',
                    'nilai' => 'nilai',
                    'pie' => 'pie',
                    'header' => 'Pendidikan Dalam KK'
                ];
                return $result;
                    break;
            }

                $result = array();
                $jdl    = Penduduk::where('jk','laki-laki')->count();
                $jdp    = Penduduk::where('jk','perempuan')->count();
                $nomor  = 1; 
                $jl    = 0;
                $jp    = 0;
                $judul  = NULL;
                $nilai  = NULL;
                $pie    = [];
                foreach ($data['loop'] as $row) {
                    if (isset($row['nama'])) {
                        $key    = $row['nama'];
                    } else {
                        $key    = $row;
                    }
                    
                    $l = Penduduk::where('jk','laki-laki')->where($data['key'],$key)->count();
                    $p = Penduduk::where('jk','perempuan')->where($data['key'],$key)->count();
                    $lp = $l + $p;
                    $jl = $jl + $l;
                    $jp = $jp + $p;
                    $result[] = [
                        'no' => $nomor,
                        'nama' => $key,
                        'l' => $l,
                        'p' => $p,
                        'lp' => $lp,
                    ];
                    $nomor++;
                    // kebutuhan untuk grafik judul
                    $judul .= "'".$key."',";
                    $nilai .= $lp.",";

                    // grafik pie
                    $pie[]  = [
                        'nama' => $key,
                        'nilai' => $lp
                    ];
                }

                $jlp    = $jl + $jp;

                // data untuk belum mengisi
                $jbl    = $jdl - $jl;
                $jbp    = $jdp - $jp;
                $jblp   = $jbl + $jbp;

                // data total
                $jtl    = $jl + $jbl;
                $jtp    = $jp + $jbp;
                $jtlp   = $jtl + $jtp;

                $footer     = [
                    [
                        'no' => '',
                        'nama' => 'JUMLAH',
                        'l' => $jl,
                        'p' => $jp,
                        'lp' => $jlp
                    ],
                    [
                        'no' => '',
                        'nama' => 'BELUM MENGISI',
                        'l' => $jbl,
                        'p' => $jbp,
                        'lp' => $jblp
                    ],
                    [
                        'no' => '',
                        'nama' => 'TOTAL',
                        'l' => $jtl,
                        'p' => $jtp,
                        'lp' => $jtlp
                    ],
                ];
                $tabel      = array_merge($result,$footer);
                $result     = [
                    'tabel' => $tabel,
                    'judul' => $judul,
                    'nilai' => $nilai,
                    'pie' => $pie,
                    'header' => $data['header']
                ];
        return $result;
    }

    public static function namapenduduk($data)
    {
        $result     = '-';
        $penduduk   = Penduduk::where('nik',$data)->first();
        if ($penduduk) {
            $result = $penduduk->nama_penduduk;
        } else {
            $akses = Userakses::where('user_id',$data)->first();
            if ($akses) {
                $penduduk   = Penduduk::find($akses->penduduk_id);
                $result     = $penduduk->nama_penduduk;
            }    
        }
        // cek jika admin
        if ($result == '-') {
            $user   = User::find($data);
            if ($user) {
                $result = $user->name.' ('.$user->level.')';
            } else {
                $result = '-';
            }
        }
        return $result;
    }
    public static function jumlahrtperdusun($dusun)
    {
       $jumlah  = DB::table('rt')
                    ->join('rw','rt.rw_id','=','rw.id')
                    ->join('dusun','rw.dusun_id','=','dusun.id')
                    ->where('dusun.id',$dusun)
                    ->count();
        return $jumlah;
    }

    public static function datanotifikasi($sesi)
    {
        switch ($sesi) {
            case 'suratpenduduk':
                // hitung surat yang menunggu konfirmasi / proses pengajuan
                $result     = Penduduksurat::where('status','menunggu')->count();
                break;
            case 'ubahpassword':
                $result     = User::where('notifikasi','<>',NULL)->count();
                break;
            case 'laporan':
                $result     = Lapor::where('status','menunggu')->count();
                break;
            case 'total':
                $result1     = Penduduksurat::where('status','menunggu')->count();
                $result2     = User::where('notifikasi','<>',NULL)->count();
                $result3     = Lapor::where('status','menunggu')->count();
                $result     = $result1 + $result2 + $result3;
                break;
            default:
                $result = NULL;
                break;
        }
        return $result;
    }

    public static function saveLog($data)
    {
        $user       = Auth::user();
        $detail     = [
            'nama_user' => $user->name
        ];

        $detail     = array_merge($detail,$data['detail']);
        Log::create([
            'user_id' => $user->id,
            'sesi' => $data['sesi'],
            'aksi' => $data['aksi'],
            'table_id' => $data['table_id'],
            'detail' => json_encode($detail),
        ]);
        return TRUE;
    }

    public static function showlog($data)
    {
        // data => sesi,id

        // notif aksi
        $notif  = [
            'tambah' => "<i class='fas fa-plus text-primary'></i> Ditambahkan oleh ",
            'edit' => "<i class='fas fa-pen text-success'></i> Diperbaharui oleh ",
        ];
        $view   = NULL;
        if (isset($data['id'])) {
            $log = Log::where('sesi',$data['sesi'])->where('table_id',$data['id'])->get();
            $id     = $data['id'];
        } else {
            $log = Log::where('sesi',$data['sesi'])->get();
            $id     = time();
        }

        if (count($log) > 0) {
            $view = "<a class='badge badge-info' data-toggle='collapse' role='button' href='#collapseExample".$id."' aria-expanded='false' aria-controls='collapseExample'>
                <i class='fas fa-file-alt'></i> Log
            </a>
            <div class='collapse' id='collapseExample".$id."'>
               ";
            foreach ($log as $item) {
                $detail    = json_decode($item->detail);
                $nama       = "<strong>".$detail->nama_user."</strong>";
                $view .= "<span class='small'>".$notif[$item->aksi].$nama." | ".$item->created_at."</span> </br>";
                if ($item->aksi == 'edit') {
                    for ($i=0; $i < count($detail->data); $i++) { 
                        $view .= "<small class='font-italic'>- ".$detail->data[$i]."</small> </br>";
                    }
                }
            }
            $view .= 
            "</div>";
        }
        return $view;
    }
    public static function showlogall($log)
    {
        // data => sesi,id

        // notif aksi
        $notif  = [
            'tambah' => "<i class='fas fa-plus text-primary'></i> Ditambahkan oleh ",
            'edit' => "<i class='fas fa-pen text-success'></i> Diperbaharui oleh ",
            'hapus' => "<i class='fas fa-trash-alt text-danger'></i> Dihapus oleh ",
        ];
        $view   = NULL;

        if (count($log) > 0) {
            foreach ($log as $item) {
                $detail    = json_decode($item->detail);
                $nama       = "<strong class='text-capitalize'>".$detail->nama_user."</strong>";
                $view .= "<div>".$notif[$item->aksi].$nama." <span class='float-right'><i class='far fa-clock'></i> ".$item->created_at."</span> </div>";
                if (isset($detail->data)) {
                    $view .= "<div class='pl-3 mt-0 pb-0 mb-0'>";
                    for ($i=0; $i < count($detail->data); $i++) { 
                        $view .= "<span class='font-italic small'>- ".$detail->data[$i]."</span></br>";
                    }
                    $view .= "</div> <hr>";
                }
            }
        } else {
            $view .= "<div class='text-center font-italic'>-- belum ada data log --</div>";
        }
        return $view;
    }

    // DATA LAPORAN PENDUDUK
    public static function datalaporanpenduduk($sesi,$data=null)
    {
        switch ($sesi) {
            case 'jumlahpendudukbulanlalu':
                $tanggal    = '2021-11-30';
                $lk     = DB::table('penduduk')
                            ->join('rt','penduduk.rt_id','=','rt.id')
                            ->join('rw','rt.rw_id','=','rw.id')
                            ->where('rw.dusun_id',$data['dusun_id'])
                            ->where('penduduk.jk','laki-laki')
                            ->whereDate('penduduk.tgl_lahir','<',$tanggal)
                           ->count();
                $pr     = DB::table('penduduk')
                            ->join('rt','penduduk.rt_id','=','rt.id')
                            ->join('rw','rt.rw_id','=','rw.id')
                            ->where('rw.dusun_id',$data['dusun_id'])
                            ->where('penduduk.jk','perempuan')
                            ->whereDate('penduduk.tgl_lahir','<',$tanggal)
                            ->count();
                $jml    = $lk + $pr;
                $result = [
                    'lk' => $lk,
                    'pr' => $pr,
                    'jml' => $jml
                ];
                break;
            case 'lahirbulanini':
                $tanggal    = '2021-12-01';
                $lk     = DB::table('penduduk')
                            ->join('rt','penduduk.rt_id','=','rt.id')
                            ->join('rw','rt.rw_id','=','rw.id')
                            ->where('rw.dusun_id',$data['dusun_id'])
                            ->where('penduduk.jk','laki-laki')
                            ->whereDate('penduduk.tgl_lahir','>=',$tanggal)
                           ->count();
                $pr     = DB::table('penduduk')
                            ->join('rt','penduduk.rt_id','=','rt.id')
                            ->join('rw','rt.rw_id','=','rw.id')
                            ->where('rw.dusun_id',$data['dusun_id'])
                            ->where('penduduk.jk','perempuan')
                            ->whereDate('penduduk.tgl_lahir','>=',$tanggal)
                            ->count();
                $jml    = $lk + $pr;
                $result = [
                    'lk' => $lk,
                    'pr' => $pr,
                    'jml' => $jml
                ];
                break;
            case 'matibulanini':
                $lk     = DB::table('status_penduduk')
                            ->join('penduduk','status_penduduk.penduduk_id','=','penduduk.id')
                            ->join('rt','penduduk.rt_id','=','rt.id')
                            ->join('rw','rt.rw_id','=','rw.id')
                            ->where('rw.dusun_id',$data['dusun_id'])
                            ->where('penduduk.jk','laki-laki')
                            ->count();
                $pr     = DB::table('status_penduduk')
                            ->join('penduduk','status_penduduk.penduduk_id','=','penduduk.id')
                            ->join('rt','penduduk.rt_id','=','rt.id')
                            ->join('rw','rt.rw_id','=','rw.id')
                            ->where('rw.dusun_id',$data['dusun_id'])
                            ->where('penduduk.jk','perempuan')
                            ->count();
                $jml    = $lk + $pr;
                $result = [
                    'lk' => $lk,
                    'pr' => $pr,
                    'jml' => $jml
                ];
                break;
            default:
                $result = NULL;
                break;
        }
        return $result;
    }

    // list data dari database
    public static function listdata($label)
    {
        $list   = Listdata::select('nama')->where('label',$label)->orderBy('nama','ASC')->get();
        return $list;
    }
    // cek ceklis
    public static function ceklismenu($user_id,$label)
    {
        $result = '';
        $menu   = Menu::where('user_id',$user_id)->where('label',$label)->first();
        if ($menu) {
            $result = 'checked';
        }
        return $result;
    }
    // cek menu
    public static function cekmenu($menu,$db)
    {
        $result = FALSE;
        for ($i=0; $i < count($menu); $i++) { 
            if (in_array($menu[$i],$db)) {
                $result = TRUE;
            }
        }
        return $result;
    }
    // cek ceklis
    public static function listmenuaktif($user_id)
    {
        $result = [];
        $menu   = Menu::where('user_id',$user_id)->get('label');
        if ($menu) {
            $result = [];
            foreach ($menu as $key) {
                $result[] = $key->label;
            }
        }
        return $result;
    }
}