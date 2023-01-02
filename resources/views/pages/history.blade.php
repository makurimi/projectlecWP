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
            <a href="/checkout" class="btn btn-outline-dark mt-2 mb-2 bi bi-chevron-left" style="color: white;"><i class=""></i> Back</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-light"><a href="/" class="text-dark text-decoration-none" style="color:white;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" class="text-dark text-decoration-none">Transaction History</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="bi bi-history"></i> Transaction History</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanans as $pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pesanan->tanggal }}</td>
                                <td>
                                    @if($pesanan->status == 0)
                                    Unpaid
                                    @else
                                    Paid
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($pesanan->jumlah_harga+$pesanan->jumlah_harga/100+$pesanan->kode) }}</td>
                                <td>
                                    <a href="{{ url('history') }}/{{ $pesanan->id }}" class="btn btn-outline-dark" style="color: white;"><i class="bi bi-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
