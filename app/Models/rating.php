<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    protected $fillable = [
            'id_rating',
            'userid',
            'nama_user',
            'rating',
            'komentar',
            'gambar_produk',
    ];
    protected $primaryKey = 'id_rating';
    public $incrementing = false;
        public $timestamps = false;

}
