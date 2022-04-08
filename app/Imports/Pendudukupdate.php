<?php

namespace App\Imports;

use App\Models\Penduduk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpParser\Node\Expr\Empty_;

class Pendudukupdate implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $field = ['ID RT',
        'nik',
        'nama_penduduk',
        'status_ktp',
        'status_rekam',
        'id_card',
        'kk_sebelum',
        'hubungan_keluarga',
        'jk',
        'agama',
        'status_penduduk',
        'no_akta',
        'tempat_lahir',
        'tgl_lahir',
        'waktu_lahir',
        'tempat_dilahirkan',
        'jenis_kelahiran',
        'anak_ke',
        'penolong_kelahiran',
        'berat_lahir',
        'panjang_lahir',
        'pendidikan_kk',
        'pendidikan_tempuh',
        'pekerjaan',
        'status_warganegara',
        'nomor_paspor',
        'tgl_akhirpaspor',
        'nomor_kitas',
        'nik_ayah',
        'nama_ayah',
        'nik_ibu',
        'nama_ibu',
        'LAT MAPS',
        'LONG MAPS',
        'TELP',
        'EMAIL',
        'ALAMAT SEBELUM',
        'alamat_sekarang',
        'status_perkawinan',
        'NO BUKU NIKAH',
        'TANGGAL KAWIN',
        'AKTA CERAI',
        'TGL CERAI',
        'GOLONGAN DARAH',
        'CACAT',
        'SAKIT',
        'KB',
        'ASURANSI'
    ];
        for ($i=1; $i < 20; $i++) { 
            $penduduk   = Penduduk::where('nik',$collection[$i][1])->first();
            if ($penduduk) {
                $dbaru  = [];
                for ($j=0; $j < 40; $j++) { 
                    // cek jika ada data
                    if (isset($collection[$i][$j])) {
                        $databaru   = strtolower($collection[$i][$j]);
                        $f = $field[$j];
                        if (isset($penduduk->$f) AND $f <> 'tgl_lahir') {
                            $dbaru[$f] = $databaru;
                            // $datalama = $penduduk->$f;
                            // cek jika ada data yang tidak sama
                            // if ($databaru <> $datalama) {
                            //     echo $f.' || '.$datalama.' || '.$databaru.'</br>';
                            // }
                        }
                    } else {
                        $dbaru['anak_ke'] = 0;
                    }
                }
                Penduduk::where('id',$penduduk->id)->update([
                    "nik" => $dbaru['nik'] ,
                    "nama_penduduk" => $dbaru['nama_penduduk'] ,
                    "status_ktp" => $dbaru['status_ktp'] ,
                    "status_rekam" => $dbaru['status_rekam'] ,
                    "jk" => $dbaru['jk'] ,
                    "agama" => $dbaru['agama'],
                    "status_penduduk" => $dbaru['status_penduduk'],
                    "tempat_lahir" => $dbaru['tempat_lahir'],
                    "anak_ke" => $dbaru['anak_ke'],
                    "pendidikan_kk" => $dbaru['pendidikan_kk'],
                    "pekerjaan" => $dbaru['pekerjaan'] ,
                    "status_warganegara" => $dbaru['status_warganegara'] ,
                    "alamat_sekarang" => $dbaru['alamat_sekarang'] ,
                    "status_perkawinan" => $dbaru['status_perkawinan'],
                ]);
                // echo "======================================================== </br>";
            }
        }
    }
}
