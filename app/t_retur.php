<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_retur extends Model
{
    protected $fillable = ['nm_pegawai','nohp','cabang','departemen','produk','jumlah'];
}
