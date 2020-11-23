<?php

namespace App\Imports;

use App\retur_order;
use Maatwebsite\Excel\Concerns\ToModel;

class KReturImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new retur_order([
            'fod_no' => $row[0],
            'kd_item' => $row[1],
            'item' => $row[2],
            'satuan'  => $row[3],
            'jml_pesanan'   => $row[4],
            'nm_pemesan'    => $row[5],
        ]);
    }
}
