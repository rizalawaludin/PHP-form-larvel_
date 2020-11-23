<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_fresh extends Model
{
    protected $fillable = ['id','nm_pegawai','nohp','cabang','departemen','produk','jumlah'];
}
