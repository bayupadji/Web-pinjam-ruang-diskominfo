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

        // dd($ruang);
        $datatrans = Transaksi::where('tanggal_pinjam', date('Y-m-d'))->get();
        $oprasional = jams::where('id', '1')->first();

        $available = [];

        $jam = new DateTime($oprasional->jam_awal);
        $transit = '';
        $jamakhir = new DateTime($oprasional->jam_akhir);
        $loop = true;
        // $available += [$jam->format('h:i:s') => true];
        // dd($available);
        while ($loop) {
            $listime = array($jam->format('H:i'), true);
            array_push($available, $listime);
            // $available += [$jam->format('H:i:s') => true];
            date_add($jam, date_interval_create_from_date_string('1 hours'));
            $transit = $jam->format('H:i:s');
            if ($jam->format('H:i:s') == $jamakhir->format('H:i:s')) {
                // $available += [$jam->format('H:i:s') => true];
                $loop = false;
            }
            $jam = new DateTime($transit);
        }
        // dd(count($available));

        //kondisi ketika user pinjam ruang
        if (Auth::check()) {
            $user = Auth::user();
            $transaksi = Transaksi::where('user_id', $user->id)->get();
            $ctransaksi = count($transaksi);
        } else {
            $transaksi = [];
            $ctransaksi = 0;
        }

        return view('home', ['ruang' => $ruang, 'counttran' => $ctransaksi, 'available' => $available, 'transaksi' => $transaksi]);
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

            return redirect('/')->with('success', 'Transaksi berhasil, silahkan tunggu verifikasi dari admin');
        } else {
            return redirect('/')->with('error', 'Silahkan login terlebih dahulu');
        }
    }

    public function adminHome()
    {
        return view('/dashboard');
    }
}
