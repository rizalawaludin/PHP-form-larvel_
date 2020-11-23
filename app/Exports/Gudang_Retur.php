<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\gretur;

class Gudang_Retur implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return gretur::all('fod_no','cabang','produk','jumlah');
    }
}
