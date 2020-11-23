<?php

namespace App\Imports;

use App\sjalan_retur;
use Maatwebsite\Excel\Concerns\ToModel;

class SReturImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new sjalan_retur([
            'fod_no' => $row[0],
            'nm_product' => $row[1],
            'satuan'      => $row[2],
            'pesan'     => $row[3],
            'kirim'     => $row[4],
        ]);
    }
}
