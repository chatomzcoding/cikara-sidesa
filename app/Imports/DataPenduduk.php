<?php

namespace App\Imports;

use App\Models\Anggotakeluarga;
use App\Models\Dusun;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DataPenduduk implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {   
        $no = 1;
        foreach ($collection as $row) {
            
            if ($no <> 1) {
                $kk            = strtolower($row[4]);
                $kk            = substr($kk,1,16);
                $nik            = strtolower($row[7]);
                $nik            = substr($nik,1,16);
                $keluarga   = Keluarga::where('no_kk',$kk)->first();
                $hubungan       = strtolower($row[10]);
                if ($keluarga) {
                    $penduduk   = Penduduk::select('id','nik')->where('nik',$nik)->first();
                    if ($penduduk) {
                        Anggotakeluarga::create([
                            'keluarga_id' => $keluarga->id,
                            'penduduk_id' => $penduduk->id,
                            'hubungan' => $hubungan
                        ]);
                    }
                }
                // ok bagus
                // $kepala       = strtolower($row[10]);
                // if ($kepala == 'kepala keluarga') {
                //     $nik            = strtolower($row[7]);
                //     $nik            = substr($nik,1,16);
                //     $kk            = strtolower($row[4]);
                //     $kk            = substr($kk,1,16);
                //     $penduduk       = Penduduk::where('nik',$nik)->first();
                //     if ($penduduk) {
                //         $keluarga   = Keluarga::where('no_kk',$kk)->where('penduduk_id',$penduduk->id)->first();
                //         if (!$keluarga) {
                //             Keluarga::create([
                //                 'penduduk_id' => $penduduk->id,
                //                 'no_kk' => $kk,
                //                 'status_kk' => 'aktif',
                //             ]);
                //         }
                //     }
                // }
            }

            $no++;
            
            // $rw     = Rw::where('nama_rw',$row[0])->first();
            // if ($rw) {
            //     $rt     = Rt::where('nama_rt',$row[1])->where('rw_id',$rw->id)->first();
            //     if ($rt) {
            //         // cek nik jika sama jangan disimpan
            //         $nik            = strtolower($row[7]);
            //         $nik            = substr($nik,1,16);
            //         $penduduk   = Penduduk::where('nik',$nik)->first();
            //         if (!$penduduk) {
            //             $alamat         = strtolower($row[3]);
            //             $namaayah       = strtolower($row[5]);
            //             $nama           = strtolower($row[8]);
            //             $jk             = strtolower($row[9]);
            //             $tempatlahir    = strtolower($row[11]);
            //             $tgllahir       = strtolower($row[12]);
            //             $statuskawin    = strtolower($row[14]);
            //             $agama          = strtolower($row[15]);
            //             $goldar         = strtolower($row[16]);
            //             $warganegara    = strtolower($row[17]);
            //             if ($warganegara == 'warga negara indonesia') {
            //                 $warganegara = 'wni';
            //             }
            //             $pendidikan     = strtolower($row[19]);
            //             $pekerjaan      = strtolower($row[20]);
            //             $arraytgl       = explode('/',$tgllahir);
            //             $tgllahir       = $arraytgl[2].'-'.$arraytgl[1].'-'.$arraytgl[0];
            //             Penduduk::create([
            //                 'rt_id' => $rt->id,
            //                 'status_ktp' => 'kosong',
            //                 'status_rekam' => 'lainnya',
            //                 'status_penduduk' => 'kosong',
            //                 'tempat_dilahirkan' => 'kosong',
            //                 'jenis_kelahiran' => 'kosong',
            //                 'anak_ke' => 0,
            //                 'penolong_kelahiran' => 'kosong',
            //                 'pendidikan_kk' => 'kosong',
            //                 'nik_ayah' => 'kosong',
            //                 'nik_ibu' => 'kosong',
            //                 'nama_ayah' => $namaayah,
            //                 'nama_ibu' => 'kosong',
            //                 'cacat' => 'kosong',
            //                 'asuransi' => 'kosong',
            //                 'akseptor_kb' => 'kosong',
            //                 'sakit_menahun' => 'kosong',
            //                 'alamat_sekarang' => $alamat,
            //                 'nik' => $nik,
            //                 'nama_penduduk' => $nama,
            //                 'jk' => $jk,
            //                 'tempat_lahir' => $tempatlahir,
            //                 'tgl_lahir' => $tgllahir,
            //                 'status_perkawinan' => $statuskawin,
            //                 'agama' => $agama,
            //                 'golongan_darah' => $goldar,
            //                 'status_warganegara' => $warganegara,
            //                 'pendidikan_tempuh' => $pendidikan,
            //                 'pekerjaan' => $pekerjaan,
            //             ]);
            //         }
            //     }
            // }
        }
    }
}
