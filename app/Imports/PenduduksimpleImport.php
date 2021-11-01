<?php

namespace App\Imports;

use App\Models\Penduduk as ModelsPenduduk;
use App\Models\Rt;
use App\Models\Rw;
use Maatwebsite\Excel\Concerns\ToModel;

class PenduduksimpleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         // pengecekan data rw
         $rw     = Rw::where('nama_rw',$row[0])->first();
         if ($rw) {
            //  cek RT
            $rt     = Rt::where('rw_id',$rw->id)->where('nama_rt',$row[1])->first();
            if ($rt) {
                return new ModelsPenduduk([
                    'rt_id' => $rt->id,
                    'nik' => $row[2],
                    'nama_penduduk' => $row[3],
                    'status_ktp' => $row[19],
                    'status_rekam' => 'lainnya',
                    'jk' => $row[4],
                    'agama' => $row[5],
                    'status_penduduk' => $row[6],
                    'tempat_lahir' => $row[7],
                    'tgl_lahir' => $row[8],
                    'tempat_dilahirkan' => 'lainnya',
                    'jenis_kelahiran' => $row[9],
                    'anak_ke' => $row[10],
                    'penolong_kelahiran' => 'lainnya',
                    'pendidikan_kk' => 'lainnya',
                    'pendidikan_tempuh' => 'lainnya',
                    'pekerjaan' => $row[11],
                    'status_warganegara' => 'wni',
                    'nik_ayah' => $row[12],
                    'nama_ayah' => $row[13],
                    'nik_ibu' => $row[14],
                    'nama_ibu' => $row[15],
                    'alamat_sekarang' => $row[16],
                    'status_perkawinan' => $row[17],
                    'golongan_darah' => $row[18],
                    'cacat' => 'tidak',
                    'sakit_menahun' => 'tidak',
                    'akseptor_kb' => 'tidak',
                    'asuransi' => 'lainnya',
                ]);
            }
         }
    }
}
