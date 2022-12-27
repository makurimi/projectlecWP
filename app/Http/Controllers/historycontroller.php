<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Http\Request;
use App\Models\pesanandetail;
use Illuminate\Support\Facades\Auth;

class historycontroller extends Controller
{
    public function index()
    {
    	$pesanans = pesanan::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

    	return view('pages.history', compact('pesanans'),[
            'title' => 'History'
        ]);
    }

    public function detail($id)
    {
    	$pesanan = Pesanan::where('id', $id)->first();
    	$pesanan_details = pesanandetail::where('pesanan_id', $pesanan->id)->get();

     	return view('pages.historydetails', compact('pesanan','pesanan_details'),[
            'title' => 'History'
        ]);
    }
}
