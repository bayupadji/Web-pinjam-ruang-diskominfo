<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaksi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ruang = Ruang::all();
        $transaksi = count(Transaksi::all());
        return view('/home', ['ruang' => $ruang], ['counttran' => $transaksi]);
    }

    public function store()
    {
    }

    public function adminHome()
    {
        return view('/dashboard');
    }
}
