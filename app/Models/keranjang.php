<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [

            'id_keranjang',
            'userid',
            'nama_user',
            'nama_produk',
            'harga_produk',
            'unit_produk',
            'image',
        
    ];
    protected $primaryKey = 'id_keranjang';
    public $incrementing = false;
}
