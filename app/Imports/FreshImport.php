<?php

namespace App\Imports;

use App\freshproduct;
use Maatwebsite\Excel\Concerns\ToModel;

class FreshImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new freshproduct([
            'kd_produk' => $row[0],
            'nm_produk' => $row[1],
            'harga'     => $row[2],
            'satuan'    => $row[3]
        ]);
    }
}
