<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function index()
    {
       $barangs = barang::simplepaginate(8);
        return view('pages.product',compact('barangs'),[
            'title' => 'Show Product'
        ]);
    }

    public function details($id){
        return view('pages.productdetails', [
            'title' => 'Show Product',
            'barang' => barang::findOrFail($id),
        ]);
    }

    public function search(Request $request){
        $barangs = barang::where('namabarang','LIKE',"%$request->search%")->simplepaginate(8);

        return view('pages.product',[
            'title' => 'Search Product'
        ])->with('barangs',$barangs);

    }
}
