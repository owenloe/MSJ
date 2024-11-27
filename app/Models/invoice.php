<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        
        'id_invoice',
        'id_pembayaran',
        'userid',
        'nama_user',
        'id_produk',
        'nama_produk',
        'quantity_produk',
        'harga_produk',
        'jalan',
        'kota',
        'kecamatan',
        'nomor_telepon',
        'date_made'
        
    ];

    protected $primaryKey = 'id_invoice';
    public $incrementing = false;

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'userid', 'userid');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_pembayaran', 'id_pembayaran');
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
        $model->jalan = $pengguna?->jalan;
        $model->kota = $pengguna?->kota;
        $model->kecamatan = $pengguna?->kecamatan;
        $model->nomor_telepon = $pengguna?->nomor_telepon;

        $produk = \App\Models\Produk::find($model->id_produk);
        $model->nama_produk = $produk?->nama_produk;
        $model->harga_produk = $produk?->harga_produk;
        });
}
}
