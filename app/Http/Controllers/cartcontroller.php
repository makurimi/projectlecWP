<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\pesanandetail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class cartcontroller extends Controller
{
    public function index($id)
    {
    	$barang = barang::where('id', $id)->first();

    	return view('pages.productdetails', compact('barang'),[
            'title' => 'Show Product',
        ]);
    }

    public function pesan(Request $req, $id)
    {
    	$barang = Barang::where('id', $id)->first();
    	$tanggal = Carbon::now();

    	if($req->jumlah_pesan > $barang->stok)
    	{
    		return redirect('barang/'.$id);
    	}
    	$cekpesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

    	if(empty($cekpesanan))
    	{
    		$pesanan = new pesanan;
	    	$pesanan->user_id = Auth::user()->id;
	    	$pesanan->jumlah_harga = 0;
            $pesanan->tanggal = $tanggal;
	    	$pesanan->status = 0;
            $pesanan->kode = mt_rand(1000, 9999);
	    	$pesanan->save();
    	}

    	$pesananbaru = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$cekpesanandetail = pesanandetail::where('barang_id', $barang->id)->where('pesanan_id', $pesananbaru->id)->first();
    	if(empty($cekpesanandetail))
    	{
    		$pesanandetail = new pesanandetail;
	    	$pesanandetail->barang_id = $barang->id;
	    	$pesanandetail->pesanan_id = $pesananbaru->id;
	    	$pesanandetail->jumlah = $req->jumlah_pesan;
	    	$pesanandetail->jumlah_harga = $barang->harga*$req->jumlah_pesan;
	    	$pesanandetail->save();
    	}else
    	{
    		$pesanandetail = pesanandetail::where('barang_id', $barang->id)->where('pesanan_id', $pesananbaru->id)->first();

    		$pesanandetail->jumlah = $pesanandetail->jumlah+$req->jumlah_pesan;

    		$harga_pesanan_detail_baru = $barang->harga*$req->jumlah_pesan;
	    	$pesanandetail->jumlah_harga = $pesanandetail->jumlah_harga+$harga_pesanan_detail_baru;
	    	$pesanandetail->update();
    	}

    	$pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$req->jumlah_pesan;
    	$pesanan->update();

    	return redirect('checkout');

    }

    public function checkout()
    {
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $pesanandetails = [];
        if(!empty($pesanan))
        {
            $pesanandetails = pesanandetail::where('pesanan_id', $pesanan->id)->get();
        }

        return view('pages.checkout', compact('pesanan', 'pesanandetails'),[
            'title' => 'checkout'
        ]);
    }

    public function delete($id)
    {
        $pesanandetail = pesanandetail::where('id', $id)->first();

        $pesanan = pesanan::where('id', $pesanandetail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanandetail->jumlah_harga;
        $pesanan->update();


        $pesanandetail->delete();

        return redirect('checkout');
    }

    public function confirm()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->nohp))
        {
            return redirect('editprofile');
        }

        if(empty($user->address))
        {
            return redirect('editprofile');
        }
        $pesanan = pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanandetails = pesanandetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanandetails as $pesanandetail) {
            $barang = Barang::where('id', $pesanandetail->barang_id)->first();
            $barang->stok = $barang->stok-$pesanandetail->jumlah;
            $barang->update();
        }

        return redirect('history/'.$pesanan_id);
    }
}
