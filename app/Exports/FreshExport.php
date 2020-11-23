<?php

namespace App\Exports;

use App\freshproduct;
use Maatwebsite\Excel\Concerns\FromCollection;

class FreshExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return freshproduct::all('kd_produk','nm_produk','harga','satuan');
    }
}
