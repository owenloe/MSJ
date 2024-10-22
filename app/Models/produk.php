<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
            'id_produk',
            'nama_produk',
            'kategori_produk',
            'quantity_produk',
            'harga_produk',
            'berat',
            'jenis',
            'ukuran',
            'warna',
            'image',
    ];
protected $primaryKey = 'id_produk';
    public $incrementing = false;
}
