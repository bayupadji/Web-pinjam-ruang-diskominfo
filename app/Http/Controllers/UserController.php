<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
     *
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'status' => 'required',
            'bidang' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('userdetail')->with('success', 'Data berhasil ditambahkan');
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
        $user = DB::table('users')->get();
        return view('admin.userdetails', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        // $user = User::find($id);
        return view('admin.edituser', ['user' => $user]);
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

        User::find($id)->update($request->all());
        return redirect()->route('userdetail')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //menghapus data
        DB::table('users')->where('id', $user->id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
