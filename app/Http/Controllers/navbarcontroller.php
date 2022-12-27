<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\pesanan;
use Illuminate\Http\Request;
use App\Models\pesanandetail;
use Illuminate\Support\Facades\Auth;

class navbarcontroller extends Controller
{

    public function render()
    {
        return view('layouts.app',[
            'categories' => category::all(),
            'pesanan' => pesanan::all(),
            'pesanandetail' =>pesanandetail::all(),
            'jumlah_pesanan' => $this->jumlah,
        ]);
    }
}
