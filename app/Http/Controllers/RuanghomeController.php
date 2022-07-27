<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;

class RuanghomeController extends Controller
{
    //

    public function show()
    {
        //
        $ruang = Ruang::all();
        return view('ruang', ['ruang' => $ruang]);
    }
}
