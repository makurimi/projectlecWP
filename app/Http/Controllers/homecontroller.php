<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\category;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function render()
    {
        return view('home', [
            'barangs' => barang::take(4)->get(),
            'categories' => category::take(4)->get(),
            'title' => 'home'
        ]);
    }
}
