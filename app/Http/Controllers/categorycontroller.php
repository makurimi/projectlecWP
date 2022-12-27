<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\category;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    public function category()
    {
        $category = category::all();
        return view('pages.categories',compact('category'),[
            'barangs' => barang::all(),
            'title' => $category->name,
            'barangs'=> $category->barangs,
            'category' => $category->name
        ]);
    }

    public function show($id){
        $category = category::findOrFail($id);
        return view('pages.categories', [
            'title' => 'Categories',
            'barangs' => $category->barangs,
            'category' => $category->name
        ]);
    }
    public function mysearch(Request $request){
        $barangs = barang::where('namabarang','LIKE',"%$request->search%")->simplepaginate(8);

        return view('pages.categories',[
            'title' => 'Search Product'
        ])->with('barangs',$barangs);

    }
}
