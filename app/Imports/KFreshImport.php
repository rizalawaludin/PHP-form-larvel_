<?php

namespace App\Imports;

use App\fresh_order;
use Maatwebsite\Excel\Concerns\ToModel;

class KFreshImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new fresh_order([
            'fod_no' => $row[0],
            'kd_item' => $row[1],
            'cabang' => $row[2],
            'item'  => $row[3],
            'jml_pesanan'   => $row[4],
            'nm_pemesan'    => $row[5],
        ]);
    }
}
