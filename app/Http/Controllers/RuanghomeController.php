<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;

class RuanghomeController extends Controller
{
    //
    public function index()
    {
        //
    }

    public function show()
    {
        //
        $rview = Ruang::all();
        return view('ruang', compact('rview'));
    }
}
