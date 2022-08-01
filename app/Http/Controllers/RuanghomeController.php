<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use App\Models\Transaksi;

class RuanghomeController extends Controller
{
    //

    public function show()
    {
        //
        $ruang = Ruang::all();
        $transaksi = Transaksi::all();
        return view('ruang', ['ruang' => $ruang, 'transaksi' => $transaksi]);
    }
}
