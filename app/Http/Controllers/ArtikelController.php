<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function show($artikel)
    {
        return view('post.' . $artikel);
    }
}
