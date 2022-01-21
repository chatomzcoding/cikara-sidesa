<?php

namespace App\Imports;

use App\Models\Anggotakeluarga;
use App\Models\Dusun;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;


class DataPenduduk implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {   
            if ($row[0] <> 'RW' AND $row[1] <> 'RT') {
                # code...
            // data kolom
            $nama_rw            = strtolower($row[0]);
            $nama_rt            = strtolower($row[1]);
            $nama_dusun         = strtolower($row[2]);
            $alamat             = strtolower($row[3]);
            $no_kk              = strtolower($row[4]);
            $kepala_keluarga    = strtolower($row[5]);
            $no                 = strtolower($row[6]);
            $nik                = strtolower($row[7]);
            $nama_penduduk      = strtolower($row[8]);
            $jk                 = strtolower($row[9]);
            $hubungan_keluarga  = strtolower($row[10]);
            $tempat_lahir       = strtolower($row[11]);
            $tgl_lahir          = strtolower($row[12]);
            $usia               = strtolower($row[13]);
            $status_kawin       = strtolower($row[14]);
            $agama              = strtolower($row[15]);
            $gol_dar            = strtolower($row[16]);
            $warga_negara       = strtolower($row[17]);
            $etnis              = strtolower($row[18]);
            $pendidikan         = strtolower($row[19]);
            $pekerjaan          = strtolower($row[20]);

            if ($warga_negara == 'warga negara indonesia') {
                $warga_negara = 'wni';
            }
            // cek Dusun
            $dusun  = Dusun::where('nama_dusun',$nama_dusun)->first();
            if ($dusun) {
                $dusun_id   = $dusun->id;
            } else {
                Dusun::create([
                    'nama_dusun' => $nama_dusun
                ]);
                $dusun_id   = Dusun::where('nama_dusun',$nama_dusun)->first()->id;
            }

            // cek rw
            $rw     = Rw::where('dusun_id',$dusun_id)->where('nama_rw',$nama_rw)->first();
            if ($rw) {
                $rw_id  = $rw->id;
            } else {
                Rw::create([
                    'dusun_id' => $dusun_id,
                    'nama_rw' => $nama_rw,
                ]);

                $rw_id  = Rw::where('dusun_id',$dusun_id)->where('nama_rw',$nama_rw)->first()->id;
            }

            // cek RT
            $rt     = Rt::where('rw_id',$rw_id)->where('nama_rt',$nama_rt)->first();
            if ($rt) {
                $rt_id = $rt->id;
            } else {
                Rt::create([
                    'rw_id' => $rw_id,
                    'nama_rt' => $nama_rt,
                ]);

                $rt_id  = Rt::where('rw_id',$rw_id)->where('nama_rt',$nama_rt)->first()->id;
            }
            // ubah tanggal lahir
            $dtgl   = explode('/',$tgl_lahir);
            $tgl_lahir  = $dtgl[2].'-'.$dtgl[1].'-'.$dtgl[0];

            $nik    = substr($nik,1,16);
            $no_kk    = substr($no_kk,1,16);

            // cek jika belum ada penduduk
            $penduduk   = Penduduk::where('nik',$nik)->first();
            if (!$penduduk) {
                Penduduk::create([
                    'rt_id' => $rt_id,
                    'nik' => $nik,
                    'nama_penduduk' => $nama_penduduk,
                    'status_ktp' => 'belum',
                    'status_rekam' => 'lainnya',
                    'jk' => $jk,
                    'agama' => $agama,
                    'status_penduduk' => 'tetap',
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'tempat_dilahirkan' => 'lainnya',
                    'jenis_kelahiran' => 'lainnya',
                    'anak_ke' => 0,
                    'penolong_kelahiran' => 'lainnya',
                    'pendidikan_kk' => $pendidikan,
                    'pendidikan_tempuh' => 'lainnya',
                    'pekerjaan' => $pekerjaan,
                    'status_warganegara' => $warga_negara,
                    'nik_ayah' => '-',
                    'nama_ayah' => '-',
                    'nik_ibu' => '-',
                    'nama_ibu' => '-',
                    'alamat_sekarang' => $alamat,
                    'status_perkawinan' => $status_kawin,
                    'golongan_darah' => $gol_dar,
                    'cacat' => 'tidak',
                    'sakit_menahun' => 'tidak',
                    'akseptor_kb' => 'tidak',
                    'asuransi' => 'tidak/belum punya',
                ]);
                $penduduk   = Penduduk::where('nik',$nik)->first();
            }

            $keluarga   = Keluarga::where('no_kk',$no_kk)->first();
            if (!$keluarga) {
                if ($hubungan_keluarga == 'kepala keluarga') {
                    Keluarga::create([
                        'penduduk_id' => $penduduk->id,
                        'no_kk' => $no_kk,
                        'status_kk' => 'aktif',
                    ]);

                    $keluarga   = Keluarga::where('no_kk',$no_kk)->first();
                }
            }
            if ($keluarga) {
                return new Anggotakeluarga([
                    'keluarga_id' => $keluarga->id,
                    'penduduk_id' => $penduduk->id,
                    'hubungan' => $hubungan_keluarga,
                ]);
            }
        }
    }
}
