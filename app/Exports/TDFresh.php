<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\fresh_order;

class TDFresh implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return fresh_order::all('fod_no','satuan','jml_pesanan','nm_pemesan');
    }
}
