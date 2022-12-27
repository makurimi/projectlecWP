<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\category;
use Illuminate\Http\Request;

class itemcontroller extends Controller
{
    public function item(){
        $barang = barang::all();
        return view('pages.item',compact('barang'),[
            'title' => 'Item',
            'categories' => category::all()
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
        $category->barangs()->create([
            'name'=> $request->name,
            'images' => $request->images
        ]);
        return redirect()->route('item')->with('success','item has been Inserted');
    }

    public function openitem($id){
        $barang = barang::find($id);
        // dd($barang);
        return view('pages.viewitem',compact('barang'),[
            'title' => 'UpdateItem',
            'categories' => category::all()
        ]);
    }

    public function updateitem(Request $request, $id){
        $barang = barang::find($id);
        $barang->update($request->all());
        return redirect()->route('item')->with('success','item has been Updated');
    }

    public function deleteitem($id){
        $barang = barang::find($id);
        $barang->delete();
        return redirect()->route('item')->with('success','item has been Deleted');
    }
}
