<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tambah data ruang
        $namefoto = null;
        // dd($request->file('foto'));
        if ($request->file('foto')) {
            $filefoto = $request->file('foto')->store('public/images');
            $split = explode('/', $filefoto);
            $namefoto = $split[2];
        }
        // dd($filefoto);
        Ruang::create([
            'foto' => $namefoto,
            'nama_ruang' => $request->nama_ruang,
            'lantai' => $request->lantai,
            'deskripsi' => $request->deskripsi,
            'kapasitas' => $request->kapasitas,
            'status' => $request->status,
        ]);
        return redirect()->route('ruangdetail')->with('success', 'Ruang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //menampilkan data
        $ruang = Ruang::all()->sortByDesc('nama_ruang');
        return view('admin.ruangdetail', ['ruang' => $ruang],);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruang $ruang)
    {
        //
        return view('admin.editruang', ['ruang' => $ruang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $namefoto = null;
        // dd($request->file('foto'));
        if ($request->file('foto')) {
            $filefoto = $request->file('foto')->store('public/images');
            $split = explode('/', $filefoto);
            $namefoto = $split[2];
        }

        Ruang::find($id)->update([
            'foto' => $namefoto,
            'nama_ruang' => $request->nama_ruang,
            'lantai' => $request->lantai,
            'deskripsi' => $request->deskripsi,
            'kapasitas' => $request->kapasitas,
            'status' => $request->status,
        ]);

        return redirect()->route('ruangdetail')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruang $ruang)
    {
        //
        Ruang::find($ruang->id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
