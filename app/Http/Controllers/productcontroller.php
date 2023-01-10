<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function index()
    {
       $barangs = barang::paginate(8)->withQuerystring();
        return view('pages.product',compact('barangs'),[
            'title' => 'Product'
        ]);
    }

    public function details($id){
        return view('pages.productdetails', [
            'title' => 'Product',
            'barang' => barang::findOrFail($id),
        ]);
    }

    public function search(Request $request){
        $barangs = barang::where('namabarang','LIKE',"%$request->search%")->paginate(8)->withQuerystring();

        return view('pages.product',[
            'title' => 'Search Product'
        ])->with('barangs',$barangs);

    }
}
