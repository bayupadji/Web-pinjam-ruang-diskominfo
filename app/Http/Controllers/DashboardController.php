<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Ruang;

class DashboardController extends Controller
{
    //menghitung data
    public function count()
    {
        $transaksi = Transaksi::all(); //call transaksi db
        $usercount = count(User::all()); //count user db
        $transaksicount = count($transaksi); //count transaksi db
        $ruangcount = count(Ruang::all()); //count ruang db
        $userid = User::all();
        $ruang = Ruang::all();

        return view('admin.dashboard', ['ucount' => $usercount, 'ruangcount' => $ruangcount, 'transaksicount' => $transaksicount, 'transaksi' => $transaksi], ['ruang' => $ruang], ['uid' => $userid]);
    }
}
