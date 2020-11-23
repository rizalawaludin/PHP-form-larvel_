<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class retur_form extends Model
{
    protected $fillable = ['fod_no','invoice_no','nm_pegawai','nohp','cabang','departemen','product','jumlah','created_at'];
}
