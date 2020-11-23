<?php

namespace App\Exports;

use App\fresh_form;
use Maatwebsite\Excel\Concerns\FromCollection;

class KPFresh implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return fresh_form::all('invoice_no','nm_pegawai','cabang','product','jumlah');
    }
}
