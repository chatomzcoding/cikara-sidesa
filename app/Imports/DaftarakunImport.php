<?php

namespace App\Imports;

use App\Models\Daftarakun;
use App\Models\Kategoriakun;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class DaftarakunImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // cek kategori_akun
        $kategori = Kategoriakun::where('kode',$row[0])->first();
        if ($kategori) {
            $user_id = Auth::user()->id;
            // cek nominal
            $saldo  = 0;
            if ($row[5] <> NULL AND $row[0] <> '') {
                $saldo = $row[5];
            }
            return new Daftarakun([
                'kategoriakun_id' => $kategori->id,
                'user_id' => $user_id,
                'kode_akun' => $row[1],
                'nama_akun' => $row[2],
                'pos_saldo' => $row[3],
                'pos_laporan' => $row[4],
                'saldo_akun' => $saldo,
            ]);
        }
    }
}
