<?php
namespace App\Helpers\Cikara;

use App\Models\Daftarakun;
use App\Models\Daftarakunpembantu;
use App\Models\Jurnalakun;
use App\Models\Lapor;
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
}