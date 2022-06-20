<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //menghitung data
    public function count()
    {
        // $usercount = DB::table('users')->count();
        $transaksi = DB::table('transaksis')->get();
        $usercount = count(User::all());
        $transaksicount = DB::table('transaksis')->count();
        $ruangcount = DB::table('ruangs')->count();
        return view('admin.dashboard', ['ucount' => $usercount, 'ruangcount' => $ruangcount, 'transaksicount' => $transaksicount, 'transaksi' => $transaksi]);
    }

    //     //menampilkan data
    //     public function show()
    //     {
    //         $transaksi = DB::table('transaksis')->get();
    //         return view('admin.dashboard', ['transaksi' => $transaksi]);
    //     }
}
