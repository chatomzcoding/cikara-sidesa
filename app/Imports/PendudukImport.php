<?php

namespace App\Imports;

use App\Models\Penduduk as ModelsPenduduk;
use App\Models\Rt;
use Maatwebsite\Excel\Concerns\ToModel;

class PendudukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // pengecekan data
        $rt     = Rt::find($row[0]);
        if ($rt) {
            return new ModelsPenduduk([
                'rt_id' => $row[0],
                'nik' => $row[1],
                'nama_penduduk' => $row[2],
                'status_ktp' => $row[3],
                'status_rekam' => $row[4],
                'id_card' => $row[5], // null
                'kk_sebelum' => $row[6], // null
                'hubungan_keluarga' => $row[7], // null
                'jk' => $row[8],
                'agama' => $row[9],
                'status_penduduk' => $row[10],
                'no_akta' => $row[11], // null
                'tempat_lahir' => $row[12],
                'tgl_lahir' => $row[13],
                'waktu_lahir' => $row[14], // null
                'tempat_dilahirkan' => $row[15],
                'jenis_kelahiran' => $row[16],
                'anak_ke' => $row[17],
                'penolong_kelahiran' => $row[18],
                'berat_lahir' => $row[19], // null
                'panjang_lahir' => $row[20], // null
                'pendidikan_kk' => $row[21],
                'pendidikan_tempuh' => $row[22],
                'pekerjaan' => $row[23],
                'status_warganegara' => $row[24],
                'nomor_paspor' => $row[25], // null
                'tgl_akhirpaspor' => $row[26], // null
                'nomor_kitas' => $row[27], // null
                'nik_ayah' => $row[28],
                'nama_ayah' => $row[29],
                'nik_ibu' => $row[30],
                'nama_ibu' => $row[31],
                'lat_penduduk' => $row[32], // null
                'long_penduduk' => $row[33], // null
                'no_telp' => $row[34], // null
                'email' => $row[35], // null
                'alamat_sebelum' => $row[36], // null
                'alamat_sekarang' => $row[37],
                'status_perkawinan' => $row[38],
                'no_bukunikah' => $row[39], // null
                'tgl_perkawinan' => $row[40], // null
                'akta_perceraian' => $row[41], // null
                'tgl_perceraian' => $row[42], // null
                'golongan_darah' => $row[43],
                'cacat' => $row[44],
                'sakit_menahun' => $row[45],
                'akseptor_kb' => $row[46],
                'asuransi' => $row[47],
                'poto' => $row[48], // null
            ]);
        }
        
    }
}
