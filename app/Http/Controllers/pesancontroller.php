<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\pesanandetail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class pesancontroller extends Controller
{
    public function index($id)
    {
    	$barang = barang::where('id', $id)->first();

    	return view('pages.productdetails', compact('barang'),[
            'title' => 'Show Product',
        ]);
    }

    public function pesan(Request $request, $id)
    {
    	$barang = Barang::where('id', $id)->first();
    	$tanggal = Carbon::now();

    	//validasi apakah melebihi stok
    	if($request->jumlah_pesan > $barang->stok)
    	{
    		return redirect('barang/'.$id);
    	}

    	//cek validasi
    	$cek_pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	//simpan ke database pesanan
    	if(empty($cek_pesanan))
    	{
    		$pesanan = new pesanan;
	    	$pesanan->user_id = Auth::user()->id;
	    	$pesanan->tanggal = $tanggal;
	    	$pesanan->status = 0;
	    	$pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(1000, 9999);
	    	$pesanan->save();
    	}


    	//simpan ke database pesanan detail
    	$pesanan_baru = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

    	//cek pesanan detail
    	$cek_pesanan_detail = pesanandetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
    	if(empty($cek_pesanan_detail))
    	{
    		$pesanan_detail = new pesanandetail;
	    	$pesanan_detail->barang_id = $barang->id;
	    	$pesanan_detail->pesanan_id = $pesanan_baru->id;
	    	$pesanan_detail->jumlah = $request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
	    	$pesanan_detail->save();
    	}else
    	{
    		$pesanan_detail = pesanandetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();

    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
	    	$pesanan_detail->update();
    	}

    	//jumlah total
    	$pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
    	$pesanan->update();

    	return redirect('checkout');

    }

    public function checkout()
    {
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	$pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = pesanandetail::where('pesanan_id', $pesanan->id)->get();

        }

        return view('pages.checkout', compact('pesanan', 'pesanan_details'),[
            'title' => 'checkout'
        ]);
    }

    public function delete($id)
    {
        $pesanan_detail = pesanandetail::where('id', $id)->first();

        $pesanan = pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();


        $pesanan_detail->delete();

        return redirect('checkout');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->address))
        {
            return redirect('editprofile');
        }

        if(empty($user->nohp))
        {
            return redirect('editprofile');
        }

        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = pesanandetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok-$pesanan_detail->jumlah;
            $barang->update();
        }

        return redirect('history/'.$pesanan_id);
    }
}
