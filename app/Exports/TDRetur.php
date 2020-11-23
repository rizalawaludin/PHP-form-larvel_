<?php

namespace App\Exports;

use App\retur_order;
use Maatwebsite\Excel\Concerns\FromCollection;

class TDRetur implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return retur_order::all('fod_no','satuan','jml_pesanan','nm_pemesan');
    }
}
