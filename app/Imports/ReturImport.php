<?php

namespace App\Imports;

use App\returproduct;
use Maatwebsite\Excel\Concerns\ToModel;

class ReturImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new returproduct([
            'kd_produk' => $row[0],
            'nm_produk' => $row[1],
            'stok'      => $row[2],
            'harga'     => $row[3],
            'satuan'    => $row[4]
        ]);
    }
}
