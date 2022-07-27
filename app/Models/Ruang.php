<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $table = 'ruangs';
    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
