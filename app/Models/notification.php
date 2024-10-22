<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
            'id_notif',
            'userid',
            'notifikasi',
            'objek',
            'nama_user',
    ];
    protected $primaryKey = 'id_notif';
    public $incrementing = false;
}
