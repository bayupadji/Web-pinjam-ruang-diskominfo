<?php

namespace App\Http\Controllers;

use App\Models\jams;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Ruang;
use DateTime;
use Illuminate\Support\Facades\Auth;

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

        // calendar
        $event = array();
        $transaksi = Transaksi::all();

        foreach ($transaksi as $tcalender) {
            if ($tcalender->status == 'Sudah Terverifikasi') {
                $event[] = array(
                    'id' => $tcalender->id,
                    'title' => $tcalender->ruang->nama_ruang,
                    'start' => $tcalender->tanggal_pinjam . ' ' . $tcalender->jam_pinjam,
                    'end' => $tcalender->tanggal_pinjam . ' ' . $tcalender->jam_berakhir,
                    'description' => $tcalender->keterangan

                );
            }
            // dd(date('Y / M / d', strtotime($tcalender->tanggal_pinjam . ' ' . $tcalender->jam_pinjam)));
        }
        // dd($event);

        return view('home', ['ruang' => $ruang, 'event' => $event]);
    }

    public function ruangdetail()
    {
        $ruang = Ruang::all();
        return view('ruangdetail', ['ruang' => $ruang]);
    }

    public function showpinjam()
    {
        $ruang = Ruang::all();
        if (Auth::check()) {
            $user = Auth::user();
            $transaksi = Transaksi::where('user_id', $user->id)->get();
            $ctransaksi = count($transaksi);
        } else {
            $transaksi = [];
            $ctransaksi = 0;
        }

        return view('daftarpinjam', ['transaksi' => $transaksi, 'ctransaksi' => $ctransaksi, 'ruang' => $ruang]);
    }

    public function store()
    {
        // simpan data
        if (Auth::check()) {
            $user = Auth::user();

            $transaksi = new Transaksi;
            $transaksi->user_id = $user->id;
            $transaksi->ruang_id = request('ruang_id');
            $transaksi->tanggal_pinjam = request('tanggal_pinjam');
            $transaksi->jam_pinjam = request('jam_pinjam');
            $transaksi->jam_berakhir = request('jam_berakhir');
            $transaksi->keterangan = request('keterangan');
            $transaksi->status = 'Belum terverifikasi';
            $transaksi->save();

            // dd($transaksi);

            return redirect('/daftarpinjam')->with('success', 'Transaksi berhasil, silahkan tunggu verifikasi dari admin');
        } else {
            return redirect('/daftarpinjam')->with('error', 'Silahkan login terlebih dahulu');
        }
    }

    public function adminHome()
    {
        return view('/dashboard');
    }
}
