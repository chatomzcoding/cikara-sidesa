<?php

namespace App\Imports;

use App\Models\Kategoriartikel;
use App\Models\Kategoriartikel as ModelsKategoriartikel;
use Maatwebsite\Excel\Concerns\ToModel;

class KategoriartikelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kategoriartikel([
            'nama_kategori' => $row[0],
            'keterangan' => $row[1],
        ]);
    }
}
