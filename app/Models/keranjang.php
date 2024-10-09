<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nama_user',
        'nama_produk',
        'harga_produk',
        'unit_produk',
        'image',
        
    ];
}
