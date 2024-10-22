<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_kategori',
        'jenis_kategori',
    ];
    protected $primaryKey = 'id_kategori';
    public $incrementing = false;
}
