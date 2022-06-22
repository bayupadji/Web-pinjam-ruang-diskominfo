<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $table = 'ruangs';
    protected $fillable = [
        'foto',
        'nama_ruang',
        'lantai',
        'deskripsi',
        'kapasitas',
        'status',
    ];
}
