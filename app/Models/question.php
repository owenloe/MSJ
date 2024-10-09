<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_produk',
        'nama_user',
        'pertanyaan',
        'created_at',
        'updated_at',
    ];
}
