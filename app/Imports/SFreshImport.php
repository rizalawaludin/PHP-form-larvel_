<?php

namespace App\Imports;

use App\sjalan_fresh;
use Maatwebsite\Excel\Concerns\ToModel;

class SFreshImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new sjalan_fresh([
            'fod_no' => $row[0],
            'nm_product' => $row[1],
            'satuan'      => $row[2],
            'pesan'     => $row[3],
            'kirim'     => $row[4],
        ]);
    }
}
