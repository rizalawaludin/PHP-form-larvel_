<?php

namespace App\Imports;

use App\t_retur;
use Maatwebsite\Excel\Concerns\ToModel;

class PRetur implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new t_retur([
            'nm_pegawai' => $row[0],
            'nohp' => $row[1],
            'cabang' => $row[2],
            'departemen' => $row[3],
            'produk' => $row[4],
            'jumlah' => $row[5],
        ]);
    }
}
