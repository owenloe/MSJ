<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'notifikasi',
        'objek',
        'nama_user',
        'created_at',
        'updated_at',
    ];
}
