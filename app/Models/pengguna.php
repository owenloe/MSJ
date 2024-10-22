<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
            'userid',
            'nama',
            'email',
            'password',
            'jalan',
            'kota',
            'kecamatan',
            'nomor_telepon',
            'is_admin'
    ];
        protected $primaryKey = 'id_pembayaran';
    public $incrementing = false;

}
