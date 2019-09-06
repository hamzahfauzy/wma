<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = ['nama','jumlah_stok'];

    function keluars()
    {
    	return $this->hasMany(BarangKeluar::class,'barang_id','id');
    }
}
