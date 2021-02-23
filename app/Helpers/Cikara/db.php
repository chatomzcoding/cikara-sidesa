<?php
namespace App\Helpers\Cikara;

use App\Models\Daftarakun;
use App\Models\Daftarakunpembantu;
use App\Models\Jurnalakun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DbCikara {
    public static function nama_akun($id)
    {
        $daftar_akun    = Daftarakun::select('nama_akun')->where('id',$id)->first();
        if ($daftar_akun) {
            return $daftar_akun->nama_akun;
        }
    }
    public static function nama_akunpembantu($id)
    {
        $daftar_akun    = DB::table('jurnal_akunpembantu')
                            ->join('daftar_akunpembantu','jurnal_akunpembantu.daftarakunpembantu_id','=','daftar_akunpembantu.id')
                            ->where('jurnal_akunpembantu.daftarakunpembantu_id',$id)
                            ->first();
        if ($daftar_akun) {
            return $daftar_akun->nama_akun;
        }
    }
    public static function showTable($table,$where=null)
    {
        $result = NULL;
        if (is_null($where)) {
            $result = DB::table($table)->get();
        } else {
            if (is_array($where)) {
                $result = DB::table($table)->where($where[0],$where[1])->get();
            }
        }

        return $result;
    }

    public static function sesijurnal($sesi,$jurnalumum_id)
    {
        if ($sesi == 'pemasukan') {
            $result     = DB::table('jurnal_akun')
                            ->join('daftar_akun','jurnal_akun.daftarakun_id','=','daftar_akun.id')
                            ->join('kategori_akun','daftar_akun.kategoriakun_id','=','kategori_akun.id')
                            ->where('jurnal_akun.jurnalumum_id',$jurnalumum_id)
                            ->where('kategori_akun.kode',110)
                            ->Orwhere('kategori_akun.kode',120)
                            ->Orwhere('kategori_akun.kode',210)
                            ->first();
        } else {
            $result     = DB::table('jurnal_akun')
            ->join('daftar_akun','jurnal_akun.daftarakun_id','=','daftar_akun.id')
            ->join('kategori_akun','daftar_akun.kategoriakun_id','=','kategori_akun.id')
            ->where('jurnal_akun.jurnalumum_id',$jurnalumum_id)
            ->first();
        }

        return $result;
    }

    public static function totalsaldoakun($id,$user_id)
    {
        $jumlah = 0;
        
        $jurnal_akun    = DB::table('jurnal_akun')
                            ->join('daftar_akun','jurnal_akun.daftarakun_id','=','daftar_akun.id')
                            ->join('jurnal_umum','jurnal_akun.jurnalumum_id','=','jurnal_umum.id')
                            ->where('jurnal_umum.user_id',$user_id)
                            ->where('jurnal_akun.daftarakun_id',$id)
                            ->get();
        foreach ($jurnal_akun as $row) {
            if (($row->status_jurnalakun == 'debet' AND $row->pos_saldo == 'DEBET') || ($row->status_jurnalakun == 'kredit' AND $row->pos_saldo == 'KREDIT')) {
                $jumlah = $jumlah + $row->nominal_jurnal;
            } else {
                $jumlah = $jumlah - $row->nominal_jurnal;
            }
        }
        return $jumlah;
    }

    public static function lababersihberjalan($user_id)
    {
        $jumlahpendapatan   = 0;
        $jumlahhpp          = 0;
        $jumlahpengeluaran  = 0;
        $pendapatan         = DB::table('jurnal_akun')
                                ->join('daftar_akun','jurnal_akun.daftarakun_id','=','daftar_akun.id')
                                ->join('jurnal_umum','jurnal_akun.jurnalumum_id','=','jurnal_umum.id')
                                ->where('daftar_akun.user_id',$user_id)
                                ->where('daftar_akun.kategoriakun_id',8)
                                ->get();
        $hpp                = DB::table('jurnal_akun')
                                ->join('daftar_akun','jurnal_akun.daftarakun_id','=','daftar_akun.id')
                                ->join('jurnal_umum','jurnal_akun.jurnalumum_id','=','jurnal_umum.id')
                                ->where('daftar_akun.user_id',$user_id)
                                ->where('daftar_akun.kategoriakun_id',9)
                                ->get();
        $pengeluaran        = DB::table('jurnal_akun')
                                ->join('daftar_akun','jurnal_akun.daftarakun_id','=','daftar_akun.id')
                                ->join('jurnal_umum','jurnal_akun.jurnalumum_id','=','jurnal_umum.id')
                                ->where('daftar_akun.user_id',$user_id)
                                ->where('daftar_akun.kategoriakun_id',10)
                                ->Orwhere('daftar_akun.kategoriakun_id',11)
                                ->Orwhere('daftar_akun.kategoriakun_id',12)
                                ->Orwhere('daftar_akun.kategoriakun_id',14)
                                ->get();
        foreach ($pendapatan as $row) {
            $jumlahpendapatan = $jumlahpendapatan + $row->nominal_jurnal;
        }

        foreach ($hpp as $row) {
            $jumlahhpp = $jumlahhpp + $row->nominal_jurnal;
        }
        foreach ($pengeluaran as $row) {
            $jumlahpengeluaran = $jumlahpengeluaran + $row->nominal_jurnal;
        }

        $lababersihberjalan     = $jumlahpendapatan - $jumlahhpp - $jumlahpengeluaran;
        return $lababersihberjalan;
    }
}