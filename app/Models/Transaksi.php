<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $fillable = [
        'ruang_id',
        'user_id',
        'keterangan',
        'tanggal_pinjam',
        'jam_pinjam',
        'jam_berakhir',
        'status',
    ];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
