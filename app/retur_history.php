<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class retur_history extends Model
{
    protected $fillable = ['invoice_no','nm_pegawai','nohp','cabang','departemen','product','jumlah'];
}
