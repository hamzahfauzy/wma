<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    //
    protected $fillable = ['barang_id','jumlah_keluar','bulan','tahun'];

    function barang()
    {
    	return $this->hasOne(Barang::class,'id','barang_id');
    }
}
