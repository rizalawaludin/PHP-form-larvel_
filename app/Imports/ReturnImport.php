<?php

namespace App\Imports;

use App\g_retur;
use Maatwebsite\Excel\Concerns\ToModel;

class ReturnImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new g_retur([
            'fod_no' => $row[0],
            'cabang' => $row[1],
            'produk'      => $row[2],
            'jumlah'     => $row[3],
        ]);
    }
}
