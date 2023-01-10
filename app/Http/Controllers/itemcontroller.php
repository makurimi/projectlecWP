<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\category;
use Illuminate\Http\Request;

class itemcontroller extends Controller
{
    public function item(){
        $barang = barang::paginate(5);
        return view('pages.item',compact('barang'),[
            'title' => 'Item',
        ]);
    }



    public function insertitem(){
        $categories = category::all();
        return view('pages.additem',compact('categories'),[
            'title' => 'Add Item'
        ]);
    }



    public function iteminserted(Request $request){
        // dd($request->all());
        $barang = barang::create($request->all());
        if($request->hasFile('images')){
            $request->file('images')->move('img/',$request->file('images')->getClientOriginalName());
            $barang->images = $request->file('images')->getClientOriginalName();
            $barang->save();
        }

        $category = category::findOrFail($request->category_id);
        $barang->namabarang = $request->namabarang;
        $barang->stok = $request->stok;
        $barang->keterangan = $request->keterangan;
        $barang->harga = $request -> harga;

        $category->barangs()->save($barang);
        return redirect()->route('item')->with('success','item has been Inserted');
    }

    public function openitem(int $barang){
        $categories = category::all();
        $barang = barang::findOrFail($barang);
        // dd($barang);
        return view('pages.viewitem',compact('categories','barang'),[
            'title' => 'UpdateItem',
        ]);
    }

    public function updateitem(Request $request, $barang_id){
        $category = category::findOrFail($request->category_id);
        $category->barangs()->where('id',$barang_id)->update([
            'namabarang' => $request->namabarang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
            'images' => $request->images
        ]);

        return redirect()->route('item')->with('success','item has been Updated');
    }

    public function deleteitem($id){
        $barang = barang::find($id);
        $barang->delete();
        return redirect()->route('item')->with('success','item has been Deleted');
    }
}
