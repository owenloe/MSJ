<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_produk',
        'alasan',
        'jumlah',
        'created_at',
        'updated_at',
    ];
}
