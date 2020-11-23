<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class returproduct extends Model
{
    protected $fillable = ['kd_produk','nm_produk','stok','harga','satuan'];
}
