<?php
namespace App\Helpers\Cikara;

use App\Models\Daftarakun;
use App\Models\Daftarakunpembantu;
use App\Models\Jurnalakun;
use App\Models\Lapor;
use App\Models\Penduduk;
use App\Models\User;
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
            $nik    = $input;
        } else {
            $user   = User::find($input);
            $nik    = $user->name;
        }
        $penduduk   = Penduduk::select('nama_penduduk')->where('nik',$nik)->first();
        return $penduduk;
    }
}