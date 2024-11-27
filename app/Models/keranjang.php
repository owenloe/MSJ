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
            'id_produk',
            'nama_produk',
            'harga_produk',
            'quantity',
        
    ];
    protected $primaryKey = 'id_keranjang';
    public $incrementing = false;

    public function pengguna()
    {
        return $this->belongsTo(pengguna::class, 'userid');
    }

    public function produk()
{
    return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
}

    protected static function boot()
    {
        parent::boot();

        // This will be triggered before a new model is inserted into the database
        static::creating(function ($model) {
        $pengguna = \App\Models\Pengguna::find($model->userid);
        $model->nama_user = $pengguna?->nama;

        $produk = \App\Models\Produk::find($model->id_produk);
        $model->nama_produk = $produk?->nama_produk;
        $model->harga_produk = $produk?->harga_produk;

        
    });

    static::updating(function ($model) {
            $pengguna = \App\Models\Pengguna::find($model->userid);
            $model->nama_user = $pengguna?->nama;

            $produk = \App\Models\Produk::find($model->id_produk);
            $model->nama_produk = $produk?->nama_produk;
            $model->harga_produk = $produk?->harga_produk;
        });
    }
}
