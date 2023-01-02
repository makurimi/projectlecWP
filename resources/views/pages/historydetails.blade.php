@extends('layouts.app')
@section('content')
<style>
    body{
        background-color:#161618;
    }

    li{
        color: white;
    }
    h3{
        color: white;
    }
    th{
        color: white;
    }
    td{
        color: white;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('history') }}" class="btn btn-outline-dark mt-2" style="color: white;"><i class="bi bi-chevron-left"></i> Back</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-dark"><a href="/" class="text-dark text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page" ><a href="/history" class="text-dark text-decoration-none">Transaction History</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="bi bi-cart-check"></i> Transaction Detail</h3>
                    @if(!empty($pesanan))
                    <p class="text-center">Order Date : {{ $pesanan->tanggal }}</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Total</th>
                                <th>Price</th>
                                <th>Total Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ asset('img/'.$pesanan_detail->barang->images) }}" width="100" alt="...">
                                </td>
                                <td>{{ $pesanan_detail->barang->namabarang }}</td>
                                <td>{{ $pesanan_detail->jumlah }} pcs</td>
                                <td >Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td >Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>

                            </tr>
                            @endforeach

                            <tr>
                                <tr>
                                <td colspan="5" ><strong>Total Price :</strong></td>
                                <td ><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" ><strong>TAX :</strong></td>
                                <td ><strong>Rp. {{ number_format($pesanan->jumlah_harga/100 +$pesanan->kode) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" ><strong>Total :</strong></td>
                                <td ><strong>Rp. {{ number_format($pesanan->jumlah_harga/100+$pesanan->jumlah_harga+$pesanan->kode) }}</strong></td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
