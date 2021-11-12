<?php

namespace App\Imports;

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
            for ($i=0; $i < count($row); $i++) { 
                echo $i.'. '.$row[$i].' | ';
            }
            echo '</br>';
            if ($no == 2) {
                die();
            }
            $no++;
        }
    }
}
