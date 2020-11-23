<?php

namespace App\Exports;

use App\returproduct;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReturExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return returproduct::all('kd_produk','nm_produk','stok','harga','satuan');
    }
}
