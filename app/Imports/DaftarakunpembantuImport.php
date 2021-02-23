<?php

namespace App\Imports;

use App\Daftarakunpembantu;
use Maatwebsite\Excel\Concerns\ToModel;

class DaftarakunpembantuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Daftarakunpembantu([
            //
        ]);
    }
}
