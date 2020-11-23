<?php

namespace App\Exports;

use App\retur_form;
use Maatwebsite\Excel\Concerns\FromCollection;

class KPRetur implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return retur_form::all('invoice_no','nm_pegawai','cabang','product','jumlah');
    }
}	